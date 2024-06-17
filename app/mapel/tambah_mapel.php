<?php
//* define notice variable
$result_notice = '';

//* check direct access permission
if (!defined('access')) { die('Direct access is not permitted!'); }
//* check access page by level
if (!defined('administrator') && !defined('kader')) { die('Access denied, not enough level!'); }

//* simpan
if (isset($_POST['simpan']))
{
    $kode_mapel = mysqli_real_escape_string($koneksi->db, $_POST['kode_mapel']);
    $nuptk      = mysqli_real_escape_string($koneksi->db, $_POST['nuptk']);
    $kelas_id   = mysqli_real_escape_string($koneksi->db, $_POST['kelas_id']);

    $data = [
        'kode_mapel' => $kode_mapel,
        'nuptk' => $nuptk,
        'kelas_id' => $kelas_id
    ];

    $result = $kelolaMapel->addMapel($data);
    $result_notice = $result;
}
?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Tambah Mapel</h4>
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
        <a href="?p=mapel">Mapel</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="">Tambah Mapel</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form Tambah Mapel</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <?php echo $result_notice; ?>
          </div>
          <form name="frmTambahMapel" method="POST" action="">
            <div class="form-group">
              <label for="kode_mapel">Kode Mapel</label>
              <input type="text" class="form-control" name="kode_mapel" maxlength="10" required>
            </div>
            <div class="form-group">
              <label for="nuptk">NUPTK</label>
              <input type="text" class="form-control" name="nuptk" maxlength="16" required>
            </div>
            <div class="form-group">
              <label for="kelas_id">Kelas ID</label>
              <input type="text" class="form-control" name="kelas_id" maxlength="10" required>
            </div>
            <div class="form-group">
              <div class="d-flex align-items-center mt-4">
                <a href="?p=mapel" class="btn btn-danger btn-round btn-sm mr-1 ml-auto"> <i class="fas fa-angle-left mr-2"></i> Kembali</a>
                <button type="reset" class="btn btn-default btn-round btn-sm mr-1" name="batal"> <i class="fas fa-sync-alt mr-2"></i> Batal</button>
                <button type="submit" class="btn btn-primary btn-round btn-sm mr-1" name="simpan"> <i class="fas fa-save mr-2"></i> Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
