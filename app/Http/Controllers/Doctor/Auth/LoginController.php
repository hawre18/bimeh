<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function login()
    {
        if(View::exists('doctor.auth.login'))
        {
            return view('doctor.auth.login');
        }
        abort(Response::HTTP_NOT_FOUND);
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->except(['_token']);


        if(isDoctorActive($request->email)==1)
        {
            if(Auth::guard('doctor')->attempt($credentials))
            {
                return redirect(RouteServiceProvider::DOCTOR);
            }
            return redirect()->action([
                LoginController::class,
                'login'
            ])->with('message','Credentials not matced in our records!');
        }
        return redirect()->action([
            LoginController::class,
            'login'
        ])->with('message','You are not an active doctors!');
    }
}
