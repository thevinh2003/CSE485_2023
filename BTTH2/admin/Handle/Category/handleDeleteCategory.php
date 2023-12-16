<?php 
    require '../../../config/Database.php';
    require '../../class/Category.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        if(!isset($id)) {
            exit;
        }
        global $conn;
        $Category = new Category($conn);
        $kq = $Category->deleteCategory($conn,$id);
        echo json_encode(['status' => $kq]);
        exit;
    }
?>