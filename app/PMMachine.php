<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PMMachine extends Model
{
    protected $guarded = ['id'];


    public function device()
    {
        return $this->belongsTo(Device::class);

    }
}
