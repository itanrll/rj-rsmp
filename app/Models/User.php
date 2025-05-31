<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $table = 'users';

    protected $fillable = ['username', 'password', 'role'];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';
    public function pasien() {
        return $this->hasOne(Pasien::class);
    }
}