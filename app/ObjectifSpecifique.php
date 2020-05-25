<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectifSpecifique extends Model
{
    protected $guarded = [];

    public function objectifStrategique(){
        return $this->belongsTo(ObjectifStrategique::class);
    }
}
