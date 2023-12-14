<?php
    try 
    {
        $conString = "mysql:host=localhost;dbname=btth2_cse485";
        $conn = new PDO($conString, "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (\PDOException $exp) {
        echo $exp->getMessage();
    }
?>
