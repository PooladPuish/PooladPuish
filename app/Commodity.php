<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $guarded = ['id'];

    public function ProductCharacteristics()
    {
        return $this->hasMany(ProductCharacteristic::class);

    }
}
