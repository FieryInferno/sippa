<main id='main'>
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-12 mb-2"><i class="fas fa-table"></i> Data Pedagang</div>
          <div class="col-12">
            <a href="<?= base_url(); ?>admin/pedagang" class="btn btn-primary">Seluruh Pedagang</a>
            <a href="<?= base_url(); ?>admin/pedagang/buka" class="btn btn-primary">Pedagang Buka</a>
            <a href="<?= base_url(); ?>admin/pedagang/tutup" class="btn btn-primary">Pedagang Tutup</a>
          </div>
        </div>
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
                <th class="bg-dark text-light">NIK</th>
                <th class="bg-dark text-light">Nama Pedagang</th>
                <th class="bg-dark text-light">Alamat Pedagang</th>
                <th class="bg-dark text-light">Nama Pasar</th>
                <th class="bg-dark text-light">Nomor Kios</th>
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

                    <td>
              
                      
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
