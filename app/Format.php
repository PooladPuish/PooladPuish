<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $guarded = ['id'];

    public function model()
    {
        return $this->belongsTo(Models::class);

    }

    public function char()
    {
        return $this->belongsTo(ProductCharacteristic::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }


}
