<?php
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/BTTH_CSE485');
include DOCUMENT_ROOT . '/BTTH2/components/Header.php';
?>

<div class="container p-4">
    <h3>Thêm thể loại</h3>
    <hr>
    <form id="formAddCategory" autocomplete='off'>
    <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên thể loại</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-success btnAddCategory">Thêm</button>
        <button onclick="history.back()" type="button" class="btn btn-warning">Quay lại</button>
    </form>
</div>
<script src="../../js/categories.js"></script>

<?php
include DOCUMENT_ROOT . '/BTTH2/components/Footer.php';
?>
