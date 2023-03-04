<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Information;
use App\Models\Plane;
use App\Models\Service;
use App\Models\Session;
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
        $information=Information::first();
        if (View::exists('index.v1.user.index')){
            return view('index.v1.user.index',compact(['services','plane','customer','information']));
        }
        abort(Response::HTTP_NOT_FOUND);
    }
    public function contact()
    {
        $services=Service::all();
        $plane=Plane::all();
        $customer=Customer::all();
        if (View::exists('index.v1.user.contact')){
            return view('index.v1.user.contact',compact(['services','plane','customer']));
        }
        abort(Response::HTTP_NOT_FOUND);
    }
    public function about()
    {
        $services=Service::all();
        $plane=Plane::all();
        $customer=Customer::all();
        if (View::exists('index.v1.user.about')){
            return view('index.v1.user.about',compact(['services','plane','customer']));
        }
        abort(Response::HTTP_NOT_FOUND);
    }

    public function planeShow($id)
    {
        $plane=Plane::findorfail($id)->with('image');
        if(View::exists('index.v1.user.planeShow')){
            return view('index.v1.user.planeShow',compact('plane'));
        }
        abort(Response::HTTP_NOT_FOUND);
    }
    public function sessionShow($id)
    {
        $session=Session::with('image','user')->findorfail($id);
        if(View::exists('index.v1.user.sessionShow')){
            return view('index.v1.user.sessionShow',compact('session'));
        }
        abort(Response::HTTP_NOT_FOUND);
    }
}
