<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_id', 'state', 'amount'];

    //uma order so tem um cliente
    public function client_id()
    {
        return $this->belongsTo(Client::class);
    }
}