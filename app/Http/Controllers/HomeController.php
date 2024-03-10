<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Transaksi;

class HomeController extends Controller
{
    public function index() {
        $ttl_pelanggan = Member::count('id');
        $ttl_outlet = Outlet::count('id');
        $ttl_kasir = User::where('role', 'kasir')->count('id');
        $ttl_transaksi = Transaksi::count('id');
        $memberBaru = Member::orderBy('created_at', 'desc')->paginate(5);
        $orderBaru = Transaksi::leftJoin('member', 'transaksi.id_member', 'member.id')
        ->leftJoin('outlet', 'transaksi.id_outlet', 'outlet.id')
        ->select('transaksi.*', 'member.nama', 'member.jenis_kelamin','outlet.nama_outlet')
        ->orderBy('created_at')->paginate(5);
        return view('home.index', compact('ttl_pelanggan', 'ttl_outlet', 'ttl_kasir', 'ttl_transaksi', 'memberBaru', 'orderBaru'));
    }

    public function login() {
        return view('login.index');
    }

    public function register() {
        return view('register.index');
    }

}
