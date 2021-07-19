<?php $this->load->view('template/header'); ?>
    <!-- Animateions area start-->
    <div class="animation-area">
      <div class="container">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <?php
              if ($isi_chat) {
                foreach ($isi_chat as $key) { 
                  if ($key['pengirim'] == $this->session->id) { ?>
                    <div class="row">
                      <div class="col-md-6"></div>
                      <div class="col-md-6">
                          <div class="alert alert-secondary" role="alert">
                              <?= $this->session->sess_nama; ?>
                              <hr>
                              <div class="col-sm-10"><?= $key['isi_chat']; ?></div>
                              <div class="col-sm-2" style="font-size: 10px;"><?= $key['waktu']; ?></div>
                          </div>
                        </div>
                    </div>
                  <?php } else { ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <?= $key['nama_pedagang']; ?>
                            <hr>
                            <div class="col-sm-10"><?= $key['isi_chat']; ?></div>
                            <div class="col-sm-2" style="font-size: 10px;"><?= $key['waktu']; ?></div>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>
                  <?php } 
                }
              } 
            ?>
            <br>
          </div>
          <div class="card-footer">
            <form action="<?= base_url(); ?>Chat/kirim" method="post" id="form_kirim_chat">
              <div class="row">
                <div class="col-lg-11">
                  <input type="hidden" name="id_chat" value="<?= $chat['id_chat']; ?>">
                  <input type="hidden" name="pengirim" value="<?= $this->session->id; ?>">
                  <input type="hidden" name="penerima" value="<?= $chat['id_pedagang']; ?>">
                  <input type="text" name="isi" placeholder="Type Message ..." class="form-control">
                </div>
                <div class="col-lg-1">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php $this->load->view('template/footer'); ?>