<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function sells()
    {
        return $this->hasMany(Sell::class);
    }
}
