<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
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
