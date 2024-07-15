<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];

    public function Events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function EventImage() {
        return $this->hasMany(EventImage::class);
    }
}
