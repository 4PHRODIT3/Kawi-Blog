<?php

$header_files[] = BASE_URL.'/assets/css/front-panel.css';
$footer_files[] = BASE_URL.'/assets/js/front-panel.js';
$meta_data['document_title'] = 'Kawi: Burmese Blog';

require "./view/template/header.view.php";
require "./view/template/front-panel.view.php";


?>

<div class="row">
    <div class="col-12">
        <div class="col-lg-10 col-xl-6 mx-auto">
            <div class="card  rounded my-0 my-lg-5 border-0">
                <div class="card-body px-0 detail-article-body">
                    <?php if (empty($article)): ?>
                        <div class="alert alert-warning" role="alert">
                            The Article May Be Permanently Deleted or The Article ID is Wrong!
                        </div>
                    <?php else: ?>
                        <div class="w-75 w-sm-100 mx-auto">
                            <div class=" my-0 my-lg-3">
                                <h1 class="mb-0 detail-article-title"><?= $article['title'] ?></h1>
                            </div>
                            <div class="my-1 my-lg-4">
                                <p class="text-black-50 less-attention-text pl-1"><?= beautifyStyles($article['description']) ?></p>
                            </div>
                            <hr class="custom-line-spacing">    
                            <div class="d-flex">
                                <div class="">
                                    <img src="<?= BASE_URL ?>/assets/img/default.png" alt="" class="author-avatar">  <?php  // echo BASE_URL.'/assets/profile/img/'.$author['profile_img']?>
                                </div>
                                <div class="">
                                    <span class="author-name d-block"><b><?= $author['name'] ?></b>&nbsp;( <?= ROLES[$author['role_id']]['role'] ?> )</span>
                                    <span class="article-created-at"><?= date('d.M,Y h:i A', strtotime($article['created_at'])) ?></span>
                                    
                                </div>
                            </div>
                            <hr class="custom-line-spacing">
                            <?php if (!empty($article['header_img'])): ?>
                                <div class="my-4 text-center">
                                    <img class="rounded w-100" src="<?= BASE_URL ?>/assets/uploads/<?= $article['header_img'] ?>" alt="Article-Headline-Image">
                                </div>
                            <?php endif ?>
                            
                            <div class="">
                                <?= beautifyStyles($article['contents']) ?>
                            </div>

                            <hr class="custom-line-spacing my-4">
                            <div class="d-flex justify-content-between align-items-center" >
            
                                <a href="" class="d-flex align-items-center "><img src="<?= BASE_URL ?>/assets/icons/icons8-tag-24.png" alt="Category Icon" class="icon mr-2"> <span><?= $category['title'] ?></span></a>
                            
                                <a href="" class="d-flex align-items-center"><span>Share</span> <img src="<?= BASE_URL ?>/assets/icons/icons8-share-24.png" alt="Share Icon" class="icon ml-2 mb-2 ml-xl-2"> </a>
                                
                            </div>
                            <hr class="custom-line-spacing my-4">
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require "./view/template/footer.view.php"
?>