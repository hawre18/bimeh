<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Symfony\Component\HttpFoundation\Response;
use Kavenegar;

class EmployController extends Controller
{
    const FORMAT = "%s = %s <br/>";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emploies=Employ::with('company')->latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.employ.index')){
            return view('index.v1.admin.employ.index', compact(['emploies']));
        }else{
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        if(View::exists('index.v1.admin.employ.create')){
            return view('index.v1.admin.employ.create',compact(['companies']));
        }
        else{
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'company'=>'required',
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'phone' => 'required|numeric',
            'nationalcode' => 'required|numeric',
            'allowedWallet' => 'required'
        ]);
        try{
            $employ= new Employ();
            $employ->f_name=$request->input('fname');
            $employ->l_name=$request->input('lname');
            $employ->phone=$request->input('phone');
            $employ->company_id=$request->input('company');
            $employ->nationalcode=$request->input('nationalcode');
            $employ->allowedWallet=$request->input('allowedWallet');
            $employ->user_id=auth()->guard('web')->user()->id;
            $employ->save();
            try {
                $sender='10000550002200';
                $mes1=$employ->f_name;
                $mes2='عزیز '."<br/>";
                $mes3="به جمع خانواده شفا آوا خوش آمدید";
                $message = $mes1.$mes2.$mes3;
                $receptor = $employ->phone;
                $result = Kavenegar::Send( $sender,$receptor,$message);
                $this->format($result);

            }catch(ApiException $e){
                echo $e->errorMessage();
            }
            catch(HttpException $e){
                echo $e->errorMessage();
            }
            alert()->success('موفقیت آمیز','مشتری با موفقیت اضافه شد');
            return redirect('/admin/employ');
        }
        catch (\Exception $m){
            alert()->error('خطا','خطا در ذخیره کاربر');
            return redirect('/admin/employ/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(View::exists('index.v1.admin.employ.show')){
            $employ=Employ::findorfail($id);
            if(($employ)!=null){
                return view('index.v1.admin.employ.show',compact(['employ']));
            }
            elseif(($employ)==null){
                alert()->error('خطا','کاربری یافت نشد');
                return redirect('/admin/employ');
            }
            elseif(!(View::exists('index.v1.admin.employ.show'))){
                abort(Response::HTTP_NOT_FOUND);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(View::exists('index.v1.admin.employ.edit')){
            $companies=Company::all();
            $employ=Employ::findorfail($id);
            if(($employ)!=null){
                return view('index.v1.admin.employ.edit',compact(['employ','companies']));
            }
            elseif(($employ)==null){
                alert()->error('خطا','کاربری یافت نشد');
                return redirect('/admin/employ');
            }
            elseif(!(View::exists('index.v1.admin.employ.edit'))){
                abort(Response::HTTP_NOT_FOUND);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'company'=>'required',
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'phone' => 'required|numeric',
            'nationalcode' => 'required|numeric',
            'allowedWallet' => 'required'
        ]);
        try{
            $employ= new Employ();
            $employ->f_name=$request->input('fname');
            $employ->l_name=$request->input('lname');
            $employ->phone=$request->input('phone');
            $employ->company_id=$request->input('company_id');
            $employ->nationalcode=$request->input('nationalcode');
            $employ->allowedWallet=$request->input('allowedWallet');
            $employ->user_id=auth()->guard('web')->user()->id;
            alert()->success('موفقیت آمیز','مشتری با موفقیت ویرایش شد');
            return redirect('/admin/employ');
        }
        catch (\Exception $m){
            alert()->error('خطا','خطا در ویرایش کاربر');
            return view('index.v1.admin.employ.edit',compact(['employ']));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $employ=Employ::findorfail($id);
            if(($employ)!=null){
                $employ->delete();
                alert()->success('موفقیت آمیز','مشتری با موفقیت حذف شد');
                return redirect('/admin/employ');
            }else{
                alert()->success('خطا','کاربری یافت نشد');
                return redirect('/admin/employ');
            }
        }
        catch(\Exception $m){
            alert()->success('خطا','مشکلی در انجام عملیات وجود دارد');
            return redirect('/admin/employ');
        }
    }
}
