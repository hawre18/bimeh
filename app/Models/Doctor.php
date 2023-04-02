<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function sells()
    {
        return $this->hasMany(Sell::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
