<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use carbon\Carbon;

class Transaction extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['food_id', 'user_id', 'quantity', 'total', 'status', 'payment_url'];

    // ASSESSOR YANG MERUBAH TANGGAL EPOCH MENJADI TIMESTAMPS
    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->timestamp;
    }

    // RELASI
    public function food() {
        return $this->hasOne(Food::class, 'id', 'food_id');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
