<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <?php if ($this->session->flashdata('pesan')) : ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')) : ?>
            <?php endif; ?>

            <a href="<?= base_url('download/add') ?>" class="btn btn-primary">
              <i class="fas fa-fw fa-file-download"></i> Upload Berkas
            </a>
            
            <br><br>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
              <table class="cell-border hover stripe table-bordered" id="dataTables-example">
                <thead>
                  <tr>
                    <th style="width:20%;">#</th>
                    <th style="width:30%;">File</th>
                    <th style="width:30%;">Keterangan File</th>
                    <th style="width:20%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($download as $dw) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $dw['file']; ?></td>
                      <td><?= $dw['nama_file']; ?></td>
                      <td>
                        <a href="<?= base_url('blog/edit/') . $dw['id_file']; ?>" class="btn btn-warning btn-sm" title="Edit data"> <i class="fas fa-edit"></i></a>

                        <a href="<?= base_url('download/file/') .  $dw['id_file']; ?>" class="btn btn-success btn-sm" title="Download File"><i class="fas fa-download"></i></a>

                        <a href="" data-toggle="modal" data-target="#hapusFile<?= $dw['id_file']; ?>" class="btn btn-danger btn-sm" title="Hapus data"> <i class="fas fa-trash"></i></a>
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
<?php foreach ($download as $dw) :  ?>
  <div class="modal fade" id="hapusFile<?= $dw['id_file']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Berkas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apa Kamu Yakin Ingin Menghapus Berkas ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <a href="<?= base_url('download/hapus/' . $dw['id_file']) ?>" class="btn btn-danger">Hapus</a>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- /modal Edit -->