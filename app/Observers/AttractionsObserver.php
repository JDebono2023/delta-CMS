<?php

namespace App\Observers;

use App\Models\version;
use App\Models\Attraction;

class AttractionsObserver
{
    /**
     * Handle the Attraction "created" event.
     *
     * @param  \App\Models\Attraction  $attraction
     * @return void
     */
    public function created(Attraction $attraction)
    {
        if ($attraction->isDirty()) {

            version::where('id', 1)->increment('version');
        }
    }

    /**
     * Handle the Attraction "updated" event.
     *
     * @param  \App\Models\Attraction  $attraction
     * @return void
     */
    public function updated(Attraction $attraction)
    {
        if ($attraction->isDirty()) {

            version::where('id', 1)->increment('version');
        }
    }

    /**
     * Handle the Attraction "deleted" event.
     *
     * @param  \App\Models\Attraction  $attraction
     * @return void
     */
    public function deleted(Attraction $attraction)
    {
        // if ($attraction->isDirty()) {

        //     version::where('id', 1)->increment('version');
        // }
        version::where('id', 1)->increment('version');
    }

    /**
     * Handle the Attraction "restored" event.
     *
     * @param  \App\Models\Attraction  $attraction
     * @return void
     */
    public function restored(Attraction $attraction)
    {
        //
    }

    /**
     * Handle the Attraction "force deleted" event.
     *
     * @param  \App\Models\Attraction  $attraction
     * @return void
     */
    public function forceDeleted(Attraction $attraction)
    {
        //
    }
}
