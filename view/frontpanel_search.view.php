<?php

$header_files[] = BASE_URL.'/assets/css/front-panel.css';
$footer_files[] = BASE_URL.'/assets/js/front-panel.js';
$meta_data['document_title'] = 'Kawi: Burmese Blog';

require "./view/template/header.view.php";
require "./view/template/front-panel.view.php";

foreach ($search_results as $key => $value) {
    if ($value['is_published'] == 0) {
        unset($search_results[$key]);
    }
}

?>

<div class="row ">
    <div class="col-12">
        <div class="row">
            <div class="col-12 p-0 lastest background-cover">
                <img src="<?= BASE_URL  ?>/assets/img/anders-jilden-AkUR27wtaxs-unsplash.jpg" alt="Header Image" class="w-100 h-100">
                <div class="text">
                    <h1>Search Results For "<span class="text-danger"><?= $search_key ?></span>"</h1>
                </div>
            </div>
        </div>
        <div class="row min-vh-100">
            <div class="col-12 col-xl-9 px-3 px-md-5 py-4">
                <h3 class="mb-4 d-flex align-items-center">Results <span style="font-size:20px;margin-left: 10px;">( <?= count($search_results) ?> )</span></h3>
                <div class="row">
                    <?php if (count($search_results) > 0): ?>
                        <?php foreach ($search_results as $article): ?>
                        
                            <div class="col-12 col-lg-6 col-xl-4 mb-3" >
                                <div class="article-cards" data-href="<?= BASE_URL ?>/blog?id=<?= $article['id'] ?>" onclick="showDetailArticle(this)">
                                    <img src="<?= BASE_URL ?>/assets/uploads/<?= $article['header_img'] ?>" alt="Header Image" class="w-100 h-100 rounded">
                                    <div class="py-2 px-3">
                                        <h6 class="my-3"><b><?= $article['title'] ?></b></h6>
                                        <div class="d-flex my-2">
                                            <span class="text-danger mr-2"><?= $article['category_id'] ?></span> | 
                                            <span class="text-dark ml-2">5 mins Read</span>
                                        </div>
                                        <p class="text-black-50"><?= compressText($article['description'], 250) ?></p>
                                    </div>
                                </div>
                            </div>
                    
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="col-12 mb-3" >
                            <div class="alert alert-danger" role="alert">Sorry, no result for "<?= $search_key ?>"</div>
                        </div>
                    <?php endif?>
                </div>
                
            </div>
            <div class="col-12 col-xl-9 px-3 px-md-5 py-4">
                <h3 class="mb-4">Recent Articles</h3>
                <div class="row">
                    
                    <?php foreach ($recent_articles as $recent_article): ?>
                            <div class="col-12 col-lg-6 col-xl-4 mb-3" >
                                <div class="article-cards" data-href="<?= BASE_URL ?>/blog?id=<?= $recent_article['id'] ?>" onclick="showDetailArticle(this)">
                                    <img src="<?= BASE_URL ?>/assets/uploads/<?= $recent_article['header_img'] ?>" alt="Header Image" class="w-100 h-100 rounded">
                                    <div class="py-2 px-3">
                                        <h6 class="my-3"><b><?= $recent_article['title'] ?></b></h6>
                                        <div class="d-flex my-2">
                                            <span class="text-danger mr-2"><?= filterFromDBData($categories, $recent_article['category_id'])['title'] ?></span> | 
                                            <span class="text-dark ml-2">5 mins Read</span>
                                        </div>
                                        <p class="text-black-50"><?= compressText($recent_article['description'], 250) ?></p>
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
require "./view/template/front-panel-footer.view.php";
require "./view/template/footer.view.php";
?>