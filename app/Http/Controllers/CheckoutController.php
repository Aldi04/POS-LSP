<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Checkout;
use App\InformasiToko;
use App\Produk;
use App\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['carts'] = Cart::where('user_id', \Auth::user()->id)->where('status', 1)->orderBy("id", "DESC")->get();
        $d['totalCarts'] = Cart::where("user_id", \Auth::user()->id)->where("status", 1)->sum('sub_total');
        $d['informasiTokos'] = InformasiToko::first();
        return view("checkout.index", $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Checkout;
        $d->total = $request->input("total");
        $d->user_id = \Auth::user()->id;
        $d->bayar = $request->input("bayar");

        if($request->input('bayar') < $request->input('total')){
            return redirect()->route("checkout.index")->with('alertBlock', 'Bayar dengan uang yang sesuai dengan harga!');
        }
        $d->kembalian = $request->input("bayar") - $request->input("total");
        $d->metode_pembayaran = $request->input("metode_pembayaran");

        $kode_unik = rand(1111111111111111,9999999999999999);
        $d->kode_unik = $kode_unik;

        $d->save();

        Cart::where('user_id', \Auth::user()->id)->where("status", 1)->update(['kode_unik' => $kode_unik, 'status' => 0]);

        $cart = Cart::where("kode_unik", $kode_unik)->get();
        foreach($cart as $res){
            $produk = Produk::find($res->produk_id);
            if($produk->stok - $res->jumlah < 0){
                $produk->stok = 0;
                $produk->save();
            }
            else{
                $produk->stok = $produk->stok - $res->jumlah;
                $produk->save();
            }
        }

        return redirect()->route("invoice.show", $kode_unik)->with("alertStore", $request->input("total"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkout  $checkout
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
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        abort(404);
    }
}
