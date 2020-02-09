<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Cart;
use App\Produk;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['produks'] = Produk::orderBy("nama", "ASC")->get();
        $d['carts'] = Cart::where('user_id', \Auth::user()->id)->where('status', 1)->orderBy("id", "DESC")->get();
        $d['totalCarts'] = Cart::where('user_id', \Auth::user()->id)->where('status', 1)->sum('sub_total');
        return view ("transaksi.index", $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $h = Produk::find($request->input("produk_id"));

        $d = new Cart;
        $d->produk_id = $request->input("produk_id");

        if($h->stok < $request->input("jumlah")){
            return redirect()->route("transaksi.index")->with("alertBlock", "Stok hanya tersisa".$h->stok);
        }

        if($request->input("jumlah") < 1){
            return redirect()->route("transaksi.index")->with("alertBlock", "Masukan jumlah barang yang ingin Anda beli");
        }
        $d->jumlah = $request->input("jumlah");
        $d->user_id = \Auth::user()->id;

        $d->status = $request->input("jumlah") * $h->harga_jual;
        $d->status = 1;
        $d->kode_unik = rand(1111111111,9999999999);
        
        $d->save();

        return redirect()->route("transaksi.index")->with("alertStore", $request->input("produk_id"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $d = Cart::find($id);
        $produk_id = $d->produk_id;
        $d->delete();

        return redirect()->route("transaksi.index")->with("alertDestroy", $produk_id);
    }

    public function transaksiClean()
    {
        Cart::where('user_id', \Auth::user()->id)->where('status', 1)->delete();

        return redirect()->route("transaksi.index")->with("alertDestroy", "..........");
    }
}
