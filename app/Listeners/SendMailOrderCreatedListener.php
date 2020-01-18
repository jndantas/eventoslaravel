<?php

namespace App\Listeners;

use App\Events\OrderCreatedFully;
use App\Mail\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailOrderCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreatedFully  $event
     * @return void
     */
    public function handle(OrderCreatedFully $event)
    {
        $order = $event->getOrder();
        Mail::to($order->user)->queue(new OrderCreated($order, $order->user));
    }
}
