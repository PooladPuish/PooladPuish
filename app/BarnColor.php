<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarnColor extends Model
{
    protected $guarded = ['id'];

    public function color()
    {
        return $this->hasMany(Color::class);

    }

}
