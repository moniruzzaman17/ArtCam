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

            $table->integer('parent_id')->unsigned()->length(11)->nullable()
            ->comment = 'Mother Category ID';

            $table->string('name',255)
            ->nullable(false)
            ->comment = 'Category Name';

            $table->integer('position')->unsigned()->length(11)->nullable()
            ->comment = 'Category Position';

            $table->integer('level')->unsigned()->length(11)->nullable()
            ->comment = 'Tree Level';

            $table->integer('children_count')->unsigned()->length(11)->nullable()
            ->comment = 'Child Count';

            $table->string('category_icon',255)
            ->nullable()
            ->comment = 'Category Image';

            $table->string('image_value',255)
            ->nullable()
            ->comment = 'Category Image';

            $table->integer('visibility')->unsigned()->length(11)->default(1)->nullable()
            ->comment = 'Child Count';


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
