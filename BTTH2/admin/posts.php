<?php
require 'class/Post.php';
if(isset($_GET['isHaveHeader'])){
    if(!$_GET['isHaveHeader'] == "None"){
        require '../components/Header.php';
    }
}else{
    require '../components/Header.php';
}
?>
<div class="container p-2">
    <h3 class="p-2">Quản trị bài viết</h3>
    <hr>
    <a href="./handle/Post/addPost.php" class="btn btn-success">Add Post +</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../config/Database.php';
            global $conn;
            $Post = new Post($conn);
            $postList = $Post->getPostByPage(1);
            ?>
            <?php foreach ($postList as $item) : ?>
                <tr>
                    <td> <?= $item['id'] ?> </td>
                    <td> <?= $item['title'] ?> </td>
                    <td> <?= $item['message'] ?></td>
                    <td>
                        <?php 
                            if($item['status'] == "published"){
                                echo "<span class='badge bg-success'>".$item['status']."</span>";
                            }
                            if($item['status'] == "draft"){
                                echo "<span class='badge bg-warning text-dark'>".$item['status']."</span>";
                            }
                            if($item['status'] == "archived"){
                                echo "<span class='badge bg-primary'>".$item['status']."</span>";
                            }
                        ?>
                    </td>
                    <td>
                        <a href="handle/Post/editPost.php?id=<?= $item['id'] ?>" class="btn btn-warning btnEdit">Edit</a>
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

            $totalPost = $Post->getTotalPosts();
            $pageTotal = intval($totalPost[0][0]) / 5;
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
<script src="js/post.js"></script>