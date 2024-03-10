@extends('templates.layout')

@push('style')
@endpush

@section('paket', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paket</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Paket</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Edit Paket</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <div class="row">
      <div class="card z-index-2">
        <div class="card-header pb-0">
          <h3 class="font-weight-bolder">Form Edit Paket</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('u_paket/'.$paket->id) }}" method="post" id="edit">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Paket</label>
                <input type="text" class="form-control" name="nama_paket" id="nama" value="{{ $paket->nama_paket }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" value="{{ $paket->harga }}">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" rows="3">{{ $paket->keterangan }}</textarea>
            </div>
            <div class="mb-3">
                <label for="outlet" class="form-label">Outlet</label>
                <select class="form-select" name="id_outlet" aria-label="Default select example">
                  @foreach ($outlet as $o)
                    <option value="{{ $o->id }}" @if ($o->id == $paket->id_outlet) selected= "selected"   @endif >{{$o->nama_outlet }}</option>
                  @endforeach
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
              <a href="{{ url('/paket') }}">
                <button class="btn btn-secondary me-md-2" type="button">Batal</button>
              </a>
              <button class="btn btn-info" type="submit">Simpan</button>
            </div>
            </form>
        </div>
      </div>
    </div>
    </div>
@endsection

@push('script')
@endpush