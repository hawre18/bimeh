<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
