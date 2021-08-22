<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('name',255)
            ->nullable(false)
            ->comment = 'Product Name';

            $table->string('sku',64)
            ->nullable()
            ->comment = 'SKU';

            $table->text('category_id')->nullable()
            ->comment = 'Category ID';

            $table->text('sub_category_id')->nullable()
            ->comment = 'Category ID';

            $table->text('sub_sub_category_id')->nullable()
            ->comment = 'Category ID';

            $table->text('meta_keyword')
            ->nullable()
            ->comment = 'Meta Keyword';

            $table->text('description')
            ->nullable()
            ->comment = 'Product Description';

            $table->integer('visibility')->unsigned()->default(1)->nullable()
            ->comment = 'Availability';

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
        Schema::dropIfExists('products');
    }
}
