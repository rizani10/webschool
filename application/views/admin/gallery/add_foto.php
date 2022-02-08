<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart('gallery/add_foto/' . $gallery['id_gallery']); ?>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="ket_foto">Keterangan Foto</label>
                <input type="text" class="form-control" id="ket_foto" name="ket_foto" placeholder="Keterangan Foto">
                <?= form_error('ket_foto', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group col-md-6">
                <label for="foto">Foto gallery</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <small class="text-danger">Maksimal Ukuran 2 MB Type : PNG, JPG, JPEG</small>
              </div>
            </div>

            <a href="<?= base_url('gallery') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?= form_close(); ?>

            <hr>
            <strong>Daftar Foto Gallery : <?= $gallery['nama_gallery']; ?></strong> <br><br>
            <div class="row">
              <?php foreach ($foto as $ft) : ?>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="card">
                    <img class="card-img-top" src="<?= base_url('assets/foto/') . $ft['foto']; ?>" width="250px" height="250px">
                    <div class="card-header">
                      <strong>
                        <h5 class="card-title mb-0"><?= $ft['ket_foto']; ?></h5>
                      </strong>
                    </div>
                    <div class="card-body">
                      <a href="#" data-toggle="modal" data-target="#hapusFoto<?= $ft['id_foto']; ?>" class="card-link"> Hapus Foto
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>



<!-- Modal  Edit-->
<?php foreach ($foto as $ft) :  ?>
  <div class="modal fade" id="hapusFoto<?= $ft['id_foto']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apa Kamu Yakin Ingin Menghapus Data ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="<?= base_url('gallery/hapus_foto/' . $gallery['id_gallery']) . '/' . $ft['id_foto']; ?>" class="btn btn-danger">Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- /modal Edit -->