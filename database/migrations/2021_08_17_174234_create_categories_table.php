<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('entity_id');
            
            $table->string('name',255)
            ->nullable(false)
            ->comment = 'Category Name';

            $table->integer('position')->unsigned()->length(11)->nullable()
            ->comment = 'Category Position';

            $table->integer('visibility')->unsigned()->length(11)->default(1)->nullable()
            ->comment = 'Visibility Status';

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
        Schema::dropIfExists('categories');
    }
}
