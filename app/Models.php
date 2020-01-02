<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $guarded = ['id'];

    public function format()
    {
        return $this->belongsTo(Format::class);

    }
}
