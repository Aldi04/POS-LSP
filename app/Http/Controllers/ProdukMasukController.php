<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produk;
use App\InformasiToko;

class ProdukMasukController extends Controller
{
    public function index(){
        $d['produks'] = Produk::orderBy("id", "DESC")->get();

        return view("produkMasuk.index", $d);
    }
    public function print(){
        $d['produks'] = Produk::orderBy("id", "DESC")->get();
        $d['informasiTokos'] = InformasiToko::first();

        return view("produkMasuk.print", $d);
    }
}
