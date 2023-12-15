<?php
session_start();
if(!isset($_SESSION['Login']) && $_SESSION['Admin'] != 1){
    header('Location: login.php');
}
require 'class/User.php';
if(isset($_GET['isHaveHeader'])){
    if(!$_GET['isHaveHeader'] == "None"){
        require '../components/Header.php';
    }
}else{
    require '../components/Header.php';
}
?>
<div class="container p-2">
    <h3 class="p-2">Quản trị User</h3>
    <hr>
    <a href="./handle/User/addUser.php" class="btn btn-success">Add User +</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../config/Database.php';
            global $conn;
            $User = new User($conn);
            $userList = $User->getUserByPage($conn, 1);
            ?>
            <?php foreach ($userList as $item) : ?>
                <tr>
                    <td> <?= $item['id'] ?> </td>
                    <td> <?= $item['first_name'].' '?><?= $item['last_name'] ?></td>
                    <td> <?= $item['email']?></td>
                    <td> <?= $item['type'] == 1 ? 'Admin' : 'Guest' ?> </td>
                    <td>
                        <a href="handle/User/editUser.php?id=<?= $item['id'] ?>" class="btn btn-warning btnEdit">Edit</a>
                        <a data-id="<?= $item['id'] ?>" class="btnDelete btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            $totalUser = $User->getAllUsers($conn);
            $pageTotal = intval($totalUser[0][0]) / 5;
            ?>
            <?php for ($i = 0; $i < $pageTotal; $i++) : ?>
                <li class="page-item"><a class="<?= $i == 0 ? 'active' : '' ?> page-link btnPageNum" href="#"><?= $i + 1 ?></a></li>
            <?php endfor; ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<script src="js/user.js"></script>