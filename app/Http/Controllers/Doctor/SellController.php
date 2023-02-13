<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Sell;
use App\Models\Service;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;


class SellController extends Controller
{
    public function index()
    {
        $sells=Sell::where('doctor_id',auth()->guard('doctor')->user()->id)->with('customer')->get();
        if(View::exists('index.v1.doctor.factor')){
            return view('index.v1.doctor.factor',compact(['sells']));
        }
        abort(Response::HTTP_NOT_FOUND);
    }
    public function create()
    {
        if(View::exists('index.v1.doctor.sell')){
            return view('index.v1.doctor.sell');
        }
       abort(Response::HTTP_NOT_FOUND);
    }

    public function store(Request $request)
    {
        $serviceId=[];
        $sum=0;
        try{
        $sell=new Sell();
        $sell->customer_id=$request->input('customer');
        $sell->doctor_id=auth()->guard('doctor')->user()->id;
        foreach($request->input('service') as $service){
            $ser=Service::findorfail($service)->first();
            $serviceId=[$ser->id];
            $sum=$sum+$ser->price;
        }
        $sell->totalPrice=$sum;
        $sell->save();
        $sell->services()->sync($serviceId);
            alert()->success('موفقیت آمیز','فاکتور با موفقیت صادر شد');
            return back();
        }
        catch (\Exception $m){
            return $m;
            alert()->erorr(' خطا','خطا در صدور فاکتور');
            return back();
        }
            //$sell->permissions()->sync($request->input('permission_id'));
    }
    public function getAllCustomer()
    {
        $customers=Customer::all();
        $response=[
            'customers'=>$customers
        ];
        return response()->json($response,200);
    }
    public function getAllService()
    {
        $services=Service::all();
        $response=[
            'services'=>$services
        ];
        return response()->json($response,200);
    }

    public function payment($sellId, $customerId)
    {
        $sell=Sell::where('id',$sellId)->with('services')->first();
        $sells=Sell::where('doctor_id',Auth::guard('doctor')->user()->id)->with('customer')->paginate(20);
        $wallet=Wallet::where('customer_id',$customerId)->first();
        if($wallet->modeCharge>0){
            $wallet->modeCharge=$wallet->modeCharge-$sell->totalprice;
            $wallet->save();
            $sell->status=1;
            $sell->save();
            return view('index.v1.doctor.factor',compact(['sells']));
        }

    }

    public function show($id, $nationalcode)
    {
        $sell=Sell::with('services')->where('id',$id)->first();
        $customer=Customer::where('nationalcode',$nationalcode)->first();
        return view('index.v1.doctor.sellShow',compact(['sell','customer']));
    }

    public function destro($id)
    {
        try {
            $sell=Sell::findorfail($id);
            if(($sell)!=null){
                $sell->delete();
                alert()->success('موفقیت آمیز','فاکتور با موفقیت حذف شد');
                return redirect('doctors/sells/index');
            }else{
                alert()->error('خطا','فاکتور موردنظر یافت نشد');
                return redirect('/doctors/sells/index');
            }
        }
        catch(\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('doctors/sells/index');
        }
    }
}
