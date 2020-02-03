<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);

    }
}
