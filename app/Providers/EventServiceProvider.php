<?php

namespace App\Providers;

use App\Models\Attraction;
use App\Models\Map;
use App\Models\Menu;
use App\Models\Event;
use App\Models\banners;
use App\Observers\AttractionsObserver;
use App\Observers\MapsObserver;
use App\Observers\MenuObserver;
use App\Observers\EventObserver;
use App\Observers\BannerObserver;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        banners::observe(BannerObserver::class);
        Menu::observe(MenuObserver::class);
        Map::observe(MapsObserver::class);
        Event::observe(EventObserver::class);
        Attraction::observe(AttractionsObserver::class);
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
