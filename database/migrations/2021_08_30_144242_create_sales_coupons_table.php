<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_coupons', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('product_id')
            ->nullable()
            ->comment = 'Product ID';

            $table->string('name',255)
            ->nullable()
            ->comment = 'Coupon Name';

            $table->string('code',255)
            ->nullable()
            ->comment = 'Coupon Code';

            $table->integer('uses_limit')
            ->unsigned()
            ->nullable()
            ->comment = 'Uses Limit';
            
            $table->integer('time_used')
            ->unsigned()
            ->nullable()
            ->comment = 'Time Used';
            
            $table->integer('visibility')
            ->unsigned()
            ->default(1)
            ->comment = 'Visibility Status';

            $table->string('expiration_date')
            ->nullable()
            ->comment = 'Coupon Expiration Date';

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
        Schema::dropIfExists('sales_coupons');
    }
}
