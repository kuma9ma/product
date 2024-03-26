<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tenant_id',
        'morning_main',
        'morning_side',
        'lunch_main',
        'lunch_side',
        'dinner_main',
        'dinner_side',
        'date',
    ];


     /**
     * 食事のテーブルにある入居者ID
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }


    /**
     * 食事のテーブルにあるユーザーID
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
