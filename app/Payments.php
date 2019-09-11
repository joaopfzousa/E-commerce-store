<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['order_id', 'entity', 'reference', 'total_price', 'status'];

    public function order_id()
    {
        return $this->belongsTo(Order::class);
    }
}