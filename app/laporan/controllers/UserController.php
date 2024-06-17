<?php

require_once 'config/Database.php';
require_once 'models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function index() {
        if (isset($_POST['action']) && isset($_POST['nisn'])) {
            if ($_POST['action'] == 'selesai') {
                $this->markAsCompleted($_POST['nisn']);
            } elseif ($_POST['action'] == 'tidak_selesai') {
                $this->markAsIncomplete($_POST['nisn']);
            }
        }

        $stmt = $this->user->read();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once 'views/users/index.php';
    }

    private function markAsCompleted($nisn) {
        if ($this->user->markAsCompleted($nisn)) {
            echo "User marked as completed successfully!";
        } else {
            echo "Failed to mark user as completed.";
        }
    }

    private function markAsIncomplete($nisn) {
        if ($this->user->markAsIncomplete($nisn)) {
            echo "User marked as incomplete successfully!";
        } else {
            echo "Failed to mark user as incomplete.";
        }
    }
}
