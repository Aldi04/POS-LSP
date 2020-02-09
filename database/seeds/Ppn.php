<?php

use Illuminate\Database\Seeder;

class Ppn extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Ppn::truncate();

        $d = new \App\Ppn;
        $d->stok_minimum = "1";
        $d->ppn = "10";

        $d->save();
    }
}
