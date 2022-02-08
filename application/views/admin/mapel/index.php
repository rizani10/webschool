<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="" data-toggle="modal" data-target="#mapelAdd" class="btn btn-primary">
              <i class="fas fa-calendar-plus"></i> Tambah Mapel
            </a>
            <br><br>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
              <table class="cell-border hover stripe table-bordered" id="dataTables-example">
                <thead>
                  <tr>
                    <th style="width:20%;">#</th>
                    <th style="width:60%;">Mata Pelajaran</th>
                    <th style="width:20%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($mapel as $m) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $m['mapel']; ?></td>
                      <td>
                        <a href="" data-toggle="modal" title="Edit Mapel" data-target="#mapelEdit<?= $m['id_mapel']; ?>" class="btn btn-warning btn-sm">
                          <i class="fas fa-edit"></i>
                        </a>

                        <a href="" data-toggle="modal" title="Hapus Mapel" data-target="#mapelHapus<?= $m['id_mapel']; ?>" class="btn btn-danger btn-sm">
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

<!-- Modal  add-->
<div class="modal fade" id="mapelAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('mapel/add') ?>
        <div class="form-group">
          <label for="mapel">Mata Pelajaran</label>
          <input class="form-control" type="text" id="mapel" name="mapel" placeholder="Mata Pelajaran" required>
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
<!-- /modal add -->

<!-- Modal  Edit-->
<?php foreach ($mapel as $m) :  ?>
  <div class="modal fade" id="mapelEdit<?= $m['id_mapel']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open('mapel/edit'); ?>
          <input type="hidden" name="id_mapel" value="<?= $m['id_mapel']; ?>">
          <div class="form-group">
            <label for="mapel">Mata Pelajaran</label>
            <input class="form-control" type="text" id="mapel" name="mapel" value="<?= $m['mapel']; ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- /modal Edit -->

<!-- Modal  Edit-->
<?php foreach ($mapel as $m) :  ?>
  <div class="modal fade" id="mapelHapus<?= $m['id_mapel']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a href="<?= base_url('mapel/hapus/' . $m['id_mapel']) ?>" class="btn btn-danger">Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- /modal Edit -->