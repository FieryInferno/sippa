<main id='main'>
	<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Petugas | <a href="<?php echo site_url('admin/petugas/tambah') ?>" class="btn btn-primary"><i class='fas fa-plus'></i>Tambah</a>
    </div>
    <div class="card-body">
      <?= $this->session->pesan ? $this->session->pesan : ''; ?>
      <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-inverse text-center">
            <tr>
              <th class="bg-dark text-light">Nama Petugas</th>
              <th class="bg-dark text-light">Email</th>
              <th class="bg-dark text-light">Username</th>
              <th class="bg-dark text-light">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($petugas as $key) { ?>
                <tr>
                  <td><?= $key['nama']; ?></td>
                  <td><?= $key['email']; ?></td>
                  <td><?= $key['username']; ?></td>
                  <td>
                    <a href="<?= base_url('admin/petugas/edit/' . $key['id']); ?>" class="btn btn-success">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $key['id']; ?>">
                      Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin akan menghapus data <?= $key['nama']; ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="<?= base_url('admin/petugas/hapus/' . $key['id']); ?>" class="btn btn-danger">Hapus</a>
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
</main>
