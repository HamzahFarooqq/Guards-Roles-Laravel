<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function register()
    {
        return view('admins.admin_register');
    }


    public function create(Request $request)
    {
        // dd($request->all());

        $admin = Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->to('/login');

        // session()->flash('admin_data', $admin);

        // return redirect()->route('admin.dashboard');
        // return redirect()->to('/admin/dashboard');
    }

    public function dashboard()
    {
        return view('admins.admin_dash');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
