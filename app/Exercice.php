<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    protected $guarded = [];

    public function exercice()
    {
        return $this->belongsTo(ObjectifStrategique::class);
    }
}
