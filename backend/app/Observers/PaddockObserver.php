<?php

namespace App\Observers;

use App\Models\Paddock;

class PaddockObserver
{
    /**
     * Handle the Paddock "created" event.
     *
     * @param Paddock $paddock
     * @return void
     */
    public function created(Paddock $paddock)
    {
        $paddock->name = $paddock->name ?? 'Загон #'.$paddock->id;
        $paddock->save();
    }

    /**
     * Handle the Paddock "updated" event.
     *
     * @param Paddock $paddock
     * @return void
     */
    public function updated(Paddock $paddock)
    {
        //
    }

    /**
     * Handle the Paddock "deleted" event.
     *
     * @param Paddock $paddock
     * @return void
     */
    public function deleted(Paddock $paddock)
    {
        //
    }

    /**
     * Handle the Paddock "restored" event.
     *
     * @param Paddock $paddock
     * @return void
     */
    public function restored(Paddock $paddock)
    {
        //
    }

    /**
     * Handle the Paddock "force deleted" event.
     *
     * @param Paddock $paddock
     * @return void
     */
    public function forceDeleted(Paddock $paddock)
    {
        //
    }
}
