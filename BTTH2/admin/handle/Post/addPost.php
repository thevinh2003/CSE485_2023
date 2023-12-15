<?php
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/BTTH_CSE485');
include DOCUMENT_ROOT . '/BTTH2/components/Header.php';
?>

<div class="container p-4">
    <h3>Thêm bài viết</h3>
    <hr>
    <form id="formAddPost" autocomplete='off'>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input autocomplete='off' type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Message</label>
            <input type="text" name="message" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category id</label>
            <input type="text" name="category_id" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">User id</label>
            <input type="text" name="userid" class="form-control" id="exampleInputPassword1">
        </div>
        <div class=" mb-3">
            <label for="exampleInputPassword1" class="form-label">Status</label>

            <select name="status" class="form-select" aria-label="Default select example">
                <option selected value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="archived">Archived</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btnAddPost">Thêm</button>
        <button onclick="history.back()" type="button" class="btn btn-warning">Quay lại</button>
    </form>
</div>
<script src="../../js/post.js"></script>

<?php
include DOCUMENT_ROOT . '/BTTH2/components/Footer.php';
?>