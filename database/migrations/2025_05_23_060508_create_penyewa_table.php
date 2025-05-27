<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('penyewa', function (Blueprint $table) {
            $table->id(); // kolom ID (bigint, auto increment, primary)
            $table->string('name');
            $table->string('email')->unique(); // email unik
            $table->string('no_telp');
            $table->text('alamat');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewa');
    }
};
