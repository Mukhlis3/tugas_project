<?php

class Murid
{
  public $koneksi;

  public function __construct()
  {
    $this->koneksi = new Koneksi();
  }

  public function getListMurid()
  {
    $query = "SELECT * FROM murid";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_array())
      {
        $listDetailSiswa[] = $row;
      }
      return $listDetailSiswa;
    }
    $stmt->close();
  }

  public function getNextIDDetailSiswa()
  {
    $query = "SELECT max(nisn) FROM murid";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
    {
      $row = $result->fetch_array();
      $last_id      = substr($row[0], 2);
      $tmp_next_id  = (int)$last_id;
      $tmp_next_id  = $tmp_next_id + 1;
      $next_id      = str_pad($tmp_next_id, 10, "0", STR_PAD_LEFT);
    }
    else
    {
      $next_id      = "1000000001";
    }
    $stmt->close();
    return $next_id;
  } 

  public function tambahMurid(
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
  $pekerjaan_wali)
  {
$nisn                     = trim($nisn);
$nama_siswa               = strtoupper(trim($nama_siswa));
$jenis_kelamin            = strtoupper(trim($jenis_kelamin));
$ttl                      = strtoupper(trim($ttl));
$agama                    = strtoupper(trim($agama));
$status_dalam_keluarga    = strtoupper(trim($status_dalam_keluarga));
$anak_ke                  = strtoupper(trim($anak_ke));
$alamat_peserta_didik     = strtoupper(trim($alamat_peserta_didik));
$nomor_telp_rumah         = strtoupper(trim($nomor_telp_rumah));
$sekolah_asal             = strtoupper(trim($sekolah_asal));
$diterima_disekolah_ini   = strtoupper(trim($diterima_disekolah_ini));
$nama_ayah                = strtoupper(trim($nama_ayah));
$nama_ibu                 = strtoupper(trim($nama_ibu));
$pekerjaan_ayah           = strtoupper(trim($pekerjaan_ayah));
$pekerjaan_ibu            = strtoupper(trim($pekerjaan_ibu));
$alamat_orang_tua         = strtoupper(trim($alamat_orang_tua));
$nama_wali                = strtoupper(trim($nama_wali));
$alamat_wali              = strtoupper(trim($alamat_wali));
$pekerjaan_wali           = strtoupper(trim($pekerjaan_wali));


    $verify = "SELECT * FROM murid WHERE nisn=?";
    $stmt = $this->koneksi->db->prepare($verify);
    $stmt->bind_param("s", $nisn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0)
    {
      $query = "INSERT INTO murid VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";
      $stmt = $this->koneksi->db->prepare($query);
      $stmt->bind_param("sssssssssssssssssss", 
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
      $pekerjaan_wali);
      $result = $stmt->execute();

      if ($result)
      {
        $notice = "<div class='alert alert-success alert-dismissible fade show mb-0'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                    <i class='fas fa-check mr-2'></i> Data berhasil disimpan!
                   </div>";
      }
      else
      {
        $notice = "<div class='alert alert-danger alert-dismissible fade show mb-0'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                    <i class='fas fa-exclamation mr-2'></i> Terjadi kesalahan saat menyimpan data!
                   </div>";
      }
    }
    else
    {
      $notice = "<div class='alert alert-danger alert-dismissible fade show mb-0'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                  <i class='fas fa-exclamation mr-2'></i> Ditemukan nik yang sama pada sistem!
                 </div>";
    }
    $stmt->close();
    return $notice;
  }
  public function getInfoDetailSiswa($nisn)
  {
    $query = "SELECT * FROM murid WHERE nisn=?";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->bind_param("s", $nisn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_array();
      return $row;
    }
    $stmt->close();
  }

  public function ubahMurid(
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
) {
    // Mempersiapkan query update dengan menggunakan prepared statement
    $query = "UPDATE murid SET 
        nama_siswa = ?, 
        jenis_kelamin = ?, 
        ttl = ?, 
        agama = ?, 
        status_dalam_keluarga = ?, 
        anak_ke = ?, 
        alamat_peserta_didik = ?, 
        nomor_telp_rumah = ?, 
        sekolah_asal = ?, 
        diterima_disekolah_ini = ?, 
        nama_ayah = ?, 
        nama_ibu = ?, 
        pekerjaan_ayah = ?, 
        pekerjaan_ibu = ?, 
        alamat_orang_tua = ?, 
        nama_wali = ?, 
        alamat_wali = ?, 
        pekerjaan_wali = ? 
        WHERE nisn = ?";
    
    // Mempersiapkan statement
    $stmt = $this->koneksi->db->prepare($query);

    // Memeriksa apakah statement berhasil diprepare
    if ($stmt === false) {
        die('Prepare failed: ' . $this->koneksi->db->error);
    }

    // Mengikat parameter ke query
    $stmt->bind_param(
        "sssssssssssssssssss", 
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
        $pekerjaan_wali,
        $nisn
    );
    $result = $stmt->execute();

    if ($result)
    {
      $notice = "<div class='alert alert-success alert-dismissible fade show mb-0'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                  <i class='fas fa-check mr-2'></i> Data berhasil diperbarui!
                 </div>";
      echo "<meta http-equiv='refresh' content='4'>";
    }
    else
    {
      $notice = "<div class='alert alert-danger alert-dismissible fade show mb-0'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                  <i class='fas fa-exclamation mr-2'></i> Terjadi kesalahan saat memperbarui data!
                 </div>";
    }
    $stmt->close();
    return $notice;
  }

  public function hapusMurid($nisn)
  {
    $query = "DELETE FROM murid WHERE nisn=?";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->bind_param("s", $nisn);
    $result = $stmt->execute();

    if ($result)
    {
      echo "<script>
              window.location.href = \"?p=murid\";
            </script>";
    }
    else
    {
      echo "<script>
              alert('Terjadi kesalahan pada database!');
              window.location.href = \"?p=murid\";
            </script>";
    }
    $stmt->close();
  }
}

?>
