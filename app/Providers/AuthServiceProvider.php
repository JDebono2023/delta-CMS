<?php

namespace App\Providers;

use App\Models\Map;
use App\Models\Menu;
use App\Models\Team;
use App\Models\User;
use App\Models\banners;
use App\Models\Analytic;
use App\Models\Attraction;
use App\Policies\MapsPolicy;
use App\Policies\MenuPolicy;
use App\Policies\TeamPolicy;
use App\Policies\BannerPolicy;
use App\Policies\AllUsersPolicy;
use App\Policies\AnalyticsPolicy;
use App\Policies\AttractionsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        banners::class => BannerPolicy::class,
        Menu::class => MenuPolicy::class,
        Map::class => MapsPolicy::class,
        Attraction::class => AttractionsPolicy::class,
        User::class => AllUsersPolicy::class,
        Analytic::class => AnalyticsPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}