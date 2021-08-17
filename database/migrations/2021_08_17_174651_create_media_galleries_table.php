<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_galleries', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('name',255)
            ->nullable(false)
            ->comment = 'Media Identification Name';

            $table->string('value',255)
            ->nullable(false)
            ->comment = 'Media Value';

            $table->string('mob_value',255)
            ->nullable()
            ->comment = 'Mobile Media Value';

            $table->string('media_type',255)
            ->nullable(false)
            ->comment = 'Media Type';

            $table->string('position',255)
            ->nullable()
            ->comment = 'Position';

            $table->string('url',255)
            ->nullable()
            ->comment = 'Hiperlink';

            $table->integer('visibility_status')->unsigned()->default(1)->nullable(false)
            ->comment = 'Is Visible';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_galleries');
    }
}
