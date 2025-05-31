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
        Schema::create('tb_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('tb_pasien')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('tb_dokter')->onDelete('cascade');
            $table->dateTime('waktu_kunjungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
