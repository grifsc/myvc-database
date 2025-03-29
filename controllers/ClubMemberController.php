<?php
require_once '../models/ClubMember.php';

class ClubMemberController {
    private $model;
    
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new ClubMember($db);
    }
    
    public function index() {
        $members = $this->model->getAll();
        $pageTitle = "Club Members";
        require_once '../views/includes/header.php';
        require_once '../views/club_member/index.php';
        require_once '../views/includes/footer.php';
    }
    
    public function show($id) {
        $member = $this->model->getById($id);
        $pageTitle = "Member Details";
        require_once '../views/includes/header.php';
        require_once '../views/club_member/show.php';
        require_once '../views/includes/footer.php';
    }
    
    // Add create(), update(), delete() methods similarly
}
?>