<?php $this->load->view('template/header'); ?>
    <!-- Animateions area start-->
    <div class="animation-area">
        <div class="container">
          <?php
            $j  = 1;
            for ($i=0; $i < count($pedagang); $i++) { 
              $key  = $pedagang[$i];
              if ($j % 3 == 0) { ?>
                <div class="row">
              <?php } ?>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="animation-single-int">
                      <div class="animation-img mg-b-15">
                          <img class="animate-one" src="<?= base_url('assets/img/' . $key['foto_kios']); ?>" alt="" />
                      </div>
                      <div class="animation-ctn-hd">
                          <h2 class="text-center"><a href="<?= base_url('pasar/pedagang/' . $key['id_pedagang']); ?>"><?= $key['nama_pedagang']; ?></a></h2>
                          <h3 class="text-center">No. Kios  : <?= $key['no_kios']; ?></h3>
                      </div>
                  </div>
              </div>
              <?php if ($j % 3 == 0) { ?>
                </div>
              <?php }
              $j++;
            }
          ?>
        </div>
    </div>
<?php $this->load->view('template/footer'); ?>