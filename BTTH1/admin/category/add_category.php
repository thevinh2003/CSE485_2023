<?php 
require '../../connect.php';
// Nhận dữ liệu khi post
if($_SERVER["REQUEST_METHOD"]== "POST"){
    // kiểm tra dữ liệu vừa nhập
    $ten_tloai = $_POST['ten_tloai'];
    try{
        // truy vấn kiểm tra tên loại đã tồn tại hay chưa
        $query_check = $conn->prepare("SELECT * FROM theloai WHERE ten_tloai=?");
        $query_check->execute([$ten_tloai]);
        $result = $query_check->rowCount();
        if($result>0){
            $error = "Tên loại đã tồn tại. Vui lòng ghi tên loại khác.";
            echo "<script>alert('{$error}');</script>";
        }
        else{
            $sql_insert = "INSERT INTO theloai (ten_tloai) VALUES (:ten_tloai)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bindParam(':ten_tloai',$ten_tloai, PDO::PARAM_STR);
            $stmt_insert->execute();
            // var_dump($stmt_insert);
            // die;

            $rowCount = $stmt_insert->rowCount();
            if($rowCount > 0){
                $mess ="Thêm tên thể loại thành công";
                header("Location: category.php?Mess=".urlencode($mess));
                exit();
            }
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class = "Edit">
        <center><h2>Thêm mới thể loại</h2></center>
        <?php
            if(isset($_GET['error'])){
                echo "<p style='background-color:red'>{$_GET['error']}</p>";
            }
        ?>
        <form action="add_category.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tên thể loại</span>
                <input type="text" class="form-control" name = "ten_tloai" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-bottom: 60px;">
                <button class="btn btn-success" type = "submit" name="Add" value="Thêm">Thêm</button>
                <button class="btn btn-warning" type="button" onclick="goBack()">Quay lại</button>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
            </div>
        </form>
    </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>