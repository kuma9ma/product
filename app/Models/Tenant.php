<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

      /**
        * Vitalを保持するTenant(入居者)の取得
        */
        public function vital()
        {
            return $this->hasMany(Vital::class);
        }
}
