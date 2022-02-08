<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="<?= base_url('gallery/tambah'); ?>" class="btn btn-primary">
              <i class="fas fa-images"></i> Tambah Gallery Foto
            </a>
            <br><br>

            <?= $this->session->flashdata('pesan'); ?>
            
            <div class="table-responsive">
              <table class="cell-border hover stripe table-bordered" id="dataTables-example">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Gallery</th>
                    <th>Sampul</th>
                    <th style="width: 100px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($gallery as $g) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $g['nama_gallery']; ?></td>
                      <td style="text-align: center;"><img src="<?= base_url('assets/gallery/') . $g['sampul']; ?>" width="200px"><br>
                        <i class="fa fa-image"> <?= $g['jml_foto']; ?> Foto</i><br>
                        <a href="<?= base_url('gallery/add_foto/') . $g['id_gallery']; ?>" class="btn btn-success btn-xs">Tambah Foto</a>
                      </td>
                      <td>
                        <a href="<?= base_url('gallery/edit/') . $g['id_gallery'] ?>" class="btn btn-warning btn-sm" title="Edit Gallery">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="" data-toggle="modal" data-target="#hapusGallery<?= $g['id_gallery'] ?>" class="btn btn-danger btn-sm" title="Hapus Gallery">
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


<!-- Modal  Edit-->
<?php foreach ($gallery as $g) :  ?>
  <div class="modal fade" id="hapusGallery<?= $g['id_gallery']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apa Kamu Yakin Ingin Menghapus Data ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="<?= base_url('gallery/hapus/' . $g['id_gallery']) ?>" class="btn btn-danger">Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- /modal Edit -->