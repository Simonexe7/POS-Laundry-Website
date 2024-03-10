<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Paket;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $data['transaksi'] = Transaksi::leftJoin('member', 'transaksi.id_member', 'member.id')
        ->leftJoin('outlet', 'transaksi.id_outlet', 'outlet.id')
        ->select('transaksi.*', 'member.nama', 'member.jenis_kelamin', 'outlet.nama_outlet')
        ->get();
        return view('transaksi.index')->with($data);
    }

    public function t_transaksi()
    {   
        $pelanggan = Member::all();
        $paket = Paket::all();
        $outlet = Outlet::all();
        $user = Auth::user();   
        return view('transaksi.form', compact('outlet', 'paket', 'pelanggan', 'user'));
    }

    public function store(storeTransaksiRequest $request, )
    {
        
        $transaksi = Transaksi::create($request->all());

        $id_paket = $request->id_paket;
        $qty = $request->qty;

        foreach ($id_paket as $i => $v) {
            $data['id_transaksi'] = $transaksi->id;
            $data['id_paket'] = $id_paket[$i];
            $data['qty'] = $qty[$i];
            $input_detail_transaksi = DetailTransaksi::create($data);
        }
        // DetailTransaksi::create($request->all());
        // echo($request);
        return redirect('transaksi')->with('success', 'Data telah berhasil ditambahkan!');  
    }

    public function e_transaksi($id)
    {   
        $transaksi = Transaksi::findorfail($id);
        $member = Member::findorfail($transaksi->id_member);
        $outlet = Outlet::findorfail($transaksi->id_outlet);
        $dettransaksi= DB::table('detail_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id')
        ->select('paket.nama_paket','paket.harga as harga','detail_transaksi.qty as qty')->where('id_transaksi',$transaksi->id)
        ->get();
        // $dTransaksi = DetailTransaksi::findorfail($transaksi->id_transaksi);
        // $paket = Paket::findorfail($dTransaksi->id_paket);
        // $paket = Paket::findorfail($dettransaksi->id_paket);
        $user = User::findorfail($transaksi->id_user);
        return view('transaksi.update', compact('transaksi', 'member', 'outlet', 'user','dettransaksi'));
    }

    public function u_transaksi(UpdateTransaksiRequest $request, $id)
    {
        $transaksi = Transaksi::findorfail($id);
        $transaksi->update($request->all());

        return redirect('transaksi')->with('success', 'Data telah berhasil diupdate!');
    }

}
