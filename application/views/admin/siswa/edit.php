<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart(); ?>
            <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nisn">NISN</label>
                <input class="form-control" id="nisn" name="nisn" value="<?= $siswa['nisn']; ?>" type="text">
                <?= form_error('nisn', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <input class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?>" type="text">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $siswa['tempat_lahir']; ?>" type="text">
                <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal">Tanggal Lahir</label>
                <input class="form-control" id="tanggal" name="tgl_lahir" value="<?= $siswa['tgl_lahir']; ?>" type="text">
                <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input class="form-control" id="kelas" name="kelas" value="<?= $siswa['kelas']; ?>">
              <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="form-label w-100">Foto Siswa</label>
                <img style="text-align: center;" src="<?= base_url('assets/fotosiswa/') . $siswa['foto_siswa']; ?>" width="200px" alt="" class="img-thumbnail">
              </div>
              <div class="form-group col-md-6">
                <label class="form-label w-100" for="foto_siswa">Foto baru</label>
                <input id="foto_siswa" name="foto_siswa" type="file">
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