@extends('templates.layout')

@push('style')
@endpush

@section('pelanggan', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pelanggan</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Pelanggan</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Edit Pelanggan</h6>
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
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h3 class="font-weight-bolder">Form Edit Pelanggan</h3>
            </div>
            <div class="card-body">
              <form action="{{ url('u_pelanggan/'.$member->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama" id="namaPelanggan" value="{{ $member->nama }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $member->alamat }}">
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                      <option selected>{{ $member->jenis_kelamin }}</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="telp" class="form-label">No. telp</label>
                    <input type="text" class="form-control" name="tlp" id="telp" value="{{ $member->tlp }}">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                  <a href="{{ url('/pelanggan') }}">
                    <button class="btn btn-secondary me-md-2" type="button">Batal</button>
                  </a>
                  <button class="btn btn-info" type="submit">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
        
@endsection

@push('script')
<script>

</script>
@endpush