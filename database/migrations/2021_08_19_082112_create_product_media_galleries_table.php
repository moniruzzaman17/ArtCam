<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMediaGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_media_galleries', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->integer('product_id')
            ->unsigned()
            ->comment = 'Product ID form products';

            $table->foreign('product_id')->references('entity_id')->on('products')->onDelete('cascade');

            $table->string('sku',255)
            ->nullable()
            ->comment = 'SKU';

            $table->string('image',255)
            ->nullable()
            ->comment = 'Product Image';

            $table->integer('position')->unsigned()->default(0)->nullable()
            ->comment = 'Media Positon';

            $table->integer('is_enabled')->unsigned()->default(1)->nullable(false)
            ->comment = 'Available Status';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_media_galleries');
    }
}
