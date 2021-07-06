<?php

namespace App\Observers;

use App\Models\Phonebook;

class PhonebookObserver
{
    /**
     * Handle the Phonebook "created" event.
     *
     * @param  \App\Models\Phonebook  $phonebook
     * @return void
     */
    public function created(Phonebook $phonebook)
    {
        $phonebook->setCreatedAt(time());
    }

    /**
     * Handle the Phonebook "updated" event.
     *
     * @param  \App\Models\Phonebook  $phonebook
     * @return void
     */
    public function updated(Phonebook $phonebook)
    {

    }

    /**
     * Handle the Phonebook "deleted" event.
     *
     * @param  \App\Models\Phonebook  $phonebook
     * @return void
     */
    public function deleted(Phonebook $phonebook)
    {
        //
    }

    /**
     * Handle the Phonebook "restored" event.
     *
     * @param  \App\Models\Phonebook  $phonebook
     * @return void
     */
    public function restored(Phonebook $phonebook)
    {
        //
    }

    /**
     * Handle the Phonebook "force deleted" event.
     *
     * @param  \App\Models\Phonebook  $phonebook
     * @return void
     */
    public function forceDeleted(Phonebook $phonebook)
    {
        //
    }
}
