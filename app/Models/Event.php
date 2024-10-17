<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'titulo', 'subtitulo', 'descripcion', 'fecha', 'lugar', 'premio'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function date()
    {
        return $this->belongsToMany(Date::class);
    }
    

    public function empresa()
    {
        return $this->belongsToMany(Empresa::class);
    }
}
