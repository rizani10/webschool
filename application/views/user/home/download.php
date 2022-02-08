
<!-- Latest News -->
<div class="news">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section_title_container text-center"><br><br><br><br><br>
          <h2 class="section_title">Download File</h2>
          <div class="section_subtitle">
            <p>Berkas File SMPN 2 Padang Batung</p>
          </div>
        </div>
        <div class="table table-responsive">
          <table class="table table-striped table table-bordered table-active" id="dataTables-example">
            <thead>
              <tr class="table-primary text-dark text-center">
                <th style="width: 10px;">No</th>
                <th>Keterangan File</th>
                <th style="width: 150px;">Tanggal Upload</th>
                <th style="width: 20px;">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-dark">
              <?php
              $i = 1;
              foreach ($download as $dw) : ?>
                <tr>
                  <td class="text-center"><?= $i++; ?></td>
                  <td><?= $dw['nama_file']; ?></td>
                  <td class="text-center"><?= $dw['tgl_upload']; ?></td>
                  <td>
                    <a href="<?= base_url('assets/berkas/') .  $dw['file']; ?>" class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Download
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
  <div class="row news_row">

  </div>
</div>