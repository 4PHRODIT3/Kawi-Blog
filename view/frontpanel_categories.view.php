<?php

$header_files[] = BASE_URL.'/assets/css/front-panel.css';
$footer_files[] = BASE_URL.'/assets/js/front-panel.js';
$meta_data['document_title'] = 'Kawi: Burmese Blog';

require "./view/template/header.view.php";
require "./view/template/front-panel.view.php";

if (isset($_GET['id'])) {
    $category = filterFromDBData($categories, $_GET['id'])['title'];
}

?>

<div class="row ">
    <div class="col-12">
        <div class="row">
            <div class="col-12 p-0 lastest background-cover">
                <img src="<?= BASE_URL  ?>/assets/img/anders-jilden-AkUR27wtaxs-unsplash.jpg" alt="Header Image" class="w-100 h-100">
                <div class="text">
                    <h1><?= !empty($articles) ? "Sort by ".$category : "Categories" ?></h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center justify-content-lg-around py-3 py-md-5">
            <?php if (isset($articles) && count($articles) > 0): ?>
                <?php foreach ($articles as $article): ?>
                        <div class="col-12 col-lg-6 col-xl-4 mx-lg-3 py-xl-3" >
                            <div class="article-cards" data-href="<?= BASE_URL ?>/blog?id=<?= $article['id'] ?>" onclick="showDetailArticle(this)">
                                <img src="<?= BASE_URL ?>/assets/uploads/<?= $article['header_img'] ?>" alt="Header Image" class="w-100 h-100 rounded">
                                <div class="py-2 px-3">
                                    <h6 class="my-3"><b><?= $article['title'] ?></b></h6>
                                    <div class="d-flex my-2">
                                        <span class="text-danger mr-2"><?= $category ?></span> | 
                                        <span class="text-dark ml-2"><?= $article['duration'] ?>mins Read</span>
                                    </div>
                                    <p class="text-black-50"><?= compressText($article['description'], 250) ?></p>
                                </div>
                            </div>
                        </div>
                
                <?php endforeach ?>
            <?php elseif (isset($_GET['error'])): ?>
                <?php printAlert(); ?>
                </div>
            <?php elseif (isset($_GET['id'])): ?>
                <div class="col-12 px-3 px-md-5 py-5">
                    <h5 class="text-danger">There is no article for the category, <?= $category ?></h5>
                </div>
            <?php endif?>
                
            
            <?php if (!isset($_GET['id'])): ?>
                <div class="col-12 col-lg-8 col-xl-6">
                    <div class="row my-3 my-lg-5 align-items-center">
                    <?php foreach ($categories as $category): ?>
                        <div class="col-6 col-lg-4 mb-2 mt-0 my-lg-3 ">
                            <div class="card  category-card">
                                <a href="<?= BASE_URL ?>/categories/category?id=<?= $category['id'] ?>" class="link card-body">
                                    <h6 class="text-center text-danger"><?= $category['title'] ?></h6>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>


<?php
require "./view/template/front-panel-footer.view.php";
require "./view/template/footer.view.php";
?>
