<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;
class ReporterController extends Controller
{
    public function index()
    {
        return view('index.v1.admin.reporter.rep');
    }

    public function rowsWithDate(Request $request)
    {
        $yearS=substr($request->input('dateS'),0,4);
        $monthS=substr($request->input('dateS'),5,2);
        $dayS=substr($request->input('dateS'),8,2);
        $yearE=substr($request->input('dateE'),0,4);
        $monthE=substr($request->input('dateE'),5,2);
        $dayE=substr($request->input('dateE'),8,2);
        $dateS = (new Jalalian($yearS, $monthS, $dayS, 00, 00, 00))->toCarbon()->toDateTimeString();
        $dateE = (new Jalalian($yearE, $monthE, $dayE, 00, 00, 00))->toCarbon()->toDateTimeString();
        $type=$request->input('main');
        $rows=DB::table($request->input('main'))->whereBetween('created_at',[$dateS,$dateE])->get();
        return view('index.v1.admin.reporter.rows',compact('rows','type'));
    }
}
