<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected  $table='informations';
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
