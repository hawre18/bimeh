<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
