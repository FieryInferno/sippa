<main id='main'>
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Data Pasar | <a href="<?php echo site_url('Petugas/Pasar/add_pasar') ?>" class="btn btn-primary"><i class='fas fa-plus'></i>Tambah</a>
      </div>
      <div class="card-body">
        <?php
          if ($this->session->alert) {?>
              <div class="alert alert-success" role="alert">
                <?= $this->session->alert; ?>
              </div>
              <?php  
          }
        ?>
        <div class="table-responsive">
          <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-inverse text-center">
              <tr>
                <th class="bg-dark text-light">Nama Pasar</th>
                <th class="bg-dark text-light">Alamat Pasar</th>
                <th class="bg-dark text-light">Gambar</th>
                <th class="bg-dark text-light">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($pasar as $key) { ?>
                  <tr>
                    <td><?= $key['nama_pasar']; ?></td>
                    <td><?= $key['alamat_pasar']; ?></td>
                    <td class="text-center"><img src="<?= base_url('assets/img/' . $key['foto']); ?>" alt="" width="15%"></td>
                    <td>
                      <a href="<?= base_url('petugas/pasar/edit/' . $key['id_pasar']); ?>" class="btn btn-success">Edit</a>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $key['id_pasar']; ?>">
                        Hapus
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal<?= $key['id_pasar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Apakah anda yakin akan menghapus data <?= $key['nama_pasar']; ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a href="<?= base_url('Petugas/Pasar/hapus_pasar/' . $key['id_pasar']); ?>" class="btn btn-danger">Hapus</a>
                            </div>
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
    </div>
  </div>
</main>
