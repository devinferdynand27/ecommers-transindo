<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KantorController extends Controller
{
    public function index(){
        return view('merchant.kantor.index');
    }
    public function data_user(Request $request,$id){
        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();
        notify()->success('Berhasil Mengubah Profile');
        return redirect('/merchant/kantor');
    }
    public function data_kantor(Request $request,$id){
        $user = User::find($id);
        $user->company_name = $request->company_name;
        $user->company_address = $request->company_address;
        $user->contact = $request->contact;
        $user->description = $request->description;
        $user->save();
        notify()->success('Berhasil Mengubah Profile');
        return redirect('/merchant/kantor');
    }
}
