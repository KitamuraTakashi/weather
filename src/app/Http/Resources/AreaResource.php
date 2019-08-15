<?php

    namespace App\Http\Resources;

    use App\Weather;
    use Illuminate\Http\Resources\Json\JsonResource;

    class AreaResource extends JsonResource
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
                'pinpoint_code'      => $this->pinpoint_code,
                'pinpoint_name'      => $this->pinpoint_name,
                'pinpoint_name_kana' => $this->pinpoint_name_kana,
                'pref_code'          => $this->pref_code,
                'pref_name'          => $this->pref_name,
                'pref_name_kana'     => $this->pref_name_kana,
                'region_code'        => $this->region_code,
                'region_name'        => $this->region_name,
                'area_code'          => $this->area_code,
                'area_name'          => $this->area_name,
                'weather'            => $this->weathers
            ];
        }
    }
