<?php 
    require '/LARAGON_SERVER/laragon/www/BTTH_CSE485/BTTH2/config/Database.php';
    global $conn;
    $sql = "SELECT COUNT(*) FROM cms_user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $totalUser = $stmt->fetchAll();
    $sql = "SELECT COUNT(*) FROM cms_posts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $totalPost = $stmt->fetchAll();
    $sql = "SELECT COUNT(*) FROM cms_category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $totalCategory = $stmt->fetchAll();
?>