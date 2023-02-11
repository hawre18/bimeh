<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class WalletController extends Controller
{
    public function charge($customerId)
    {
        $wallet=Wallet::where('customer_id',$customerId)->with('customer')->first();
        if(count(array($wallet))>0){
            if(View::exists('index.v1.admin.customer.wallet')){
                return view('index.v1.admin.customer.wallet',compact(['wallet']));

            }
            elseif(!(View::exists('index.v1.admin.customer.wallet')))
            {
            abort(Response::HTTP_NOT_FOUND);
            }
        }
        elseif (count(array($wallet))<1)
        {
            $wallets=new Wallet();
            $wallets->customer_id=$customerId;
            $wallets->modeCharge=0;
            $wallets->save();
            if(View::exists('index.v1.admin.customer.wallet')){
                return view('index.v1.admin.customer.wallet',compact(['wallet']));

            }
            elseif(!(View::exists('index.v1.admin.customer.wallet')))
            {
                abort(Response::HTTP_NOT_FOUND);
            }
        }

    }

    public function charging(Request $request, $customerId)
    {
        $this->validate(request(), [
            'charge' => 'required'
        ]);
        try{

            $wallet=Wallet::where('customer_id',$customerId)->first();
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
