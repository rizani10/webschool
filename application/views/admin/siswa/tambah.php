<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart('siswa/tambah'); ?>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nisn">NISN</label>
                <input class="form-control" id="nisn" name="nisn" placeholder="NISN" type="text">
                <?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <input class="form-control" id="nama" name="nama" placeholder="Nama" type="text">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" type="text">
                <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal">Tanggal Lahir</label>
                <input class="form-control" id="tanggal" name="tgl_lahir" placeholder="Tanggal Lahir" type="text">
                <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="kelas">Kelas</label>
                <input class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group col-md-6">
                <label class="form-label w-100" for="foto_siswa">Foto</label>
                <input id="foto_siswa" name="foto_siswa" type="file" required>
              </div>
            </div>
            <a href="<?= base_url('siswa') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>