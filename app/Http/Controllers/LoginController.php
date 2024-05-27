<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->roles == 'Merchant') {
                return redirect('/merchant/dashboard');
                notify()->success('Berhasil Login');
            } else {
                return redirect('/');
                notify()->success('Berhasil Login');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function regsiter_merchant(Request $request)
    {
        $register_merchant =  new User();
        $register_merchant->name  = $request->name;
        $register_merchant->email = $request->email;
        $register_merchant->password = Hash::make($request->password);
        $register_merchant->company_name = $request->company_name;
        $register_merchant->company_address = $request->company_address;
        $register_merchant->contact = $request->contact;
        $register_merchant->description = $request->description;
        $register_merchant->roles = 'Merchant';
        $register_merchant->save();
        return redirect('/login');
        notify()->success('Berhasil!!');
    }

    public function regsiter_custumer(Request $request)
    {
        $register_custumer =  new User();
        $register_custumer->name  = $request->name;
        $register_custumer->email = $request->email;
        $register_custumer->password = Hash::make($request->password);
        $register_custumer->company_name = '-';
        $register_custumer->company_address = '-';
        $register_custumer->description = '-';
        $register_custumer->contact = $request->contact;
        $register_custumer->roles = 'Custumer';
        $register_custumer->save();

        return redirect('/login');
        notify()->success('Berhasil!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
        notify()->success('Berhasil Logout ');
    }
}
