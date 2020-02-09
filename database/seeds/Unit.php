<?php

use Illuminate\Database\Seeder;

class Unit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Unit::truncate();

        $d = new \App\Unit;
        $d->unit = "Pack";

        $d->save();
    }
}
