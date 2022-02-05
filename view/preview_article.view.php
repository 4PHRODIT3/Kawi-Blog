<?php

    $auth = Authorization::checkAuthor();
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    
    $meta_data['document_title'] = 'Kawi: Article Preview';
    
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";
    
    
?>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card rounded my-3 my-lg-5 ml-xl-5">
            <div class="card-body">
                <?php if (empty($article)): ?>
                    <div class="alert alert-warning" role="alert">
                        The Article May Be Permanently Deleted or The Article ID is Wrong!
                    </div>
                <?php else: ?>
                    <div class="w-75 w-sm-100 mx-auto">
                        <div class=" my-3">
                            <h1><?= $article['title'] ?></h1>
                        </div>
                        <div class="my-4">
                            <p class="text-black-50 pl-1"><?= beautifyStyles($article['description']) ?></p>
                        </div>
                        <hr class="custom-line-spacing">    
                        <div class="d-flex">
                            <div class="">
                                <img src="<?= BASE_URL ?>/assets/img/default.png" alt="" class="author-avatar">  <?php  // echo BASE_URL.'/assets/profile/img/'.$author['profile_img']?>
                            </div>
                            <div class="">
                                <p class="author-name"><b><?= $author['name'] ?></b>&nbsp;( <?= ROLES[$author['role_id']]['role'] ?> )</p>
                                <span class="article-created-at"><?= date('d.M,Y h:i A', strtotime($article['created_at'])) ?></span>
                                
                            </div>
                        </div>
                        <hr class="custom-line-spacing">
                        <div class="my-4 text-center">
                            <img class="rounded w-100" src="<?= !empty($article['headline_img']) ?  BASE_URL.'/assets/uploads/img/'.['headline_img'] : 'https://images.pexels.com/photos/6663/desk-white-black-header.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500' ?>" alt="Article-Headline-Image">
                        </div>
                        
                        <div class="">
                            <?= beautifyStyles($article['contents']) ?>
                        </div>

                        <hr class="custom-line-spacing my-4">
                        <div class="d-flex justify-content-between align-items-center" >
     
                            <a href="" class="d-flex align-items-center "><img src="<?= BASE_URL ?>/assets/icons/icons8-tag-24.png" alt="Category Icon" class="icon mr-2"> <span><?= $category['title'] ?></span></a>
                        
                            <a href="" class="d-flex align-items-center"><span>Share on Facebook</span> <img src="<?= BASE_URL ?>/assets/icons/icons8-share-24.png" alt="Share Icon" class="icon ml-0 ml-xl-2"> </a>
                            
                        </div>
                        <hr class="custom-line-spacing my-4">
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php
require "./view/template/footer.view.php"
?>
