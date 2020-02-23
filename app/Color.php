<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guarded = ['id'];

    public function sellers()
    {
        return $this->hasMany(Seller::class);

    }


    public function barncolor()
    {
        return $this->belongsTo(BarnColor::class);

    }

}
