<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\Mail\StockGreatherMax;
use App\Product;
use Illuminate\Support\Facades\Mail;

class CheckStockMaxListener
{

    /**
     * Handle the event.
     *
     * @param  ProductUpdated  $event
     * @return void
     */
    public function handle(ProductUpdated $event)
    {
        $product = $event->getProduct();
        if ($product->stock >= $product->stock_max) {
            Mail::to(env('MAIL_STOCK'))->queue(new StockGreatherMax($product));
        }
    }
}
