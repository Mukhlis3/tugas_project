<?php
//* check direct access permission
if (!defined('access')) { die('Direct access is not permitted!'); }
//* check access page by level
if (!defined('administrator') && !defined('kader')) { die('Access denied, not enough level!'); }
?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Mata Pelajaran</h4>
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
        <a href="?p=klien">Mata Pelajaran</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Mata Pelajaran</h4>
            <a href="?p=tambah-klien" class="btn btn-primary btn-round btn-sm ml-auto"> <i class="fas fa-plus mr-2"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="DataTables" class="display table table-striped table-hover">
              <thead>
                <th>MAPEL ID</th>
                <th>KODE MAPEL</th>
                <th>NUPTK</th>
                <th>KELAS ID</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php
                  $rows = $mapel->getListMapel();
                  if ($rows != false)
                  {
                    foreach ($rows as $data_mapel)
                    {
                ?>
                      <tr>
                        <td> <?php echo $data_mapel['mapel_id'] ?> </td>
                        <td> <?php echo $data_mapel['kode_mapel'] ?> </td>
                        <td> <?php echo $data_mapel['nuptk'] ?> </td>
                        <td> <?php echo $data_mapel['kelas_id'] ?> </td>
                        <td>
                          <a href="?p=ubah&mapel_id=<?php echo $data_klien['mapel_id'] ?>" class="btn btn-primary btn-round btn-sm"> <i class="fas fa-edit mr-2"></i> Ubah</a> 
                          <a href="?p=hapus&mapel_id=<?php echo $data_klien['mapel_id'] ?>" onclick="validateRemove(event)" class="btn btn-danger btn-round btn-sm"> <i class="fas fa-trash-alt mr-2"></i> Hapus</a>
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
