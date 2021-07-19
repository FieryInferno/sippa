<main id='main'>
	<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Tunggakan</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-inverse text-center">
            <tr>
              <th class="bg-dark text-light">Nama Pedagang</th>
              <th class="bg-dark text-light">Nama Pasar</th>
              <th class="bg-dark text-light">Total Tunggakan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($tunggakan as $key) { ?>
                <tr>
                  <td><?= $key['nama_pedagang']; ?></td>
                  <td><?= $key['nama_pasar']; ?></td>
                  <td><?= 'Rp. ' . number_format($key['tunggakan'], 2, ',', '.'); ?></td>
                </tr>
              <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
