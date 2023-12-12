<?php 
    require '../../../config/Database.php';
    require '../../class/Post.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        if(!isset($id)) {
            exit;
        }
        global $conn;
        $Post = new Post($conn);
        $kq = $Post->deletePost($id);
        echo json_encode(['status' => $kq]);
        exit;
    }
?>