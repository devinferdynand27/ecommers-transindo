<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::orderBy('created_at', 'asc')->get();
        return view('merchant.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->id_user = Auth::user()->id;
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('banner/', $name);
            $banner->banner = $name;
        }
        $banner->save();
        notify()->success('Berhasil Menambah Banner');
        return redirect('/merchant/banner');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('merchant.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner =  Banner::find($id);
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('banner/', $name);
            $banner->banner = $name;
        }
        $banner->save();
        notify()->success('Berhasil Edit Banner');
        return redirect('/merchant/banner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $imagePath = public_path('banner/' . $banner->image_path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $banner->delete();
        notify()->success('Berhasil menghapus Banner');
        return redirect('/merchant/banner');
    }
}
