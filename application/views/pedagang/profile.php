<main id="main">   
  <!-- ======= About Section ======= -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <img src="<?= base_url('assets/' . $foto ); ?>" alt="" width="30%">
        <form action="<?= base_url(); ?>pedagang/profile/ubah" method="post" enctype="multipart/form-data">
          <div class="form-group col-8 mb-3">
            <label for="">Foto</label>
            <div class="row">
              <div class="col-6">
                <input type="file" name="foto" class="form-control" required>
                <input type="hidden" name="foto_lama" value="<?= $foto; ?>">
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-primary" name="ubahFoto" value="ubahFoto">Ubah</button>
              </div>
            </div>
          </div>
          <div class="form-group col-4 mb-3">
            <?= $alasan !== NULL ? '<div class="alert alert-success">Menunggu verifikasi petugas untuk mengubah status</div>' : '' ; ?>
            <label for="">Status Pedagang</label>
            <div class="row">
              <div class="col-6">
                <input type="text" class="form-control" disabled value="<?= $status; ?>">
              </div>
              <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Ubah
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <label for="">Alasan</label>
                        <textarea name="alasan" id="alasan" cols="30" rows="5" class="form-control"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubahStatus" value="ubahStatus">Ubah</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>


