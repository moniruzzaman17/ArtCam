<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->integer('parent_id')->unsigned()->nullable()
            ->comment = 'Parent ID from Category';

            $table->foreign('parent_id')->references('entity_id')->on('categories')->onDelete('cascade');

            
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
        Schema::dropIfExists('sub_categories');
    }
}
