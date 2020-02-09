<?php

use Illuminate\Database\Seeder;

class Currency extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Currency::truncate();

        $d = new \App\Currency;
        $d->currency = "IDR";

        $d->save();
    }
}
