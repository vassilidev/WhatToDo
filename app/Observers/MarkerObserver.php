<?php

namespace App\Observers;

use App\Models\Marker;
use Str;

class MarkerObserver
{
    /**
     * Handle the Marker "created" event.
     *
     * @param Marker $marker
     * @return void
     */
    public function created(Marker $marker)
    {
        Marker::withoutEvents(function () use ($marker) {
            $marker->update([
                'slug' => Str::slug($marker->name)
            ]);
        });
    }

    /**
     * Handle the Marker "updated" event.
     *
     * @param Marker $marker
     * @return void
     */
    public function updated(Marker $marker)
    {
        Marker::withoutEvents(function () use ($marker) {
            $marker->update([
                'slug' => Str::slug($marker->name)
            ]);
        });
    }

    /**
     * Handle the Marker "deleted" event.
     *
     * @param Marker $marker
     * @return void
     */
    public function deleted(Marker $marker)
    {
        //
    }

    /**
     * Handle the Marker "restored" event.
     *
     * @param Marker $marker
     * @return void
     */
    public function restored(Marker $marker)
    {
        //
    }

    /**
     * Handle the Marker "force deleted" event.
     *
     * @param Marker $marker
     * @return void
     */
    public function forceDeleted(Marker $marker)
    {
        //
    }
}
