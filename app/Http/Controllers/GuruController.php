<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuruImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Illuminate\Database\QueryException;


class GuruController extends Controller
{
    public function index()
    {
        $data['guru'] = Guru::get();
        return view('guru.index')->with($data);
    }

    public function cetak()
    {
        $data['guru'] = Guru::get();
        return view('guru.cetak')->with($data);
    }

    public function create()
    {
        $guru = Guru::all();
        return view('guru.form', compact('guru')); 
    }

    public function store(StoreGuruRequest $request)
    {
        Guru::create($request->all());
        return redirect('guru')->with('success', 'Data telah berhasil ditambahkan!');   
    }

    public function edit($id)
    {
        $guru = Guru::findorfail($id);
        return view('guru.update', compact('guru'));  
    }

    public function update(UpdateGuruRequest $request, Guru $guru, $id)
    {
        $guru = Guru::findorfail($id);
        $guru->update($request->all());

        return redirect('guru')->with('update', 'Data telah berhasil diupdate!');
    }

    public function destroy($id)
    {
        $guru = Guru::findorfail($id);
        $guru->delete();
        return redirect('guru');
    }

    public function export() 
    {
        return Excel::download(new GuruExport, 'guru.xlsx');
    }

    public function import()
    {
        $file = request()->file('file');
        // Excel::import(new GuruImport, $file);
        // return redirect(request()->segment(1))->with('import', 'Data berhasil diimport!.');
        try {
            Excel::import(new GuruImport, $file);
        } catch (NoTypeDetectedException $e) {
            // flash("Sorry you are using a wrong format to upload files.")->error();
            return redirect(request()->segment(1))->with('import', 'Data berhasil diimport!.');
        }
    }
    
}
