<main id='main'>
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-12"><i class="fas fa-table"></i> Data Pedagang</div>
          <div class="col-12">
            <a href="<?php echo site_url('Petugas/pedagang/add_pedagang') ?>" class="btn btn-primary"><i class='fas fa-plus'></i>Tambah</a>
            <a href="<?php echo site_url('petugas/pedagang/buka') ?>" class="btn btn-primary">Verifikasi Buka <?= $buka > 0 ? '<span class="badge badge-warning">' . $buka . '</span>' : '' ; ?></a>
            <a href="<?php echo site_url('petugas/pedagang/tutup') ?>" class="btn btn-primary">Verifikasi Tutup <?= $tutup > 0 ? '<span class="badge badge-warning">' . $tutup . '</span>' : '' ; ?></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?= $this->session->alert ? $this->session->alert : '' ; ?>
        <div class="table-responsive">
          <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-inverse text-center">
              <tr>
                <th class="bg-dark text-light">NIK</th>
                <th class="bg-dark text-light">Nama Pedagang</th>
                <th class="bg-dark text-light">Alamat Pedagang</th>
                <th class="bg-dark text-light">Nama Pasar</th>
                <th class="bg-dark text-light">Nomor Kios</th>
                <th class="bg-dark text-light">Foto Kios</th>
                <th class="bg-dark text-light">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($pedagang as $key) {?>
                  <tr>
                    <td><?= $key ['nik'];?></td>
                    <td><?= $key ['nama_pedagang'];?></td>
                    <td><?= $key ['alamat'];?></td>	
                    <td><?= $key ['nama_pasar'];?></td>
                    <td><?= $key ['no_kios'];?></td>
                    <td class="text-center"><img src="<?= base_url('assets/img/' . $key ['foto_kios']); ?>" alt="" width="15%"></td>
                    <td>
                      <?php
                        switch ($this->uri->segment(3)) {
                          case 'buka': ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifikasiBuka<?= $key['id_pedagang']; ?>">
                              Verifikasi
                            </button>
      
                            <!-- Modal -->
                            <div class="modal fade" id="verifikasiBuka<?= $key['id_pedagang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="<?= base_url(); ?>petugas/pedagang/verifikasi/buka" method="post">
                                    <div class="modal-body">
                                      <label for="">Alasan</label>
                                      <textarea name="alasan" id="alasan" cols="30" rows="5" class="form-control" disabled><?= $key['alasan']; ?></textarea>
                                      <input type="hidden" name="id_pedagang" value="<?= $key['id_pedagang']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Verifikasi</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <?php break;
                          case 'tutup': ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifikasiTutup<?= $key['id_pedagang']; ?>">
                              Verifikasi
                            </button>
      
                            <!-- Modal -->
                            <div class="modal fade" id="verifikasiTutup<?= $key['id_pedagang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="<?= base_url(); ?>petugas/pedagang/verifikasi/tutup" method="post">
                                    <div class="modal-body">
                                      <label for="">Alasan</label>
                                      <textarea name="alasan" id="alasan" cols="30" rows="5" class="form-control" disabled><?= $key['alasan']; ?></textarea>
                                      <input type="hidden" name="id_pedagang" value="<?= $key['id_pedagang']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Verifikasi</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <?php break;
                          
                          default: ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $key['id_pedagang']; ?>">
                              Hapus
                            </button>
      
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $key['id_pedagang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah anda yakin akan menghapus data <?= $key['nama_pedagang']; ?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?php echo site_url('Petugas/Dashboard/delete_pedagang/'.$key ['id_pedagang']) ?>" class="btn btn-danger"><i class='fas fa-trash-alt '></i>Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <a href="<?php echo site_url('petugas/pedagang/edit/'.$key['id_pedagang']) ?>" class="btn btn-primary"><i class='fas fa-edit'></i>Edit</a>
                            <?php break;
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
