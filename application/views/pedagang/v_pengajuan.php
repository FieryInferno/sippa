<main id="main">   
    <!-- ======= About Section ======= -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <?php
          if ($pengajuan) { ?>
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Sedang diajukan</h4>
              <p>Menunggu konfirmasi dari dinas</p>
              <hr>
              <a href="<?= base_url(); ?>pedagang/batal_pengajuan" class="btn btn-danger mb-0">Batalkan</a>
            </div>
          <?php } else { ?>
            <form action="<?php base_url('Pedagang/Pengajuan') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group col-6">
                <label for="">Pilih Pedagang Baru</label>
                <select class="form-control" name="id_pedagang_baru" id="id_pedagang_baru">
                  <option>Pilih Pedagang Baru</option>
                  <?php
                    foreach ($pedagang_baru as $key) { ?>
                      <option value="<?= $key['id']; ?>"><?= $key['nama']; ?></option>
                    <?php }
                  ?>
                </select>
              </div>
              <div class="form-group col-6">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> 
              </div>
            </form>
          <?php }
        ?>
      </div>
    </div>
  </div>
</main>


