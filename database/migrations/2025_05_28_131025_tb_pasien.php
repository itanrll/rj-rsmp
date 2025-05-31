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
            $table->string('nomor_rekam_medis', 50)->nullable();
            $table->char('nik', 16)->unique();
            $table->string('nama_lengkap', 100);
            $table->string('nama_ibu_kandung', 100)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();

            $table->enum('jenis_kelamin', [
                'tidak_diketahui',
                'laki-laki',
                'perempuan',
                'tidak_dapat_ditentukan',
                'tidak_mengisi'
            ])->nullable();

            $table->enum('agama', [
                'islam',
                'kristen_protestan',
                'katolik',
                'hindu',
                'budha',
                'konghucu',
                'penghayat',
                'lain_lain'
            ])->nullable();

            $table->text('alamat')->nullable();

            $table->enum('pendidikan', [
                'tidak_sekolah',
                'sd',
                'sltp_sederajat',
                'slta_sederajat',
                'd1-d3_sederajat',
                'd4',
                's1',
                's2',
                's3'
            ])->nullable();

            $table->enum('pekerjaan', [
                'tidak_bekerja',
                'pns',
                'tni/polri',
                'bumn',
                'pegawai_swasta/wirausaha',
                'lain-lain'
            ])->nullable();

            $table->string('pekerjaan_lain', 100)->nullable(); // Hanya jika pilih "Lain-lain"

            $table->enum('status_pernikahan', [
                'belum_kawin',
                'kawin',
                'cerai_hidup',
                'cerai_mati'
            ])->nullable();

            $table->string('jaminan_kesehatan', 100)->nullable();
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
