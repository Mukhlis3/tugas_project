<?php
  //* check direct access permission
  // if (!defined('access')) { die('Direct access is not permitted!'); }
  // //* check access page by level
  // if (!defined('administrator')) { die('Access denied, not enough level!'); }
?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Guru</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="?p=dashboard">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="">Datar Guru</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data guru Guru</h4>
            <a href="?p=tambah_guru" class="btn btn-primary btn-round btn-sm ml-auto"> <i class="fas fa-plus mr-2"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="DataTables" class="display table table-striped table-hover">
              <thead>
                <th>Nuptk</th>
                <th>nip</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Mata Pelajaran ID</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Status Aktif</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php
                  // Panggil metode getListGuru dari kelas Guru
                  $guru = new KelolaGuru();
                  $listGuru = $guru->getListGuru();

                  // Periksa apakah ada data guru
                  if ($listGuru) {
                    foreach ($listGuru as $guru) {
                ?>
                  <tr>
                    <td> <?php echo $guru['nuptk']; ?> </td>
                    <td> <?php echo $guru['nip']; ?> </td>
                    <td> <?php echo $guru['nama']; ?> </td>
                    <td> <?php echo $guru['jenisKelamin']; ?> </td>
                    <td> <?php echo $guru['mapel_id']; ?> </td>
                    <td> <?php echo $guru['alamat']; ?> </td>
                    <td> <?php echo $guru['email']; ?> </td>
                    <td> <?php echo $guru['noTelpon']; ?> </td>
                    <td> <?php echo $guru['statusAktif']; ?> </td>
                    <td>
                      <a href="?p=ubah_guru&nuptk=<?php echo $guru['nuptk']; ?>" class="btn btn-primary btn-round btn-sm"> <i class="fas fa-edit mr-2"></i> Ubah</a> 
                      <a href="?p=hapus_guru&nuptk=<?php echo $guru['nuptk']; ?>" onclick="validateRemove(event)" class="btn btn-danger btn-round btn-sm"> <i class="fas fa-trash-alt mr-2"></i> Hapus</a>
                    </td>
                  </tr>
                <?php
                    }
                  } else {
                    // Jika tidak ada data guru, tampilkan pesan
                    echo "<tr><td colspan='9'>Tidak ada data guru.</td></tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
