@extends('templates.layout')

@push('style')
@endpush

@section('guru', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Guru</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Data Guru</h6>
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
              <a href="{{ url('/t_guru') }}">
                <button type="button" class="btn btn-primary btn-sm">Tambah Guru</button>
              </a>
              <div class="d-inline d-md-flex justify-content-md-end">
                <a href="{{ url('cetak_guru') }}" target="_blank" class="btn btn-danger btn-aksi me-md-2">
                  <i class="fas fa-print fa-lg"></i>
                </a>
                <a href="{{ url('guru-export') }}" class="btn btn-success btn-aksi me-md-2">
                  <i class="fas fa-file-excel"></i> Export
                </a>
                <button class="btn btn-warning btn-aksi" data-bs-toggle="modal" data-bs-target="#importModal">
                  <i class="fas fa-file-excel"></i> Import
                </button>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-hover" id="data-table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIP</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tempat Lahir</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Lahir</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keaktifan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($guru as $g)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $g->nama }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $g->nip }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $g->jenisKelamin }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $g->tempatLahir }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $g->tanggalLahir }}</h6>
                          </div>
                        </div>
                      <td class="align-middle text-center">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $g->nik }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $g->agama }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $g->alamat }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            @if ($g->isActive == '1')
                              <h6 class="mb-0 text-sm">Aktif</h6>
                            @elseif ($g->isActive == '0')
                              <h6 class="mb-0 text-sm">Nonaktif</h6>
                            @endif
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          @if ($g->isDeleted == '1')
                            <h6 class="mb-0 text-sm">Ada</h6>
                          @elseif ($g->isDeleted == '0')
                            <h6 class="mb-0 text-sm">Terhapus</h6>
                          @endif
                          </div>
                        </div>
                      </td>
                      <td>
                        <a href="{{ url('e_guru/'.$g->id) }}" class="btn btn-info btn-aksi mb-0">
                          Edit
                        </a>
                        <form action="{{ url('h_guru/'.$g->id) }}" class="d-inline" method="post" id="delete">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-aksi mb-0" id="btnHapus">
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
    </div>

    @include('guru.import')
        
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
@elseif ($message = Session::get('import'))
<script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
</script>
@elseif ($message = Session::get('error'))
<script>
  Swal.fire(
    'Berhasil!',
    '{{ $message }}',
    'success'
  )
</script>
@endif
@endpush