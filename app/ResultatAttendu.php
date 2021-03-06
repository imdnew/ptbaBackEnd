<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultatAttendu extends Model
{
    protected $guarded = [];

    public function activite()
    {
        return $this->belongsTo(Activite::class);
    }
}
