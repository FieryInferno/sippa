<main id='main'>
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-12 mb-2"><i class="fas fa-table"></i> Data Tunggakan</div>
        </div>
      </div>
      <div class="card-body">
        <div>
          <?= $this->session->pesan ? $this->session->alert : ''; ?>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Bayar Tunggakan
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Bayar Tunggakan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                  <img src="<?= base_url('assets/tunggakan-' . $this->session->id_pedagang . '.png'); ?>" alt="">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          Total Tunggakan : 
          <?php
            $jumlah = count($tunggakan);
            switch ($tunggakan[0]['jenis_pedagang']) {
              case 'pkl':
                echo 'Rp. ' . number_format((1000 * $jumlah), 2, ',', '.');
                break;
              case 'kios':
                echo 'Rp. ' . number_format((2000 * $jumlah), 2, ',', '.');
                break;
              case 'los':
                echo 'Rp. ' . number_format((500 * $jumlah), 2, ',', '.');
                break;
              
              default:
                # code...
                break;
            }
          ?>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-inverse text-center">
              <tr>
                <th class="bg-dark text-light">No.</th>
                <th class="bg-dark text-light">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
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
                foreach ($tunggakan as $key) {?>
                  <tr>
                    <td><?= $no++;?></td>
                    <td><?= tgl_indo($key['tanggal']);?></td>
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
