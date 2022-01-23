<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->unsignedBigInteger('order_id')->index();
            $table->string('lottery_id')->index();
            $table->string('lottery_number');
            $table->string('lottery_type');
            $table->string('lottery_set');
            $table->string('lottery_round');
            $table->string('lottery_year');
            $table->string('lottery_date_forward');
            $table->string('lottery_img');
            $table->integer('quantity');
            $table->decimal('price', 20, 2);
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
        Schema::dropIfExists('orders_products');
    }
}
