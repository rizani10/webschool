<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <?= $this->session->flashdata('pesan');
    ?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart(); ?>
            <input type="hidden" name="id_berita" value="<?= $blog['id_berita']; ?>">
            <div class="form-group">
              <label class="form-label w-100" for="judul_berita"> Judul Blog</label>
              <input type="text" name="judul_berita" id="judul_berita" class="form-control" value="<?= $blog['judul_berita']; ?>">
              <?= form_error('judul_berita', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="form-label w-100" for="">Foto Guru</label>
                <img style="text-align: center;" src="<?= base_url('assets/fotoberita/') . $blog['icon_berita']; ?>" width="200px" alt="" class="img-thumbnail">
              </div>
              <div class="form-group col-md-6">
                <label class="form-label w-100" for="tanggal">Foto baru</label>
                <input id="icon_berita" name="icon_berita" type="file">
              </div>
            </div>

            <div class="form-group">
              <label class="form-label w-100" for="isi_berita"> Isi Blog</label>
              <textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control" placeholder="Isi berita"><?= $blog['isi_berita']; ?></textarea>
              <?= form_error('isi_berita', '<small class="text-danger">', '</small>'); ?>
            </div>

            <a href="<?= base_url('blog') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>