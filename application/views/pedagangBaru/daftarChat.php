<?php $this->load->view('template/header'); ?>
<!-- Animateions area start-->
<div class="animation-area">
  <div class="container">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <?php
          foreach ($chat as $key) { ?>
            <div class="alert alert-warning">
              <h6><a href="<?= base_url('chat/' . $key['id_pedagang']); ?>"><?= $key['nama_pedagang']; ?></a> </h6>
            </div>
          <?php }
        ?>
      </div>
      <div class="card-footer"></div>
    </div>
  </div>
</div>
<?php $this->load->view('template/footer'); ?>