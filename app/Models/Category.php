<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
       'periode',
       'nominal',
       'status',  
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}