<?php

class Tindakan
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
        $listMurid[] = $row;
      }
      return $listMurid;
    }
    $stmt->close();
  }

  public function getNextIDMasterTindakan()
  {
    $query = "SELECT max(id_tindakan) FROM master_tindakan";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
    {
      $row = $result->fetch_array();
      $last_id      = substr($row[0], 2);
      $tmp_next_id  = (int)$last_id;
      $tmp_next_id  = $tmp_next_id + 1;
      $next_id      = "TD".str_pad($tmp_next_id, 2, "0", STR_PAD_LEFT);
    }
    else
    {
      $next_id      = "TD01";
    }
    $stmt->close();
    return $next_id;
  }

  public function addMurid($nisn, $kelas_id, $id_jurusan, $nama_siswa, $ttl, $jenis_kelamin, $agama, $status_dalam_keluarga, $anak_ke, $alamat_peserta_didik, $nomor_telp_rumah, $sekolah_asal, $diterima_disekolah_ini, $nama_ayah, $nama_ibu, $pekerjaan_ayah, $pekerjaan_ibu, $alamat_orang_tua, $nama_wali, $alamat_wali, $pekerjaan_wali
  )
  {
    $nama       = strtoupper(trim($nama));
    $keterangan = ucfirst(trim($keterangan));

    $verify = "SELECT * FROM murid WHERE nisn=?";
    $stmt = $this->koneksi->db->prepare($verify);
    $stmt->bind_param("s", $nisn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0)
    {
      $query = "INSERT INTO murid (nisn, kelas_id, id_jurusan, nama_siswa, ttl, jenis_kelamin, agama, status_dalam_keluarga, anak_ke, alamat_peserta_didik, nomor_telp_rumah, sekolah_asal, diterima_disekolah_ini, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, alamat_orang_tua, nama_wali, alamat_wali, pekerjaan_wali) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->koneksi->db->prepare($query);
      $stmt->bind_param("s", $nisn);
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
                  <i class='fas fa-exclamation mr-2'></i> Ditemukan id tindakan yang sama pada sistem!
                 </div>";
    }
    $stmt->close();
    return $notice;
  }

  public function getInfoMasterTindakan($id_tindakan)
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

  // public function getSelectedJenisTindakan($jenis)
  // {
  //   $jenis_tindakan = array("vitamin", "imunisasi");
  //   $is_selected = "";
  //   $result = "";

  //   foreach($jenis_tindakan as $data => $value)
  //   {
  //     if ($value == $jenis) {$is_selected = 'selected';} else {$is_selected = '';}
  //     $result .= "<option value='$value' $is_selected>".strtoupper($value)."</option>";
  //   }
  //   return ['data_selection' => $result];
  // }

  public function editMurid($nisn, $kelas_id, $id_jurusan, $nama_siswa, $ttl, $jenis_kelamin, $agama, $status_dalam_keluarga, $anak_ke, $alamat_peserta_didik, $nomor_telp_rumah, $sekolah_asal, $diterima_disekolah_ini, $nama_ayah, $nama_ibu, $pekerjaan_ayah, $pekerjaan_ibu, $alamat_orang_tua, $nama_wali, $alamat_wali, $pekerjaan_wali)
  {
    $nisn         = strtoupper(trim($nisn));
    $nama_siswa   = ucfirst(trim($nama_siswa));

    $query = "UPDATE murid SET $nama_siswa=?, $jenis_kelamin=?, $ttl=?, $agama=?, $status_dalam_keluarga=?, $anak_ke=?, $alamat_peserta_didik=?, $nomor_telp_rumah=?, $sekolah_asal=?, $diterima_disekolah_ini=?, $nama_ayah=?, $nama_ibu=?, $pekerjaan_ayah=?, $pekerjaan_ibu=?, $alamat_orang_tua=?, $nama_wali=?, $alamat_wali=?, $pekerjaan_wali=?
 WHERE nisn=?";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->bind_param("sssssssssssssssssssss", $nama_siswa, $ttl, $jenis_kelamin, $agama, $status_dalam_keluarga, $anak_ke, $alamat_peserta_didik, $nomor_telp_rumah, $sekolah_asal, $diterima_disekolah_ini, $nama_ayah, $nama_ibu, $pekerjaan_ayah, $pekerjaan_ibu, $alamat_orang_tua, $nama_wali, $alamat_wali, $pekerjaan_wali
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

  public function deleteMasterTindakan($nisn)
  {
    $query = "DELETE FROM murid WHERE nisn=?";
    $stmt = $this->koneksi->db->prepare($query);
    $stmt->bind_param("s", $nisn);
    $result = $stmt->execute();

    if ($result)
    {
      echo "<script>
              window.location.href = \"?p=master-tindakan\";
            </script>";
    }
    else
    {
      echo "<script>
              alert('Terjadi kesalahan pada database!');
              window.location.href = \"?p=master-tindakan\";
            </script>";
    }
  }

}

?>