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
        'alamat',
        'status',
    ];
     public $timestamps = true;

     public function payments()
     {
    return $this->hasMany(Payment::class);
    }
}
