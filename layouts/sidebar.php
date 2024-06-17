<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
					<img src="../assets/img/profile2.png" alt="" class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span style="padding-top:10px;">
							<?php echo $_SESSION['nama']; ?>
							<span class="user-level"><?php echo ucfirst($_SESSION['level']); ?></span>
						</span>
					</a>
					<div class="clearfix"></div>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item">
					<a href="index.php?p=dashboard">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
        </li>
        <!-- //* Administrator -->
        <?php if ($_SESSION['level'] == 'administrator') { ?>
        <li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Admin</h4>
        </li>
        <li class="nav-item">
					<a href="index.php?p=pengguna">
						<i class="fas fa-user"></i>
						<p>Data Pengguna</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="index.php?p=walikelas">
						<i class="fas fa-user"></i>
						<p>Data Wali Kelas</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="index.php?p=murid">
						<i class="fas fa-user"></i>
						<p>Data Murid</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="index.php?p=guru">
						<i class="fas fa-user"></i>
						<p>Data Guru</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="index.php?p=mapel">
						<i class="fas fa-book"></i>
						<p>Data Mata Pelajaran</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="index.php?p=nilai">
						<i class="fas fa-book"></i>
						<p>Data Nilai Mapel</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="../app/laporan/index.php">
						<i class="fas fa-medal"></i>
						<p>Laporan Raport Siswa</p>
					</a>
        </li>
        <?php } ?>

        <!-- //* Wali Kelas -->
        <?php if ($_SESSION['level'] == 'walikelas') { ?>
			<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">waliKelas</h4>
        </li>
		<li class="nav-item">
					<a href="index.php?p=guru">
						<i class="fas fa-user"></i>
						<p>Data Guru</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="../app/laporan/index.php">
						<i class="fas fa-medal"></i>
						<p>Laporan Raport Siswa</p>
					</a>
        </li>
        <?php } ?>

        <!-- //* Guru -->
        <?php if ($_SESSION['level'] == 'guru') { ?>
        <li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Guru</h4>
        </li>
        
        <li class="nav-item">
					<a href="index.php?p=guru">
						<i class="fas fa-user"></i>
						<p>Data Guru</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="index.php?p=mapel">
						<i class="fas fa-book"></i>
						<p>Data Mata Pelajaran</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="index.php?p=nilai">
						<i class="fas fa-book"></i>
						<p>Data Nilai Mapel</p>
					</a>
        </li>
        <li class="nav-item">
					<a href="../app/laporan/index.php">
						<i class="fas fa-medal"></i>
						<p>Laporan Raport Siswa</p>
					</a>
        </li>
        <?php } ?>

        <!-- //* Kepala Sekolah -->
        <?php if ($_SESSION['level'] == 'kepsek') { ?>
        <li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Kepala Sekolah</h4>
        </li>
        <li class="nav-item">
					<a href="../app/laporan/index.php">
						<i class="fas fa-medal"></i>
						<p>Laporan Raport Siswa</p>
					</a>
        </li>
        <?php } ?>

        <!-- //* Siswa -->
        <?php if ($_SESSION['level'] == 'siswa') { ?>
        <li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Laporan</h4>
        </li>
        <li class="nav-item">
					<a href="../app/laporan_murid/index.php">
						<i class="fas fa-medal"></i>
						<p>Laporan Raport Siswa</p>
					</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
