<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
