<!-- Team -->

<div class="team"><br><br><br><br><br><br>
  <div class="team_background parallax-window" data-parallax="scroll" data-image-src="images/team_background.jpg" data-speed="0.8"></div>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section_title_container text-center">
          <h2 class="section_title">Pengajar dan Tenaga Kependidikan</h2>
          <div class="section_subtitle">
            <h4 class="text-primary">SMP Negeri 2 Padang Batung</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="row team_row">

      <?php foreach ($guru as $gr) : ?>
        <!-- Team Item -->
        <div class="col-lg-3 col-md-6 team_col">
          <div class="team_item">
            <div class="team_image"><img src="<?= base_url('assets/fotoguru/') . $gr['foto'] ?>" width="200px" height="210px"></div>
            <div class="team_body">
              <div class="team_title"><a href="#"><?= $gr['nama']; ?></a></div>
              <div class="team_subtitle"><?= $gr['mapel']; ?></div>
              <div class="social_list">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>