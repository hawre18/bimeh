<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function charge($id)
    {
        $customer=Customer::findorfail($id);
        return view('index.v1.admin.customer.wallet',compact(['customer']));
    }

    public function charging(Request $request)
    {
        $this->validate(request(), [
            'charge' => 'required'
        ]);
        try{

        $count=$wallet=Wallet::where('customer_id',$request->input('customer_id'))->count();
            if($count>0){
                $wallet=Wallet::where('customer_id',$request->input('customer_id'))->first();
                $wallet->modeCharge=$wallet->modeCharge+$request->input('charge');
                $wallet->save();
                alert()->success('موفقیت آمیز','حساب با موفقیت شارژ شد');
                return redirect()->route('wallet.charge', [$request->input('customer_id')]);
            }
            else{
                $wallet1=new Wallet();
                $wallet1->customer_id=$request->input('customer_id');
                $wallet1->modeCharge=$request->input('charge');
                $wallet1->save();
                alert()->success('موفقیت آمیز','حساب با موفقیت شارژ شد');
                return redirect()->route('wallet.charge', [$request->input('customer_id')]);

            }

        }
        catch (\Exception $m){
            return $m;
            alert()->warning(' خطا','خطا در شارژ حساب');
            return redirect()->route('wallet.charge', [$request->input('customer_id')]);
        }
    }
}
