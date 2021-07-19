<main id='main'>
  <div class="card">
    <form action="<?php base_url('Admin/Pasar/add_pasar') ?>" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group col-6">
          <label for="">Nama Pasar</label>
          <input type="text" class="form-control" name="nama_pasar" id="nama_pasar" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-6">
          <label for="">Alamat Pasar</label>
          <input type="text" class="form-control" name="alamat_pasar" id="alamat_pasar" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-6">
          <label for="">Foto</label>
          <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-6">
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> 
          <a href="<?php echo site_url('Petugas/Pasar') ?>" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i>Kembali</a>
    </form>
      </div>	
  </div>
</main>