<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;
use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{

    public function index()
    {
        $data['outlet'] = Outlet::get();
        return view('outlet.index')->with($data);
    }

    public function t_outlet()
    {
        $data['outlet'] = Outlet::get();
        return view('outlet.form')->with($data);
    }

    public function store(StoreOutletRequest $request)
    {
        Outlet::create($request->all());
        return redirect('outlet')->with('success', 'Data telah berhasil ditambahkan!');
    }

    public function e_outlet($id)
    {
        $outlets = Outlet::findorfail($id);
        return view('outlet.update', compact('outlets'));
    }

    public function update(UpdateOutletRequest $request, $id)
    {
        $outlets = Outlet::findorfail($id);
        $outlets->update($request->all());
        return redirect('outlet')->with('update', 'Data telah berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('outlet')->where('id', $id)->delete();
        return redirect('outlet');
    }
}
