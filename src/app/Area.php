<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Area extends Model
    {
        public $timestamps = false;

        Public function weathers()
        {
            return $this->hasMany(Weather::class);
}
    }
