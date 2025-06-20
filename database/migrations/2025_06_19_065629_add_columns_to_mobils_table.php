<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->integer('tahun')->after('model');
            $table->integer('stok')->after('harga');
            $table->string('gambar')->nullable()->after('stok');
        });
    }

    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropColumn(['tahun', 'stok', 'gambar']);
        });
    }
};