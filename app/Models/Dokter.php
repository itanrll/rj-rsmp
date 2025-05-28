<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dokter extends Model
{

    protected $table = 'tb_dokter';

    protected $fillable = [
        'nama_dokter',
        'spesialisasi',
        'alamat_dokter',
        'SIP',
    ];
}