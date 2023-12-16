<?php
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/BTTH_CSE485');
include DOCUMENT_ROOT . '/BTTH2/components/Header.php';
?>

<div class="container p-4">
    <h3>Chỉnh sửa thể loại</h3>
    <?php
    require '../../../config/Database.php';
    require '../../class/Category.php';
    try {
        $id = $_GET['id'] ?? null;
        if (isset($id)) {
            $Category = new Category($conn);
            $data = $Category->getCategoryById($conn,$id);
        }
    } catch (\PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
    ?>
    <hr>
    <form id="formEditCategory" autocomplete='off'>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input value="<?= $data['name'] ?>" name="name" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-success btnEditCategory">Sửa</button>
        <button onclick="history.back()" type="button" class="btn btn-warning">Quay lại</button>
    </form>
</div>
<script src="../../js/categories.js"></script>
<?php
include DOCUMENT_ROOT . '/BTTH2/components/Footer.php';
?>
