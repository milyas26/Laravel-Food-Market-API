<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Food extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['name', 'description', 'ingredients', 'price', 'rate', 'types', 'picturePath'];

    // ASSESSOR YANG MERUBAH TANGGAL EPOCH MENJADI TIMESTAMPS
    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->timestamp;
    }
    
    public function toArray() {
        $toArray = parehnt::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute($value) {
        return url('').Storage::url($this->attributes['picturePath']);
    }
}
