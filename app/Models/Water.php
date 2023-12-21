<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tenant_id',
        'name',
        'water',
        'date',
        'time',
    ];


     /**
        * 食事のテーブルにあるユーザーID
        */
        public function user()
        {
            return $this->belongsTo(User::class);
        }
     /**
        * 食事のテーブルにあるユーザーID
        */
        public function tenant()
        {
            return $this->belongsTo(Tenant::class);
        }
}
