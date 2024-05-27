<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Midtrans\Config;
use Midtrans\Snap;

class MemberController extends Controller
{
    public function detail_produk($slug){
        $produk = Produk::where('slug', $slug)->first();
        return view('detail-produk', compact('produk'));
    }
    public function checkout_get(Request $request){
        $id_produk =  $request->id_produk;

        $produk = Produk::find($id_produk);
        $total_harga = $produk->harga * $request->qty;

        $transaksi = new Transaksi();
        $transaksi->id_user = Auth::user()->id;
        $transaksi->id_produk = $request->id_produk;
        $transaksi->qty = $request->qty;
        $transaksi->status = 'pending';
        $transaksi->total_harga = $total_harga;
        $transaksi->save();

        // Set konfigurasi API Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat data transaksi dengan order_id unik
        $params = [
            'transaction_details' => [
                'order_id' => 'order-' . $transaksi->id, // Pastikan order_id unik dengan prefix
                'gross_amount' => $transaksi->total_harga,
            ],
            'customer_details' => [
                'first_name' => $request->nama,
                'email' => $request->email,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $transaksi->snap_token = $snapToken;
            $transaksi->save(); // Simpan token Snap ke database

            return view('checkout', compact('snapToken', 'transaksi')); // Sesuaikan dengan view Anda
        } catch (\Exception $e) {
            // Tangani kesalahan saat membuat transaksi
            return back()->withErrors(['message' => 'Failed to create transaction: ' . $e->getMessage()]);
        }
    }


    public function search(Request $request){
        $search = $request->search;
    
        // Menemukan produk berdasarkan nama dan alamat pengguna
        $products = Produk::where('name', 'like', '%' . $search . '%')
                        ->orWhereHas('user', function($query) use ($search) {
                            $query->where('company_address', 'like', '%' . $search . '%');
                        })
                        ->get();
       return view('search', compact('products'));
    }
}
