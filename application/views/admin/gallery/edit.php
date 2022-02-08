<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart(); ?>
            <input type="hidden" name="id_gallery" value="<?= $gallery['id_gallery']; ?>">
            <div class="form-group">
              <label class="form-label w-100" for="nama_gallery"> Nama Gallery</label>
              <input type="text" name="nama_gallery" id="nama_gallery" class="form-control" value="<?= $gallery['nama_gallery']; ?>">
              <?= form_error('nama_gallery', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="form-label w-100" for="">Foto Sampul Gallery</label>
                <img style="text-align: center;" src="<?= base_url('assets/gallery/') . $gallery['sampul']; ?>" width="200px" alt="" class="img-thumbnail">
              </div>
              <div class="form-group col-md-6">
                <label class="form-label w-100" for="tanggal">Foto baru</label>
                <input id="sampul" name="sampul" type="file"><br>
                <small class="text-danger">Maksimal Ukuran 2 MB Type : PNG, JPG, JPEG</small>
              </div>
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