<!-- Modal -->
<div class="modal fade" id="pelangganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Pelanggan</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="tblTransaksi">
            <thead>
                <tr>
                <th class="text-uppercase  text-xxs font-weight-bolder">Pelanggan</th>
                <th class="text-uppercase  text-xxs font-weight-bolder ps-2">Alamat</th>
                <th class="text-center text-uppercase  text-xxs font-weight-bolder">No. telp</th>
                <th class=" opacity-0"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $p)
                <tr>
                <input type="hidden" name="idPelanggan" id="idPelanggan" value="{{ $p->id }}">
                <td>
                    <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-xs">{{ ($p->nama) }}</h6>
                    </div>
                    </div>
                </td>
                <td class="col-2">
                    <p class="text-xs text-secondary mb-0">{{ ($p->alamat) }}</p>
                </td>
                <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ ($p->tlp) }}</span>
                </td>
                <td class="align-middle">
                    <button type="button" class="btn bg-gradient-primary btn-sm pilihPelangganBtn"
                    id="select"
                    data-id="{{ ($p->id) }}"
                    data-nama="{{ ($p->nama) }}"
                    data-alamat="{{ ($p->alamat) }}"
                    data-telp="{{ ($p->tlp) }}">
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