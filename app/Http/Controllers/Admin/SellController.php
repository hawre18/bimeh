<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function create()
    {
        return view('index.v1.admin.doctor.sell');
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
}
