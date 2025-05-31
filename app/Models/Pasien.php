<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Pasien extends Model
{

    protected $table = 'tb_pasien';

    protected $fillable = [
        'user_id',
        'nomor_rekam_medis',
        'nik',
        'nama_lengkap',
        'nama_ibu_kandung',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'pendidikan',
        'pekerjaan',
        'pekerjaan_lain',
        'status_pernikahan',
        'jaminan_kesehatan',
        'no_hp',
    ];

   public function user() {
        return $this->belongsTo(User::class);
    }

    public function pendaftarans() {
        return $this->hasMany(Pendaftaran::class);
    }
 
}