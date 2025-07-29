<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesMember extends Model
{
    //
     protected $table = 'dues_members'; 

    protected $fillable = [
        'user_id',
        'dues_category_id',
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
    public function category()
    {
        return $this->belongsTo(DuesCategory::class, 'dues_category_id');
    }
}
