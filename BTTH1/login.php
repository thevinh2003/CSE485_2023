<?php

session_start();
if(isset($_SESSION['Login'])){
    header("location:javascript://history.go(-1)");
}
if(isset($_POST['Login'])){
    $user = $_POST['Username'];
    $pass = $_POST['Pass'];

    try{
        require 'connect.php';
        $sql_check = "SELECT * FROM users WHERE Username = '$user'";
        $stmt = $conn->prepare($sql_check);
        $stmt->execute();

        if (!$stmt) {
            echo "Lỗi truy vấn: " . $conn->errorInfo()[2];
        } else{
            if($stmt->rowCount() > 0){
                $users = $stmt->fetch();
                $pass_hash = $users['password'];
                if(password_verify($pass,$pass_hash)){
                    session_start();
                    $_SESSION['Login'] = $users['username'];
                    $_SESSION['Admin'] = $users['isAdmin'] == 1 ? true : false;
                    header("Location:admin/index.php");
                }else{
                    header("Location:login.php?error=Mật khẩu không khớp");
                }
            }else{
                header("Location:login.php?error=Người dùng không tồn tại");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

</head>
<style>
    *{
        padding: 1px;
    }
    .screen{
    max-width: 100%;
    height: auto;
}

@media screen and (max-width: 768px) {
    .screen{
        max-width: 70%;
    }
}
    header{
        box-shadow: 0 0 12px 0 #9f9f9f;
    }
    .box{
        width: 400px;
        height: 400px;
        border-radius: 5px; 
        background-color: #7f7f7f;
        margin: 3px auto;
        padding: 10px;
    }
    h3, .input-group{
        padding: 6px 0px;
    }
    p{
        margin: 0;
    }
    p a{
        text-decoration: none;
        color: #ffc107;
    }
    footer{
        border: 1px solid black;
    }
    hr{
        margin: 0;
    }
</style>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div><img class="screen" src="images/logo2.png"></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><b>TRANG CHỦ</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><b>ĐĂNG NHẬP</b></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div>
        <?php
            if(isset($_GET['error'])){
                echo "<center><p style = 'color:red; font-weight: bold;'>{$_GET['error']}</p></center>";
            }
        ?>
        <div class = "box">
            <h3 style = "color: white">Sign in</h3><hr>
            <form action="login.php" method="POST">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" placeholder="Username" name ="Username" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key-fill"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name ="Pass" aria-describedby="addon-wrapping">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked" style = "color: white">
                        Remember Me
                    </label>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-bottom: 65px;">
                    <button class="btn btn-warning" name = "Login" type = "submit">Login</button>
                </div>
                <hr>
                <center><p>Don't have an account? <a href = "register.php">Sign up</a></p>
                <p><a href = "#">Forgot your password?</a></p>
            </center>
            <form>
        </div>
    </div>
    <footer>
        <center><h2>TLU'S MUSIC GARDEN</h2></center>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>