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
}
