<?php
class Nilai {
    private $koneksi;

    public function __construct() {
        $this->koneksi = new Koneksi();
    }

    public function getListNilai() {
        $query = "SELECT * FROM nilai";
        $stmt = $this->koneksi->db->prepare($query);

        if (!$stmt) {
            die("Prepare failed: (" . $this->koneksi->db->errno . ") " . $this->koneksi->db->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $listNilai = [];
        while ($row = $result->fetch_assoc()) {
            $listNilai[] = $row;
        }

        $stmt->close();
        return $listNilai;
    }

    public function getNextIDNilai() {
        $query = "SELECT MAX(nilai_id) AS max_id FROM nilai";
        $stmt = $this->koneksi->db->prepare($query);

        if (!$stmt) {
            die("Prepare failed: (" . $this->koneksi->db->errno . ") " . $this->koneksi->db->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $next_id = "NL01"; // Default next ID
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $last_id = $row['max_id'];
            if ($last_id) {
                $tmp_next_id = (int) substr($last_id, 2) + 1;
                $next_id = "NL" . str_pad($tmp_next_id, 2, "0", STR_PAD_LEFT);
            }
        }

        $stmt->close();
        return $next_id;
    }

    public function addNilai($nilai_id, $nisn, $mapel_id, $nilai_k, $predikat_k, $nilai_p, $predikat_p, $kelas_id) {
        // SQL Injection prevention: ensure data types are as expected
        $nilai_id = strtoupper(trim($nilai_id));
        $nisn = strtoupper(trim($nisn));
        $mapel_id = strtoupper(trim($mapel_id));
        $nilai_k = floatval($nilai_k);
        $predikat_k = strtoupper(trim($predikat_k));
        $nilai_p = floatval($nilai_p);
        $predikat_p = strtoupper(trim($predikat_p));
        $kelas_id = strtoupper(trim($kelas_id));

        $query = "INSERT INTO nilai (nilai_id, nisn, mapel_id, nilai_k, predikat_k, nilai_p, predikat_p, kelas_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->koneksi->db->prepare($query);

        if (!$stmt) {
            die("Prepare failed: (" . $this->koneksi->db->errno . ") " . $this->koneksi->db->error);
        }

        $stmt->bind_param("sssdsdss", $nilai_id, $nisn, $mapel_id, $nilai_k, $predikat_k, $nilai_p, $predikat_p, $kelas_id);
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

    // Implement other methods similarly

    // Pastikan untuk mengimplementasikan penanganan kesalahan dan pembersihan data HTML sesuai kebutuhan.
}
?>
