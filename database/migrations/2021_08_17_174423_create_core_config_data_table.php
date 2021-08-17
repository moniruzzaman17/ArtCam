<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreConfigDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_config_data', function (Blueprint $table) {
            $table->increments('config_id');

            $table->string('name',255)
            ->nullable()
            ->comment = 'Config Name';

            $table->text('value')
            ->nullable()
            ->comment = 'Config Value';

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_config_data');
    }
}
