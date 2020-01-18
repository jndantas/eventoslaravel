<?php

namespace App;

use App\Events\StockEntryCreated;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    use StockMovements;

    protected $dispatchesEvents = [
        'created' => StockEntryCreated::class
    ];
}
