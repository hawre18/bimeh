<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::latest()->paginate(25);
        return view('index.v1.admin.user.index',compact(['users']));
    }

    public function delete(User $user)
    {
        $user->delete();
        return back();
    }
}
