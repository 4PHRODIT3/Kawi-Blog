<?php

    $auth = Authorization::checkSuperUser();
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    $meta_data['document_title'] = 'Kawi: Admin Panel';
    
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";
    
?>

    <div class="row">
        <div class="col-12 col-lg-10 col-xl-9">
            <div class="card my-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Users Management</h6>
                    <button type="button" class="btn btn-transparent button-effect-remove btn-sm" id="toggle-size"><img src="<?= BASE_URL ?>/assets/icons/icons8-full-screen-64.png" alt="" class="icon"></button>
                </div>
                <div class="card-body">
                    <?php printAlert(); ?>
                    <?php if (count($preusers) > 0): ?>
                        <table class="table table-striped table-responsive-sm mb-4">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Verify</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">Joined At</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($preusers as $key => $user): ?>
                                        <tr class=<?= $user['id'] == $auth['id'] ? 'active': '';  ?>>
                                                <th scope="row"><?= $key + 1 ?></th>
                                                <td><?= $user['name'] ?></td>
                                                <td>
                                                    
                                                    <a href="<?= BASE_URL ?>/user/verify?token=<?= $user['verify_key'] ?>" class="btn btn-success">Verify</a>
                                                    
                                                </td>
                                                <td>
                                                    <a href="<?= BASE_URL ?>/user/remove?token=<?= $user['verify_key'] ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                                
                                                <td><?= date('d M Y', strtotime($user['created_at'])) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                        </table>
                    <?php else: ?>
                        <div class='alert alert-warning' role='alert'>No Preusers Yet</div>
                    <?php endif ?>
                </div>
            </div>
            
        </div>
    </div>

</div>
<?php
require "./view/template/footer.view.php"
?>
