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
                        
                            <a href="" class="d-flex align-items-center"><span>Share </span> <img src="<?= BASE_URL ?>/assets/icons/icons8-share-24.png" alt="Share Icon" class="icon ml-2 mb-2"> </a>
                            
                        </div>
                        <hr class="custom-line-spacing my-4">
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="col-12">
            <div class="card my-3 my-lg-5">
                <div class="card-header p-3">
                    <h5 class="mb-0">Editor's Tools Kit</h5>
                    
                </div>
                <div class="card-body">
                    <h6 class="my-2 mb-3">Manipulation</h6>
                    <?php printAlert();?>
                    <div class="btn-group my-3" role="group" aria-label="Basic example">
                        <?php if ($article['is_published'] !=0): ?>
                            <a href="/articles/publish?id=<?= $article['id'] ?>&action=false&csrf_token=<?= generateCSRFToken() ?>" type="button" class="btn btn-secondary">Unpublish</a>
                        <?php else: ?>
                            <a href="/articles/publish?id=<?= $article['id'] ?>&action=true&csrf_token=<?= generateCSRFToken() ?>" type="button" class="btn btn-success">Publish</a>
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
                        
                        <?php if ($article['pinned'] ==0): ?>
                            <a type="button" href="/articles/pin?id=<?= $article['id'] ?>&action=true" class="btn btn-outline-primary">Pin Post</a>
                        <?php else: ?>
                            <a type="button" href="/articles/pin?id=<?= $article['id'] ?>&action=false" class="btn btn-outline-primary">Unpinned Post</a>
                        <?php endif ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center p-4">
                    <h6 class="mb-0">Viewers ( <?= count($viewers) ?> )</h6>
                    <button type="button" class="btn btn-transparent button-effect-remove btn-sm" id="toggle-size"><img src="<?= BASE_URL ?>/assets/icons/icons8-full-screen-64.png" alt="" class="icon"></button>
                </div>
                    <div class="card-body">
                        
                        <?php if (empty($viewers)): ?>
                            <div class='alert alert-warning' role='alert'>No Viewer Yet</div>
                        <?php else: ?>
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Device Type</th>
                                        <th scope="col">Viewed At</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($viewers as $key => $viewer): ?>
                                        <tr>
                                            <th scope="row"><?= $key ?></th>
                                            <td><?= $viewer['name'] ?></td>
                                            <td><?= $viewer['device'] ?></td>
                                            <td><?= $viewer['viewed_at'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endif ?>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php
require "./view/template/footer.view.php"
?>
