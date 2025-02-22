<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventEmpresa extends Model
{
    use HasFactory;


    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function Empresa() {
        return $this->belongsTo(Empresa::class);
    }

    public function date() {
        return $this->belongsTo(Date::class);
    }
}
