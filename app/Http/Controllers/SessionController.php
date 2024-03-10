<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function index(){
        if ($user = Auth::user()) {
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/');
                    break;
                
                case 'kasir':
                    return redirect()->intended('transaksi');
                    break;
                
                case 'owner':
                    return redirect()->intended('laporan');
                    break;
            }
        }
        return view('login.index');
    }
    public function cekLogin(AuthRequest $request){
        $credential = $request->only('username', 'password');
        $request->session()->regenerate();
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/')->with('admin', 'Selamat datang '.$user->namaUser.'!');
                    break;
                
                case 'kasir':
                    return redirect()->intended('transaksi')->with('kasir', 'Selamat datang '.$user->namaUser.'!');
                    break;
                
                case 'owner':
                    return redirect()->intended('laporan')->with('owner', 'Selamat datang '.$user->namaUser.'!');
                    break;
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'nofound' => 'Username atau password salah'
        ])->onlyInput('username');
    }
    
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Berhasil Logout');
    }
    public function register(){
        $outlet = Outlet::all();
        return view('register.index', compact('outlet'));
    }
    public function create(Request $request){
        
        $data = [
            'namaUser' => $request->namaUser,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_outlet' => $request->id_outlet,
            'role' => $request->role
        ];
        User::create($data);
        
        $user = [
            'namaUser' => $request->namaUser,
            'username' => $request->username,
            'password' => $request->username,
            'id_outlet' => $request->id_outlet,
            'role' => $request->role
        ];

        return redirect('login')->with('register', 'Berhasil membuat akun');

    }
}
