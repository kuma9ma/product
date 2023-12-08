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
        'spo2',
    ];

     /**
        * Tenant(入居者)の保持する全vital
        */
        public function tenant()
        {
            return $this->hasMany(Tenant::class);
        }


      /**
        * バイタルのテーブルにあるユーザーID
        */
        public function user()
        {
            return $this->belongsTo(User::class);
        }

}
