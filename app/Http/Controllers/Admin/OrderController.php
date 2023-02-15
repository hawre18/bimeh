<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plane;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::with('customer','plane','user')->latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.order.index')){
            return view('index.v1.admin.order.index',compact(['orders']));
        }
        abort(Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(View::exists('index.v1.admin.order.create')){
            return view('index.v1.admin.order.create');
        }
        abort(Response::HTTP_NOT_FOUND);
    }
    public function getAllPlane()
    {
        $planes=Plane::all();
        $response=[
            'planes'=>$planes
        ];
        return response()->json($response,200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'customer' => 'required',
            'plane' => 'required'

        ]);
        try{
            $plane=Plane::findorfail($request->input('plane'));
            $order=new Order();
            $order->customer_id=$request->input('customer');
            $order->user_id=auth()->guard('web')->user()->id;
            $order->status=1;
            $order->plane_id=$plane->id;
            $order->save();
            if($order->status==1){
                $wallet=Wallet::where('customer_id',$request->input('customer'))->first();
                $wallet->modeCharge=$wallet->modeCharge+$plane->charge;
                $wallet->save();
            }
            alert()->success('موفقیت آمیز','فروش با موفقیت ثبت شد');
            return back();
        }
        catch (\Exception $m){
            alert()->success(' خطا','خطا در فروش ');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::findorfail($id)->with('customer','plane','user');
        if(View::exists('index.v1.admin.order.show')){
            return view('index.v1.admin.order.show',compact(['order']));
        }
        abort(Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pay($orderId)
    {
        $order=Order::findorfail($orderId);
        $plane=Plane::where('id',$order->plane_id)->first();
        if($order!=null){
            $order->status=1;
            $order->user_id=auth()->guard('web')->user()->id;
            $order->save();
            if($order->status==1){
                $wallet=Wallet::where('customer_id',$order->customer_id)->first();
                $wallet->modeCharge= $wallet->modeCharge+$plane->charge;
                $wallet->save();
            }
            alert()->success('موفقیت آمیز','فروش با موفقیت پرداخت شد');
            return back();
        }
        alert()->success('خطا','خطا در پرداخت');
        return back();

    }
}
