<?php

class User {
    private $conn;
    private $table_name = "murid";
    private $completed_table = "completed_murid";
    private $incomplete_table = "incomplete_murid";

    public $nisn;
    public $nama_siswa;
    public $ttl;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT nisn, nama_siswa, ttl FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readCompleted() {
        $query = "SELECT nisn, nama_siswa, ttl, completed_at FROM " . $this->completed_table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function searchCompleted($nama_siswa) {
        $query = "SELECT nisn, nama_siswa, ttl, completed_at FROM " . $this->completed_table . " WHERE nama_siswa LIKE :nama_siswa";

        $stmt = $this->conn->prepare($query);
        $nama_siswa = "%{$nama_siswa}%";
        $stmt->bindParam(':nama_siswa', $nama_siswa);
        $stmt->execute();

        return $stmt;
    }

    public function markAsCompleted($nisn) {
        return $this->moveUser($nisn, $this->completed_table);
    }

    public function markAsIncomplete($nisn) {
        return $this->moveUser($nisn, $this->incomplete_table);
    }

    private function moveUser($nisn, $target_table) {
        try {
            $this->conn->beginTransaction();

            // Get user details
            $query = "SELECT nisn, nama_siswa, ttl FROM " . $this->table_name . " WHERE nisn = :nisn";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nisn', $nisn);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Insert into target table
                $insertQuery = "INSERT INTO " . $target_table . " (nisn, nama_siswa, ttl) VALUES (:nisn, :nama_siswa, :ttl)";
                $insertStmt = $this->conn->prepare($insertQuery);
                $insertStmt->bindParam(':nisn', $user['nisn']);
                $insertStmt->bindParam(':nama_siswa', $user['nama_siswa']);
                $insertStmt->bindParam(':ttl', $user['ttl']);
                $insertStmt->execute();

                // Delete from murid
                $deleteQuery = "DELETE FROM " . $this->table_name . " WHERE nisn = :nisn";
                $deleteStmt = $this->conn->prepare($deleteQuery);
                $deleteStmt->bindParam(':nisn', $nisn);
                $deleteStmt->execute();

                $this->conn->commit();
                return true;
            } else {
                $this->conn->rollBack();
                return false;
            }
        } catch (Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }
}
