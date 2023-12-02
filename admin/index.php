<?php
    //Dich vu Bao ve
    session_start();

    //Kiem tra thong tin để bảo vệ kiểm soát ra vào
    if(!isset($_SESSION['Login'])){
        header("Location:../login.php");
    }
    if(!(($_SESSION['Admin']) == 1)){
        header("Location:../login.php");
    }
?>
<?php
    try {
       require '../connect.php';
        $stmt_users = $conn->prepare("SELECT COUNT(*) FROM users");
        $stmt_users->execute();
        $user_count = $stmt_users->fetchColumn();

        // Truy vấn để đếm số lượng thể loại
        $stmt_categories = $conn->prepare("SELECT COUNT(*) FROM theloai");
        $stmt_categories->execute();
        $category_count = $stmt_categories->fetchColumn();

        // Truy vấn để đếm số lượng tác giả
        $stmt_authors = $conn->prepare("SELECT COUNT(*) FROM tacgia");
        $stmt_authors->execute();
        $author_count = $stmt_authors->fetchColumn();

        // Truy vấn để đếm số lượng bài viết
        $stmt_posts = $conn->prepare("SELECT COUNT(*) FROM baiviet");
        $stmt_posts->execute();
        $post_count = $stmt_posts->fetchColumn();

    } catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

</head>
<style>
    *{
        padding: 1px;
    }
    header{
        box-shadow: 0 0 12px 0 #9f9f9f;
    }
    footer{
        border: 1px solid black;
    }
    .nav-link{
        color:#9f9f9f;
    }
    .card-body, .card-subtitle {
        margin: 10px auto;
        text-align: center;
    }
    .card{
        margin: 60px 10px;
        width: 22%;
    }
    .card-title{
        color: blue;
    }
</style>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Administration</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><b>Trang chủ</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category/category.php"><b>Thể loại</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="author/author.php"><b>Tác giả</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="article/article.php"><b>Bài viết</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="row row-cols-1 row-cols-md-3 g-4" style = "margin-left: 3%;">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Người dùng</h6>
                <h4 class="card-subtitle mb-2 text-bg-blue"><?= $user_count ?></h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Thể loại</h4>
                <h4 class="card-subtitle mb-2 text-bg-blue"><?= $category_count ?></h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Tác giả</h3>
                <h4 class="card-subtitle mb-2 text-bg-blue"><?= $author_count ?></h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Bài viết</h6>
                <h4 class="card-subtitle mb-2 text-bg-blue"><?= $post_count ?></h4>
            </div>
        </div>
    </div>
    <footer>
        <center><h3>TLU'S MUSIC GARDEN</h3></center>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>