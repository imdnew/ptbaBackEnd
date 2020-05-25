<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $guarded = [];

    public function entite(){
        return $this->belongsTo(ObjectifStrategique::class);
    }
}
