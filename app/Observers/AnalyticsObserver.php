<?php

namespace App\Observers;

use App\Models\Analytic;

class AnalyticsObserver
{
    /**
     * Handle the Analytic "created" event.
     *
     * @param  \App\Models\Analytic  $analytic
     * @return void
     */
    public function created(Analytic $analytic)
    {
        //
    }

    /**
     * Handle the Analytic "updated" event.
     *
     * @param  \App\Models\Analytic  $analytic
     * @return void
     */
    public function updated(Analytic $analytic)
    {
        //
    }

    /**
     * Handle the Analytic "deleted" event.
     *
     * @param  \App\Models\Analytic  $analytic
     * @return void
     */
    public function deleted(Analytic $analytic)
    {
        //
    }

    /**
     * Handle the Analytic "restored" event.
     *
     * @param  \App\Models\Analytic  $analytic
     * @return void
     */
    public function restored(Analytic $analytic)
    {
        //
    }

    /**
     * Handle the Analytic "force deleted" event.
     *
     * @param  \App\Models\Analytic  $analytic
     * @return void
     */
    public function forceDeleted(Analytic $analytic)
    {
        //
    }
}
