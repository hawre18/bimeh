<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.role.index')){
            return view('index.v1.admin.role.index',compact(['roles']));
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
        $permissions=Permission::latest()->get();
        if(View::exists('index.v1.admin.role.create')){
            return view('index.v1.admin.role.create',compact(['permissions']));
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
            'permission_id'=>'required'
        ]);
        try{
            $role= new Role();
            $role->name=$request->input('name');
            $role->label=$request->input('label');
            $role->save();
            $role->permissions()->sync($request->input('permission_id'));
            alert()->success('موفقیت آمیز','سطح دسترسی با موفقیت اضافه شد');
            return redirect('/admin/role');
        }
        catch (\Exception $m){
            alert()->error('خطا','خطا در ذخیره سطح دسترسی');
            return redirect('/admin/role/create');
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
        if(View::exists('index.v1.admin.role.edit')){
            $role=Role::findorfail($id);
            if(($role)!=null){
                return view('index.v1.admin.role.edit',compact(['role']));
            }
            elseif(!(($role))!=null){
                alert()->error('خطا','مقام مورد نظر یافت نشد');
                return redirect('/admin/role');
            }
            elseif(!(View::exists('index.v1.admin.role.edit'))){
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
            'permission_id'=>'required'
        ]);
        try{
            $role=Role::where('id',$id)->with('permissions')->first();
            $role->name=$request->input('name');
            $role->label=$request->input('label');
            $role->save();
            $role->permissions()->sync($request->input('permission_id'));
            alert()->success('موفقیت آمیز','سطح دسترسی با موفقیت ویرایش شد');
            return redirect('/admin/role');
        }
        catch (\Exception $m){
            return $m;
            alert()->success('خطا','خطا در ویرایش رکورد');
            return redirect('/admin/role');
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
            $role=Role::findorfail($id);
            if(($role)!=null){
            $role->delete();
            alert()->success('موفقیت آمیز','مقام دسترسی با موفقیت حذف شد');
            return redirect('admin/role');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/role');
        }
    }

}
