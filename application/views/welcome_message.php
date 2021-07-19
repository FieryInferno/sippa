<?php $this->load->view('template/header'); ?>
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container-fluid" style="background-image: url('<?= base_url(); ?>assets/img/pasargambir.jpg');height: 400px;"></div>
    </div>
    <!-- Main Menu area End-->
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
              <form action="<?= base_url(); ?>" method="get">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama pasar" name="nama_pasar">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <button class="btn btn-warning" type="submit">Cari Pasar</button>
                </div>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Animateions area start-->
    <div class="animation-area">
        <div class="container-fluid">
          <?php
            $j  = 1;
            for ($i=0; $i < count($pasar); $i++) { 
              $key  = $pasar[$i];
              if ($j % 3 == 0) { ?>
                <div class="row">
              <?php } ?>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="animation-single-int">
                      <div class="animation-ctn-hd">
                          <h2 class="text-center"><a href="<?= base_url('pasar/data_pedagang/' . $key['id_pasar']); ?>"><?= $key['nama_pasar']; ?></a></h2>
                      </div>
                      <div class="animation-img mg-b-15">
                          <img class="animate-one" src="<?= base_url('assets/img/' . $key['foto']); ?>" alt="" />
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