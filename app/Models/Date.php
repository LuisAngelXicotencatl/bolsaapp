<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha', 'hora' 
    ];

    public function Events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function eventDates() {
        return $this->hasMany(EventDate::class);
    }

    public function eventEmpresa() {
        return $this->hasMany(EventEmpresa::class);
    }
}
