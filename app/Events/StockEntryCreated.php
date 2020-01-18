<?php

namespace App\Events;

use App\StockEntry;

class StockEntryCreated
{
    private $entry;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(StockEntry $entry)
    {
        $this->entry = $entry;
    }

    public function getEntry()
    {
        return $this->entry;
    }

}
