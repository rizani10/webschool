<!-- Courses -->

<div class="courses">
  <div class="row">
    <div class="col">
      <div class="section_title_container text-center"><br><br><br><br><br>
        <h2 class="section_title">Blog dan Berita</h2>
        <div class="section_subtitle">
          <h3 class="text-primary">SMPN 2 Padang Batung</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">

      <!-- Courses Main Content -->
      <div class="col-lg-8"><br><br>
        <div class="courses_container">
          <div class="row courses_row">


            <!-- Course -->
            <?php foreach ($blog as $bl) : ?>
              <div class="col-lg-6 course_col">
                <div class="course">
                <div class="course_image"><img src="<?= base_url('assets/fotoberita/') . $bl['icon_berita'];?>" width="350px" height="200px"></div>
                  <div class="course_body">
                    <h3 class="course_title"><a href="<?= base_url('home/detail_blog/' . $bl['slug_berita']) ?>"><?= word_limiter($bl['judul_berita'], 10); ?></a></h3>
                    <div class="course_text">
                      <p><?= word_limiter($bl['isi_berita'], 20) ?></p>
                    </div>
                  </div>
                  <div class="course_footer">
                    <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                      <div class="course_info">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span><?= $bl['nama']; ?></span>
                      </div>
                      <div class="course_info">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span><?= date('d F Y', strtotime($bl['tgl_berita'])) ; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
          <div class="row pagination_row">
            <div class="col">
              <div class="pagination_container d-flex flex-row align-items-center justify-content-start">
                <?php
                if (isset($pagination)) {
                  echo $pagination;
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Courses Sidebar -->
      <div class="col-lg-4"><br><br><br>
        <div class="sidebar">

          <!-- Categories -->
          <div class="sidebar_section">
            <div class="sidebar_section_title">Categories</div>
            <div class="sidebar_categories">
              <ul>
                <li><a href="#">Art & Design</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">IT & Software</a></li>
                <li><a href="#">Languages</a></li>
                <li><a href="#">Programming</a></li>
              </ul>
            </div>
          </div>

          <!-- Latest Course -->
          <div class="sidebar_section">
            <div class="sidebar_section_title">Latest Courses</div>
            <div class="sidebar_latest">

              <!-- Latest Course -->
              <div class="latest d-flex flex-row align-items-start justify-content-start">
                <div class="latest_image">
                  <div><img src="images/latest_1.jpg" alt=""></div>
                </div>
                <div class="latest_content">
                  <div class="latest_title"><a href="course.html">How to Design a Logo a Beginners Course</a></div>
                  <div class="latest_price">Free</div>
                </div>
              </div>

              <!-- Latest Course -->
              <div class="latest d-flex flex-row align-items-start justify-content-start">
                <div class="latest_image">
                  <div><img src="images/latest_2.jpg" alt=""></div>
                </div>
                <div class="latest_content">
                  <div class="latest_title"><a href="course.html">Photography for Beginners Masterclass</a></div>
                  <div class="latest_price">$170</div>
                </div>
              </div>

              <!-- Latest Course -->
              <div class="latest d-flex flex-row align-items-start justify-content-start">
                <div class="latest_image">
                  <div><img src="images/latest_3.jpg" alt=""></div>
                </div>
                <div class="latest_content">
                  <div class="latest_title"><a href="course.html">The Secrets of Body Language</a></div>
                  <div class="latest_price">$220</div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>