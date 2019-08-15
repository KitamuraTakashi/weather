<?php

    namespace App\Http\Controllers\Api;

    use App\Area;
    use App\Http\Resources\AreaCollection;
    use App\Http\Resources\AreaResource;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class AreasController extends Controller
    {

        public function index()
        {
            return AreaResource::collection(Area::all());

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
         *
         * @param Area $area
         *
         * @return AreaResource
         */
        public function show(Area $area): AreaResource
        {
            return AreaResource::make(Area::find($area->id));
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
