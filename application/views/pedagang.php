<?php $this->load->view('template/header'); ?>
    <!-- Animateions area start-->
    <div class="animation-area">
      <div class="container">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4"><img src="<?= base_url('assets/img/' . $foto_kios); ?>" width="100%" alt=""></div>
              <div class="col-lg-8">
                <div class="form-group">
                  <label for="">Nama Pedagang</label>
                  <input type="text" class="form-control" value="<?= $nama_pedagang; ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="">Pasar</label>
                  <input type="text" class="form-control" value="<?= $nama_pasar; ?>" disabled>
                </div>
                <div class="form-group" id="belumLogin"></div>
                </div>
                <div class="form-group">
                  <button class="btn btn-warning" id="chat">Chat dengan Pedagang</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $this->load->view('template/footer'); ?>