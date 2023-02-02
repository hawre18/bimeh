<?php

namespace App;

use App\Models\Role;

trait HasRole
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function hasRole($role)
    {
        //   if(is_string($role)){
        //  return $this->roles->contains('name',$role);
        //  }
        return  $role->interect($this->roles)->count();
    }

}
