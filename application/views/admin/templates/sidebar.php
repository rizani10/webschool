<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">Admin</span>
    </a>


    <ul class="sidebar-nav" id="">
      <li class="sidebar-header">
        Pages
      </li>


      <li <?php if($title2 == 'Dashboard') echo "class='sidebar-item active'"?>>
        <a class="sidebar-link" href="<?= base_url('admin'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard
        </a>
      </li>

      <li <?php if($title2 == 'Daftar Mata Pelajaran') echo "class='sidebar-item active'"?>>
        <a class="sidebar-link" href="<?= base_url('mapel'); ?>">
          <i class="far fa-fw fa-calendar-alt"></i> Daftar Mata Pelajaran
        </a>
      </li>

      <li <?php if($title2 == 'Data Guru') echo "class='sidebar-item active'"?>>
        <a class="sidebar-link" href="<?= base_url('guru'); ?>">
          <i class="fas fa-fw fa-chalkboard-teacher"></i> Data Guru
        </a>
      </li>
      <li <?php if($title2 == 'Data Siswa') echo "class='sidebar-item active'"?>>
        <a class="sidebar-link" href="<?= base_url('siswa'); ?>">
          <i class="fas fa-fw fa-user-graduate"></i> Data Siswa
        </a>
      </li>
      <li <?php if($title2 == 'Pengumuman') echo "class='sidebar-item active'"?>>
        <a class="sidebar-link" href="<?= base_url('pengumuman'); ?>">
          <i class="fas fa-fw fa-bullhorn"></i> Pengumuman
        </a>
      </li>
      <li <?php if($title2 == 'Blog') echo "class='sidebar-item active'"?>>
        <a class="sidebar-link" href="<?= base_url('blog'); ?>">
          <i class="fas fa-fw fa-blog"></i> Blog
        </a>
      </li>
      <li <?php if($title2 == 'Gallery Foto') echo "class='sidebar-item active'"?>>
        <a class="sidebar-link" href="<?= base_url('gallery'); ?>">
          <i class="fas fa-fw fa-images"></i> Gallery Foto
        </a>
      </li>
      <li <?php if($title2 == 'Halaman Upload Berkas') echo "class='sidebar-item active'"?>>
        <a class="sidebar-link" href="<?= base_url('download'); ?>">
          <i class="fas fa-fw fa-file-download"></i> Upload File
        </a>
      </li>
    </ul>
  </div>
</nav>