<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except'=>['logout','userLogout']]);
    }
    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1,
        ];
    }
    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
