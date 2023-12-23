<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenginapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksipenginapans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('user_id');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->enum('status', ['pending', 'accepted', 'rejected', 'completed'])->default('Pending');
            $table->integer('adults');
            $table->double('total_price')->nullable(false);
            $table->string('payment_proof')->nullable();
            // $table->string('status')->nullable(false)->default('pending')->comment('pending, booked, canceled');
            // $table->string('snap_token', 36)->nullable();
            // $table->enum('payment_status', ['1', '2', '3', '4'])->comment('1: pending, 2: success, 3: failed, 4: expired')->default('1');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksipenginapans');
    }
}
