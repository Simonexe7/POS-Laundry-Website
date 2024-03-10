@extends('templates.layout')

@push('style')
@endpush

@section('paket', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Paket</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Paket Cucian</h6>
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
    @foreach ($paket as $p)
    <div class="row mt-4">
      <div class="card z-index-2">
        <div class="card-header pb-0 d-flex justify-content-between">
          <h3 class="font-weight-bolder">{{ $p->nama_paket }}</h3>
          @if ($p->nama_outlet == 'Semua Outlet' )
            <h6 class="text-danger">Tersedia di Semua Outlet</h6>
          @else
            <h6 class="text-danger">Hanya tersedia di {{ $p->nama_outlet }}</h6>
          @endif
        </div>
        <div class="card-body d-flex justify-content-between">
        <div class="col-4">
          <p class="card-text ">{{ $p->keterangan }}</p>
        </div>
        <div class="col-2 mx-auto text-center">
          <h4>Rp.{{ $p->harga }}/kg</h4>
        </div>
          <div class="d-grid justify-content-md-end">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="{{ url('e_paket/'.$p->id) }}" class="d-grid gap-2">
                <button class="btn btn-info me-md-2" type="button"><i class="fas fa-edit fa-2x"></i></button>
              </a>
              <form action="{{ url('paket/'.$p->id) }}" class="d-inline d-grid gap-2" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-dark" type="submit" id="btnHapus"><i class="fas fa-minus fa-2x"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="position-relative mt-6">
    <div class="position-absolute top-0 start-50 translate-middle">
      <a href="{{ url('/t_paket') }}">
      <button type="button" class="bg-info rounded-circle border-info text-white btn-paket" style="height:70px; width:70px;">
        <i class="fas fa-plus fa-2x"></i>
      </button>
      </a>
    </div>
    </div>
@endsection

@push('script')
<script>
  $(function(){
    $(document).on('click', '#btnHapus', function (e){
      e.preventDefault();
      var link = $(this).attr("action");

      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data akan dihapus dan tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data!'
      }).then((result) => {
        if (result.isConfirmed) {
          $(e.target).closest('form').submit();
          Swal.fire(
            'Terhapus!',
            'Data berhasil dihapus.',
            'success'
          )
        }
      })  
    })
  })
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