<?php 
    require '../../../config/Database.php';
    require '../../class/User.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        if(!isset($id)) {
            exit;
        }
        global $conn;
        $User = new User($conn);
        $kq = $User->deleteUser($conn, $id);
        echo json_encode(['status' => $kq]);
        exit;
    }
?>