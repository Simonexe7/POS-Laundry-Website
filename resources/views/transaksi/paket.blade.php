<!-- Modal -->
<div class="modal fade" id="paketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Paket</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="tblPaket">
            <thead>
                <tr>
                <th class="text-uppercase  text-xxs font-weight-bolder">Nama Paket</th>
                <th class="text-uppercase  text-xxs font-weight-bolder ps-2">Harga</th>
                <th class=" opacity-0"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paket as $p)
                <tr>
                <input type="hidden" name="idPaket" class="idPaket" value="{{ $p->id }}">
                <td>
                    <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-end">
                        <h6 class="mb-0 text-xs">{{($p->nama_paket)}}</h6>
                    </div>
                    </div>
                </td>
                <td class="col-2">
                    <p class="text-xs text-secondary mb-0">{{($p->harga)}}</p>
                </td>
                <td class="d-flex align-middle justify-content-end">
                    <button type="button" data-bs-dismiss="modal" class="btn bg-gradient-info btn-sm pilihPaketBtn" id="select">
                      Pilih
                    </button>
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