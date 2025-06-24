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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nama');
            $table->string('kelas'); // contoh: X IPA 1
            $table->string('jurusan'); // IPA, IPS, Bahasa
            $table->string('alamat');
            $table->string('no_hp');
            $table->enum('status', ['Aktif', 'Lulus', 'DO', 'Pindah'])->default('Aktif');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
