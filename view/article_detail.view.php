<?php

$header_files[] = BASE_URL.'/assets/css/front-panel.css';
$footer_files[] = BASE_URL.'/assets/js/front-panel.js';
if (isset($article) && !empty($article['title'])) {
    $meta_data['title'] = 'Kawi- '.$article['title'];
    $meta_data['description'] = $article['description'];
    $meta_data['img'] = $article['header_img'];
}

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
                            The Article May Be Unpublished, Deleted or The Article ID is Wrong!
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
            
                                <a href="/categories?id=<?= $article['category_id'] ?>" class="d-flex align-items-center link" style="font-size:16px;"><span><?= $category['title'] ?></span></a>
                                <div class="fb-share-button" data-href="<?= BASE_URL ?>/blog?id=<?= $article['id'] ?>" style="line-height: 0 !important;" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
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
require "./view/template/front-panel-footer.view.php";
require "./view/template/footer.view.php";
?>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>