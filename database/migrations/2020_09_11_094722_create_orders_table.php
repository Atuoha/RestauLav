<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('contact');
            $table->string('address');
            $table->string('date');
            $table->string('time');
            $table->string('item');
            $table->text('message');
            $table->integer('quantity');
            $table->integer('price');
            $table->float('total_price');
            $table->string('status')->default('Not Delivered');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // This deletes a record that relates to a user whence the user is deleted because we depend on the user_id to pull some records

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
