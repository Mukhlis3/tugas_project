<?php

require_once 'config/Database.php';
require_once 'models/User.php';

class CompletedUserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function index() {
        if (isset($_GET['search'])) {
            $stmt = $this->user->searchCompleted($_GET['search']);
        } else {
            $stmt = $this->user->readCompleted();
        }
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once 'views/completed_users/index.php';
    }
    
}
