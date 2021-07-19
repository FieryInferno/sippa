<main id='main'>
	<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Data Pengajuan Perpindahan
    </div>
    <div class="card-body">
      <?php
        if ($this->session->pesan) {?>
          <div class="alert alert-success" role="alert">
            <?= $this->session->pesan; ?>
          </div>
        <?php }
      ?>
      <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-inverse text-center">
            <tr>
              <th class="bg-dark text-light">Pedagang Lama</th>
              <th class="bg-dark text-light">Pasar</th>
              <th class="bg-dark text-light">No. Kios</th>
              <th class="bg-dark text-light">Foto Kios</th>
              <th class="bg-dark text-light">Pedagang Baru</th>
              <th class="bg-dark text-light">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach ($pengajuan as $key) { ?>
                <tr>
                  <td><?= $key['nama_pedagang'];?></td>
                  <td><?= $key['nama_pasar'];?></td>
                  <td><?= $key['no_kios'];?></td>	
                  <td class="text-center"><img src="<?= base_url('assets/img/' . $key['foto_kios']); ?>" alt="" width="15%"></td>
                  <td><?= $key['nama'];?> <a class="btn btn-primary" href="<?= base_url('assets/' . $key['ktp']); ?>">Lihat Data</a></td>
                  <td>
                    <a href="<?= base_url('Admin/Pengajuan/verifikasi/' . $key['id_pengajuan']); ?>" class="btn btn-success">Verifikasi</a>
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
