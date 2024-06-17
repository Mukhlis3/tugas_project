<?php

class KelolaMapel
{
    public $koneksi;

    public function __construct()
    {
        $this->koneksi = new Koneksi();
    }

    public function getListMapel()
    {
        $query = "SELECT * FROM mapel";
        $stmt = $this->koneksi->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $listMapel[] = $row;
            }
            return $listMapel;
        }
        $stmt->close();
    }

    public function getNextIDMapel()
    {
        $query = "SELECT max(mapel_id) FROM mapel";
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

    public function addMapel($data)
    {
        $query = "INSERT INTO mapel (mapel_id, kode_mapel, nuptk, kelas_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->koneksi->db->prepare($query);
        $stmt->bind_param("sss", ...array_values($data));
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
        $stmt->close();
        return $notice;
    }

    public function getInfoMapel($mapel_id)
    {
        $query = "SELECT * FROM mapel WHERE mapel_id=?";
        $stmt = $this->koneksi->db->prepare($query);
        $stmt->bind_param("s", $mapel_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            return $row;
        }
        $stmt->close();
    }

    public function editMapel($mapel_id, $data)
    {
        $query = "UPDATE mapel SET kode_mapel=?, nuptk=?, kelas_id=? WHERE mapel_id=?";
        $stmt = $this->koneksi->db->prepare($query);
        $data['kode_mapel'] = $mapel_id;
        $stmt->bind_param("sss", ...array_values($data));
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

    public function deleteMapel($kode_mapel)
    {
        $query = "DELETE FROM mapel WHERE mapel_id=?";
        $stmt = $this->koneksi->db->prepare($query);
        $stmt->bind_param("s", $mapel_id);
        $result = $stmt->execute();

        if ($result) {
            echo "<script>
                    window.location.href = \"?p=mapel\";
                  </script>";
        } else {
            echo "<script>
                    alert('Terjadi kesalahan pada database!');
                    window.location.href = \"?p=mapel\";
                  </script>";
        }
        $stmt->close();
    }
}

?>
