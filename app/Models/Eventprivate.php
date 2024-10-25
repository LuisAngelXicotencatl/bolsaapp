<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventprivate extends Model
{
    use HasFactory;

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

    public function dateprivate()
    {
        return $this->belongsToMany(Dateprivate::class);
    }
}
