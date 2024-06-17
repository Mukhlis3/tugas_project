<?php
//* Define notice variable
$result_notice = '';

//* Check direct access permission
if (!defined('access')) {
    die('Direct access is not permitted!');
}
//* Check access page by level
if (!defined('administrator') && !defined('kader')) {
    die('Access denied, not enough level!');
}

// Fetch mapel data
$nuptk_query = "SELECT nuptk, nuptk FROM guru";
$nuptk_result = mysqli_query($koneksi->db, $nuptk_query);
$nuptk_options = '';

// Fetch nama data
$nama_query = "SELECT nuptk, nama FROM guru";
$nama_result = mysqli_query($koneksi->db, $nama_query);
$nama_options = '';

if (mysqli_num_rows($nuptk_result) > 0) {
    while ($row = mysqli_fetch_assoc($nuptk_result)) {
        $nuptk_options .= "<option value='{$row['nuptk']}'>{$row['nuptk']}</option>";
    }
}

if (mysqli_num_rows($nama_result) > 0) {
    while ($row = mysqli_fetch_assoc($nama_result)) {
        $nama_options .= "<option value='{$row['nama']}'>{$row['nama']}</option>";
    }
}

//* simpan
if (isset($_POST['simpan'])){
    $wali_kelas_id = mysqli_real_escape_string($koneksi->db, $_POST['wali_kelas_id']);
    $nuptk = mysqli_real_escape_string($koneksi->db, $_POST['nuptk']);
    $nama =  mysqli_real_escape_string($koneksi->db, $_POST['nama']);
    $kelas = mysqli_real_escape_string($koneksi->db, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($koneksi->db, $_POST['jurusan']);
   
    $result = $walikelas->tambahWaliKelas($wali_kelas_id, $nuptk, $nama, $kelas, $jurusan);
    $result_notice = $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Walikelas</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
</head>
<body>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tambah Walikelas</h4>
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
                    <a href="?p=walikelas">Walikelas</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="">Tambah Walikelas</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Walikelas</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <?php echo $result_notice; ?>
                        </div>
                        <form name="frmTambahWalikelas" method="POST" action="">
                            <div class="form-group">
                                <label for="wali_kelas_id">ID</label>
                                <input type="text" class="form-control" name="wali_kelas_id" id="wali_kelas_id" required>
                            </div>
                            <div class="form-group">
                                <label for="nuptk">NUPTK</label>
                                <select class="form-control" name="nuptk" required>
                                    <?php echo $nuptk_options; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <select class="form-control" name="nama" required>
                                    <?php echo $nama_options; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas" required>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" required>
                            </div>
                            <div class="form-group">
                                <div class="d-flex align-items-center mt-4">
                                    <a href="?p=guru" class="btn btn-danger btn-round btn-sm mr-1 ml-auto">
                                        <i class="fas fa-angle-left mr-2"></i> Kembali
                                    </a>
                                    <button type="reset" class="btn btn-default btn-round btn-sm mr-1" name="batal">
                                        <i class="fas fa-sync-alt mr-2"></i> Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-round btn-sm mr-1" name="simpan">
                                        <i class="fas fa-save mr-2"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>
