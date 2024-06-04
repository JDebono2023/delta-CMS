<?php

namespace App\Observers;

use App\Models\Map;
use App\Models\version;

class MapsObserver
{
    /**
     * Handle the Map "created" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function created(Map $map)
    {
        if ($map->isDirty()) {

            version::where('id', 1)->increment('version');
        }
    }

    /**
     * Handle the Map "updated" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function updated(Map $map)
    {
        if ($map->isDirty()) {

            version::where('id', 1)->increment('version');
        }
    }

    /**
     * Handle the Map "deleted" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function deleted(Map $map)
    {
        // if ($map->isDirty()) {

        //     version::where('id', 1)->increment('version');
        // }
        version::where('id', 1)->increment('version');
    }

    /**
     * Handle the Map "restored" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function restored(Map $map)
    {
        //
    }

    /**
     * Handle the Map "force deleted" event.
     *
     * @param  \App\Models\Map  $map
     * @return void
     */
    public function forceDeleted(Map $map)
    {
        //
    }
}
