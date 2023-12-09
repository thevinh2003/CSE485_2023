<?php 
    require '../../connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM tacgia WHERE ma_tgia = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            header('Location: author.php');
        }
    }
?>