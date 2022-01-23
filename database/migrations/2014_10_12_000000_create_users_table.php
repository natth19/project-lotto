<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Support\Str;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('username')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->boolean('is_admin')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();


            $table->id();
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_phone')->unique();
            $table->string('user_address');
            $table->boolean('is_admin')->nullable();
            // $table->boolean('is_vip')->nullable();
            $table->enum('user_status', ['Normal', 'VIP', 'Super VIP'])->default('normal');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
