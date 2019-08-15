<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Area extends Model
    {
        public $timestamps = false;
        protected $fillable = [
            'pinpoint_code',
            'pinpoint_name',
            'pinpoint_name_kana',
            'pref_code',
            'pref_name',
            'pref_name_kana',
            'region_code',
            'region_name',
            'area_code',
            'area_name',
        ];


        Public function weathers(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Weather::class);
        }
    }
