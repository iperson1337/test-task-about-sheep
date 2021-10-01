<?php

namespace App\Observers;

use App\Models\Sheep;

class SheepObserver
{
    /**
     * Handle the Sheep "created" event.
     *
     * @param  Sheep  $sheep
     * @return void
     */
    public function created(Sheep $sheep)
    {
        $sheep->name = $sheep->name ?? 'Овечка '.$sheep->id;
        $sheep->save();
    }

    /**
     * Handle the Sheep "updated" event.
     *
     * @param  Sheep  $sheep
     * @return void
     */
    public function updated(Sheep $sheep)
    {
        //
    }

    /**
     * Handle the Sheep "deleted" event.
     *
     * @param  Sheep  $sheep
     * @return void
     */
    public function deleted(Sheep $sheep)
    {
        //
    }

    /**
     * Handle the Sheep "restored" event.
     *
     * @param  Sheep  $sheep
     * @return void
     */
    public function restored(Sheep $sheep)
    {
        //
    }

    /**
     * Handle the Sheep "force deleted" event.
     *
     * @param  Sheep  $sheep
     * @return void
     */
    public function forceDeleted(Sheep $sheep)
    {
        //
    }
}
