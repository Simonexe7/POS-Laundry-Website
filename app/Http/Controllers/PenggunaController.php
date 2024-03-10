<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;

class PenggunaController extends Controller
{

    public function index()
    {   
        
        $data['pengguna'] = User::leftJoin('outlet', 'user.id_outlet', 'outlet.id')
        ->select('user.*', 'outlet.nama_outlet')
        ->get();
        return view('pengguna.index')->with($data);
    }

    public function e_pengguna($id)
    {   
        $user = User::findorfail($id);
        $outlet = Outlet::findorfail($user->id_outlet);
        return view('pengguna.update', compact('user', 'outlet'))->with('success');
    }

    public function u_pengguna(UpdatePenggunaRequest $request, $id)
    {
        // return $request;
        $user = User::findorfail($id);
        $user->update($request->all());

        return redirect('pengguna')->with('success', 'Data telah berhasil diupdate!');
    }

}
