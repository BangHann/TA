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
        Schema::create('metode_payments', function (Blueprint $table) {
            $table->id();
            $table->string('jenis'); //Bank, E-Wallet, or Qris
            $table->string('nama');
            $table->string('atas_nama');
            $table->bigInteger('no_rek')->nullable();
            $table->bigInteger('no_telp')->nullable();
            $table->string('qris')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode_payments');
    }
};
