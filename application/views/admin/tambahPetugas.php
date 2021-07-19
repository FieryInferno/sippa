<main id='main'>
  <div class="container">
  <div class="card">
    <form action="<?php base_url('admin/petugas/tambah') ?>" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group col-6">
          <label for="">Nama Petugas</label>
          <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-6">
          <label for="">Email</label>
          <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-6">
          <label for="">Username</label>
          <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-6">
          <label for="">Password</label>
          <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-6">
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> 
          <a href="<?php echo site_url('admin/petugas') ?>" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i>Kembali</a>
    </form>
      </div>	
  </div>
  </div>
</main>