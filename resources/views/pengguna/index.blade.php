@extends('templates.layout')

@push('style')
@endpush

@section('pengguna', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengguna</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Data Pengguna</h6>
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
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-hover" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Outlet</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pengguna as $u)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $u->namaUser }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $u->username }}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $u->nama_outlet }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if ( $u->role === 'admin')
                        <span class="badge badge-sm bg-gradient-primary">Admin</span>
                        @elseif ( $u->role === 'owner')
                        <span class="badge badge-sm bg-gradient-warning">Owner</span>
                        @elseif ( $u->role === 'kasir')
                        <span class="badge badge-sm bg-gradient-success">Kasir</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ url('/e_pengguna/'.$u->id) }}" class="btn btn-info btn-aksi mb-0">
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
@endif
@endpush