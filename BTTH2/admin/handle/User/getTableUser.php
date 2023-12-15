<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['Login']) && $_SESSION['Admin'] != 1) {
    header('Location: login.php');
}
require '../../class/User.php';
require '../../../config/Database.php';
$User = new User($conn);
$userList = $User->getUserByPage($conn, $_POST['page']);
?>
<?php foreach ($userList as $item) : ?>
    <tr>
        <td> <?= $item['id'] ?> </td>
        <td> <?= $item['first_name'] . ' ' ?><?= $item['last_name'] ?></td>
        <td> <?= $item['email'] ?></td>
        <td> <?= $item['type'] == 1 ? 'Admin' : 'Guest' ?> </td>
        <td>
            <a href="handle/User/editUser.php?id=<?= $item['id'] ?>" class="btn btn-warning btnEdit">Edit</a>
            <a data-id="<?= $item['id'] ?>" class="btnDelete btn btn-danger">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
?>