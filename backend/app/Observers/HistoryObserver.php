<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Sheep;
use Illuminate\Support\Facades\Artisan;

class HistoryObserver
{
    /**
     * Handle the History "created" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function created(History $history)
    {
        $history->day = $history->id;
        $history->save();

        if ($history->id === 1) {
            Artisan::call('history:first_day');
        } else {
            Artisan::call('sheep:transfer');

            if (is_integer($history->id / 10)) Artisan::call('history:tenth_day');
        }

        $sheep = [];
        Sheep::get()->each(function ($item) use (&$sheep) {
            $sheep[$item->id] = ['paddock_id' => $item->paddock_id];
        });

        $history->sheep()->sync($sheep);
    }

    /**
     * Handle the History "updated" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function updated(History $history)
    {
        //
    }

    /**
     * Handle the History "deleted" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function deleted(History $history)
    {
        //
    }

    /**
     * Handle the History "restored" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function restored(History $history)
    {
        //
    }

    /**
     * Handle the History "force deleted" event.
     *
     * @param  \App\Models\History  $history
     * @return void
     */
    public function forceDeleted(History $history)
    {
        //
    }
}
