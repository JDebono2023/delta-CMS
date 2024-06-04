<?php

namespace App\Observers;

use App\Models\Menu;
use App\Models\version;

class MenuObserver
{
    /**
     * Handle the Menu "created" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function created(Menu $menu)
    {
        if ($menu->isDirty()) {

            version::where('id', 1)->increment('version');
        }
    }

    /**
     * Handle the Menu "updated" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function updated(Menu $menu)
    {
        if ($menu->isDirty()) {

            version::where('id', 1)->increment('version');
        }
    }

    /**
     * Handle the Menu "deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function deleted(Menu $menu)
    {
        // if ($menu->isDirty()) {

        //     version::where('id', 1)->increment('version');
        // }
        version::where('id', 1)->increment('version');
    }

    /**
     * Handle the Menu "restored" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function restored(Menu $menu)
    {
        //
    }

    /**
     * Handle the Menu "force deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function forceDeleted(Menu $menu)
    {
        //
    }
}
