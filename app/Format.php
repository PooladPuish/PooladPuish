<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $guarded = ['id'];

    public function models()
    {
        return $this->hasMany(Models::class);

    }
}
