<?php

use App\Http\Controllers\AnalyticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Content version control
Route::get('/versiondata', [APIController::class, 'versionData']);
// http://127.0.0.1:8000/api/versiondata
// https://team.eyelookmedia.net/DeltaLondonArmouries/api/versiondata

// Banner data
Route::get('/bannerdata', [APIController::class, 'bannerData']);
// http://127.0.0.1:8000/api/bannerdata
// https://team.eyelookmedia.net/DeltaLondonArmouries/api/bannerdata

// Banner data
Route::get('/menudata', [APIController::class, 'menuData']);
// http://127.0.0.1:8000/api/menudata
// https://team.eyelookmedia.net/DeltaLondonArmouries/api/menudata

// Map data
Route::get('/mapdata', [APIController::class, 'mapData']);
// http://127.0.0.1:8000/api/mapdata
// https://team.eyelookmedia.net/DeltaLondonArmouries/api/mapdata

// Map data
Route::get('/eventdata', [APIController::class, 'eventData']);
// http://127.0.0.1:8000/api/eventdata
// https://team.eyelookmedia.net/DeltaLondonArmouries/api/eventdata


// // Attractions data
Route::get('/attractionsdata', [APIController::class, 'attractionsData']);
// http://127.0.0.1:8000/api/attractionsdata
// https://team.eyelookmedia.net/DeltaLondonArmouries/api/attractionsdata

// // Attractions data
Route::get('/attractcatdata', [APIController::class, 'attractCatData']);
// http://127.0.0.1:8000/api/attractcatdata
// https://team.eyelookmedia.net/DeltaLondonArmouries/api/attractcatdata


// // Attractions data
Route::post('/analytics', [AnalyticsController::class, 'store']);
// http://127.0.0.1:8000/api/analytics
// https://team.eyelookmedia.net/DeltaLondonArmouries/api/analytics


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});