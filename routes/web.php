<?php

use App\Models\Map;
use App\Models\Menu;
use App\Models\Team;
use App\Models\User;
use App\Models\Event;
use App\Models\banners;
use App\Models\Analytic;
use App\Models\Attraction;
use Illuminate\Mail\Markdown;
use App\Http\Livewire\Analytics;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/teams', function () {
        return view('teams.teams');
    })->can('viewAny', Team::class)->name('teams');

    Route::get('/banners', function () {
        return view('content.banner');
    })->can('viewAny', banners::class)->name('banner');

    Route::get('/menus', function () {
        return view('content.menus');
    })->can('viewAny', Menu::class)->name('menus');

    Route::get('/maps', function () {
        return view('content.maps');
    })->can('viewAny', Map::class)->name('maps');

    Route::get('/attractions', function () {
        return view('content.attractions');
    })->can('viewAny', Attraction::class)->name('attractions');

    Route::get('/events', function () {
        return view('content.events');
    })->can('viewAny', Event::class)->name('events');

    Route::get('/users', function () {
        return view('content.allusers');
    })->can('viewAny', User::class)->name('users');

    Route::get('/analytics', function () {
        return view('content.analytics');
    })->can('viewAny', Analytic::class)->name('analytics');



    // email previews
    Route::get('mail', function () {
        $markdown = new Markdown(view(), config('mail.markdown'));

        return $markdown->render('emails.teaminvite');
    });

    // pdf printing
    Route::post('/DownloadReport', [AnalyticsController::class, 'downloadPDF'])->name('download');
    Route::post('/ViewReport', [AnalyticsController::class, 'viewPDF'])->name('view');
});
