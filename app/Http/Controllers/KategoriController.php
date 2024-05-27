<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('created_at', 'asc')->get();
        return view('merchant.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->id_user = Auth::user()->id;
        $kategori->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('kategori/', $name);
            $kategori->image = $name;
        }
        $kategori->slug = Str::slug($request->name) . '-' . Str::random(10);
        $kategori->save();
        notify()->success('Berhasil Menambah Kategori');
        return redirect('/merchant/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('merchant.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $kategori =  Kategori::find($id);
        $kategori->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('kategori/', $name);
            $kategori->image = $name;
        }
        $kategori->save();
        notify()->success('Berhasil Edit Kategori');
        return redirect('/merchant/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $imagePath = public_path('kategori/' . $kategori->image_path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $kategori->delete();
        notify()->success('Berhasil menghapus kategori');
        return redirect('/merchant/kategori');
    }
}
