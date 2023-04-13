<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index()
    {
        $orders=Order::where('status',0)->count();
        $doctors=Doctor::where('is_active',0)->count();
        $customers=Customer::where('created_at',Carbon::yesterday())->count();
        $sells=Sell::where('status',1)->count();
        $listDoctors=Doctor::where('is_active',0)->latest('created_at')->get();
        $listOrders=Order::where('status',0)->with('customer')->latest('created_at')->get();
        if(View::exists('index.v1.admin.home')){
            return view('index.v1.admin.home',compact('orders','doctors','customers','sells','listDoctors','listOrders'));
        }
        abort(Response::HTTP_NOT_FOUND);
    }
}
