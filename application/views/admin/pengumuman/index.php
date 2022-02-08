<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="" data-toggle="modal" data-target="#pengumumanAdd" class="btn btn-primary">
              <i class="fas fa-fw fa-bullhorn"></i> Tambah Pengumuman
            </a>
            <br><br>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
              <table class="cell-border hover stripe table-bordered" id="dataTables-example">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Pengumuman</th>
                    <th>Isi Pengumuman</th>
                    <th>Tanggal Dibuat</th>
                    <th style="width: 9%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($pengumuman as $p) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $p['judul_pengumuman']; ?></td>
                      <td><?= $p['isi_pengumuman']; ?></td>
                      <td><?= $p['tgl_dibuat']; ?></td>
                      <td>
                        <a href="" data-toggle="modal" title="Edit Pengumuman" data-target="#pengumumanEdit<?= $p['id_pengumuman']; ?>" class="btn btn-warning btn-sm">
                          <i class="fas fa-edit"></i>
                        </a>

                        <a href="" data-toggle="modal" title="Hapus Pengumuman" data-target="#pengumumanHapus<?= $p['id_pengumuman']; ?>" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- modal add -->
<div class="modal fade" id="pengumumanAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('pengumuman/add') ?>
        <div class="form-group">
          <label for="judul_pengumuman">Judul Pengumuman</label>
          <input class="form-control" id="judul_pengumuman" name="judul_pengumuman" placeholder="Judul Pengumuman" type="text" required>
        </div>
        <div class="form-group">
          <label for="isi_pengumuman">Isi Pengumuman</label>
          <textarea name="isi_pengumuman" id="isi_pengumuman" cols="30" rows="10" class="form-control" placeholder="Isi Pengumuman" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
<!-- ./ modal add -->

<!-- modal edit -->
<?php foreach ($pengumuman as $p) : ?>
  <div class="modal fade" id="pengumumanEdit<?= $p['id_pengumuman']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open('pengumuman/edit') ?>
          <input type="hidden" name="id_pengumuman" value="<?= $p['id_pengumuman']; ?>">
          <div class="form-group">
            <label for="judul_pengumuman">Judul Pengumuman</label>
            <input class="form-control" id="judul_pengumuman" name="judul_pengumuman" value="<?= $p['judul_pengumuman']; ?>" type="text" required>
          </div>
          <div class="form-group">
            <label for="isi_pengumuman">Isi Pengumuman</label>
            <textarea name="isi_pengumuman" id="isi_pengumuman" cols="30" rows="10" class="form-control" placeholder="Isi Pengumuman" required> <?= $p['isi_pengumuman']; ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- ./ modal add -->

<!-- pengumuman hapus -->
<?php foreach ($pengumuman as $p) : ?>
  <div class="modal fade" id="pengumumanHapus<?= $p['id_pengumuman']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apa Kamu Yakin Ingin Menghapus Data ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="<?= base_url('pengumuman/hapus/' . $p['id_pengumuman']) ?>" class="btn btn-danger">Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- pengumuman hapus -->