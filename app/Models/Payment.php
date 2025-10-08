<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'warga_id',
        'category_id',
        'user_id',
        'jumlah_pembayaran',
        'status',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
