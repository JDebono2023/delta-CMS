<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\AttractionCategory;
use Carbon\Carbon;
use App\Models\Map;
use App\Models\Menu;
use App\Models\Room;
use App\Models\Event;
use App\Models\banners;
use App\Models\version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    // versioning data
    public function versionData()
    {
        return version::all();
    }

    // all banner data with banner categories
    public function bannerData()
    {
        return banners::with('bannerCat')->where('visible', '=', '1')->get();
    }

    // all menu data with restaurants
    public function menuData()
    {
        return Menu::with('restaurant')->get();
    }

    // all menu data with restaurants
    public function mapData()
    {
        return Map::with('floors')->get();
    }

    // all menu data with restaurants
    public function attractionsData()
    {
        return Attraction::with('attractionCategory')->get();
    }

    // all menu data with restaurants
    public function attractCatData()
    {
        return AttractionCategory::all();
    }

    // all menu data with restaurants
    public function eventData()
    {
        $today = Carbon::today()->toDateString();

        // $events = Event::with('eventRoom')->get();

        $rooms = Room::with('floors')->get();

        // $events = DB::table('events')
        //     ->rightJoin('rooms', 'rooms.id', '=', 'events.room_id')
        //     ->rightJoin('floors', 'floors.id', '=', 'rooms.floor_id')
        //     ->get();

        $events = DB::table('events')->where('visible', '=', 1)
            ->join('rooms', 'rooms.id', '=', 'events.room_id')
            ->join('floors', 'floors.id', '=', 'rooms.floor_id')->get();

        return $events;
        // return Event::with('eventRoom')->where('visible', '=', 1)->whereDate('starts_at', $today)->get();
    }
}
