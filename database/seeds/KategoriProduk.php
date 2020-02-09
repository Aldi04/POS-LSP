<?php

use Illuminate\Database\Seeder;

class KategoriProduk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kategori::truncate();

        $d = new \App\Kategori;
        $d->kategori = "Benda";

        $d->save();
    }
}
