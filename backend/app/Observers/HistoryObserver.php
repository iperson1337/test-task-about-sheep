<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Paddock;
use Artisan;

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
        if ($history->id === 1) {
            Artisan::call('history:first_day');
        }
        $greatestPaddock = Paddock::withCount('sheep')->orderBy('sheep_count', 'desc')->first();
        if ($greatestPaddock) $greatestPaddock->sheep()->create();

        if (is_integer($history->id/10)) {
            Artisan::call('history:tenth_day');
        }

        $transferSheep = $greatestPaddock ? $greatestPaddock->sheep()->latest()->first() : null;
        $aloneSheepPaddock = Paddock::withCount('sheep')->having('sheep_count', 1)->first();
        if ($aloneSheepPaddock) {
            $transferSheep->update([
               'paddock_id' =>  $aloneSheepPaddock->id,
            ]);
        }
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
