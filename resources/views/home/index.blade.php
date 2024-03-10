@extends('templates.layout')

@push('style')
@endpush

@section('home', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
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
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pelanggan</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $ttl_pelanggan }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-satisfied text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Outlet</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $ttl_outlet }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Kasir</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $ttl_kasir }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Order</p>
                    <h5 class="font-weight-bolder mb-0">
                    {{ $ttl_transaksi }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="row mt-4">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Pelanggan Baru</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-hover">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Telp</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($memberBaru as $member)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          @if($member->jenis_kelamin == 'Pria' )
                            <img src="../assets/img/male.jpg" class="avatar avatar-sm me-3" alt="Pria">
                          @elseif($member->jenis_kelamin == 'Wanita')
                            <img src="../assets/img/female.jpg" class="avatar avatar-sm me-3" alt="Wanita">
                          @endif
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $member->nama }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs text-secondary mb-0">{{ $member->alamat }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($member->jenis_kelamin == 'Pria' )
                          <span class="badge badge-sm bg-gradient-dark">Pria</span>
                        @elseif($member->jenis_kelamin == 'Wanita')
                          <span class="badge badge-sm bg-gradient-danger">Wanita</span>
                        @endif
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $member->tlp }}</span>
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
      <div class="row mt-4">
      <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Order Terbaru</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-hover">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Transaksi</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pelanggan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Outlet</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Batas Waktu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dibayar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orderBaru as $o)
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $o->tgl }}</span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          @if($o->jenis_kelamin == 'Pria' )
                            <img src="../assets/img/male.jpg" class="avatar avatar-sm me-3" alt="Pria">
                          @elseif($o->jenis_kelamin == 'Wanita')
                            <img src="../assets/img/female.jpg" class="avatar avatar-sm me-3" alt="Wanita">
                          @endif
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $o->nama }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $o->nama_outlet }}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $o->batas_waktu }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Rp.{{ $o->total }},-</span>
                      </td>
                      <td class="align-middle text-center">
                        @if ($o->status === 'baru')
                        <span class="badge badge-sm bg-gradient-info">Baru</span>
                        @elseif ($o->status === 'proses')
                        <span class="badge badge-sm bg-gradient-danger">Proses</span>
                        @elseif ($o->status === 'selesai')
                        <span class="badge badge-sm bg-gradient-success">Selesai</span>
                        @elseif ($o->status === 'diambil')
                        <span class="badge badge-sm bg-gradient-secondary">Diambil</span>
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if ($o->dibayar === 'dibayar')
                        <span class="badge badge-sm bg-gradient-success">Dibayar</span>
                        @elseif ($o->dibayar === 'belum_bayar')
                        <span class="badge badge-sm bg-gradient-danger">Belum Bayar</span>
                        @endif
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
@if ($message = Session::get('admin'))
<script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
</script>
@endif
@endpush