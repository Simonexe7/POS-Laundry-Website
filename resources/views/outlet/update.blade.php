@extends('templates.layout')

@push('style')
@endpush

@section('outlet', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Outlet</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Outlet</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Edit Outlet</h6>
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
          <h3 class="font-weight-bolder">Form Edit Outlet</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('u_outlet/'.$outlets->id) }}" method="POST">
              @method('PATCH')
              @csrf
              <div class="mb-3">
                  <label for="namaOutlet" class="form-label">Nama Outlet</label>
                  <input type="text" class="form-control" id="namaOutlet" placeholder="Masukkan Nama Outlet" name="nama_outlet" value="{{ $outlets->nama_outlet }}">
              </div>
              <div class="mb-3">
                  <label for="alamatOutlet" class="form-label">Alamat Outlet</label>
                  <input type="text" class="form-control" id="alamatOutlet" placeholder="Masukkan Alamat Outlet" name="alamat" value="{{ $outlets->alamat }}">
              </div>
              <div class="mb-3">
                  <label for="noTelpOutlet" class="form-label">No. telp Outlet</label>
                  <input type="text" class="form-control" id="noTelpOutlet" placeholder="Masukkan No. telp Outlet" name="telp" value="{{ $outlets->telp }}">
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                <a href="{{ url('/outlet') }}">
                  <button class="btn btn-secondary me-md-2" type="button">Batal</button>
                </a>
                <button class="btn btn-success" type="submit">Simpan</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    </div>
@endsection

@push('script')
@endpush