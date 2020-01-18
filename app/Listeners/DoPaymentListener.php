<?php

namespace App\Listeners;

use App\Events\OrderCreatedFully;
use App\Payment\PaymentGateway;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DoPaymentListener implements ShouldQueue
{
    use InteractsWithQueue;

    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
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
        $this->paymentGateway->payment($order);
    }
}
