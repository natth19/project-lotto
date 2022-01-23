<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            
            // $table->text('lottery_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')
            //     ->onUpdate('cascade')->onDelete('set null');
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable()->index();
            // $table->foreign('user_id')->references('id')->on('users');
            
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');

            $table->string('payment'); // การชำระเงิน
            $table->decimal('total_price',20,2); //ราคารวม
            $table->integer('quantity'); //จำนวน Item
            $table->string('billing_slip_img')->nullable(); //สลิปโอนเงิน

            $table->string('fist_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone');

            // $table->string('lottery_id');
            // $table->string('billing_lottery');
            // $table->string('billing_lotType');
            // $table->string('billing_lotYear');
            // $table->string('billing_lotRound');
            // $table->string('billing_lotSet');
            // $table->string('billing_lotDate');
            
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
        Schema::dropIfExists('orders');
    }
}
