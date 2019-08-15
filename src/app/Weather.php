<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Weather extends Model
    {
        public $timestamps = false;
        protected $fillable = [
            'id',
            'pinpoint_code',
            'data_time',
            'weather_code',
            'weather_name',
            'temperature_min',
            'temperature_max',
            'rain_percentage',
        ];

        Public function area(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            Return $this->belongsTo(Area::class,'pinpoint_code','pinpoint_code');
        }
    }
