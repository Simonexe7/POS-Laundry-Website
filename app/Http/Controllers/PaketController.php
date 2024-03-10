<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Outlet;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {   
        $data['paket'] = Paket::leftJoin('outlet', 'paket.id_outlet', '=', 'outlet.id')
        ->select('paket.*', 'outlet.nama_outlet')->get();
        return view('paket.index')->with($data);
    }

    public function create()
    {
        $outlet = Outlet::all();
        return view('paket.form', compact('outlet')); 
    }

    public function store(StorePaketRequest $request)
    {
        Paket::create($request->all());
        // echo($request->nama_paket);
        return redirect('paket')->with('success', 'Data telah berhasil ditambahkan!');
    }

    public function edit($id)
    {   
        $outlet = Outlet::all();
        $paket = Paket::findorfail($id);
        return view('paket.update', compact('paket', 'outlet'));  

    }

    public function update(UpdatePaketRequest $request, $id)
    {
        // return $request;
        $paket = Paket::findorfail($id);
        $paket->update($request->all());

        return redirect('paket')->with('update', 'Data telah berhasil diupdate!');
    }

    public function destroy($id)
    {
        $paket = Paket::findorfail($id);
        $paket->delete();
        return redirect('paket');
    }
}
