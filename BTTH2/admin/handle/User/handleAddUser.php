<?php 
    require '../../../config/Database.php';
    require '../../class/User.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type = $_POST['type'];
        global $conn;
        $Post = new User();
        $kq = $Post->addUser($conn, $firstName, $lastName, $email, $password, $type);
        echo json_encode(['status' => $kq]);
        exit;
    }
?>