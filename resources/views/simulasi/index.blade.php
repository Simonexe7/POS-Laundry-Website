@extends('templates.layout')

@push('style')
@endpush

@section('simulasi', 'active')
@section('content')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Simulasi</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Simulasi</h6>
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
              <h6>Form</h6>
            </div>
            <div class="card-body pb-2">
                <form id="form-pegawai">
                    <div class="form-group row">
                        <label for="nama-produk" class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="id" placeholder="ID" name="id" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama-produk" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama-produk" class="col-sm-3 col-form-label">Gaji</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="gaji" name="gaji" min="1000000" step="50000" value="1000000" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama-produk" class="col-sm-3 col-form-label">Lembur</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="lembur" name="lembur" min="0" step="1" value="0"
                             required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jkl" value="L">
                                <label class="form-check-label" for="jkl">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jkp" value="P">
                                <label class="form-check-label" for="jkp">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama-produk" class="col-sm-5 col-form-label"></label>
                        <div class="col-sm-2">
                            <button type="submit" class="form-control btn btn-primary" id="btn-insert">Submit</button>
                        </div>
                    </div>
                </form> 
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data</h6>
            </div>
            <div class="card-body  pb-2">
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
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Gaji</th>
                    <th>Lembur</th>
                    <th>Bonus</th>
                    <th>Pajak</th>
                    <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td colspan="8" align="center">Belum ada data</td>
                    </tr>
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
    const hargaLembur = 100000
    function insertData(dataPegawai) {
        const data = $('#form-pegawai').serializeArray()
        // console.log(data)

        let newData = {}
        data.forEach(function(item, index){
            let name = item['name'];
            let value = name === 'id' || name === 'gaji' || name === 'lembur' ? Number(item['value']) : item['value']
            newData[name] = value
        })
        console.log(newData)

        localStorage.setItem('dataPegawai', JSON.stringify([...dataPegawai, newData]))
        return newData
    }

    function showData(arr){
      let row = ''
      
      if(arr.length == 0){
        return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
      }

      let jmlGaji = jmlLembur = jmlTotal = jmlBonus = jmlPajak = 0
      arr.forEach(function(item, index){
        let bonus =  item['lembur'] >= 10 ? item['gaji'] * 0.5 : 0
        let pajak =  item['gaji'] * 0.1
        let total =  item['gaji'] + (item['lembur']*hargaLembur) + bonus - pajak
        jmlGaji += item['gaji']
        jmlLembur += item['lembur']
        jmlBonus += bonus
        jmlPajak += pajak
        jmlTotal += total

        row += `<tr>`
        row += `<td>${item['id']}</td>`
        row += `<td>${item['nama']}</td>`
        row += `<td>${item['jk']}</td>`
        row += `<td>${item['gaji']}</td>`
        row += `<td>${item['lembur']}</td>`
        row += `<td>${bonus}</td>`
        row += `<td>${pajak}</td>`
        row += `<td>${total}</td>`
        row += `</tr>`

      })

      row += `<tr class="bg-secondary text-white">`
      row += `<td colspan="3" class="bg-dark text-white">Jumlah Total</td>`
      row += `<td>${jmlGaji}</td>`
      row += `<td>${jmlLembur}</td>`
      row += `<td>${jmlBonus}</td>`
      row += `<td>${jmlPajak}</td>`
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
      let dataPegawai = JSON.parse(localStorage.getItem('dataPegawai')) || []
      $('#data-pegawai tbody').html(showData(dataPegawai))

      $('#btn-insert').on('click',function(){
        dataPegawai.push(insertData(dataPegawai)) 
        $('#data-pegawai tbody').html(showData(dataPegawai))
      })

        //event klik searching
      $('#btn-search').on('click',function(){
        let teksSearch = $('#teks-cari').val()
        let id = searching(dataPegawai,'nama', teksSearch)
        let data = []
        if(id >= 0)
          data.push(dataPegawai[id])
        console.log(id)
        console.log(data)
        $('#data-pegawai tbody').html(showData(data))
      })

        $('#btn-sorting').on('click',function(){
        dataPegawai = sorting(dataPegawai, 'nama')

        $('#data-pegawai tbody').html(showData(dataPegawai))
      })
    })
</script>
@endpush