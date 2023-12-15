<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['Login']) && $_SESSION['Admin'] != 1) {
    header('Location: login.php');
}
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/BTTH_CSE485');
include DOCUMENT_ROOT . '/BTTH2/components/Header.php';


?>

<div class="container p-4">
    <h3>Chỉnh sửa người dùng</h3>
    <hr>
    <?php
    require '../../../config/Database.php';
    require '../../class/User.php';
    try {
        $id = $_GET['id'] ?? null;
        if (isset($id)) {
            $User = new User($conn);
            $data = $User->getUserById($conn, $id);
        }
    } catch (\PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
    ?>
    <form id="formEditUser" autocomplete='off'>
        <input hidden name="id" value="<?= $data['id'] ?>" type="text">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First name</label>
            <input value="<?= $data['first_name'] ?>" autocomplete='off' type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Last name</label>
            <input value="<?= $data['last_name'] ?>" type="text" name="lastname" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input value="<?= $data['email'] ?>" type="text" name="email" class="form-control">
        </div>
        <div class=" mb-3">
            <label for="exampleInputPassword1" class="form-label">Type</label>

            <select name="type" class="form-select" aria-label="Default select example">
                <option <?= $data['type'] == 1 ? 'selected' : '' ?> value="1">Admin</option>
                <option <?= $data['type'] == 0 ? 'selected' : '' ?> value="0">Guest</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btnEditUser">Sửa</button>
        <button onclick="history.back()" type="button" class="btn btn-warning">Quay lại</button>
    </form>
</div>
<script src="../../js/user.js"></script>

<?php
include DOCUMENT_ROOT . '/BTTH2/components/Footer.php';
?>