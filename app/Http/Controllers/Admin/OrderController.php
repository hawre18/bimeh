<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Plane;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;


class OrderController extends Controller
{
    const FORMAT = "%s = %s <br/>";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders=Order::with('customer','plane','user')->latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.order.index')){
            return view('index.v1.admin.order.index',compact('orders'));
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
    public function getWallet($id)
    {
        $wallets=Wallet::where('customer_id',$id)->get()->all();
        $response=[
            'wallets'=>$wallets
        ];
        return response()->json($response,200);
    }
    public function getAllPlane($id)
    {
        $wallets=Wallet::findorfail($id);
        $planes=Plane::where('type_id',$wallets->type_id)->get();
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
            'plane' => 'required',
            'pay'=>'required',
            'codePay'=>'required'

        ]);
        try{
            $plane=Plane::findorfail($request->input('plane'));
            $customer=Customer::findorfail($request->input('customer'));
            $order=new Order();
            $order->customer_id=$request->input('customer');
            $order->user_id=auth()->guard('web')->user()->id;
            $order->status=0;
            $order->codePay=$request->input('codePay');
            $order->payType=$request->input('pay');
            $order->plane_id=$plane->id;
            $order->save();
            if($order->status==1){
                $wallet=Wallet::where('customer_id',$request->input('customer'))->where('type_id',$plane->type_id)->first();
                $wallet->modeCharge=$wallet->modeCharge+$plane->charge;
                $wallet->save();
                try {
                    $sender='10000550002200';
                    $mes1=$customer->f_name;
                    $mes2='عزیز '."<br/>";

                    $mes3="خرید شما با موفقیت ثبت شدو در انتظار تایید توسط کارشناسان ما هست";
                    $mes4="<br/>"."<br/>";
                    $mes5="شفا آوا";
                    $message = $mes1.$mes2.$mes3.$mes4.$mes5;
                    $receptor = $customer->phone;
                    $result = Kavenegar::Send( $sender,$receptor,$message);
                    $this->format($result);

                }catch(ApiException $e){
                    echo $e->errorMessage();
                }
                catch(HttpException $e){
                    echo $e->errorMessage();
                }


            }
            alert()->success('موفقیت آمیز','فروش با موفقیت ثبت شد');
            return back();
        }
        catch (\Exception $m){
            return $m;
            alert()->success(' خطا','خطا در فروش ');
            return back();
        }
    }
    private function format($result)
    {
        if($result){
            echo "<pre>";
            foreach($result as $r){
                echo sprintf(self::FORMAT, "messageid", $r->messageid);
                echo sprintf(self::FORMAT, "message", $r->message);
                echo sprintf(self::FORMAT, "status", $r->status);
                echo sprintf(self::FORMAT, "statustext", $r->statustext);
                echo sprintf(self::FORMAT, "sender", $r->sender);
                echo sprintf(self::FORMAT, "receptor", $r->receptor);
                echo sprintf(self::FORMAT, "date", $r->date);
                echo sprintf(self::FORMAT, "cost", $r->cost);
                echo "<hr/>";
            }
            echo "</pre>";
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
