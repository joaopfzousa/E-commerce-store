<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    //belongsTO == apenas 1
    public function order_id()
    {
        return $this->belongsTo(Order::class);
    }

    public function product_id()
    {
        return $this->belongsTo(Product::class);
    }
}