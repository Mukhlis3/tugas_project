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
    $nisn                     = mysqli_real_escape_string($koneksi->db, $_POST['nisn']);
    $nama_siswa               = mysqli_real_escape_string($koneksi->db, $_POST['nama_siswa']);
    $jenis_kelamin            = mysqli_real_escape_string($koneksi->db, $_POST['jenis_kelamin']);
    $ttl                      = mysqli_real_escape_string($koneksi->db, $_POST['ttl']);
    $agama                    = mysqli_real_escape_string($koneksi->db, $_POST['agama']);
    $status_dalam_keluarga    = mysqli_real_escape_string($koneksi->db, $_POST['status_dalam_keluarga']);
    $anak_ke                  = mysqli_real_escape_string($koneksi->db, $_POST['anak_ke']);
    $alamat_peserta_didik     = mysqli_real_escape_string($koneksi->db, $_POST['alamat_peserta_didik']);
    $nomor_telp_rumah         = mysqli_real_escape_string($koneksi->db, $_POST['nomor_telp_rumah']);
    $sekolah_asal             = mysqli_real_escape_string($koneksi->db, $_POST['sekolah_asal']);
    $diterima_disekolah_ini   = mysqli_real_escape_string($koneksi->db, $_POST['diterima_disekolah_ini']);
    $nama_ayah                = mysqli_real_escape_string($koneksi->db, $_POST['nama_ayah']);
    $nama_ibu                 = mysqli_real_escape_string($koneksi->db, $_POST['nama_ibu']);
    $pekerjaan_ayah           = mysqli_real_escape_string($koneksi->db, $_POST['pekerjaan_ayah']);
    $pekerjaan_ibu            = mysqli_real_escape_string($koneksi->db, $_POST['pekerjaan_ibu']);
    $alamat_orang_tua         = mysqli_real_escape_string($koneksi->db, $_POST['alamat_orang_tua']);
    $nama_wali                = mysqli_real_escape_string($koneksi->db, $_POST['nama_wali']);
    $alamat_wali              = mysqli_real_escape_string($koneksi->db, $_POST['alamat_wali']);
    $pekerjaan_wali           = mysqli_real_escape_string($koneksi->db, $_POST['pekerjaan_wali']);

    $result = $murid->tambahMurid(
      $id_pengguna,
      $nisn,
      $nama_siswa,
      $jenis_kelamin,
      $ttl,
      $agama,
      $status_dalam_keluarga,
      $anak_ke,
      $alamat_peserta_didik,
      $nomor_telp_rumah,
      $sekolah_asal,
      $diterima_disekolah_ini,
      $nama_ayah,
      $nama_ibu,
      $pekerjaan_ayah,
      $pekerjaan_ibu,
      $alamat_orang_tua,
      $nama_wali,
      $alamat_wali,
      $pekerjaan_wali
    );
    $result_notice = $result;
  }
?>

<div class="page-inner">
  <div class="page-header">
		<h4 class="page-title">Tambah Siswa</h4>
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
				<a href="?p=murid">Siswa</a>
      </li>
      <li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="">Tambah Siswa</a>
			</li>
		</ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form Tambah Siswa</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <?php echo $result_notice; ?>
          </div>
          <form name="frmTambahMurid" method="POST" action="">
          <div class="form-group">
              <label for="nisn">ID</label>
              <input type="text" class="form-control" name="id_pengguna" maxlength="10" required readonly>
            </div>
            <div class="form-group">
              <label for="nisn">NISN</label>
              <input type="text" class="form-control" name="nisn" maxlength="10" required>
            </div>
            <div class="form-group">
              <label for="nama_siswa">Nama Siswa</label>
              <input type="text" class="form-control" name="nama_siswa" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <input type="text" class="form-control" name="jenis_kelamin" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="ttl">Tempat Tanggal Lahir</label>
              <input type="text" class="form-control" name="ttl" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="agama">Agama</label>
              <input type="text" class="form-control" name="agama" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="status_dalam_keluarga">Status dalam Keluarga</label>
              <input type="text" class="form-control" name="status_dalam_keluarga" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="anak_ke">Anak Ke</label>
              <input type="text" class="form-control" name="anak_ke" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="alamat_peserta_didik">Alamat Peserta Didik</label>
              <input type="text" class="form-control" name="alamat_peserta_didik" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="nomor_telp_rumah">Nomor Telepon Rumah</label>
              <input type="text" class="form-control" name="nomor_telp_rumah" maxlength="15" required>
            </div>
            <div class="form-group">
              <label for="sekolah_asal">Sekolah Asal</label>
              <input type="text" class="form-control" name="sekolah_asal" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="diterima_disekolah_ini">Diterima di Sekolah Ini</label>
              <input type="text" class="form-control" name="diterima_disekolah_ini" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="nama_ayah">Nama Ayah</label>
              <input type="text" class="form-control" name="nama_ayah" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="nama_ibu">Nama Ibu</label>
              <input type="text" class="form-control" name="nama_ibu" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
              <input type="text" class="form-control" name="pekerjaan_ayah" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
              <input type="text" class="form-control" name="pekerjaan_ibu" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="alamat_orang_tua">Alamat Orang Tua</label>
              <input type="text" class="form-control" name="alamat_orang_tua" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="nama_wali">Nama Wali</label>
              <input type="text" class="form-control" name="nama_wali" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="alamat_wali">Alamat Wali</label>
              <input type="text" class="form-control" name="alamat_wali" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="pekerjaan_wali">Pekerjaan Wali</label>
              <input type="text" class="form-control" name="pekerjaan_wali" maxlength="30" required>
            </div>
            <div class="form-group">
              <div class="d-flex align-items-center mt-4">
                <a href="?p=murid" class="btn btn-danger btn-round btn-sm mr-1 ml-auto"> <i class="fas fa-angle-left mr-2"></i> Kembali</a>
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
