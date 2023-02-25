<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $uploads='/storage/photos/';
    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }
    public function information()
    {
        return $this->belongsTo(Information::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }
}
