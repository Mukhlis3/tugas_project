<?php

class KelolaGuru
{
  public $koneksi;

  public function __construct()
  {
    $this->koneksi = new Koneksi();
  }

  public function getListGuru()
  {
    $query = "SELECT * FROM guru";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_array()) {
        $listDetailGuru[] = $row;
      }
      return $listDetailGuru;
    }
    $stmt->close();
  }

  public function getNextIDDetailGuru()
  {
    $query = "SELECT max(nuptk) FROM guru";
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

  public function tambahGuru(
    $nuptk,
    $nip,
    $nama,
    $jenisKelamin,
    $mapel_id,
    $alamat,
    $email,
    $noTelpon,
    $statusAktif
  ) {
    $nuptk = trim($nuptk);
    $nip = strtoupper(trim($nip));
    $nama = strtoupper(trim($nama));
    $jenisKelamin = strtoupper(trim($jenisKelamin));
    $mapel_id = strtoupper(trim($mapel_id));
    $alamat = strtoupper(trim($alamat));
    $email = trim($email);
    $noTelpon = strtoupper(trim($noTelpon));
    $statusAktif = strtoupper(trim($statusAktif));

    $verify = "SELECT * FROM guru WHERE nuptk=?";
    $stmt = $this->koneksi->db->prepare($verify);
    $stmt->bind_param("s", $nuptk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
      $query = "INSERT INTO guru VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->koneksi->db->prepare($query);
      $stmt->bind_param("sssssssss", 
      $nuptk,
      $nip,
      $nama,
      $jenisKelamin,
      $mapel_id,
      $alamat,
      $email,
      $noTelpon,
      $statusAktif
      );
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
                  <i class='fas fa-exclamation mr-2'></i> Ditemukan NUPTK yang sama pada sistem!
                 </div>";
    }
    $stmt->close();
    return $notice;
  }

  public function getInfoDetailGuru($nuptk)
  {
    $query = "SELECT * FROM guru WHERE nuptk=?";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->bind_param("s", $nuptk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_array();
      return $row;
    }
    $stmt->close();
  }

  public function ubahGuru(
    $nuptk,
    $nip,
    $nama,
    $jenisKelamin,
    $mapel_id,
    $alamat,
    $email,
    $noTelpon,
    $statusAktif
  ) {
    $query = "UPDATE guru SET 
        nip = ?, 
        nama = ?, 
        jenisKelamin = ?, 
        mapel_id = ?, 
        alamat = ?, 
        email = ?, 
        noTelpon = ?, 
        statusAktif = ? 
        WHERE nuptk = ?";
    
    $stmt = $this->koneksi->db->prepare($query);

    if ($stmt === false) {
        die('Prepare failed: ' . $this->koneksi->db->error);
    }

    $stmt->bind_param(
        "sssssssss", 
        $nip,
        $nama,
        $jenisKelamin,
        $mapel_id,
        $alamat,
        $email,
        $noTelpon,
        $statusAktif,
        $nuptk
    );
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

  public function hapusGuru($nuptk)
  {
    $query = "DELETE FROM guru WHERE nuptk=?";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->bind_param("s", $nuptk);
    $result = $stmt->execute();

    if ($result) {
      echo "<script>
              window.location.href = \"?p=guru\";
            </script>";
    } else {
      echo "<script>
              alert('Terjadi kesalahan pada database!');
              window.location.href = \"?p=guru\";
            </script>";
    }
    $stmt->close();
  }
}

?>
