<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="<?= base_url('blog/tambah') ?>" class="btn btn-primary">
              <i class="fas fa-blog"></i> Tambah Blog
            </a>
            <br><br>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
              <table class="cell-border hover stripe table-bordered" id="dataTables-example">
                <thead>
                  <tr>
                    <th style="width:5%;">#</th>
                    <th style="width:25%;">Judul Blog</th>
                    <th style="width: 30%;">Slug Blog</th>
                    <th style="width:20%;">Tanggal Posting</th>
                    <th>Nama Pembuat Blog</th>
                    <th style="width: 9%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($blog as $bl) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $bl['judul_berita']; ?></td>
                      <td><?= $bl['slug_berita']; ?></td>
                      <td><?= $bl['tgl_berita']; ?></td>
                      <td><?= $bl['nama']; ?></td>
                      <td>
                        <a href="<?= base_url('blog/edit/') . $bl['id_berita']; ?>" class="btn btn-warning btn-sm" title="Edit data"> <i class="fas fa-edit"></i></a>

                        <a href="" data-toggle="modal" data-target="#hapusBerita<?= $bl['id_berita']; ?>" class="btn btn-danger btn-sm" title="Hapus data"> <i class="fas fa-trash"></i></a>
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
<?php foreach ($blog as $bl) :  ?>
  <div class="modal fade" id="hapusBerita<?= $bl['id_berita']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a href="<?= base_url('blog/hapus/' . $bl['id_berita']); ?>" class="btn btn-danger">Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- /modal Edit -->