<?php

    $auth = Authorization::checkAuthor();
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    
    $meta_data['document_title'] = 'Kawi: Article Preview';
    
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";
    
    $csrf_token = generateCSRFToken();
?>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card rounded my-3 my-lg-5 ml-xl-5">
            <div class="card-body article-body">
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
                                <span class="author-name d-block"><b><?= $author['name'] ?></b>&nbsp;( <?= ROLES[$author['role_id']]['role'] ?> )</span>
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
    <div class="col-12 col-xl-4">
        <div class="card my-3 my-lg-5">
            <div class="card-header p-4">
                <h5>Editor Tools Kit</h5>
            </div>
            <div class="card-body">
                <h6 class="my-2">Manipulation</h6>
                <div class="btn-group my-3" role="group" aria-label="Basic example">
                    <?php if ($article['is_published'] !=0): ?>
                        <a type="button" class="btn btn-secondary">Unpublish</a>
                    <?php else: ?>
                        <a type="button" class="btn btn-success">Publish</a>
                    <?php endif ?>
                    <a href="/article/manipulate/edit?id=<?= $article['id'] ?>" type="button" class="btn btn-warning">Edit</a>
                    
                    <?php if ($auth['role_id'] > 1): ?>
                        <a href="/article/manipulate/delete?id=<?= $article['id']?>&csrf_token=<?= $csrf_token ?>" onclick="return confirm('Are you sure want to delete this article?')" type="button" class="btn btn-danger">Delete</a>
                    <?php endif ?>
                    
                </div>
                <h6 class="my-2">Create Contents</h6>
                <div class="btn-group my-3" role="group" aria-label="Basic example">
                    
                    <a type="button" href="/article" class="btn btn-success">New Article</a>
                    <a type="button" href="/category" class="btn btn-primary">New Category</a>
                    
                </div>
                <h6 class="my-2">Sorting Order</h6>
                <div class="btn-group my-3" role="group" aria-label="Basic example">
                    
                    <a type="button" href="/article" class="btn btn-outline-primary">Pin Post</a>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "./view/template/footer.view.php"
?>
