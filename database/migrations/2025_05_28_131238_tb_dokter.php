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
        Schema::create('tb_dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter');
            $table->string('spesialisasi');
            $table->string('alamat_dokter');
            $table->string('SIP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dokter');
    }
};
