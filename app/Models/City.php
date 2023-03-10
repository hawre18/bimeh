<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
