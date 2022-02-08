<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart('guru/tambah'); ?>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nip">NIP</label>
                <input class="form-control" id="nip" name="nip" placeholder="NIP" type="text">
                <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
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
                <div class="form-group">
                  <label for="id_mapel">Mata Pelajaran</label>
                  <select name="id_mapel" id="id_mapel" class="form-control" required>
                    <option disabled selected>Silahkan Pilih</option>
                    <?php foreach ($mapel as $m) : ?>
                      <option value="<?= $m['id_mapel']; ?>"><?= $m['mapel']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="pendidikan">Pendidikan Terakhir</label>
                <input class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan Terakhir">
                <?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label w-100" for="foto">Foto</label>
              <input id="foto" name="foto" type="file" required>
            </div>

            <a href="<?= base_url('guru') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>