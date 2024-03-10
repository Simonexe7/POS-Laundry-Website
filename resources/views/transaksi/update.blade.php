@extends('templates.layout')

@push('style')
@endpush

@section('transaksi', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Transaksi</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Transaksi</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Detail Transaksi</h6>
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
              <h3 class="font-weight-bolder">Form Detail Transaksi</h3>
            </div>
            <div class="card-body">
              <form action="{{ url('u_transaksi/'.$transaksi->id) }}" method="post">
                @csrf
              <div class="input-group mb-1"> 
                <span class="input-group-text" id="inputGroup-sizing-default">ID Transaksi :</span>
                <input type="text" class="form-control" value="{{ $transaksi->id }}" readonly>
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="inputGroup-sizing-default">Nama Pelanggan :</span>
                <input type="text" class="form-control" value="{{ $member->nama }}" readonly>
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="inputGroup-sizing-default">Alamat :</span>
                <input type="text" class="form-control" value="{{ $member->alamat }}" readonly>
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="inputGroup-sizing-default">No. Telp :</span>
                <input type="text" class="form-control" value="{{ $member->tlp }}" readonly>
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="inputGroup-sizing-default">Outlet :</span>
                <input type="text" class="form-control" value="{{ $outlet->nama_outlet }}" readonly>
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Transaksi :</span>
                <input type="text" class="form-control" value="{{ $transaksi->tgl }}" readonly>
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="inputGroup-sizing-default">Batas Waktu :</span>
                <input type="text" class="form-control" value="{{ $transaksi->batas_waktu }}" readonly>
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="inputGroup-sizing-default">Nama Kasir :</span>
                <input type="text" class="form-control" value="{{ $user->namaUser }}" readonly>
              </div>
                <div>
                  <div class="mt-4 row">
                  <div class="col-md-4">
                    <label for="tglBayar" class="form-label">Tanggal Bayar</label>
                    <input type="date" class="form-control" name="tgl_bayar" id="tglBayar" value="{{ $transaksi->tgl_bayar }}" required>
                  </div>
                  <div class="col-md-4">
                    <label for="statusTransaksi" class="form-label">Status</label>
                      <select class="form-select" name="status" aria-label="Default select example" required>
                        <option selected value="{{ $transaksi->status }}">{{ $transaksi->status }}</option>
                        <option value="baru">Baru</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="diambil">Diambil</option>
                      </select>
                  </div>
                  <div class="col-md-4">
                    <label for="statusTransaksi" class="form-label">Dibayar</label>
                      <select class="form-select" name="dibayar" aria-label="Default select example" required>
                        <option selected value="{{ $transaksi->dibayar }}">{{ $transaksi->dibayar }}</option>
                        <option value="belum_bayar">Belum Bayar</option>
                        <option value="dibayar">Dibayar</option>
                      </select>
                  </div>
                  <table class="table-bordered mt-4">
                    <thead>
                      <tr class="bg-dark text-white text-center">
                        <th>Paket</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($dettransaksi as $d)
                      <tr>
                        <td>{{ $d->nama_paket }}</td>
                        <td>Rp.{{ $d->harga }},-</td>
                        <td>{{ $d->qty }} Kg</td>
                        <td>Rp.{{ $d->qty * $d->harga }},-</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="3" class="bg-dark text-white text-center">Total Harga</td>
                        <td>Rp.{{ $transaksi->total }},-</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                  <a href="{{ url('/transaksi') }}">
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