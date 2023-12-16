<?php 
    require '../../../config/Database.php';
    require '../../class/Category.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        global $conn;
        $Category = new Category();
        $kq = $Category->addCategory($conn, $name);
        echo json_encode(['status' => $kq]);
        exit;
    }
?>