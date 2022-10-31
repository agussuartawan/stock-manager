<?php

namespace App\Providers;

use App\Models\Cure;
use App\Models\CurePurchase;
use App\Models\CureSale;
use App\Models\Purchase;
use App\Models\Sale;
use App\Observers\CureObserver;
use App\Observers\CurePurchaseObserver;
use App\Observers\CureSaleObserver;
use App\Observers\PurchaseObserver;
use App\Observers\SaleObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],
        \App\Events\CurePurchaseChanged::class => [
            \App\Listeners\UpdateGrandTotalAfterCurePurchaseChanged::class,
        ],
        \App\Events\CureSaleChanged::class => [
            \App\Listeners\UpdateGrandTotalAfterCureSaleChanged::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Cure::observe(CureObserver::class);
        Purchase::observe(PurchaseObserver::class);
        CurePurchase::observe(CurePurchaseObserver::class);
        Sale::observe(SaleObserver::class);
        CureSale::observe(CureSaleObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}