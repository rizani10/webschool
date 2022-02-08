<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="<?= base_url('siswa/tambah') ?>" class="btn btn-primary">
              <i class="fas fa-user-graduate"></i> Tambah Siswa
            </a>
            <br><br>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
              <table class="cell-border hover stripe table-bordered" id="dataTables-example">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Foto</th>
                    <th style="width: 9%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($siswa as $s) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $s['nisn']; ?></td>
                      <td><?= $s['nama']; ?></td>
                      <td><?= $s['tempat_lahir']; ?></td>
                      <td><?= $s['tgl_lahir']; ?></td>
                      <td><?= $s['kelas']; ?></td>
                      <td style="text-align: center;"><img src="<?= base_url('assets/fotosiswa/') . $s['foto_siswa']; ?>" alt="" width="100px"></td>
                      <td>
                        <a href="<?= base_url('siswa/edit/') . $s['id_siswa']; ?>" class="btn btn-warning btn-sm" title="Edit data"> <i class="fas fa-edit"></i></a>

                        <a href="" data-toggle="modal" data-target="#hapusSiswa<?= $s['id_siswa']; ?>" class="btn btn-danger btn-sm" title="Hapus data"> <i class="fas fa-trash"></i></a>
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
<?php foreach ($siswa as $s) :  ?>
  <div class="modal fade" id="hapusSiswa<?= $s['id_siswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a href="<?= base_url('siswa/hapus/' . $s['id_siswa']) ?>" class="btn btn-danger">Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- /modal Edit -->