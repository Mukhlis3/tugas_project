<?php
//* define notice variable
$result_notice = '';


if (!defined('access')) { die('Direct access is not permitted!'); }

if (!defined('administrator') && !defined('kader')) { die('Access denied, not enough level!'); }


$kode_mapel = mysqli_real_escape_string($koneksi->db, $_GET['kode_mapel']);


$data_mapel = $kelolaMapel->getInfoMapel($kode_mapel);

//* perbarui
if (isset($_POST['perbarui']))
{
    $nuptk    = mysqli_real_escape_string($koneksi->db, $_POST['nuptk']);
    $kelas_id = mysqli_real_escape_string($koneksi->db, $_POST['kelas_id']);

    $data = [
        'nuptk' => $nuptk,
        'kelas_id' => $kelas_id
    ];

    $result = $kelolaMapel->editMapel($kode_mapel, $data);
    $result_notice = $result;
}
?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Ubah Mapel</h4>
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
        <a href="">Ubah Mapel</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form Ubah Mapel</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <?php echo $result_notice; ?>
          </div>
          <form name="frmUbahMapel" method="POST" action="">
            <div class="form-group">
              <label for="kode_mapel">Kode Mapel</label>
              <input type="text" class="form-control" name="kode_mapel" value="<?php echo $data_mapel['kode_mapel'] ?>" maxlength="10" required readonly>
            </div>
            <div class="form-group">
              <label for="nuptk">NUPTK</label>
              <input type="text" class="form-control" name="nuptk" value="<?php echo $data_mapel['nuptk'] ?>" maxlength="16" required>
            </div>
            <div class="form-group">
              <label for="kelas_id">Kelas ID</label>
              <input type="text" class="form-control" name="kelas_id" value="<?php echo $data_mapel['kelas_id'] ?>" maxlength="10" required>
            </div>
            <div class="form-group">
              <div class="d-flex align-items-center mt-4">
                <a href="?p=mapel" class="btn btn-danger btn-round btn-sm mr-1 ml-auto"> <i class="fas fa-angle-left mr-2"></i> Kembali</a>
                <button type="reset" class="btn btn-default btn-round btn-sm mr-1" name="batal"> <i class="fas fa-sync-alt mr-2"></i> Batal</button>
                <button type="submit" class="btn btn-primary btn-round btn-sm mr-1" name="perbarui"> <i class="fas fa-save mr-2"></i> Perbarui</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
