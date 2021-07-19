<main id="main">   
    <!-- ======= About Section ======= -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <?php
          if ($bayar >= 1) { ?>
            <div class="alert alert-success">Anda sudah membayar retribusi hari ini</div>
          <?php } else { 
            if ($tunggakan) { ?>
              <div class="alert alert-danger">Anda menuggak retribusi hari ini, <a href="<?= base_url('pedagang/tunggakan'); ?>">Lihat data tunggakan</a></div>
            <?php } else { ?>
              <img src="<?= base_url('assets/' . $this->session->id_pedagang . '.png'); ?>" alt="" width="25%">
            <?php }
          }
        ?>
      </div>
    </div>
  </div>
</main>


