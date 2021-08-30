<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $keyType = 'string';
    protected $fillable = [
        'id_user',
        'nama_user',
        'no_wa',
        'alamat',
        'jenis_kelamin'
    ];
}
