<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class DoctorAuth extends Authenticatable
{
  protected  $table='doctors';
    protected $guarded = [];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function IsActive($query)
    {
        return $query->where('is_active',1);
    }
}
