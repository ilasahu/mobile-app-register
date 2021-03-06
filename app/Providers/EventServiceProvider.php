<?php

namespace App\Providers;

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

        PurchaseSuccessful::class => [
            SaveExpiryToDeviceTable::class,
        ],

        PurchaseExpired::class => [
            ChangeExpiryStatusToDeviceTable::class,
        ],

        
        PurchaseCanceled::class => [
            CancelDeviceSubscription::class,
        ],

        PurchaseRenewed::class => [
            RenewDeviceSubscription::class,
        ],

        PurchaseStarted::class => [
            StartDeviceSubscription::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
