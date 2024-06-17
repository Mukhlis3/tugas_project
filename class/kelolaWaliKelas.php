<?php

class KelolaWaliKelas
{
  public $koneksi;

  public function __construct()
  {
    $this->koneksi = new Koneksi();
  }

  public function getListWaliKelas()
  {
    $query = "SELECT * FROM walikelas";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_array()) {
        $listDetailWaliKelas[] = $row;
      }
      return $listDetailWaliKelas;
    }
    $stmt->close();
  }

  public function getNextIDWaliKelas()
  {
    $query = "SELECT max(wali_kelas_id) FROM walikelas";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_array();
      $last_id = substr($row[0], 2);
      $tmp_next_id = (int)$last_id;
      $tmp_next_id = $tmp_next_id + 1;
      $next_id = str_pad($tmp_next_id, 10, "0", STR_PAD_LEFT);
    } else {
      $next_id = "1000000001";
    }
    $stmt->close();
    return $next_id;
  }

  public function tambahWaliKelas($wali_kelas_id, $nuptk, $nama, $kelas, $jurusan)
  {
    $wali_kelas_id = trim($wali_kelas_id);
    $nuptk = strtoupper(trim($nuptk));
    $nama = strtoupper(trim($nama));
    $kelas = strtoupper(trim($kelas));
    $jurusan = strtoupper(trim($jurusan));

    $verify = "SELECT * FROM walikelas WHERE wali_kelas_id=?";
    $stmt = $this->koneksi->db->prepare($verify);
    $stmt->bind_param("s", $wali_kelas_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
      $query = "INSERT INTO walikelas VALUES(?, ?, ?, ?, ?)";
      $stmt = $this->koneksi->db->prepare($query);
      $stmt->bind_param("sssss", $wali_kelas_id, $nuptk, $nama, $kelas, $jurusan);
      $result = $stmt->execute();

      if ($result) {
        $notice = "<div class='alert alert-success alert-dismissible fade show mb-0'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                    <i class='fas fa-check mr-2'></i> Data berhasil disimpan!
                   </div>";
      } else {
        $notice = "<div class='alert alert-danger alert-dismissible fade show mb-0'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                    <i class='fas fa-exclamation mr-2'></i> Terjadi kesalahan saat menyimpan data!
                   </div>";
      }
    } else {
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

  public function getInfoDetailWaliKelas($wali_kelas_id)
  {
    $query = "SELECT * FROM walikelas WHERE wali_kelas_id=?";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->bind_param("s", $wali_kelas_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_array();
      return $row;
    }
    $stmt->close();
  }

  public function UbahWaliKelas($wali_kelas_id, $nuptk, $nama, $kelas, $jurusan)
  {
    $query = "UPDATE walikelas SET nuptk = ?, nama = ?, kelas = ?, jurusan = ? WHERE wali_kelas_id = ?";
    $stmt = $this->koneksi->db->prepare($query);

    if ($stmt === false) {
      die('Prepare failed: ' . $this->koneksi->db->error);
    }

    $stmt->bind_param("sssss", $nuptk, $nama, $kelas, $jurusan, $wali_kelas_id);
    $result = $stmt->execute();

    if ($result) {
      $notice = "<div class='alert alert-success alert-dismissible fade show mb-0'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                  <i class='fas fa-check mr-2'></i> Data berhasil diperbarui!
                 </div>";
      echo "<meta http-equiv='refresh' content='4'>";
    } else {
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

  public function hapusWaliKelas($wali_kelas_id)
  {
    $query = "DELETE FROM walikelas WHERE wali_kelas_id=?";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->bind_param("s", $wali_kelas_id);
    $result = $stmt->execute();

    if ($result) {
      echo "<script>
              window.location.href = \"?p=walikelas\";
            </script>";
    } else {
      echo "<script>
              alert('Terjadi kesalahan pada database!');
              window.location.href = \"?p=walikelas\";
            </script>";
    }
    $stmt->close();
  }
}
?>
