<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    //
    protected $table = 'warga'; 

    protected $fillable = [
        'username',
        'password',
        'name',
        'alamat'
    ];
     public $timestamps = true;
}
