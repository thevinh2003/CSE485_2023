<?php 
    if (session_status() !== PHP_SESSION_ACTIVE || session_id() === ""){
        session_start(); 
    }
    if(!isset($_SESSION['Login']) && $_SESSION['Admin'] != 1){
        header('Location: login.php');
    }
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