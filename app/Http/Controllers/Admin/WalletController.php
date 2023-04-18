<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Plane;
use App\Models\Type;
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

    public function index()
    {
        $wallets=Wallet::with(['customer'])->latest('created_at')->paginate(20);
        $type=Type::all();
        if(View::exists('index.v1.admin.wallet.index')){
            return view('index.v1.admin.wallet.index',compact(['wallets']));
        }else{
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function create()
    {

        $types=Type::all();
        $customers=Customer::all();
        if(View::exists('index.v1.admin.wallet.create')){
            return view('index.v1.admin.wallet.create',compact(['types','customers']));

        }
        else{
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'typePlane' => 'required',
            'customer_id' => 'required'
        ]);
        try{

            $walletFind=Wallet::where('customer_id',$request->input('customer_id'))->where('type_id',$request->input('typePlane'))->count();
            $type=Type::where('id',$request->input('typePlane'))->first();
            if($walletFind<1){
                $wallet=new Wallet();
                $wallet->label=$type->label;
                $wallet->customer_id=$request->input('customer_id');
                $wallet->type_id=$request->input('typePlane');
                $wallet->modeCharge=0;
                $wallet->user_id=auth()->guard('web')->user()->id;
                $wallet->save();
                alert()->success('موفقیت آمیز','کیف پول با موفقیت ایجاد شد');
                return redirect('/admin/wallets');
            }
            else{
                alert()->success('خطا ','کیف پول قبلا ایجاد شده است ');
                return redirect('/admin/wallets/create');

            }

        }
        catch (\Exception $m){
            return $m;
            alert()->warning(' خطا','خطا در ایجاد کیف پول');
            return redirect('/admin/wallets/create');
        }
    }

    public function edit($id)
    {
        if(View::exists('index.v1.admin.wallet.edit')){
            $wallet=Wallet::findorfail($id);
            if(($wallet)!=null){
                return view('index.v1.admin.wallet.edit',compact(['wallet']));
            }
            elseif(($wallet)==null){
                alert()->error('خطا','کیف پول یافت نشد');
                return redirect('/admin/wallets');
            }
            elseif(!(View::exists('index.v1.admin.wallet.edit'))){
                abort(Response::HTTP_NOT_FOUND);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'charge' => 'required'
        ]);
        try{
            $wallet=Wallet::findorfail($id);
            $wallet->modeCharge=$request->input('charge');
            $wallet->save();
            alert()->success('موفقیت آمیز','کیف پول با موفقیت ویرایش شد');
            return redirect('/admin/wallets');
        }
        catch (\Exception $m){
            alert()->error('خطا','خطا در ویرایش کیف پول');
            return redirect('/admin/wallets');
        }
    }

    public function destroy($id)
    {

    }
    public function charge($customerId, $typePlane)
    {
        if(View::exists('index.v1.admin.wallet.charge')) {
            $wallet=Wallet::where('customer_id',$customerId)->where('type_id',$typePlane)->with(['customer','type'])->first();
            return view('index.v1.admin.wallet.charge', compact(['wallet','typePlane']));
        }
        else
        {
            abort(Response::HTTP_NOT_FOUND);
        }


    }

    public function charging(Request $request, $customerId, $typePlane)
    {
        $this->validate(request(), [
            'charge' => 'required'
        ]);
        try{

            $wallet=Wallet::where('customer_id',$customerId)->where('type_id',$typePlane)->first();
            $customer=Customer::where('id',$customerId)->first();
            if(count(array($wallet))>0){
                $wallet->modeCharge=$wallet->modeCharge+$request->input('charge');
                $wallet->save();
                alert()->success('موفقیت آمیز','حساب با موفقیت شارژ شد');
                return redirect()->route('wallet.charge', [$customerId,$typePlane]);
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
    public function getPlane($id)
    {
        $wallets=Wallet::where($id)->get()->all();
        $planes=Plane::where('type_id',$wallets->type_id)->get()->all();
        $response=[
            'planes'=>$planes
        ];
        return response()->json($response,200);
    }
}
