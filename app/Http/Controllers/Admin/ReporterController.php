<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
    public function index()
    {
        return view('index.v1.admin.reporter.rep');
    }

    public function listCustomer(Request $request)
    {
        $rows=Customer::whereBetween('created_at',[$request->input('dateS'),$request->input('dateE')])->get();
        return view('index.v1.admin.reporter.rows',compact('rows'));
    }
}
