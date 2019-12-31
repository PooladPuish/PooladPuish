<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCharacteristic extends Model
{
    protected $guarded = ['id'];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }

    public function products()
    {
        return $this->belongsTo(ProductCharacteristic::class);
    }
}
