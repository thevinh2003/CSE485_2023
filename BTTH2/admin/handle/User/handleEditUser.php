<?php 
    require '../../../config/Database.php';
    require '../../class/User.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        global $conn;
        $User = new User();
        $kq = $User->editUser($conn, $id, $firstName, $lastName, $email, $type);
        echo json_encode(['status' => $kq]);
        exit;
    }
?>