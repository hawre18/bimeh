<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    public function planes()
    {
        return $this->hasMany(Plane::class);
    }
    public function wallets()
    {
        return $this->hasOne(Wallet::class);
    }
}
