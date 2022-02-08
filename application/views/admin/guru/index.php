<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="<?= base_url('guru/tambah') ?>" class="btn btn-primary">
              <i class="fas fa-chalkboard-teacher"></i> Tambah Guru
            </a>
            <br><br>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
              <table class="cell-border hover stripe table-bordered" id="dataTables-example">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th style="width: 10%;">Tanggal Lahir</th>
                    <th>Mapel</th>
                    <th>Pendidikan</th>
                    <th>Foto</th>
                    <th style="width: 8%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($guru as $g) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $g['nip']; ?></td>
                      <td><?= $g['nama']; ?></td>
                      <td><?= $g['tempat_lahir']; ?></td>
                      <td><?= $g['tgl_lahir']; ?></td>
                      <td><?= $g['mapel']; ?></td>
                      <td><?= $g['pendidikan']; ?></td>
                      <td><img src="<?= base_url('assets/fotoguru/') . $g['foto']; ?>" alt="" width="100px"></td>
                      <td>
                        <a href="<?= base_url('guru/edit/') . $g['id_guru']; ?>" class="btn btn-warning btn-sm" title="Edit data"> <i class="fas fa-edit"></i></a>

                        <a href="" data-toggle="modal" data-target="#hapusGuru<?= $g['id_guru']; ?>" class="btn btn-danger btn-sm" title="Hapus data"> <i class="fas fa-trash"></i></a>
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

<!-- Modal  Edit-->
<?php foreach ($guru as $g) :  ?>
  <div class="modal fade" id="hapusGuru<?= $g['id_guru']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a href="<?= base_url('guru/hapus/' . $g['id_guru']) ?>" class="btn btn-danger">Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- /modal Edit -->