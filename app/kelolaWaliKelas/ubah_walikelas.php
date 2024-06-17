<?php
// Define notice variable
$result_notice = '';

// Check direct access permission
if (!defined('access')) {
    die('Direct access is not permitted!');
}
// Check access page by level
if (!defined('administrator') && !defined('kader')) {
    die('Access denied, not enough level!');
}

// Fetch mapel data
$nuptk_query = "SELECT nuptk, nuptk FROM guru";
$nuptk_result = mysqli_query($koneksi->db, $nuptk_query);
$nuptk_options = '';

// Fetch nama data
$nama_query = "SELECT nuptk, nama FROM guru"; // Query to fetch nama data
$nama_result = mysqli_query($koneksi->db, $nama_query);
$nama_options = '';

if (mysqli_num_rows($nuptk_result) > 0) {
    while ($row = mysqli_fetch_assoc($nuptk_result)) {
        $nuptk_options .= "<option value='{$row['nuptk']}'>{$row['nuptk']}</option>";
    }
}

if (mysqli_num_rows($nama_result) > 0) {
    while ($row = mysqli_fetch_assoc($nama_result)) {
        $nama_options .= "<option value='{$row['nama']}'>{$row['nama']}</option>"; // Populate nama options
    }
}

// Get the current walikelas data
if (isset($_GET['wali_kelas_id'])) {
    $wali_kelas_id = $_GET['wali_kelas_id'];
    $data_walikelas = $walikelas->getInfoDetailWalikelas($wali_kelas_id);
    if (!$data_walikelas) {
        die('Data not found!');
    }
} else {
    die('No Wali Kelas ID specified!');
}

// Update walikelas data
if (isset($_POST['perbarui'])) {
    $wali_kelas_id = mysqli_real_escape_string($koneksi->db, $_POST['wali_kelas_id']);
    $nuptk = mysqli_real_escape_string($koneksi->db, $_POST['nuptk']);
    $nama = mysqli_real_escape_string($koneksi->db, $_POST['nama']);
    $kelas = mysqli_real_escape_string($koneksi->db, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($koneksi->db, $_POST['jurusan']);
    
    $result = $walikelas->UbahWaliKelas($wali_kelas_id, $nuptk, $nama, $kelas, $jurusan);
    $result_notice = $result ? 'success' : 'error';
}
?>

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Ubah Data Walikelas</h4>
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
                <a href="?p=walikelas">Data Walikelas</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="">Ubah Data Walikelas</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Ubah Data Walikelas</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <?php
                        if ($result_notice === 'success') {
                            echo '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>';
                        } elseif ($result_notice === 'error') {
                            echo '<div class="alert alert-danger" role="alert">Gagal menyimpan data. Silakan coba lagi.</div>';
                        }
                        ?>
                    </div>
                    <form name="frmUbahWalikelas" method="POST" action="">
                        <div class="form-group">
                            <label for="wali_kelas_id">Wali Kelas ID</label>
                            <input type="text" class="form-control" name="wali_kelas_id" maxlength="30" value="<?php echo $data_walikelas['wali_kelas_id']; ?>" readonly>
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
                            <input type="text" class="form-control" name="kelas" maxlength="30" value="<?php echo $data_walikelas['kelas']; ?>" required>
                        </div>
                        <div class="form-group custom-form-group custom-jurusan">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" maxlength="30" value="<?php echo $data_walikelas['jurusan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <div class="d-flex align-items-center mt-4">
                                <a href="?p=walikelas" class="btn btn-danger btn-round btn-sm mr-1 ml-auto">
                                    <i class="fas fa-angle-left mr-2"></i>Kembali
                                </a>
                                <button type="reset" class="btn btn-default btn-round btn-sm mr-1" name="batal">
                                    <i class="fas fa-sync-alt mr-2"></i>Batal
                                </button>
                                <button type="submit" class="btn btn-primary btn-round btn-sm mr-1" name="perbarui">
                                    <i class="fas fa-save mr-2"></i>Perbarui
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
