<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        if(View::exists('index.v1.admin.home')){
            return view('index.v1.admin.home');
        }
        abort(Response::HTTP_NOT_FOUND);
    }
}
