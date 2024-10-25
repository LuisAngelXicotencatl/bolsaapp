<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dateprivate extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'subtitulo', 'descripcion', 'fecha', 'lugar', 'premio'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

    public function Eventsprivate()
    {
        return $this->belongsToMany(Eventprivate::class);
    }


}
