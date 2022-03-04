<?php

    $auth = Authorization::checkAuthor();
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    
    
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
   
    $meta_data['document_title'] = 'Kawi: Articles Manipulation';
    
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";

    $csrf_token = generateCSRFToken();
    
?>

    <div class="row">
        <div class="col-12  ">
            <div class="card my-5">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Articles Manipulation <span class="badge badge-info"> <?= isset($search_results) ? count($search_results) : count($articles) ?></span></h6>
                    <button type="button" class="btn btn-transparent button-effect-remove btn-sm" id="toggle-size"><img src="<?= BASE_URL ?>/assets/icons/icons8-full-screen-64.png" alt="" class="icon"></button>
                </div>
                <div class="card-body mb-5 mb-xl-0">
                    <?php printAlert(); ?>
                    <?php if (empty($search_results) && isset($search_query)): ?>
                        <div class='alert alert-danger' role='alert'>Sorry, no results for <?= $search_query ?> </div>
                        
                    <?php elseif (isset($search_query)): ?>
                        <div class='alert alert-success' role='alert'>Search Results for <?= $search_query ?> </div>
                    <?php endif ?>
                    <table class="table pb-3 table-striped table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    
                                    <th scope="col">Category</th>
                                    <th scope="col">Posted By</th>
                                    <th scope="col">Posted At</th>
                                    <th scope="col">Last Updated</th>
                                    <th scope="col">Controls</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php if (!empty($search_results)): ?>

                                    <?php foreach ($search_results as $key => $article): ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><a href="/articles?id=<?= $article['id'] ?>" class="btn btn-transparent"><img class="icon" src="<?= BASE_URL ?>/assets/icons/icons8-surprise-64.png" alt="Preview Icon"></a></td>
                                            <td><?= removeStyles($article['title']) ?></td>
                                            <td><?= compressText(removeStyles($article['description'])) ?></td>
                                            
                                            
                                            <td><?= $article['category'] ?></td>
                                            
                                            <td class="text-nowrap"><?= $article['username'] ?></td>
                                            <td><?= date('d M Y', strtotime($article['created_at'])) ?></td>
                                            <td><?= date('d M Y', strtotime($article['updated_at'])) ?></td>
                                            <td>
                                                <div class="d-flex justify-content-around justify-content-md-center">
                                                        <a href="<?= BASE_URL ?>/article/manipulate/edit?id=<?= $article['id']?>" class="btn p-1 mr-2  btn-transparent edit-btn">
                                                            <img src="<?= BASE_URL ?>/assets/icons/icons8-edit.svg" alt="Edit Icon" class="icon">
                                                        </a>
                                                        <a href="<?= BASE_URL ?>/article/manipulate/delete?id=<?= $article['id']?>&csrf_token=<?= $csrf_token ?>" class="btn p-1 btn-transparent delete-btn" onclick="return confirm('Are you sure want to Delete?')">
                                                            <img src="<?= BASE_URL ?>/assets/icons/icons8-trash.svg" alt="Delete Icon" class="icon">
                                                        </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <?php foreach ($articles as $key => $article): ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><a href="/articles?id=<?= $article['id'] ?>" class="btn btn-transparent"><img class="icon" src="<?= BASE_URL ?>/assets/icons/icons8-surprise-64.png" alt="Preview Icon"></a></td>
                                            <td><?= removeStyles($article['title']) ?></td>
                                            <td><?= compressText(removeStyles($article['description'])) ?></td>
                                            
                                            <?php $category = filterFromDBData($categories, $article['category_id']); ?>
                                            <td><?= $category['title'] ?></td>
                                            <?php $user = filterFromDBData($users, $article['user_id']); ?>
                                            <td class="text-nowrap"><?= $user['name'] ?></td>
                                            <td><?= date('d M Y', strtotime($article['created_at'])) ?></td>
                                            <td><?= date('d M Y', strtotime($article['updated_at'])) ?></td>
                                            <td>
                                                <div class="d-flex justify-content-around justify-content-md-center">
                                                        <a href="<?= BASE_URL ?>/article/manipulate/edit?id=<?= $article['id']?>" class="btn p-1 mr-2  btn-transparent edit-btn">
                                                            <img src="<?= BASE_URL ?>/assets/icons/icons8-edit.svg" alt="Edit Icon" class="icon">
                                                        </a>
                                                        <?php if ($auth['role_id'] == 2): ?>
                                                            <a href="<?= BASE_URL ?>/article/manipulate/delete?id=<?= $article['id']?>&csrf_token=<?= $csrf_token ?>" class="btn p-1 btn-transparent delete-btn" onclick="return confirm('Are you sure want to Delete?')">
                                                                <img src="<?= BASE_URL ?>/assets/icons/icons8-trash.svg" alt="Delete Icon" class="icon">
                                                            </a>
                                                        <?php endif ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                </div>
            </div>
            
        </div>
    </div>

</div>
<?php
require "./view/template/footer.view.php"
?>
