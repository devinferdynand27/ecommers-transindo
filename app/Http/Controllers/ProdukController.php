<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use App\Models\Produk;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::orderBy('created_at', 'asc')->get();
        return view('merchant.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::orderBy('created_at', 'asc')->get();
        return view('merchant.produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->id_user = Auth::user()->id;
        $produk->id_kategori = $request->id_kategori;
        $produk->qty = $request->qty;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('produk/', $name);
            $produk->image = $name;
        }
        $produk->slug = Str::slug($request->name) . '-' . Str::random(10);
        $produk->save();
        notify()->success('Berhasil Menambah Produk');
        return redirect('/merchant/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::orderBy('created_at', 'asc')->get();
        return view('merchant.produk.edit', compact('kategori','produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk =  Produk::find($id);
        $produk->id_user = Auth::user()->id;
        $produk->id_kategori = $request->id_kategori;
        $produk->qty = $request->qty;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('produk/', $name);
            $produk->image = $name;
        }
        $produk->save();
        notify()->success('Berhasil Edit Produk');
        return redirect('/merchant/produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $imagePath = public_path('produk/' . $produk->image_path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $produk->delete();
        notify()->success('Berhasil menghapus produk');
        return redirect('/merchant/produk');
    }
}
