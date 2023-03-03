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
    public function wallet()
    {
        return $this->hasone(Wallet::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
