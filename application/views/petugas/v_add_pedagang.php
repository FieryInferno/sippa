<main id='main'>
  <form action="<?php base_url('Petugas/Pedagang/add_pedagang') ?>" method="post" enctype="multipart/form-data">
  <div class="card-body">
    <div class="form-group col-6">
        <label for="">NIK</label>
        <input type="text" class="form-control" name="nik"
          id="nik" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Masukan NIK</small>
        <div class="invalid-feedback">
          <?php echo form_error('nik') ?>
        </div>
      </div>
      <div class="form-groupn col-6 mb-3">
        <label for="">Nama Pedagang</label>
        <input type="text" class="form-control" name="nama_pedagang"
          id="nama_pedagang" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Masukan Nama Pedagang</small>
        <div class="invalid-feedback "> 
          <?php echo form_error('nama_pedagang') ?>
        </div>
      </div>
      <div class="form-groupn col-6 mb-3">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
        <small id="helpId" class="form-text text-muted">Masukan Email</small>
        <div class="invalid-feedback "> 
          <?php echo form_error('email') ?>
        </div>
      </div>
      <div class="form-groupn col-6 mb-3">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId">
        <small id="helpId" class="form-text text-muted">Masukan Username</small>
        <div class="invalid-feedback "> 
          <?php echo form_error('username') ?>
        </div>
      </div>
      <div class="form-groupn col-6 mb-3">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
        <small id="helpId" class="form-text text-muted">Masukan Password</small>
        <div class="invalid-feedback "> 
          <?php echo form_error('password') ?>
        </div>
      </div>
      <div class="form-group col-6">
        <label for="">Alamat Pedagang</label>
        <input type="text" class="form-control" name="alamat"
          id="alamat_pedagang" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Alamat Pedagang</small>
        <div class="invalid-feedback">
          // <?php echo form_error('alamat_pedagang') ?>
        </div>
      </div>
      <div class="form-group col-6">
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
      <div class="form-group col-6">
        <label for="">Nomor Kios</label>
        <input type="text" class="form-control" name="no_kios"
          id="nomor_kios" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Nomor Kios</small>
        <div class="invalid-feedback">
          <?php echo form_error('nomor_kios') ?>
        </div>
      </div>
      <div class="form-group col-6">
        <label for="">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group col-6">
        <label for="">Jenis Pedagang</label>
        <select name="jenis_pedagang" id="jenis_pedagang">
          <option>Pilih Jenis Pedagang</option>
          <option value="pkl">PKL</option>
          <option value="kios">KIOS</option>
          <option value="los">LOS</option>
        </select>
      </div>
      <div class="form-group col-6">
      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> 
      <a href="<?php echo site_url('Admin/Dashboard/Pedagang') ?>"
        class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>

      <!-- ============== -->

    </form>
  </div>	<form action="<?php base_url('tata_usaha/add_register') ?>" method="post" enctype="multipart/form-data">
</main>

						<!-- ================= -->
