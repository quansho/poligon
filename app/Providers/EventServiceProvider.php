<?php

namespace App\Providers;

use App\Events\NewUserHasRegisteredEvent;
use App\Listeners\NotifyAdminViaSlack;
use App\Listeners\RegisterUserToNewsletter;
use App\Listeners\WelcomeNewUserListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewUserHasRegisteredEvent::class => [
            WelcomeNewUserListener::class,
            RegisterUserToNewsletter::class,
            NotifyAdminViaSlack::class
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
