<?php

    $auth = Authentication::check();
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    
    $meta_data['document_title'] = 'Kawi: Admin Panel';
    
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";
    
?>

    <div class="row">
        <div class="col-12 col-lg-10">
            <div class="card my-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Categories</h4>
                    <button type="button" class="btn btn-transparent button-effect-remove btn-sm" id="toggle-size"><img src="<?= BASE_URL ?>/assets/icons/icons8-full-screen-64.png" alt="" class="icon"></button>
                </div>
                <div class="card-body">
                    <?php printAlert() ?>
                    <form class=" p-0 hidden-form" action="/category/manipulate/edit"  method="POST">
                        <input type="hidden" name="category_id" value="">
                       
                        <div class="form-row justify-content-between align-items-center">
                            <div class="form-group col-12 col-md-9 ">
                                <label for="category_name" class="sr-only">Category</label>
                                <input  type="text" class="form-control" id="category_name" required placeholder="Category Name" name="category_name">
                            </div>
                            <div class="form-group col-12 col-md-3  text-center">
                                <button type="submit" class="btn btn-primary ">Update Category</button>
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
                                            <th scope="row"><?=  $key + 1 ?></th>
                                            <td><?= $category['title'] ?></td>
                                            <td><?= App::getData('query_builder')->retrieve('users', ['id' => $category['user_id']])[0]['name'] ?></td>
                                            <td><div class="d-flex justify-content-around justify-content-md-center">
                                                <button data-id="<?= $category['id'] ?>" data-val="<?= $category['title'] ?>" class="btn p-1 mr-2  btn-transparent edit-btn" onclick="edit(this)">
                                                    <img src="<?= BASE_URL ?>/assets/icons/icons8-edit.svg" alt="Edit Icon" class="icon">
                                                </button>
                                                <button data-id="<?= $category['id'] ?>" class="btn p-1 btn-transparent delete-btn" onclick="remove(this)">
                                                    <img src="<?= BASE_URL ?>/assets/icons/icons8-delete.svg" alt="Delete Icon" class="icon">
                                                </button>
                                            </div></td>
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
