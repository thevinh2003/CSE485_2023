<?php 
    require '../../connect.php';
    if(isset($_GET['id'])){
        $maTloai = $_GET['id'];
        try{
            $sql_delete = "DELETE FROM theloai WHERE ma_tloai = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->execute([$maTloai]);

            $rowCount = $stmt_delete->rowCount();
            if($rowCount > 0){
                $mess ="Xóa thể loại thành công";
                header("Location: category.php?Mess=".urlencode($mess));
                exit();
            }
        }catch(PDOException $e){
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }
?>