<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index()
    {
        $data['member'] = Member::get();
        return view('pelanggan.index')->with($data);
    }

    public function cetak()
    {
        $data['member'] = Member::get();
        return view('pelanggan.cetak')->with($data);
    }

    public function t_pelanggan()
    {
        $data['member'] = Member::get();
        return view('pelanggan.form')->with($data);
    }

    public function store(StoreMemberRequest $request)
    {
        Member::create($request->all());
        return redirect('pelanggan')->with('success', 'Data telah berhasil ditambahkan!');
    }

    public function e_pelanggan($id)
    {
        $member = Member::findorfail($id);
        return view('pelanggan.update', compact('member')); 
    }

    public function update(UpdateMemberRequest $request, Member $member, $id)
    {
        $member = Member::findorfail($id);
        $member->update($request->all());
        return redirect('pelanggan')->with('update', 'Data telah berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('member')->where('id', $id)->delete();
        return redirect('pelanggan');
    }
}
