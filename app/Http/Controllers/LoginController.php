<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function signUp(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:7'
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal berisi 7 karakter'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('berhasil','User berhasil ditambahkan silahkan signIn');
    }

    public function signIn(Request $request){
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:7'
        ],[
            'email.required' => 'Email wajib diisi',
            'email.exists' => 'Email belum terdaftar silahkan SignUp terlebih dahulu',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal berisi 7 karakter'
        ]);

        $cre = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($cre)){
            return redirect('/dashboard');
        }
        return redirect()->back()->with('error','password atau email salah mohon inputkan data dengan benar');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('berhasil','Anda berhasil logout');
    }

    public function dashboard(){
        return view('home');
    }


}
