<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Authentication Events...
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\Auth\LogRegisteredUser',
        ],

        'Illuminate\Auth\Events\Authenticated' => [
            'App\Listeners\Auth\LogAuthenticated',
        ],

        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\Auth\LogSuccessfulLogin',
            'App\Listeners\Auth\QueueEmailCookie',
        ],

        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\Auth\LogSuccessfulLogout',
            'App\Listeners\Auth\ForgetEmailCookie',
        ],

        // Application Events...
        'App\Events\OrderCreated' => [
            'App\Listeners\LogCreatedOrder',
        ],

        'App\Events\OrderSaved' => [
            'App\Listeners\DispatchOrderPaidEvent',
        ],

        'App\Events\OrderPaid' => [
            'App\Listeners\LogPaidOrder',
            'App\Listeners\UpdateOrderStatus',
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
