<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

use Session;

class LoginController extends Controller
{
    use ValidatesRequests;

    public function login()
    { 
        if (Auth::check()) 
        { 
            return redirect('home'); 
        }
        else 
        { 
            return view('login/login'); 
        }
    } 
    
    public function loginaksi(Request $request)
    { 
        $data = [ 
            'email' => $request->input('email'), 
            'password' => $request->input('password'), 
        ]; 
        
        if (Auth::Attempt($data)) 
        { 
            return redirect('home'); 
        }
        
        else 
        { 
            Session::flash('error', 'Email atau Password Salah'); 
            return redirect('/login'); 
        } 
    } 

    public function registeraksi(Request $request)
    {
        // Validasi data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        // Simpan user baru
        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->input('role', 'Administrator'),
            'password' => bcrypt($request->password)
        ]);

        // Redirect ke halaman login atau home
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
    
    public function logoutaksi() 
    { 
        Auth::logout();
        return redirect('/');
    }

    public function register() {
        return view('login/register');
    }
    

}