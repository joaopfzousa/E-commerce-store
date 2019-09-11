<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'email', 'adress', 'phone_number'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}