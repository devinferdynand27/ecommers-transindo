<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(){
        $order = Transaksi::orderBy('created_at','asc')->get();
        return view('merchant.order.index', compact('order'));
     }

    public function success($sewa)
    {

        $transaksi = Transaksi::find($sewa);
        $transaksi->status = 'success';
        $transaksi->save();
        return view('order-success', compact('transaksi'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
