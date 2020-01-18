<?php

namespace App\Listeners;

use App\Events\OrderProductsCreated;
use App\Stock\DecrementStocks;

class DecrementStockFromCheckoutListener
{
    use DecrementStocks;

    /**
     * Handle the event.
     *
     * @param  OrderProductsCreated  $event
     * @return void
     */
    public function handle(OrderProductsCreated $event)
    {
        $orderProduct = $event->getProduct();
        $this->decrement($orderProduct->product,$orderProduct->quantity);
    }
}
