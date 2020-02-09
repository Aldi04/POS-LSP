<?php

use Illuminate\Database\Seeder;

class PersentaseKeuntungan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PersentaseKeuntungan::truncate();

        $d = new \App\PersentaseKeuntungan;
        $d->persentase_keuntungan = 10;

        $d->save();
    }
}
