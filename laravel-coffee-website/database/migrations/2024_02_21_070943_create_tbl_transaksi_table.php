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
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->id();
            // $table->integer('no_transaksi');
            // $table->date('tgl_transaksi');
            $table->string('name');
            $table->text('address');
            $table->bigInteger('phone');
            $table->integer('qty');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            
            $table->bigInteger('total_price');
            $table->enum('status_transaksi', ['Unpaid', 'Paid']);
            // $table->string('image_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_transaksi');
    }
};
