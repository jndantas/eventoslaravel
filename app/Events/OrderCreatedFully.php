<?php

namespace App\Events;

use App\Order;

class OrderCreatedFully
{
    private $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function getOrder()
    {
        return $this->order;
    }
}
