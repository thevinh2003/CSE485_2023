<?php
    try 
    {
        $conString = "mysql:host=localhost;dbname=crud_php";
        $conn = new PDO($conString, "root", "123456789");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "kết nối thành công";
    } 
    catch (\PDOException $exp) {
        echo $exp->getMessage();
    }
?>
   