<?php 
    require '../../connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM baiviet WHERE ma_bviet = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            header('Location: article.php');
        }
        else {
            echo "Lỗi";
        }
    }
?>