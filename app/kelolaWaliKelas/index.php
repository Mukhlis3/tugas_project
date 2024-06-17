<?php
  //* check direct access permission
  // if (!defined('access')) { die('Direct access is not permitted!'); }
  //* check access page by level
  // if (!defined('administrator') && !defined('siswa')) { die('Access denied, not enough level!'); }
?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Walikelas</h4>
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
        <a href="">Walikelas</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Walikelas</h4>
            <a href="?p=tambah_walikelas" class="btn btn-primary btn-round btn-sm ml-auto"> <i class="fas fa-plus mr-2"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="DataTables" class="display table table-striped table-hover">
              <thead>
                <th>ID Wali Kelas</th>
                <th>NUPTK</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
              </thead>
              <tbody>
                
                <?php
                  $rows = $walikelas->getListWaliKelas();
                  if ($rows != false)
                  {
                    foreach ($rows as $walikelas)
                    {
                ?>
                  <tr>
                    <td> <?php echo $walikelas['wali_kelas_id'] ?> </td>
                    <td> <?php echo $walikelas['nuptk'] ?> </td>
                    <td> <?php echo $walikelas['nama'] ?> </td>
                    <td> <?php echo $walikelas['kelas'] ?> </td>
                    <td> <?php echo $walikelas['jurusan'] ?> </td>
                    <td>
                      <a href="?p=ubah_walikelas&wali_kelas_id=<?php echo $walikelas['wali_kelas_id'] ?>" class="btn btn-primary btn-round btn-sm"> <i class="fas fa-edit mr-2"></i> Ubah</a> 
                      <a href="?p=hapus_walikelas&wali_kelas_id=<?php echo $walikelas['wali_kelas_id'] ?>" onclick="validateRemove(event)" class="btn btn-danger btn-round btn-sm"> <i class="fas fa-trash-alt mr-2"></i> Hapus</a>
                    </td>
                  </tr>
                <?php
                    }
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
    
