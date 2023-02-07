<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Sell;
use App\Models\Service;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index()
    {
        $sells=Sell::where('doctor_id',1)->with('customer')->get();
        return view('index.v1.doctor.factor',compact(['sells']));
    }
    public function create()
    {
        return view('index.v1.doctor.sell');
    }

    public function store(Request $request)
    {
        $serviceId=[];
        $sum=0;
        try{
        $sell=new Sell();
        $sell->customer_id=$request->input('customer');
        $sell->doctor_id=1;
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

    public function payment()
    {
        $sells=Sell::where('doctor_id',1)->with('customer')->get();
        return view('index.v1.doctor.factor',compact(['sells']));
    }
}
