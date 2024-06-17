<?php
  //* define notice variable
  $result_notice = '';

  //* check direct access permission
  if (!defined('access')) { die('Direct access is not permitted!'); }
  //* check access page by level
  if (!defined('administrator') && !defined('kader')) { die('Access denied, not enough level!'); }
  // Fetch mapel data
$mapel_query = "SELECT mapel_id, kode_mapel FROM mapel";
$mapel_result = mysqli_query($koneksi->db, $mapel_query);
$mapel_options = '';

if (mysqli_num_rows($mapel_result) > 0) {
    while ($row = mysqli_fetch_assoc($mapel_result)) {
        $mapel_options .= "<option value='{$row['mapel_id']}'>{$row['kode_mapel']}</option>";
    }
}

  //* simpan
  if (isset($_POST['simpan']))
  {
    $nuptk = mysqli_real_escape_string($koneksi->db, $_POST['nuptk']);
    $nip = mysqli_real_escape_string($koneksi->db, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi->db, $_POST['nama']);
    $jenisKelamin = mysqli_real_escape_string($koneksi->db, $_POST['jenisKelamin']);
    $mapel_id = mysqli_real_escape_string($koneksi->db, $_POST['mapel_id']);
    $alamat = mysqli_real_escape_string($koneksi->db, $_POST['alamat']);
    $email = mysqli_real_escape_string($koneksi->db, $_POST['email']);
    $noTelpon = mysqli_real_escape_string($koneksi->db, $_POST['noTelpon']);
    $statusAktif = mysqli_real_escape_string($koneksi->db, $_POST['statusAktif']);
   
    $result = $guru->tambahGuru($nuptk, $nip, $nama, $jenisKelamin, $mapel_id, $alamat, $email, $noTelpon, $statusAktif);
    $result_notice = $result;
  }
?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Tambah Guru</h4>
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
        <a href="?p=guru">Guru</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="">Tambah Guru</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form Tambah Guru</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <?php echo $result_notice; ?>
          </div>
          <form name="frmTambahGuru" method="POST" action="">
            <div class="form-group">
              <label for="nuptk">NUPTK</label>
              <input type="text" class="form-control" name="nuptk" maxlength="16" required>
            </div>
            <div class="form-group">
              <label for="nip">NIP</label>
              <input type="text" class="form-control" name="nip" maxlength="18" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <input type="text" class="form-control" name="jenisKelamin" maxlength="10" required>
            </div>
            <div class="form-group">
                            <label for="mapel_id">Mata Pelajaran</label>
                            <select class="form-control" name="mapel_id" required>
                                <?php echo $mapel_options; ?>
                            </select>
                        </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="noTelpon">No. Telepon</label>
              <input type="text" class="form-control" name="noTelpon" maxlength="15" required>
            </div>
            <div class="form-group">
              <label for="statusAktif">Status Aktif</label>
              <input type="text" class="form-control" name="statusAktif" maxlength="20" required>
            </div>
            <div class="form-group">
              <div class="d-flex align-items-center mt-4">
                <a href="?p=guru" class="btn btn-danger btn-round btn-sm mr-1 ml-auto"> <i class="fas fa-angle-left mr-2"></i> Kembali</a>
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
