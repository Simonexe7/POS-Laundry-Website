@extends('templates.layout')

@push('style')
@endpush

@section('outlet', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Outlet</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Data Outlet</h6>
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
              <a href="{{ url('/t_outlet') }}">
                <button type="button" class="btn btn-info btn-sm">Tambah Outlet</button>
              </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-hover" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Outlet</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Telp</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($outlet as $o)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $o->nama_outlet }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs text-secondary mb-0">{{ $o->alamat }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-secondary mb-0">{{ $o->telp }}</p>
                      </td>
                      <td>
                        <a href="{{ url('e_outlet/'.$o->id) }}" class="btn btn-info btn-aksi mb-0">
                          Edit
                        </a>
                        <form action="{{ url('h_outlet/'.$o->id) }}" class="d-inline" method="post" id="delete">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-dark btn-aksi mb-0" id="btnHapus">
                           Hapus
                          </button>
                        </form>
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