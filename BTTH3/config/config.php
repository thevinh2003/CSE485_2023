<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'lms');
define('DB_USER', 'root');
define('DB_PASS', '123456789');

try {
    function getCon()
    {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}