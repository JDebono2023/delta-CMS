<?php

namespace App\Observers;

use App\Models\banners;
use App\Models\version;

class BannerObserver
{
    /**
     * Handle the banners "created" event.
     *
     * @param  \App\Models\banners  $banners
     * @return void
     */
    public function created(banners $banners)
    {
        if ($banners->isDirty()) {

            version::where('id', 1)->increment('version');
        }
    }

    /**
     * Handle the banners "updated" event.
     *
     * @param  \App\Models\banners  $banners
     * @return void
     */
    public function updated(banners $banners)
    {
        if ($banners->isDirty()) {

            version::where('id', 1)->increment('version');
        }
    }

    /**
     * Handle the banners "deleted" event.
     *
     * @param  \App\Models\banners  $banners
     * @return void
     */
    public function deleted(banners $banners)
    {
        // if ($banners->isDirty()) {

        //     version::where('id', 1)->increment('version');
        // }
        version::where('id', 1)->increment('version');
    }

    /**
     * Handle the banners "restored" event.
     *
     * @param  \App\Models\banners  $banners
     * @return void
     */
    public function restored(banners $banners)
    {
        //
    }

    /**
     * Handle the banners "force deleted" event.
     *
     * @param  \App\Models\banners  $banners
     * @return void
     */
    public function forceDeleted(banners $banners)
    {
        //
    }
}
