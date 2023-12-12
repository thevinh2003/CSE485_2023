<?php 
    require '../../../config/Database.php';
    require '../../class/Post.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $message = $_POST['message'];
        $category_id = $_POST['category_id'];
        $userid = $_POST['userid'];
        $status = $_POST['status'];
        global $conn;
        $Post = new Post($conn);
        $kq = $Post->editPost($id, $title, $message, $category_id, $userid, $status);
        echo json_encode(['status' => $kq]);
        exit;
    }
?>