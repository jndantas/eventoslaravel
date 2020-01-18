<?php

namespace App\Providers;

use App\Events\ProductUpdated;
use App\Events\StockEntryCreated;
use App\Events\StockOutputCreated;
use App\Listeners\CheckStockMaxListener;
use App\Listeners\CheckStockMinListener;
use App\Listeners\DecrementStockFromOutputListener;
use App\Listeners\IncrementStockListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        StockEntryCreated::class => [
            IncrementStockListener::class,
        ],

        StockOutputCreated::class => [
            DecrementStockFromOutputListener::class,
        ],

        ProductUpdated::class => [
            CheckStockMaxListener::class,
            CheckStockMinListener::class,
        ],

        'App\Events\OrderProductsSaveCompleted' => [
            'App\Listeners\CalculateTotalOrderListener',
        ],
        'App\Events\OrderCreatedFully' => [
            'App\Listeners\SendMailOrderCreatedListener',
            'App\Listeners\DoPaymentListener',
        ],
        'App\Events\OrderProductsCreated' => [
            'App\Listeners\DecrementStockFromCheckoutListener',
        ],
        'App\Events\PaymentCompleted' => [
            'App\Listeners\SendMailPaymentCompleted',
            'App\Listeners\GenerateReceiptListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
