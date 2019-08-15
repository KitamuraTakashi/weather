<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    public $timestamps = false;

    Public function area()
    {
        Return $this->belongsTo(Area::class);
    }
}
