<?php
    try 
    {
        $conString = "mysql:host=localhost;dbname=btth02_cse485";
        $conn = new PDO($conString, "root", "123456789");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (\PDOException $exp) {
        echo $exp->getMessage();
    }
?>
