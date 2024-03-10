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
              <form action="{{ url('u_guru/'.$guru->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="namaGuru" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" name="nama" id="namaGuru" value="{{ $guru->nama }}" required>
                    <div class="invalid-feedback">
                      Tolong isi nama Guru
                    </div>
                </div>
                <div class="mb-3">
                    <label for="namaGuru" class="form-label">NIP</label>
                    <input type="text" class="form-control" name="nip" id="namaGuru" value="{{ $guru->nip }}" required>
                    <div class="invalid-feedback">
                      Tolong isi NIP
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="jenisKelamin" required>
                      <option selected>{{ $guru->jenisKelamin }}</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                    <div class="invalid-feedback">
                      Tolong pilih jenis kelamin Guru
                    </div>
                </div>
                <div class="mb-3">
                    <label for="namaGuru" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatLahir" id="namaGuru" value="{{ $guru->tempatLahir }}" required>
                    <div class="invalid-feedback">
                      Tolong isi Tempat Lahir
                    </div>
                </div>
                <div class="mb-3">
                    <label for="namaGuru" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggalLahir" id="namaGuru" value="{{ $guru->tanggalLahir }}" required>
                    <div class="invalid-feedback">
                      Tolong isi Tanggal Lahir
                    </div>
                </div>
                <div class="mb-3">
                    <label for="namaGuru" class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" id="namaGuru" value="{{ $guru->nik }}" required>
                    <div class="invalid-feedback">
                      Tolong isi NIK
                    </div>
                </div>
                <div class="mb-3">
                    <label for="namaGuru" class="form-label">Agama</label>
                    <input type="text" class="form-control" name="agama" id="namaGuru" value="{{ $guru->agama }}" required>
                    <div class="invalid-feedback">
                      Tolong isi Agama
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $guru->alamat }}" required>
                    <div class="invalid-feedback">
                      Tolong isi alamat Guru
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Keaktifan</label>
                    <select class="form-select" aria-label="Default select example" name="isActive" required>
                      <option selected>{{ $guru->isActive }}</option>
                      <option value="1">Aktif</option>
                      <option value="0">Nonaktif</option>
                    </select>
                    <div class="invalid-feedback">
                      Tolong pilih status Keaktifan
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" name="isDeleted" required>
                      <option selected>{{ $guru->isDeleted }}</option>
                      <option value="1">Ada</option>
                      <option value="0">Terhapus</option>
                    </select>
                    <div class="invalid-feedback">
                      Tolong pilih Status 
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                  <a href="{{ url('/guru') }}">
                    <button class="btn btn-secondary me-md-2" type="button">Batal</button>
                  </a>
                  <button class="btn btn-success" type="submit">Simpan</button>
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