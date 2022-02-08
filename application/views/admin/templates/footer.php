<footer class="footer">
  <div class="container-fluid">
    <div class="row text-muted">
      <div class="col-6 text-left">
        <p class="mb-0">
          <a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy;
        </p>
      </div>
      <div class="col-6 text-right">
        <ul class="list-inline">
          <li class="list-inline-item">
            <a class="text-muted" href="#">Support</a>
          </li>
          <li class="list-inline-item">
            <a class="text-muted" href="#">Help Center</a>
          </li>
          <li class="list-inline-item">
            <a class="text-muted" href="#">Privacy</a>
          </li>
          <li class="list-inline-item">
            <a class="text-muted" href="#">Terms</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</div>
</div>

<!-- <script src="<?= base_url('assets/back-and/') ?>js/vendor.js"></script> -->
<script src="<?= base_url('assets/back-and/') ?>js/app.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="<?= base_url('assets/back-and/') ?>js/jquery.dataTables.min.js"></script>

<script src="<?= base_url('assets/back-and/') ?>js/bootstrap-transition.js"></script>

<script src="<?= base_url('assets/back-and/') ?>js/bootstrap-datepicker.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="<?= base_url('assets/back-and/') ?>js/my.js"></script>
<script>
  CKEDITOR.replace('isi_berita', {
    filebrowserImageBrowseUrl: "<?= base_url('assets/kcfinder/browse.php') ?>",
    height: '300px'
  });
  // initSample()
</script>
</body>

</html>