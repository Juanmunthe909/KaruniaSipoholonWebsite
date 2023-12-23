<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksipemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10);
            $table->foreignId('user_id');
            $table->integer('total');
            $table->string('payment');
            $table->string('image')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected', 'completed'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('transaksipemesanan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksipemesanan_id');
            $table->foreignId('product_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('transaksipemesanan_id')->references('id')->on('transaksipemesanans');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksipemesanans');
    }
};
