<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.permission.index')){
            return view('index.v1.admin.permission.index',compact(['permissions']));
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
        if(View::exists('index.v1.admin.permission.create')){
            return view('index.v1.admin.permission.create');
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
            'name' => 'required|min:3',
            'label' => 'required|min:3',
        ]);
        try{
            $permission= new Permission();
            $permission->name=$request->input('name');
            $permission->label=$request->input('label');
            $permission->save();
            alert()->success('موفقیت آمیز',' دسترسی با موفقیت اضافه شد');
            return redirect('/admin/permission');
        }
        catch (\Exception $m){
            alert()->error('خطا','خطا در ذخیره دسترسی');
            return redirect('/admin/permission/create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(View::exists('index.v1.admin.permission.edit')){
            $permission=Permission::findorfail($id)->first();
            if(count(array($permission))>0){
                return view('index.v1.admin.permission.edit',compact(['permission']));
            }
            elseif(count(array($permission))<=0){
                alert()->error('خطا','مقام مورد نظر یافت نشد');
                return redirect('/admin/permission');
            }
            elseif(!(View::exists('index.v1.admin.permission.edit'))){
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
            'name' => 'required|min:3',
            'label' => 'required|min:3',
        ]);
        try{
            $permission=Permission::findorfail($id)->first();
            $permission->name=$request->input('name');
            $permission->label=$request->input('label');
            $permission->save();
            alert()->success('موفقیت آمیز',' دسترسی با موفقیت ویرایش شد');
            return redirect('/admin/permission');
        }
        catch (\Exception $m){
            alert()->error('خطا','خطا در ویرایش دسترسی');
            return redirect('/admin/permission');
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
            $permission=Permission::findorfail($id);
            if(count(array($permission))>0) {
                $permission->delete();
                alert()->success('موفقیت آمیز', ' دسترسی با موفقیت حذف شد');
                return redirect('admin/permission');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/permission');
        }
    }

}
