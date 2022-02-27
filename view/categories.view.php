<?php

    
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    $meta_data['document_title'] = 'Kawi: Admin Panel';
    
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";
    
?>

    <div class="row">
        <div class="col-12 col-lg-10  ">
            <div class="card my-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Categories</h4>
                    <button type="button" class="btn btn-transparent button-effect-remove btn-sm" id="toggle-size"><img src="<?= BASE_URL ?>/assets/icons/icons8-full-screen-64.png" alt="" class="icon"></button>
                </div>
                <div class="card-body">
                    <?php printAlert() ?>
                    <form class=" p-0" action="/category" method="POST">
                        <input type="hidden" name="user_id" value="<?= $auth['id'] ?>">
                       
                        <div class="form-row justify-content-between align-items-center">
                            <div class="form-group col-12 col-md-9 ">
                                <label for="category_name" class="sr-only">Category</label>
                                <input  type="text" class="form-control" id="category_name" required placeholder="Category Name" name="category_name">
                            </div>
                            <div class="form-group col-12 col-md-3  text-center">
                                <button type="submit" class="btn btn-primary ">Add To Category</button>
                            </div>
                            
                        </div>
                        
                        
                    </form>
                
                    <table class="table table-striped table-responsive-sm">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $key => $category): ?>
                                    <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $category['title'] ?></td>
                                            <td><?= App::getData('query_builder')->retrieve('users', ['id' => $category['user_id']])[0]['name'] ?></td>
                                            <td><?= date('d M Y', strtotime($category['created_at'])) ?></td>
                                    </tr>
                                <?php endforeach ?>
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
