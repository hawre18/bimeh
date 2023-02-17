<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Symfony\Component\HttpFoundation\Response;

class WalletController extends Controller
{
    const FORMAT = "%s = %s <br/>";
    public function charge($customerId)
    {

        if(View::exists('index.v1.admin.customer.wallet')) {
            $wallet=Wallet::where('customer_id',$customerId)->with('customer')->first();
            return view('index.v1.admin.customer.wallet', compact(['wallet']));
        }
        else
        {
            abort(Response::HTTP_NOT_FOUND);
        }


    }

    public function charging(Request $request, $customerId)
    {
        $this->validate(request(), [
            'charge' => 'required'
        ]);
        try{

            $wallet=Wallet::where('customer_id',$customerId)->first();
            $customer=Customer::where('id',$customerId)->first();
            if(count(array($wallet))>0){
                $wallet->modeCharge=$wallet->modeCharge+$request->input('charge');
                $wallet->save();
                alert()->success('موفقیت آمیز','حساب با موفقیت شارژ شد');
                return redirect()->route('wallet.charge', [$customerId]);
            }
            else{
                $wallet1=new Wallet();
                $wallet1->customer_id=$customerId;
                $wallet1->modeCharge=$request->input('charge');
                $wallet1->save();
                try {
                    $sender='10000550002200';
                    $mes1=$customer->f_name;
                    $mes2='عزیز '."<br/>";

                    $mes3="کیف پول شما به مبلغ";
                    $mes4=$request->input('charge');
                    $mes5="تومان شارژ شد. "."<br/>"."<br/>";
                    $mes6="شفا آوا";
                    $message = $mes1.$mes2.$mes3.$mes4.$mes5.$mes6;
                    $receptor = $customer->phone;
                    $result = Kavenegar::Send( $sender,$receptor,$message);
                    $this->format($result);

                }catch(ApiException $e){
                    echo $e->errorMessage();
                }
                catch(HttpException $e){
                    echo $e->errorMessage();
                }
                alert()->success('موفقیت آمیز','حساب با موفقیت شارژ شد');
                return redirect()->route('wallet.charge', [$request->input('customer_id')]);

            }

        }
        catch (\Exception $m){
            return $m;
            alert()->warning(' خطا','خطا در شارژ حساب');
            return redirect()->route('wallet.charge', [$customerId]);
        }
    }
}
