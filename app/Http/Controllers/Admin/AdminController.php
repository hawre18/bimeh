<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.user.index')){
            return view('index.v1.admin.user.index',compact(['admins']));
        }
        abort(Response::HTTP_NOT_FOUND);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(View::exists('index.v1.admin.user.create')){
            return view('index.v1.admin.user.create');
        }else{
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
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|max:11',
            'nationalcode' => 'required',
            'password' => 'required',
            'email' => 'required',
            'userName'=>'required'

        ]);

        try{
            $admin= new Admin();
            $admin->f_name=$request->input('fname');
            $admin->l_name=$request->input('lname');
            $admin->phone=$request->input('phone');
            $admin->nationalcode=$request->input('nationalcode');
            $admin->password=Hash::make( $request->input('password'));
            $admin->email=$request->input('email');
            $admin->user_name=$request->input('userName');
            $admin->save();
            alert()->success('موفقیت آمیز','مدیر با موفقیت اضافه شد');
            return redirect('admin/user/crud');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ثبت رکورد');
            return redirect('/admin/user/crud/create');
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
        if(View::exists('index.v1.admin.user.show')){
            $admin=Admin::findorfail($id);
            if(($admin)!=null){
                return view('index.v1.admin.user.show',compact(['admin']));
            }
            elseif(($admin)==null){
                alert()->error('خطا','کاربری یافت نشد');
                return redirect('/admin/user/crud');
            }
            elseif(!(View::exists('index.v1.admin.user.show'))){
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
        $admin=Admin::findorfail($id);
        if(($admin)!=null){
            if(View::exists('index.v1.admin.user.edit')){
                return view('index.v1.admin.user.edit',compact(['admin']));
            }elseif(!(View::exists('index.v1.admin.user.edit'))){
                abort(Response::HTTP_NOT_FOUND);
            }
            elseif(($admin)==0){
                alert()->error('خطا','خطا در پیداکردن رکورد');
                return redirect('admin/user/crud');
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
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|max:11',
            'nationalcode' => 'required',
            'email' => 'required',
            'userName'=>'required'

        ]);

        try{
            $admin=Admin::findorfail($id);
            $admin->f_name=$request->input('fname');
            $admin->l_name=$request->input('lname');
            $admin->phone=$request->input('phone');
            $admin->nationalcode=$request->input('nationalcode');
            if($request->input('password')!=null){
                $admin->password=Hash::make( $request->input('password'));
            }
            $admin->email=$request->input('email');
            $admin->user_name=$request->input('userName');
            $admin->save();
            alert()->success('موفقیت آمیز','مدیر با موفقیت اضافه شد');
            return redirect('admin/user/crud');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ثبت رکورد');
            return redirect('/admin/user/crud');
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
        try{
            $admin=Admin::findorfail($id);
            if(($admin)!=null){
                $admin->delete();
                alert()->success('موفقیت آمیز','ادمین با موفقیت حذف شد');
                return redirect('admin/user/crud');
            }else{
                alert()->success('خطا','خطا در پیداکردن رکورد');
                return redirect('admin/user/crud');
            }
        }
        catch (\Exception $m){
            alert()->success(' خطا','خطا در حذف رکورد');
            return redirect('admin/user/crud');
        }

    }
public function status($id)
{
    try{
        $admin= Admin::findorfail($id);
        if($admin->level=='user'){
            $admin->level='admin';
            $admin->save();
            alert()->success('موفقیت آمیز','ادمین با موفقیت فعال شد');
            return redirect('admin/user/crud');
        }
        elseif($admin->level=='admin')
        {
            $admin->level='user';
            $admin->save();
            alert()->success('موفقیت آمیز','ادمین با موفقیت غیرفعال شد');
            return redirect('admin/user/crud');}
    }
    catch (\Exception $m){

        alert()->warning(' خطا','خطا در ویرایش رکورد');
        return redirect('/admin/user/crud');
    }
}
}
