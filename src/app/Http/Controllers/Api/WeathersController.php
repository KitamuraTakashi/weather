<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Resources\WeatherResource;
    use App\Weather;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class WeathersController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
         */
        public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
        {

            return WeatherResource::collection(Weather::all());
        }

        public function archive(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
        {
            $year  = $request->year;
            $month = $request->month;
            $day   = $request->day;

            $query = Carbon::now()->format($year . '-' . $month . '-' . $day);

            return WeatherResource::collection(
                Weather::whereDate('data_time', $query)->get()
            );
        }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param Weather $weather
         *
         * @return WeatherResource
         */
        public function show(Weather $weather)
        {
            return WeatherResource::make(Weather::find($weather->id));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }
