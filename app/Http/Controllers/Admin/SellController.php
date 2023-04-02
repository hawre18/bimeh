<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Sell;
use App\Models\Service;
use App\Models\Wallet;
use Illuminate\Http\Request;
use NPDF;

class SellController extends Controller
{
    public function index()
    {
        $sells=Sell::where('status',1)->with(['doctor','customer','services'])->paginate(20);
        return view('index.v1.admin.sell.index',compact(['sells']));
    }
    public function createPDF($id) {
        // retreive all records from db
        $sell=Sell::with(['services','customer','doctor'])->where('id',$id)->first();
        $customer=Customer::where('nationalcode',$sell->customer->nationalcode)->with('wallet')->first();
        // share data to view
        $pdf = NPDF::loadView('index.v1.admin.sell.showFactor',compact(['sell','customer']));
        return $pdf->stream($sell->customer->nationalcode);
    }
    public function create()
    {

    }

    public function store(Request $request)
    {

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
        $wallets=Wallet::where('customer_id',$customerId)->get();
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

}
