<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();

        $d = new \App\User;
        $d->name = "Admin Utama";
        $d->email = "adminutama@gmail.com";
        $d->password = \Hash::make("admin");
        $d->level = "Admin Utama";

        $d->save();
    }
}
