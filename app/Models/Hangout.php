<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hangout extends Model
{
    protected $fillable = [
        'nama_tempat',
        'lokasi',
        'rating',
        'suasana',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
