<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $guarded = [];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function objectifSpecifique()
    {
        return $this->belongsTo(ObjectifSpecifique::class);
    }

    public function indicateurs()
    {
        return $this->hasMany(Indicateur::class);
    }

    public function resulatsAttendus()
    {
        return $this->hasMany(ResultatAttendu::class);
    }



}
