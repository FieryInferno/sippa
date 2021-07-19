<main id='main'>
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Data Retribusi
      </div>
      <?php
        if ($upload) { ?>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-inverse text-center">
                  <tr>
                    <th class="bg-dark text-light">Tanggal</th>
                    <th class="bg-dark text-light">Jumlah</th>
                    <th class="bg-dark text-light">Aksi</th>
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
      
                    foreach ($upload as $key) { ?>
                      <tr>
                        <td><?= tgl_indo($key['tanggal']); ?></td>
                        <td><?= "Rp " . number_format($key['jumlah'], 2, ',', '.'); ?></td>
                        <td>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#verifikasi<?= $key['id_retribusi']; ?>">
                            Upload
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
                                <form method="post" action="<?php echo base_url('petugas/upload_ulang/' . $key['id_retribusi']); ?>" class="user" enctype="multipart/form-data">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="">Masukan scan PDF Bukti Transfer</label>
                                      <input type="file" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="foto" required>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Upload Ulang</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php }
      ?>
      <div class="card-body">
        <?= $this->session->pesan ? $this->session->pesan : ''; ?>
        <form method="post" action="<?php echo base_url().'Petugas/Retribusi/report'?>" class="user" enctype="multipart/form-data">
          <div class="row">
            <div class="col-10">
              <div class="form-group">
                <label for="">Masukan scan PDF Bukti Transfer</label>
                <input type="file" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="foto" required>
              </div>
            </div>
            <div class="col-2">
                <label for="">&nbsp;</label>
              <button type="submit" class="btn btn-success form-control"><div>Report</div></button>
            </div>
          </div>
        </form>
        Total Retribusi : <?= "Rp " . number_format($totalRetribusi, 2, ',', '.'); ?>
        <div class="table-responsive">
          <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-inverse text-center">
              <tr>
                <th class="bg-dark text-light">Tanggal</th>
                <th class="bg-dark text-light">Nama Pasar</th>
                <th class="bg-dark text-light">Nama Pedagang</th>
                <th class="bg-dark text-light">Jenis</th>
                <th class="bg-dark text-light">Tarif</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($retribusi as $key) { ?>
                  <tr>
                    <td><?= $key['tanggal']; ?></td>
                    <td><?= $key['nama_pasar']; ?></td>
                    <td><?= $key['nama_pedagang']; ?></td>
                    <td><?= strtoupper($key['jenis_pedagang']); ?></td>
                    <td>
                      <?php 
                        switch ($key['jenis_pedagang']) {
                          case 'pkl':
                            echo 'Rp. 1.000';
                            break;
                          case 'kios':
                            echo 'Rp. 2.000';
                            break;
                          case 'los':
                            echo 'Rp. 500';
                            break;
                          
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
  </div>
</main>
