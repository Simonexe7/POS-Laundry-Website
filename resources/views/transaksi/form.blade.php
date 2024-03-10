@extends('templates.layout')

@push('style')
@endpush

@section('transaksi', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Transaksi</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Transaksi</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Tambah Transaksi</h6>
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
              <h3 class="font-weight-bolder">Form Tambah Transaksi</h3>
            </div>
            <div class="card-body">
              <form action="transaksi" id="formTransaksi" method="post" >
              @csrf
              <div class="mb-3">
                    <input type="hidden" id="idPelanggan" name="id_member" readonly>
                </div>
                <div class="mb-2 row">
                    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="nama_pelanggan" id="namaPelanggan" readonly>
                    </div>
                    <div class="d-grid col-md-2">
                    <button type="button" class="btn bg-gradient-info" id="tambahPelangganBtn" data-bs-toggle="modal" data-bs-target="#pelangganModal">
                      Search
                    </button>
                    </div>
                </div>
                <div class="mb-2 row">
                  <div class="col-md-8">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="telp" class="form-label">No. Telp</label>
                    <input type="text" class="form-control" id="telp" readonly>
                  </div>
                </div>
                <!-- Button trigger modal -->
                <div class="d-grid gap-3 mx-auto mt-4">
                  <button type="button" class="btn bg-gradient-info rounded-pill" id="tambahPelangganBtn" data-bs-toggle="modal" data-bs-target="#paketModal">
                    Tambah Paket
                  </button>
                </div>
                <div id="paket">
                  <div class="mb-2 row">
                    <div class="col-md-5 kolom">
                      <label for="paket" class="form-label">Paket</label>
                      <!-- <input type="text" class="form-control paket" name="paket" id="paket" readonly> -->
                    </div>
                    <div class="col-md-2 kolom">
                      <label for="harga" class="form-label">Harga</label>
                      <!-- <input type="number" class="form-control harga" name="harga" id="harga" readonly> -->
                    </div>
                    <div class="col-md-2 kolom">
                      <label for="berat" class="form-label">Berat/kg</label>
                      <!-- <input type="number" class="form-control qty" name="berat" id="berat" required> -->
                    </div>
                    <div class="col-md-2 kolom">
                      <label for="subTotal" class="form-label">Sub Total</label>
                      <!-- <input type="number" class="form-control subTotal" name="subTotal" id="subTotal" readonly> -->
                    </div>
                    <div class="col-md-1">
                    <label for="subTotal" class="form-label">Remove</label>
                     
                    </div>
                </div>
                </div>
                <div class="mb-3" id="rowKosong">
                  <input type="text" class="form-control text-center" id="inputKosong" readonly value="BELUM ADA DATA">
                </div>
                <div class="mb-3">
                    <label for="totalHarga" class="form-label">Total</label>
                    <input type="text" class="form-control" id="totalHarga" name="total" readonly>
                </div>
                <div class="mb-3 row">
                  <div class="col-md-4">
                    <label for="Tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="Tanggal" value="{{ date('Y-m-d') }}" name="tgl" required>
                    <div class="invalid-feedback">
                      Tolong masukkan tanggal transaksi
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="btsWaktu" class="form-label">Batas Waktu</label>
                    <input type="date" class="form-control" id="btsWaktu" value="{{ date('Y-m-d') }}" name="batas_waktu" required>
                    <div class="invalid-feedback">
                      Tolong isi batas waktu transaksi
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="tglBayar" class="form-label">Tanggal Bayar</label>
                    <input type="date" class="form-control" id="tglBayar" value="{{ date('Y-m-d') }}" name="tgl_bayar" required>
                    <div class="invalid-feedback">
                      Tolong isi tanggal bayar transaksi
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-md-6"> 
                    <label for="statusTransaksi" class="form-label">Status</label>
                    <input type="text" class="form-control" id="statusTransaksi" name="status" value="Baru" readonly>
                  </div>
                  <div class="col-md-6">
                    <label for="pembayaranTransaksi" class="form-label">Dibayar</label>
                      <select class="form-select" name="dibayar" aria-label="Default select example" required>
                        <option selected></option>
                        <option value="dibayar">Dibayar</option>
                        <option value="belum_bayar">Belum bayar</option>
                      </select>
                      <div class="invalid-feedback">
                      Tolong pilih status pembayaran
                    </div>
                  </div>
                </div>
                  <div class="mb-2 row">
                    <div class="col-md-6">
                    <label for="outletTransaksi" class="form-label">Outlet</label>
                      <select class="form-select" name="id_outlet" aria-label="Default select example" required>
                      @foreach($outlet as $o)
                        <option value="{{ $o->id }}">{{ $o->nama_outlet }}</option>
                      @endforeach
                      </select>
                      <div class="invalid-feedback">
                        Tolong pilih outlet
                      </div>
                    </div>
                    <input type="hidden" name="id_user" value="{{ $user->id }}">
                    <div class="col-md-6">
                    <label for="userTransaksi" class="form-label">Nama Kasir</label>
                    <input type="text" class="form-control" id="userTransaksi" value="{{ $user->namaUser }}" readonly>
                    </div>
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
    @include('transaksi.pelanggan')
    @include('transaksi.paket')
@endsection

@push('script')
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
  var totalHarga=0;
  var count=0;
  function tambahBarang(a){
    count++;
    var d = $(a).closest('tr');
    var idPaket = d.find('.idPaket').val();
    var namaPaket = d.find('td:eq(0)').text();
    namaPaket=namaPaket.trim();
    var hargaPaket = d.find('td:eq(1)').text();
    hargaPaket=hargaPaket.trim();
    var data = '';
    var kolom = $('#inputKosong').val();
    data += '<div class="mb-2 row" id="baris'+count+'">'
    data += '   <input type="hidden" class="id" name="id_paket[]" value="'+idPaket+'">';
    data += ' <div class="col-md-5">'
    data += '   <input type="text" class="form-control paket" id="paket'+count+'" value="'+namaPaket+'" readonly>';
    data += ' </div>'
    data += ' <div class="col-md-2">'
    data += '   <input type="number" class="form-control harga" id="harga'+count+'" value="'+hargaPaket+'" readonly>';
    data += ' </div>'
    data += ' <div class="col-md-2">'
    data += '   <input type="number" class="form-control qty" value="1" min="1" name="qty[]"  data-baris="'+count+'" id="berat"'+count+' required>'
    data += ' </div>'
    data += ' <div class="col-md-2">'
    data += '   <input type="number" class="form-control subTotal" id="subTotal'+count+'" value="'+hargaPaket+'" readonly>'
    data += ' </div>'
    data += ' <div class="col-md-1">'
    data += '   <button type="button" class="btn bg-gradient-danger btn-aksi" data-baris="'+count+'" id="btnHapus">'
    data += '    <i class="fas fa-times fa-2x"></i>'
    data += '   </button>'
    data += ' </div>'
    data += '</div>'
    if(kolom == 'BELUM ADA DATA') $('#inputKosong').remove();

    $('#paket').append(data);
    getTotalBayar(hargaPaket);
    $('#paketModal').modal('hide');
  }

  function getTotalBayar(x){
    totalHarga += parseInt(x);
      $('#totalHarga').val(totalHarga);
  }
  
  $(document).ready(function(){
    $('#tblTransaksi').DataTable()
    // Pemilihan Pelanggan
    $('#pelangganModal').on('click','.pilihPelangganBtn',function(){
        var idPelanggan = $(this).data('id');
        var namaPelanggan = $(this).data('nama');
        var alamatPelanggan = $(this).data('alamat');
        var tlpPelanggan = $(this).data('telp');
        $idPelanggan = idPelanggan;
        $('#idPelanggan').val(idPelanggan);
        $('#namaPelanggan').val(namaPelanggan);
        $('#alamat').val(alamatPelanggan);
        $('#telp').val(tlpPelanggan);
        $('#pelangganModal').modal('hide');
      });

    // Pemilihan Paket
    $('#tblPaket').on('click','.pilihPaketBtn',function(){
        tambahBarang(this);
      });
    // Kalkulasi Total
    $('#paket').on('change', '.qty', function(){
      var qty = $(this).val();
      var baris = $(this).data('baris');
      var hargaBarang = $(this).closest('#paket').find('#harga'+baris+'').val();
      var subTotalAwal = $(this).closest('#paket').find('#subTotal'+baris+'').val();
      var subTotal = qty * hargaBarang;
      getTotalBayar(subTotal - subTotalAwal);
      $(this).closest('#paket').find('#subTotal'+baris+'').val(subTotal);
    });
    // klik hapus
    $('#paket').on('click','#btnHapus', function(){
      var baris = $(this).data('baris');
      var subTotalAwal = $(this).closest('#paket').find('#subTotal'+baris+'').val();
      totalHarga -= subTotalAwal;
      var hapus = $(this).closest('.row').remove();
      $('#totalHarga').val(totalHarga);
      count--;
        if(count < 1)
          $('#rowKosong')
            .append('<input type="text" class="form-control text-center" id="inputKosong" readonly value="BELUM ADA DATA">');
    })

  })
</script>
@endpush