<?php
require 'components/Header.php';
require 'config/Database.php';
require 'class/Articles.php';
$Article = new Article();
$currentQuantity = $_GET['quantity'] ?? 5;
$listArticle = $Article->getListArticle($conn, $currentQuantity);
?>

<link rel="stylesheet" href="css/style.css">

<div class="container my-3">
    <h3 class="text-gradient">READ ARTICLE</h3>
    <hr>
    <?php foreach ($listArticle as $item) : ?>
        <article class="articleItem">
            <h3>
                <a class="text-decoration-none" href=""><?= $item['title'] ?></a>
            </h3>
            <p class="fst-italic">
                <span class="fw-bolder">Published on:</span> <?= date("d F Y", strtotime($item['created'])) ?>
                |
                <span class="fw-bolder">Category:</span> <?= $item['cateName'] ?>
            </p>
            <div class="content overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                <p>
                    <?= $item['message'] ?>
                </p>
            </div>
            <div class="text-end">
                <a href="view.php?aid=<?= $item['id'] ?>" type="button" class="btn btn-outline-danger mt-3" data-mdb-ripple-init>READ MORE</a>
            </div>
            <hr>
        </article>
    <?php endforeach ?>

    <div class="text-center">
        <a href="index.php?quantity=<?= $currentQuantity += 5 ?>" class="btnLoadMore btn btn-outline-success mt-3" data-mdb-ripple-init>OTHER ARTICLE</a>
    </div>
</div>
<?php
require 'components/Footer.php';
?>