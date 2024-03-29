<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function sells()
    {
        return $this->belongsToMany(Sell::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
