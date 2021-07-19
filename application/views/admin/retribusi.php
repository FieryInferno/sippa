<main id='main'>
	<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Retribusi
    <div class="card-body">
      <?= $this->session->pesan ? $this->session->pesan : ''; ?>
      <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-inverse text-center">
            <tr>
              <th class="bg-dark text-light">Tanggal</th>
              <th class="bg-dark text-light">Nama Petugas</th>
              <th class="bg-dark text-light">Jumlah</th>
              <th class="bg-dark text-light">Bukti Setoran</th>
            </tr>
          </thead>
          <tbody>
            <?php
              function tgl_indo($tanggal){
                $bulan = array (
                  1 =>   'Januari',
                  'Februari',
                  'Maret',
                  'April',
                  'Mei',
                  'Juni',
                  'Juli',
                  'Agustus',
                  'September',
                  'Oktober',
                  'November',
                  'Desember'
                );
                $pecahkan = explode('-', $tanggal);
                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
              }

              foreach ($retribusi as $key) { ?>
                <tr>
                  <td><?= tgl_indo($key['tanggal']); ?></td>
                  <td><?= $key['nama']; ?></td>
                  <td><?= "Rp " . number_format($key['jumlah'], 2, ',', '.'); ?></td>
                  <td>
                    <?php
                      switch ($key['status']) {
                        case '0': ?>
                          <a href="<?= base_url('assets/img/' . $key['bukti']); ?>" class="btn btn-primary">Lihat File</a>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#verifikasi<?= $key['id_retribusi']; ?>">
                            Verifikasi
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="verifikasi<?= $key['id_retribusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah anda yakin akan verifikasi data?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="<?= base_url('admin/retribusi/verifikasi/' . $key['id_retribusi']); ?>" class="btn btn-success">Verifikasi</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#batalVerifikasi<?= $key['id_retribusi']; ?>">
                            Data tidak sesuai
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="batalVerifikasi<?= $key['id_retribusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Apakah anda yakin data tidak sesuai?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="<?= base_url('admin/retribusi/tolak/' . $key['id_retribusi']); ?>" class="btn btn-danger">Data tidak sesuai</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php break;
                        case '1': ?>
                          <a href="<?= base_url('assets/img/' . $key['bukti']); ?>" class="btn btn-primary">Lihat File</a>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-success">Terverifikasi</button>
                          <?php break;
                        case '2': ?>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger">Menuggu Upload Ulang</button>
                          <?php break;
                        
                        default:
                          # code...
                          break;
                      }
                    ?>
                  </td>
                </tr>
              <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
