<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/BTTH1/connect.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $maBaiViet = $_POST['mabaiviet'];
            $tieuDe = $_POST['tieude'];
            $tenBaiHat = $_POST['tenBaiHat'];
            $maTheLoai = $_POST['maTheLoai'];
            $tomTat = $_POST['tomTat'];
            $noiDung = $_POST['noiDung'];
            $maTacGia = $_POST['maTacGia'];
            $ngayViet = $_POST['ngayViet'];
            $hinhAnh = $_POST['hinhAnh'];
            $sql = "INSERT INTO baiviet VALUES 
            ('$maBaiViet', '$tieuDe', '$tenBaiHat', '$maTheLoai', '$tomTat', '$noiDung', '$maTacGia', '$ngayViet', '$hinhAnh')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                header("Location: article.php?msg=Thêm thành công");
            }
        } catch (\PDOException $e) {
           echo $e->getMessage();
        }
    }
    

?>