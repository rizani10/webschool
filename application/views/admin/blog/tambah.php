<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>


    <?= $this->session->flashdata('pesan'); ?>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart('blog/tambah'); ?>

            <div class="form-group">
              <label class="form-label w-100" for="judul_berita"> Judul Blog</label>
              <input type="text" name="judul_berita" id="judul_berita" class="form-control">
              <?= form_error('judul_berita', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label class="form-label w-100" for="icon_berita"> Foto Awal Blog </label>
              <input type="file" name="icon_berita" id="icon_berita" class="form-control">
            </div>

            <div class="form-group">
              <label class="form-label w-100" for="isi_berita"> Isi Blog</label>
              <textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control" placeholder="Isi berita"></textarea>
              <?= form_error('isi_berita', '<small class="text-danger">', '</small>'); ?>
            </div>

            <a href="<?= base_url('blog') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>