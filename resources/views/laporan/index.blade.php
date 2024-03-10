@extends('templates.layout')

@push('style')
@endpush

@section('laporan', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Laporan</h6>
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
              <h6>Laporan</h6>
            </div>
            <div class="card-body pt-3 pb-2">
            <form action="{{ url('cetak_laporan') }}">
                `<div class="form-check">
                  <input class="form-check-input" type="radio" name="radio" id="semuaData" value="semuaData" checked>
                  <label class="form-check-label" for="semuaData">
                      Semua data
                  </label>
                </div>
              </div>
              <div class="card-body pt-2 pb-2">
                <div class="row mx-0">
                  <div class="form-check col-2">
                    <input class="form-check-input" type="radio" name="radio" id="periodeData" value="periodeData" checked>
                    <label class="form-check-label" for="periodeData">
                        Tanggal
                    </label>
                  </div>
                  <div class="col-md-2">
                      <input type="date" name="tglAwal" class="form-control tgl"> 
                  </div>
                  <div class="col-sm-1 text-center"><i class="fas fa-minus mt-3"></i></div>
                  <div class="col-md-2">
                      <input type="date" name="tglAkhir" class="form-control tgl"> 
                  </div>
                </div>
                <button type="submit" class="btn btn-info mt-3">Tampilkan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
        
@endsection

@push('script')
<script>
$('#semuaData').on('click', function (){
  $('.tgl').attr('disabled', 'disabled')
})
$('#periodeData').on('click', function (){
  $('.tgl').removeAttr('disabled', 'disabled')
})
</script>
@if ($message = Session::get('owner'))
<script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
</script>
@endif
@endpush