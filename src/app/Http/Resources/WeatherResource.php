<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    class WeatherResource extends JsonResource
    {
        /**
         * Transform the resource into an array.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return array
         */
        public function toArray($request)
        {
            return [
                'id'              => $this->id,
                'pinpoint_code'   => $this->pinpoint_code,
                'data_time'       => $this->data_time,
                'weather_code'    => $this->weather_code,
                'weather_name'    => $this->weather_name,
                'temperature_min' => $this->temperature_min,
                'temperature_max' => $this->temperature_max,
                'rain_percentage' => $this->rain_percentage,
                'areas'           => $this->area,
            ];
        }
    }
