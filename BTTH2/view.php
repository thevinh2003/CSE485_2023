<?php
require 'components/Header.php';
require 'config/Database.php';
require 'class/Articles.php';
$Article = new Article();
$aid = $_GET['aid'] ?? null;
if (isset($aid)) {
    $item = $Article->getDetailArticle($conn, $aid);
}
?>
<link rel="stylesheet" href="css/style.css">
<div class="container my-3">
    <h3 class="text-gradient">READ ARTICLE</h3>
    <hr>
    <article class="articleItem">
        <h3>
            <a class="text-decoration-none" href=""><?= $item['title'] ?></a>
        </h3>
        <p class="fst-italic">
            <span class="fw-bolder">Published on:</span> <?= date("d F Y", strtotime($item['created'])) ?>
            |
            <span class="fw-bolder">Category:</span> <?= $item['cateName'] ?>
        </p>
        <div class="content overflow-hidden">
            <p>
                <?= $item['message'] ?>
            </p>
        </div>
    </article>
</div>
<?php
require 'components/Footer.php';
?>