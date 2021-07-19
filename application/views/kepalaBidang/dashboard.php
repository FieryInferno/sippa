<main id="main">
  <div class="container-fluid">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Home Kepala Bidang</li>
    </ol>
    <div class="card">
      <div class="card-header">Data Potensi Pasar</div>
      <div class="card-body">
        <form action="<?= base_url(); ?>admin/dashboard" method="get">
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="">Nama Pasar</label>
                <select name="id_pasar" id="id_pasar" class="form-control">
                  <option>Pilih Nama Pasar</option>
                  <?php
                    foreach ($pasar as $key) { ?>
                      <option value="<?= $key['id_pasar']; ?>"><?= $key['nama_pasar']; ?></option>
                    <?php }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <select name="tahun" id="tahun" class="form-control">
                  <option>Pilih Tahun</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Dari Bulan</label>
                <select name="dari_bulan" id="dari_bulan" class="form-control">
                  <option>Pilih Bulan</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">Oktober</option>
                  <option value="10">Desember</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Sampai Bulan</label>
                <select name="sampai_bulan" id="sampai_bulan" class="form-control">
                  <option>Pilih Bulan</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">Oktober</option>
                  <option value="10">Desember</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success">Lihat</button>
            </div>
            <div class="col-8">
              <div class="chart-area">
                <canvas id="myBarChart"></canvas>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>


