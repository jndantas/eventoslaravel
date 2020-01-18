<?php

namespace App\Events;

use App\StockOutput;

class StockOutputCreated
{
    private $output;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(StockOutput $output)
    {
        $this->output = $output;
    }

    public function getOutput()
    {
        return $this->output;
    }

}
