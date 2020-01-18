<?php

namespace App\Listeners;

use App\Events\PaymentCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PDF;

class GenerateReceiptListener implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Handle the event.
     *
     * @param  PaymentCompleted  $event
     * @return void
     */
    public function handle(PaymentCompleted $event)
    {
        $order = $event->getOrder();
        $pdf = PDF::LoadView('receipt.order-completed', compact('order'));
        $pdf->save(storage_path("app/orders/order-{$order->id}.pdf"));
    }
}
