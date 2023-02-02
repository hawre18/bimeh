<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class LevelManageController extends Controller
{
    public function index()
    {

        $roles=Role::latest()->with('users')->paginate(20);
        return view('index.v1.admin.levelAdmins.index',compact(['roles']));
    }
    public function create()
    {
        $users=User::whereLevel('admin')->get();
        $roles=Role::all();
        return view('index.v1.admin.levelAdmins.create',compact(['users','roles']));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'user_id' => 'required',
            'role_id' => 'required'
        ]);
        try{
            $users=findorfail($request->input('user_id'))->roles()->sync($request->input('roles_id'));
            alert()->success('موفقیت آمیز',' دسترسی با موفقیت اضافه شد');
            return redirect('/admin/level/create');
        }
        catch (\Exception $m){
            return $m;
        }
    }
    public function destroy(User $user)
    {
        try{
            $user->roles()->detach();
            alert()->success('موفقیت آمیز',' دسترسی با موفقیت حذف شد');
            return redirect('admin/level');
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/permission');
        }

    }
}
