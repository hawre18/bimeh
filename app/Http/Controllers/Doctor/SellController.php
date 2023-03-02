<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Sell;
use App\Models\Service;
use App\Models\Wallet;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
use NPDF;
use Illuminate\Support\Facades\App;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class SellController extends Controller
{
    const FORMAT = "%s = %s <br/>";
    public function index()
    {
        $sells=Sell::where('doctor_id',auth()->guard('doctor')->user()->id)->with('customer')->paginate(20);
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
        $this->validate(request(), [
            'customer' => 'required',
            'service' => 'required'
        ]);
        $serviceId=[];
        $sum=0;
        try{
            $sell=new Sell();
            $sell->customer_id=$request->input('customer');
            $sell->doctor_id=auth()->guard('doctor')->user()->id;
            foreach($request->input('service') as $service){
                $ser=Service::findorfail($service);
                $serviceId=[$ser->id];
                $sum=$sum+$ser->price;
            }
            $sum=$sum/2;
            $sell->totalPrice=$sum;
            $sell->save();
            $sell->services()->sync($request->input('service'));
            alert()->success('موفقیت آمیز','فاکتور با موفقیت صادر شد');
            return back();
        }
        catch (\Exception $m){
            alert()->success(' خطا','خطا در صدور فاکتور');
            return back();
        }
        //$sell->permissions()->sync($request->input('permission_id'));
    }

    public function fetch(Request $request)
    {
        if($request->get('query')){
            $query=$request->get('query');
            $data=Customer::where('nationalcode','LIKE',$request->query.'%')->get();


                $response=[
                    'customers'=>$data
                ];
                return response()->json($response,200);

        }
    }
    public function getAllCustomer()
    {

        $customers=Customer::all();
        $response=[
            'customers'=>$customers
        ];
        return response()->json($response,200);
    }
    public function getWallet($customerId)
    {
        $wallets=Wallet::where('customer_id',$customerId)->where('type_id',auth()->guard('doctor')->user()->type_id)->get();
        $response=[
            'wallets'=>$wallets
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
    public function getService()
    {
        $services=Service::where('type_id',auth()->guard('doctor')->user()->type_id)->get();
        $response=[
            'services'=>$services
        ];
        return response()->json($response,200);
    }

    public function payment($id)
    {

        $sell = Sell::where('id', $id)->with(['services', 'customer', 'doctor'])->first();
        $wallet = Wallet::where('customer_id', $sell->customer->id)->where('type_id',auth()->guard('doctor')->user()->type_id)->first();
        try {
            if ($sell->status == 0 && $wallet->modeCharge > 0) {
                $sell->pricePay = $sell->totalprice- $wallet->modeCharge;
                $wallet->modeCharge = $wallet->modeCharge - $sell->totalPrice;
                $wallet->save();
                $sell->status = 1;
                $sell->save();
                try {
                    $sender = '10000550002200';
                    $mes1 = $sell->customer->f_name;
                    $mes2 = 'عزیز ' . "<br/>";
                    $mes3 = "پرداخت با موفیقت انجام شد" . "<br/>";
                    $mes4 = 'باقیمانده کیف پول شما: ';
                    $mes5 = $wallet->modeCharge . "<br/>" . "<br/>";
                    $mes6 = "شفا آوا";
                    $message = $mes1 . $mes2 . $mes3 . $mes4 . $mes5 . $mes6;
                    $receptor = $sell->customer->phone;
                    $result = Kavenegar::Send($sender, $receptor, $message);


                } catch (ApiException $e) {
                    echo $e->errorMessage();
                } catch (HttpException $e) {
                    echo $e->errorMessage();
                }
                alert()->success('موفقیت آمیز', 'فاکتور با موفقیت پرداخت شد');
                return redirect()->action([
                    SellController::class,
                    'index'
                ]);
            }

        } catch (\Exception $m) {
            return $m;
            alert()->success('خطا', 'فاکتور پرداخت نشد');
            return redirect()->action([
                SellController::class,
                'index'
            ]);
        }
    }

    public function show($id, $nationalcode)
    {
        $sell=Sell::with('services','customer')->where('id',$id)->first();
        if($sell!=null){
            $customer=Customer::where('nationalcode',$nationalcode)->with('wallet')->first();
            return view('index.v1.doctor.sellShow',compact(['sell','customer']));
        }
        return redirect()->action([
            SellController::class,
            'index'
        ])->alert()->success('خطا','فاکتور پرداخت نشد');
    }

    public function destroy($id)
    {
        try {
            $sell=Sell::findorfail($id);
            if(($sell)!=null&&$sell->status==0){
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
    public function createPDF($id) {
        // retreive all records from db
        $sell=Sell::with('services','customer')->where('id',$id)->first();
        $customer=Customer::where('nationalcode',$sell->customer->nationalcode)->with('wallet')->first();
        // share data to view
        $pdf = NPDF::loadView('index.v1.doctor.showFactor',compact(['sell','customer']));
        return $pdf->stream('report.pdf');
    }
}
