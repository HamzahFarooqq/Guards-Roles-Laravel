<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('users.user_register');
    }

    public function create(Request $request)
    {
        // dd($request->all());

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        // session()->flash('user_data', $user);

        return redirect()->to('/login');
    }


    public function dashboard()
    {
        return view('users.user_dash');
    }



    public function login()
    {
        return view('login');
    }



    public function login_create(Request $request)
    {


        $cred = $request->all();


        $cred = [
            'email' => $cred['email'],
            'password' => $cred['password'],
        ];

        if(Auth::attempt($cred))
        {

            // $request->session()->put('user_id', $user->id);
            // $userId = $request->session()->get('user_id');
            

            $request->session()->regenerate();

            $user = Auth::user();

            Auth::login($user);
 
            return redirect()->route('user.dashboard');
        }


        elseif (Auth::guard('admin')->attempt($cred))
        {
            
            // $request->session()->regenerate();

            $user = Auth::guard('admin')->user();

            Auth::guard('admin')->login($user);
           
 
            return redirect()->route('admin.dashboard');            

        }

        else {
            return redirect()->back()->with('error', 'plz enter correct details !!!!');
        }
 
       
    }


    public function show ($id)
    {
        $user = user::find($id);

        return $user;
    }



    
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect('/');
    }


}
