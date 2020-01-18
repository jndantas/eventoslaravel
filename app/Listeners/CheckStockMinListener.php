<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\Mail\StockLessMin;


class CheckStockMinListener
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
        if ($product->stock < ($product->stock_max*0.1)) {
            \Mail::to(env('MAIL_STOCK'))->queue(new StockLessMin($product));
        }
    }
}
