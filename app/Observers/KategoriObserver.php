<?php

namespace App\Observers;

use App\Notifications\NewKategori;
use App\Kategori;
use App\User;

class KategoriObserver
{
    /**
     * Handle the kategori "created" event.
     *
     * @param  \App\Kategori  $kategori
     * @return void
     */
    public function created(Kategori $kategori)
    {
        $author = $kategori->user;
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new NewKategori($kategori,$author));
        }
    }

    /**
     * Handle the kategori "updated" event.
     *
     * @param  \App\Kategori  $kategori
     * @return void
     */
    public function updated(Kategori $kategori)
    {
        //
    }

    /**
     * Handle the kategori "deleted" event.
     *
     * @param  \App\Kategori  $kategori
     * @return void
     */
    public function deleted(Kategori $kategori)
    {
        //
    }

    /**
     * Handle the kategori "restored" event.
     *
     * @param  \App\Kategori  $kategori
     * @return void
     */
    public function restored(Kategori $kategori)
    {
        //
    }

    /**
     * Handle the kategori "force deleted" event.
     *
     * @param  \App\Kategori  $kategori
     * @return void
     */
    public function forceDeleted(Kategori $kategori)
    {
        //
    }
}
