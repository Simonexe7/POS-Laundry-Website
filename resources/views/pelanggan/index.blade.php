@extends('templates.layout')

@push('style')
@endpush

@section('pelanggan', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pelanggan</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Data Pelanggan</h6>
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
            <div class="card-header pb-0 d-flex justify-content-between">
              <a href="{{ url('/t_pelanggan') }}">
                <button type="button" class="btn btn-info btn-sm">Tambah Pelanggan</button>
              </a>
              <div class="d-inline d-md-flex justify-content-md-end">
                <a href="{{ url('cetak_pelanggan') }}" target="_blank" class="btn btn-danger btn-aksi me-md-2">
                  <i class="fas fa-print fa-lg"></i> Cetak
                </a>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-hover" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Telp</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($member as $m)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          @if($m->jenis_kelamin == 'Pria' )
                            <img src="../assets/img/male.jpg" class="avatar avatar-sm me-3" alt="Pria">
                          @elseif($m->jenis_kelamin == 'Wanita')
                            <img src="../assets/img/female.jpg" class="avatar avatar-sm me-3" alt="Wanita">
                          @endif
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $m->nama }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs text-secondary mb-0">{{ $m->alamat }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($m->jenis_kelamin == 'Pria' )
                          <span class="badge badge-sm bg-gradient-dark">Pria</span>
                        @elseif($m->jenis_kelamin == 'Wanita')
                          <span class="badge badge-sm bg-gradient-danger">Wanita</span>
                        @endif
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $m->tlp }}</span>
                      </td>
                      <td>
                        <a href="{{ url('e_pelanggan/'.$m->id) }}" class="btn btn-info btn-aksi mb-0">
                          Edit
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        
@endsection

@push('script')
<script>
$('#data-table').DataTable();
</script>
@if ($message = Session::get('success'))
<script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
</script>
@elseif ($message = Session::get('update'))
<script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
</script>
@endif
@endpush