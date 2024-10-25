<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventpDatep extends Model
{
    use HasFactory;

    public function eventprivate() {
        return $this->belongsTo(Eventprivate::class);
    }

    public function dateprivate() {
        return $this->belongsTo(Dateprivate::class);
    }
}
