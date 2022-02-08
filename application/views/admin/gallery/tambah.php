<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart('gallery/tambah'); ?>

            <div class="form-group">
              <label class="form-label w-100" for="nama_gallery"> Nama Gallery</label>
              <input type="text" name="nama_gallery" id="nama_gallery" class="form-control">
              <?= form_error('nama_gallery', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label class="form-label w-100" for="judul_berita"> Foto Sampul</label>
              <input type="file" id="sampul" name="sampul" required> <br>
              <small class="text-danger">Maksimal Ukuran 2 MB Type : PNG, JPG, JPEG</small>
            </div>

            <a href="<?= base_url('gallery') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>