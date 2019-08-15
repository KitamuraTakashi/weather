<?php
    namespace App\Services;


    use GuzzleHttp\Client as httpClient;

    final class LifeSocketApiService
    {
        /**
         * @link https://www.life-socket.jp/support/login
         */
        public const API_BASE_URL = 'https://www.life-socket.jp/api';

        /**
         * @var string
         */
        private $apiKey;

        private $httpClient;

        /**
         * @param string $apiKey
         * @param httpClient $httpClient
         */

        public function __construct($apiKey = '48a5e083-5987-4494-bf82-ff19b9b8e542', httpClient $httpClient = null)
        {
            $this->apiKey     = $apiKey;
            $this->httpClient = $httpClient ?: httpClient::create();
        }

        /**
         * 対象のpinpointCodeの天気情報を取得
         *
         * @param string $pinpointCode
         * @param int $days
         * @param string $lang
         *
         * @return object
         */
        public function getWeatherReportFromPinpoint(
            string $pinpointCode,
            int $days = 1,
            string $lang = 'ja'
        ) {
            $query = array_merge([
                'days' => $days,
                'lang' => $lang
            ]);

            $apiUrl = $this->getApiUrl('/v1/weather/' . $pinpointCode);

            $responses = json_decode(json_encode($this->getApiData($apiUrl, $query)), false);
            $response  = current($responses);

            return (object)$response;

        }

        /**
         * LifeSocketApiからデータを取得
         *
         * @param string $apiUrl
         * @param array $query
         *
         * @return array
         */
        public function getApiData(string $apiUrl, array $query): array
        {
            $response = $this->httpClient->get($apiUrl,
                [
                    'headers' => ['x-access-key' => $this->apiKey],
                    'query'   => $query
                ])
                ->getBody();


            $response_json = json_decode($response, false);
            $data          = [];

            foreach ($response_json->{'Daily'} as $key => $value) {

                $data[$key]['pinpoint_code']   = $response_json->{'PinpointCode'};
                $data[$key]['data_time']       = $response_json->{'Daily'}{$key}->{'DateTime'};
                $data[$key]['weather_code']    = $response_json->{'Daily'}{$key}->{'WeatherCode'};
                $data[$key]['weather_name']    = $response_json->{'Daily'}{$key}->{'WeatherName'};
                $data[$key]['temperature_min'] = $response_json->{'Daily'}{$key}->{'TemperatureMin'};
                $data[$key]['temperature_max'] = $response_json->{'Daily'}{$key}->{'TemperatureMax'};
                $data[$key]['rain_percentage'] = $response_json->{'Daily'}{$key}->{'RainPercentage'};
            }


            return $data;
        }

        /**
         * 取得したいAPIのURlを生成する
         *
         * @param string $apiUrl
         *
         * @return string
         */
        public function getApiUrl(string $apiUrl): string
        {
            return self::API_BASE_URL . $apiUrl;
        }
    }
