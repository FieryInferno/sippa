<main id="main">   
    <!-- ======= About Section ======= -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <?php
          foreach ($chat as $key) { ?>
            <div class="card">
              <div class="card-body">
                <h6><a href="<?= base_url('chat/' . $key['id_pedagang_baru']); ?>"><?= $key['nama']; ?></a> </h6>
              </div>
            </div>
          <?php }
        ?>
      </div>
    </div>
  </div>
</main>


