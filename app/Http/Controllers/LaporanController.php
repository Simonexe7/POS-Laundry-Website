<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index(){
        return view('laporan.index');
    }

    public function cetak(Request $request)
    {
        if( $request->radio === 'periodeData'){
            $tglAwal = $request->tglAwal;
            $tglAkhir = $request->tglAkhir;

            $data['laporan'] = Transaksi::leftJoin('member', 'transaksi.id_member', 'member.id')
            ->leftJoin('outlet', 'transaksi.id_outlet', 'outlet.id')
            ->select('transaksi.*', 'member.nama', 'outlet.nama_outlet')
            ->whereBetween('tgl', [$tglAwal, $tglAkhir])
            ->get();
        } else {
            $data['laporan'] = Transaksi::leftJoin('member', 'transaksi.id_member', 'member.id')
            ->leftJoin('outlet', 'transaksi.id_outlet', 'outlet.id')
            ->select('transaksi.*', 'member.nama', 'outlet.nama_outlet')
            ->get();
        }
        return view('laporan.cetak')->with($data);
    }
}
