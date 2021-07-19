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
                          <?php break;
                        case '1': ?>
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
