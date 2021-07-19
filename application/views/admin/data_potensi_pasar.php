<main id='main'>
  <div class="container">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-12">
            <i class="fas fa-table"></i> Data Potensi Pasar
          </div>
          <div class="col-12">
            <form action="<?= base_url(); ?>admin/data_potensi_pasar" method="get">
              <div class="row">
                <div class="col-10">
                  <input type="text" class="form-control" name="nama_pasar">
                </div>
                <div class="col-2">
                  <button class="btn btn-primary" type="submit">Cari</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?php
          $no = 1;
          foreach ($pasar as $key) { ?>
            <div class="table-responsive">
              <table class="table table-bordered table-sm table-striped table-hover" class="dataTable" width="100%" cellspacing="0">
                <thead class="thead-inverse text-center">
                  <tr>
                    <th class="bg-dark text-light">No.</th>
                    <th class="bg-dark text-light">Nama Pasar</th>
                    <th class="bg-dark text-light">Jenis Pedagang</th>
                    <th class="bg-dark text-light">Jumlah</th>
                    <th class="bg-dark text-light">Tarif</th>
                    <th class="bg-dark text-light">Potensi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key['nama_pasar']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>PKL</td>
                    <td><?= $key['pkl']['jumlah']; ?></td>
                    <td>1000</td>
                    <td>
                      <?php 
                        $pkl  = $key['pkl']['jumlah'] * 1000;
                        echo $pkl; 
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>KIOS</td>
                    <td><?= $key['kios']['jumlah']; ?></td>
                    <td>2000</td>
                    <td>
                      <?php 
                        $kios = $key['kios']['jumlah'] * 2000; 
                        echo $kios;
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>LOS</td>
                    <td><?= $key['los']['jumlah']; ?></td>
                    <td>500</td>
                    <td>
                      <?php 
                        $los  = $key['los']['jumlah'] * 500;
                        echo $los;
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?= $pkl + $kios + $los; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php }
        ?>
      </div>
    </div>
  </div>
</main>
