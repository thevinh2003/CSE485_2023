<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['Login']) && $_SESSION['Admin'] != 1) {
    header('Location: login.php');
}
    require '../../class/Category.php';
    require '../../../config/Database.php';
    $Category = new Category($conn);
   // print_r($_POST);
    $categoryList = $Category->getCategoryByPage($conn,$_POST['page'])
?>
<?php foreach ($categoryList as $item) : ?>
    <tr>
        <td> <?= $item['id'] ?> </td>
        <td> <?= $item['name'] ?> </td>
        <td>
            <a href="handle/Category/editCategory.php?id=<?= $item['id'] ?>" class="btn btn-warning btnEdit">Edit</a>
            <a data-id="<?= $item['id'] ?>" class="btnDelete btn btn-danger">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
?>