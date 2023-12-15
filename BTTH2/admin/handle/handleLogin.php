<?php 
    require '../../config/Database.php';
     $email = $_POST['email'] ?? "";
     $password = $_POST['password'] ?? "";
    $sql = "SELECT * FROM cms_user WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if (!$stmt) {
        echo "Lỗi truy vấn: " . $conn->errorInfo()[2];
    } else{
        if($stmt->rowCount() > 0){
            $user = $stmt->fetch();
            $pass_hash = $user['password'];
            if(password_verify($password,$pass_hash)){
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['Login'] = $user;
                $_SESSION['Admin'] = $user['type'] == 1 ? true : false;
                header("Location: ../dashboard.php");
            }else{
                header("Location: ../login.php?error=Mật khẩu không khớp");
            }
        }else{
            header("Location: ../login.php?error=Người dùng không tồn tại");
        }
    }
?>