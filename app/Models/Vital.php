<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tenant_id',
        'kt',
        'sbp',
        'dbp',
        'p',
        'spo2',
        'date',
        'time',
    ];

     /**
        * 
        */
        public function tenant()
        {
            return $this->belongsTo(Tenant::class);
        }


      /**
        * バイタルのテーブルにあるユーザーID
        */
        public function user()
        {
            return $this->belongsTo(User::class);
        }

}
