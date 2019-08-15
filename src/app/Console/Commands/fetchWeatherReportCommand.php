<?php

    namespace App\Console\Commands;

    use App\Area;
    use App\Services\LifeSocketApiService;
    use App\Weather;
    use Illuminate\Console\Command;

    class fetchWeatherReportCommand extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'fetchWeatherReport';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'LifeSocketAPIから関東の天気情報を取得';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public $lifeSocketApi;
        public $weather;
        public $area;

        /**
         * fetchWeatherReportCommand constructor.
         *
         * @param LifeSocketApiService $lifeSocketApi
         * @param Area $area
         */
        public function __construct(LifeSocketApiService $lifeSocketApi, Area $area)
        {
            $this->lifeSocketApi = $lifeSocketApi;
            $this->area          = $area;
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle()
        {
            $httpClient = $this->lifeSocketApi;
            $areas      = $this->area::where('region_name', '関東')->get(['pinpoint_code']);

            foreach ($areas as $area) {
                $reports = $httpClient->getWeatherReportFromPinpoint($area->pinpoint_code);
                foreach ($reports as $report) {
                    $this->create($report);
                }
            }
        }

        /**
         * APIから取得したデータを保存する
         *
         * @param $report
         */
        public function create($report): void
        {
            $weather = new Weather();
            $weather->fill([
                'pinpoint_code'   => $report->pinpoint_code,
                'data_time'       => $report->data_time,
                'weather_code'    => $report->weather_code,
                'weather_name'    => $report->weather_name,
                'temperature_min' => $report->temperature_min,
                'temperature_max' => $report->temperature_max,
                'rain_percentage' => $report->rain_percentage,

            ]);
            $weather->save();
        }
    }
