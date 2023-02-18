<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Plane;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function home()
    {
        $services=Service::all();
        $plane=Plane::all();
        $customer=Customer::all();
        if (View::exists('index.v1.user.index')){
            return view('index.v1.user.index',compact(['services','plane','customer']));
        }
        abort(Response::HTTP_NOT_FOUND);
    }
}
