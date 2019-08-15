<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateAreasTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('areas', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('pinpoint_code');
                $table->string('pinpoint_name');
                $table->string('pinpoint_name_kana');
                $table->string('pref_code');
                $table->string('pref_name');
                $table->string('pref_name_kana');
                $table->string('region_code');
                $table->string('region_name');
                $table->string('area_code');
                $table->string('area_name');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('areas');
        }
    }
