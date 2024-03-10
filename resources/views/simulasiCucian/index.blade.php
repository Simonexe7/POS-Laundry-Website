@extends('templates.layout')

@push('style')
@endpush

@section('simulasi_cucian', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Simulasi Transaksi Cucian</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Simulasi Transaksi Cucian</h6>
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
        <div class="row mt-4">
        <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Simulasi Transaksi Cucian</h6>
            </div>
            <div class="card-body pb-2">
                <form id="form-cucian">
                <div class="mb-3 row">
                  <div class="col-md-6"> 
                    <label for="noTransaksi" class="form-label">No. Transaksi</label>
                    <input type="text" class="form-control" id="noTransaksi" name="no_transaksi">
                  </div>
                  <div class="col-md-6">
                    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama">
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-md-6"> 
                    <label for="noHp" class="form-label">No. HP/WA</label>
                    <input type="text" class="form-control" id="noHp" name="noHp">
                  </div>
                  <div class="col-md-6">
                    <label for="tanggalCuci" class="form-label">Tanggal Cuci</label>
                    <input type="date" class="form-control" name="tgl">
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-md-6"> 
                    <label for="jenisCucian" class="form-label">Jenis Cucian</label>
                    <select class="form-control" name="cucian" id="exampleFormControlSelect1">
                      <option>Standar</option>
                      <option>Express</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="berat" class="form-label">Berat</label>
                    <input type="number" class="form-control" name="berat">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="nama-produk" class="col-form-label"></label>
                    <div class="col-sm-4 mx-auto">
                        <button type="button" class="form-control btn btn-primary" id="btn-insert">Submit</button>
                    </div>
                </div>
                </form> 
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data</h6>
            </div>
            <div class="card-body pb-2">
                <div class="mt-2 mb-2">
                    <button type="button" class="bg-success btn-sm" id="btn-sorting">Urutkan</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="search" name="" id="teks-cari" placeholder="Nama">
                    <button type="button" class="bg-primary btn-aksi" id="btn-search">Cari</button>
                </div>
                <table class="table table-compact table-bordered table-hover" id="data-pegawai">
                <thead>
                    <tr class="bg-dark text-white">
                      <th>ID</th>
                      <th>Nama Pelanggan</th>
                      <th>Kontak</th>
                      <th>Tanggal Cuci</th>
                      <th>Jenis Cucian</th>
                      <th>Berat</th>
                      <th>Diskon</th>
                      <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    
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
  function insertData(dataCucian) {
        const data = $('#form-cucian').serializeArray()
        // console.log(data)

        let newData = {}
        data.forEach(function(item, index){
            let name = item['name'];
            let value = name === 'id' || name === 'berat' ? Number(item['value']) : item['value']
            newData[name] = value
        })
        console.log(newData)

        localStorage.setItem('dataCucian', JSON.stringify([...dataCucian, newData]))
        return newData
    }

    function showData(arr){
      let row = ''
      
      if(arr.length == 0){
        return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
      }
      
      let jmlTotal = jmlBerat = jmlDiskon = 0
      arr.forEach(function(item, index){
        let harga = item['cucian'] === 'Express' ? 10000 : 7500
        let pembayaran = harga * item['berat'] 
        let diskon = pembayaran >= 50000 ? pembayaran * 0.1 : 0
        let tPembayaran = pembayaran - diskon
        jmlBerat += item['berat']
        jmlDiskon += diskon
        jmlTotal += tPembayaran

        row += `<tr>`
        row += `<td>${item['no_transaksi']}</td>`
        row += `<td>${item['nama']}</td>`
        row += `<td>${item['noHp']}</td>`
        row += `<td>${item['tgl']}</td>`
        row += `<td>${item['cucian']}</td>`
        row += `<td>${item['berat']}</td>`
        row += `<td>${diskon}</td>`
        row += `<td>${tPembayaran}</td>`
        row += `</tr>`
      })
      
      row += `<tr class="bg-secondary text-white">`
      row += `<td colspan="5" class="bg-dark text-white text-center">Jumlah Total</td>`
      row += `<td>${jmlBerat}</td>`
      row += `<td>${jmlDiskon}</td>`
      row += `<td>${jmlTotal}</td>`
      row += `</tr>`
      return row
    }

    function sorting(arr,key){
      let i,  j, id, value; 
      for (i = 1; i < arr.length; i++)
      { 
          value = arr[i]; 
          id = arr[i][key]
          j = i - 1; 
          while (j >= 0 && arr[j][key] > id)
          { 
              arr[j + 1] = arr[j]; 
              j = j - 1;  
          } 
          arr[j + 1] = value; 
      } 
      return arr
    }

    function searching(arr, key, teks){
      for(let i= 0; i < arr.length; i++){
        if(arr[i][key] == teks)
          return i
        }
      return -1
    }

    $(function(){
      let dataCucian = JSON.parse(localStorage.getItem('dataCucian')) || []
      $('#data-pegawai tbody').html(showData(dataCucian))

      $('#btn-insert').on('click',function(e){
        e.preventDefault()
        dataCucian.push(insertData(dataCucian)) 
        $('#data-pegawai tbody').html(showData(dataCucian))
      })

        //event klik searching
      $('#btn-search').on('click',function(){
        let teksSearch = $('#teks-cari').val()
        let id = searching(dataCucian,'nama', teksSearch)
        let data = []
        if(id >= 0)
          data.push(dataCucian[id])
        console.log(id)
        console.log(data)
        $('#data-pegawai tbody').html(showData(data))
      })

        $('#btn-sorting').on('click',function(){
        dataCucian = sorting(dataCucian, 'nama')

        $('#data-pegawai tbody').html(showData(dataCucian))
      })
    })
</script>
@endpush