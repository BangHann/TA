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
        Schema::create('tbl_cart', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            // Foreign key ke tabel kopi
            $table->unsignedBigInteger('kopi_id');
            $table->foreign('kopi_id')->references('id')->on('tbl_kopi')->onDelete('cascade');

            $table->integer('quantity');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_cart');
    }
};
