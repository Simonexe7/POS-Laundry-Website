@extends('templates.layout')

@push('style')
@endpush

@section('transaksi', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Transaksi</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Transaksi</h6>
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
              <a href="{{ url('/t_transaksi') }}">
                <button type="button" class="btn btn-info btn-sm">Tambah Transaksi</button>
              </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-hover" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Transaksi</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pelanggan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Outlet</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Batas Waktu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dibayar</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transaksi as $t)
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $t->tgl }}</span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          @if($t->jenis_kelamin == 'Pria' )
                            <img src="../assets/img/male.jpg" class="avatar avatar-sm me-3" alt="Pria">
                          @elseif($t->jenis_kelamin == 'Wanita')
                            <img src="../assets/img/female.jpg" class="avatar avatar-sm me-3" alt="Wanita">
                          @endif
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $t->nama }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $t->nama_outlet }}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $t->batas_waktu }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Rp.{{ $t->total }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if ($t->status === 'baru')
                        <span class="badge badge-sm bg-gradient-info">Baru</span>
                        @elseif ($t->status === 'proses')
                        <span class="badge badge-sm bg-gradient-danger">Proses</span>
                        @elseif ($t->status === 'selesai')
                        <span class="badge badge-sm bg-gradient-success">Selesai</span>
                        @elseif ($t->status === 'diambil')
                        <span class="badge badge-sm bg-gradient-secondary">Diambil</span>
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if ($t->dibayar === 'dibayar')
                        <span class="badge badge-sm bg-gradient-success">Dibayar</span>
                        @elseif ($t->dibayar === 'belum_bayar')
                        <span class="badge badge-sm bg-gradient-danger">Belum Bayar</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ url('e_transaksi/'.$t->id) }}">
                          <span class="badge badge-sm bg-gradient-info">Detail</span>
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
@elseif ($message = Session::get('kasir'))
<script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
</script>
@endif
@endpush