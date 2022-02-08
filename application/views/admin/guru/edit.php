<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart(); ?>
            <input type="hidden" name="id_guru" value="<?= $guru['id_guru']; ?>">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nip">NIP</label>
                <input class="form-control" id="nip" name="nip" value="<?= $guru['nip']; ?>" type="text">
                <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <input class="form-control" id="nama" name="nama" value="<?= $guru['nama']; ?>" type="text">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $guru['tempat_lahir']; ?>" type="text">
                <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal">Tanggal Lahir</label>
                <input class="form-control" id="tanggal" name="tgl_lahir" value="<?= $guru['tgl_lahir']; ?>" type="text">
                <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label for="id_mapel">Mata Pelajaran</label>
                  <select name="id_mapel" id="id_mapel" class="form-control" required>
                    <option selected="selected" value="<?= $guru['id_mapel']; ?>"><?= $guru['mapel']; ?></option>
                    <?php foreach ($mapel as $m) : ?>
                      <option value="<?= $m['id_mapel']; ?>"><?= $m['mapel']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="pendidikan">Pendidikan Terakhir</label>
                <input class="form-control" id="pendidikan" name="pendidikan" value="<?= $guru['pendidikan']; ?>">
                <?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="form-label w-100" for="">Foto Guru</label>
                <img style="text-align: center;" src="<?= base_url('assets/fotoguru/') . $guru['foto']; ?>" width="200px" alt="" class="img-thumbnail">
              </div>
              <div class="form-group col-md-6">
                <label class="form-label w-100" for="tanggal">Foto baru</label>
                <input id="foto" name="foto" type="file">
              </div>
            </div>

            <a href="<?= base_url('guru') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>