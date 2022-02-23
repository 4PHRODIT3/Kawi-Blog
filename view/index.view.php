<?php

$header_files[] = BASE_URL.'/assets/css/front-panel.css';
$footer_files[] = BASE_URL.'/assets/js/front-panel.js';
$meta_data['document_title'] = 'Kawi: Burmese Blog';

require "./view/template/header.view.php";
require "./view/template/front-panel.view.php";

$lastest_articles = [array_shift($articles),array_shift($articles)];
$popular_articles_id = trimArrayValueWithKey($popular_articles_id, 'article_id');
$popular_articles = [];
?>

<div class="row ">
    <div class="col-12">
        <div class="row">
            <?php foreach ($lastest_articles as $lastest_article): ?>
                <div class="col-12 col-xl-6 p-0 lastest">
                    <img src="<?= BASE_URL  ?>/assets/uploads/<?= $lastest_article['header_img'] ?>" alt="Header Image" class="w-100 h-100">
                    <div class="text-over-img">
                        <h3 class=""><?= $lastest_article['title'] ?></h3>
                        <div class="d-flex my-3">
                            <span class="text-danger mr-2"><?= filterFromDBData($categories, $lastest_article['category_id'])['title'] ?></span> | 
                            <span class="text-light ml-2"><?= $lastest_article['duration'] ?> mins Read</span>
                        </div>
                        <p class="text-light"><?= compressText($lastest_article['description'], 200) ?></p>
                        <a href="<?= BASE_URL ?>/blog?id=<?= $lastest_article['id'] ?>" class="btn custom-btn-red text-light">Read More</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="row min-vh-100">
            
            <div class="col-12 col-xl-9 px-3 px-md-5 py-4">
                <h3 class="mb-4">Recent Articles</h3>
                <div class="row">
                    <?php foreach ($articles as $article): ?>
                        <?php if (!in_array($article['id'], $popular_articles_id)): ?>
                            <div class="col-12 col-lg-6 col-xl-4 mb-3" >
                                <div class="article-cards" data-href="<?= BASE_URL ?>/blog?id=<?= $article['id'] ?>" onclick="showDetailArticle(this)">
                                    <img src="<?= BASE_URL ?>/assets/uploads/<?= $article['header_img'] ?>" alt="Header Image" class="w-100 h-100 rounded">
                                    <div class="py-2 px-3">
                                        <h6 class="my-3"><b><?= $article['title'] ?></b></h6>
                                        <div class="d-flex my-2">
                                            <span class="text-danger mr-2"><?= filterFromDBData($categories, $article['category_id'])['title'] ?></span> | 
                                            <span class="text-dark ml-2"><?= $article['duration'] ?> mins Read</span>
                                        </div>
                                        <p class="text-black-50"><?= compressText($article['description'], 250) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php array_push($popular_articles, $article);?>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-12 col-xl-3 px-3 px-md-5 py-4">
                <h3 class="mb-4">Popular Articles</h3>
                <div class="row">
                    <?php foreach ($popular_articles as $popular_article): ?>
                            <div class="col-12 col-lg-6 col-xl-12 mb-3" >
                                <div class="article-cards" data-href="<?= BASE_URL ?>/blog?id=<?= $popular_article['id'] ?>" onclick="showDetailArticle(this)">
                                    <img src="<?= BASE_URL ?>/assets/uploads/<?= $popular_article['header_img'] ?>" alt="Header Image" class="w-100 h-100 rounded">
                                    <div class="py-2 px-3">
                                        <h6 class="my-3"><b><?= $popular_article['title'] ?></b></h6>
                                        <div class="d-flex my-2">
                                            <span class="text-danger mr-2"><?= filterFromDBData($categories, $popular_article['category_id'])['title'] ?></span> | 
                                            <span class="text-dark ml-2"><?= $popular_article['duration'] ?> mins Read</span>
                                        </div>
                                        <p class="text-black-50"><?= compressText($popular_article['description'], 250) ?></p>
                                    </div>
                                </div>
                            </div>
                        
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php

require "./view/template/footer.view.php"
?>