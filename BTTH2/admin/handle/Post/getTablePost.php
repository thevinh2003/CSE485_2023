<?php
require '../../class/Post.php';
require '../../../config/Database.php';
$Post = new Post($conn);
print_r($_POST);
$postList = $Post->getPostByPage($_POST['page']);
?>
<?php foreach ($postList as $item) : ?>
    <tr>
        <td> <?= $item['id'] ?> </td>
        <td> <?= $item['title'] ?> </td>
        <td> <?= $item['message'] ?></td>
        <td>
            <?php
            if ($item['status'] == "published") {
                echo "<span class='badge bg-success'>" . $item['status'] . "</span>";
            }
            if ($item['status'] == "draft") {
                echo "<span class='badge bg-warning text-dark'>" . $item['status'] . "</span>";
            }
            if ($item['status'] == "archived") {
                echo "<span class='badge bg-primary'>" . $item['status'] . "</span>";
            }
            ?>
        </td>
        <td>
            <a href="handle/Post/editPost.php?id=<?= $item['id'] ?>" class="btn btn-warning btnEdit">Edit</a>
            <a data-id="<?= $item['id'] ?>" class="btnDelete btn btn-danger">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
?>