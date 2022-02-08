<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><?= $title2; ?></h1>
    <div class="row">
      <div class="col-12">
        
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card">
          <div class="card-body">
            <?= form_open_multipart('download/add/'); ?>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nama_foto">Keterangan file</label>
                <input type="text" class="form-control" id="nama_file" name="nama_file" placeholder="Keterangan file">
                <?= form_error('nama_file', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group col-md-6">
                <label for="file">File</label>
                <input type="file" class="form-control" id="file" name="file"  accept=".pdf,.doc,.docx,.ppt,.pptx">
                <small class="text-danger">Maksimal Ukuran 2 MB Type : PDF, DOC, DOCX, PPT, PPTX</small>
              </div>
            </div>

            <a href="<?= base_url('download') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>