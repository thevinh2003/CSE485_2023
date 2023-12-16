<?php 
    require '../../../config/Database.php';
    require '../../class/Category.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        global $conn;
        $Category = new Category($conn);
        $kq = $Category->editCategory($conn,$id, $name);
        echo json_encode(['status' => $kq]);
        exit;
    }
?>