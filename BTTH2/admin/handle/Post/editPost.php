<?php
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/BTTH_CSE485');
include DOCUMENT_ROOT . '/BTTH2/components/Header.php';
?>

<div class="container p-4">
    <h3>Chỉnh sửa bài viết</h3>
    <?php
    require '../../../config/Database.php';
    require '../../class/Post.php';
    try {
        $id = $_GET['id'] ?? null;
        if (isset($id)) {
            $Post = new Post($conn);
            $data = $Post->getPostById($id);
        }
    } catch (\PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
    ?>
    <hr>
    <form id="formEditPost" autocomplete='off'>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input value="<?= $data['title'] ?>" autocomplete='off' type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Message</label>
            <input value="<?= $data['message'] ?>" name="message" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category id</label>
            <input value="<?= $data['category_id'] ?>" type="text" name="category_id" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">User id</label>
            <input value="<?= $data['userid'] ?>" type="text" name="userid" class="form-control" id="exampleInputPassword1"></input>
        </div>
        <div class=" mb-3">
            <label for="exampleInputPassword1" class="form-label">Status</label>
            <select name="status" class="form-select" aria-label="Default select example">
                <option <?= $data['status'] == 'published' ? 'selected' : '' ?> value="published">Published</option>
                <option <?= $data['status'] == 'draft' ? 'selected' : '' ?> value="draft">Draft</option>
                <option <?= $data['status'] == 'archived' ? 'selected' : '' ?> value="archived">Archived</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btnEditPost">Sửa</button>
        <button onclick="history.back()" type="button" class="btn btn-warning">Quay lại</button>
    </form>
</div>
<script src="../../js/post.js"></script>
<?php
include DOCUMENT_ROOT . '/BTTH2/components/Footer.php';
?>
