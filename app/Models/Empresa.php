<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre', 'Descripcion'
    ];

    public function Events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function eventEmpresa() {
        return $this->hasMany(EventDate::class);
    }

    public function Eventprivate()
    {
        return $this->belongsToMany(Eventprivate::class);
    }

    
}
