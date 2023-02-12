<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        $users=User::latest('created_at')->paginate(25);
        if(View::exists('index.v1.admin.user.index')){
            return view('index.v1.admin.user.index',compact(['users']));
        }else{
            abort(Response::HTTP_NOT_FOUND);
        }

    }
    public function create()
    {
        if(View::exists('auth.register')){
            return view('auth.register');
        }
        else{
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    public function edit($id)
    {
        if(View::exists('index.v1.admin.user.edit')){
            $user=User::findorfail($id);
            if(count(array($user))>0){
                return view('index.v1.admin.user.edit',compact(['user']));
            }
            elseif(count(array($user))<=0){
                alert()->error('خطا','کاربری یافت نشد');
                return redirect('/admin/user');
            }
            elseif(!(View::exists('index.v1.admin.user.edit'))){
                abort(Response::HTTP_NOT_FOUND);
            }
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'username' => 'required|min:3',
            'phone' => 'required|numeric',
            'nationalcode' => 'required',
            'email' => 'required'
        ]);
        try{
            $user=User::findorfail($id);
            $user->f_name=$request->input('fname');
            $user->l_name=$request->input('lname');
            $user->user_name=$request->input('username');
            $user->phone=$request->input('phone');
            $user->nationalcode=$request->input('nationalcode');
            $user->email=$request->input('email');
            if(($request->input('password'))!=null){
                $user->password=Hash::make($request->input('password'));
            }
            $user->save();
            alert()->success('موفقیت آمیز','کاربر با موفقیت ویرایش شد');
            return redirect('/admin/user');
        }
        catch (\Exception $m){
            alert()->error('خطا','خطا در ویرایش کاربر');
            return view('index.v1.admin.user.edit',compact(['user']));
        }
    }
    public function destroy($id)
    {
        try {
            $user=User::findorfail($id);
            if(count(array($user))>0){
                $user->delete();
                alert()->success('موفقیت آمیز','کاربر با موفقیت حذف شد');
                return redirect('/admin/user');
            }else{
                alert()->error('خطا','کاربری یافت نشد');
                return redirect('/admin/user');
            }
        }
        catch(\Exception $m){
            alert()->error('خطا','مشکلی در انجام عملیات وجود دارد');
            return redirect('/admin/user');
        }
        $user->delete();
        return back();
    }
    public function show($id)
    {
        if(View::exists('index.v1.admin.user.show')){
            $user=User::findorfail($id);
            if(count(array($user))>0){
                return view('index.v1.admin.user.show',compact(['user']));
            }
            elseif(count(array($user))<=0){
                alert()->error('خطا','کاربری یافت نشد');
                return redirect('/admin/user');
            }
            elseif(!(View::exists('index.v1.admin.user.show'))){
                abort(Response::HTTP_NOT_FOUND);
            }
        }
    }
}
