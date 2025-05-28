<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    protected $table = 'tb_admin';

    protected $fillable = [
        'username',
        'password',
        'name',
    ];

    public $timestamps = true;

}
