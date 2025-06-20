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
        Schema::create('mobil_pembeli', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembeli_id');
            $table->unsignedBigInteger('mobil_id');
            $table->timestamps();

            $table->foreign('pembeli_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil_pembeli');
    }
};
