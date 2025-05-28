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
        Schema::create('tb_pasien', function (Blueprint $table) {
            $table->id();
            // 1. Nomor Rekam Medis: karakter
            $table->string('nomor_rekam_medis')->unique();
            // 2. NIK: numerik 16 digit
            $table->char('nik', 16)->unique();
            // 3. Nama Lengkap: karakter
            $table->string('nama_lengkap');
            // 4. Nama Ibu Kandung: karakter
            $table->string('nama_ibu_kandung');
            // 5. Tempat Lahir: karakter
            $table->string('tempat_lahir');
            // 6. Tanggal Lahir: date
            $table->date('tanggal_lahir');
            // 7. Jenis Kelamin: numerik (0-4)
            $table->tinyInteger('jenis_kelamin');
            // 8. Agama: numerik (1-8), 8 = lain-lain (free text)
            $table->tinyInteger('agama');
            $table->string('agama_lain')->nullable(); // untuk free text jika agama = 8
            // 9. Alamat Lengkap: alphanumeric, karakter
            $table->string('alamat_lengkap');
            // 10. Pendidikan: numerik (0-8)
            $table->tinyInteger('pendidikan');
            // 11. Pekerjaan: numerik (0-5), 5 = lain-lain (free text)
            $table->tinyInteger('pekerjaan');
            $table->string('pekerjaan_lain')->nullable(); // untuk free text jika pekerjaan = 5
            // 12. Status Pernikahan: numerik (1-4)
            $table->tinyInteger('status_pernikahan');
            // 13. Jaminan Kesehatan: karakter
            $table->string('jaminan_kesehatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pasien');
    }
};
