<?php

namespace App;

use App\Events\OrderProductsCreated;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $dispatchesEvents = [
        'created' => OrderProductsCreated::class
    ];
    protected $casts = [
        'price' => 'float',
        'quantity' => 'integer'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
