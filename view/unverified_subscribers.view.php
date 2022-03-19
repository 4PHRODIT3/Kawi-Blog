<?php

    $header_files[] = BASE_URL.'/assets/css/panel.css';
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    $meta_data['document_title'] = 'Kawi: Unverified Subscribers';

    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";
    $csrf_token = generateCSRFToken();
?>

    <div class="row">
        <div class="col-12 col-lg-12 col-xl-7">
            <div class="card my-5">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Unverified Subscribers<span class="badge badge-info ml-2"> <?= count($unverified_subscribers) ?></span></h6>
                    <button type="button" class="btn btn-transparent button-effect-remove btn-sm" id="toggle-size"><img src="<?= BASE_URL ?>/assets/icons/icons8-full-screen-64.png" alt="maximize icon" class="icon"></button>
                </div>
                <div class="card-body">
                    <?php printAlert(); ?>
                    
                    <table class="table table-striped table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Joined At</th>
                                    <th scope="col">Controls</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                
                                <?php foreach ($unverified_subscribers as $key => $subscriber): ?>
                                    <tr>
                                        <th scope="row"><?= $key + 1 ?></th>
                                        <td class="text-nowrap"><?= removeStyles($subscriber['name']) ?></td>
                                        <td class="text-nowrap"><?= removeStyles($subscriber['email']) ?></td>
                                        <td class="text-nowrap"><?= date('d M Y', strtotime($subscriber['joined_at'])) ?></td>
                                        <td class="text-nowrap">
                                            <div class="d-flex justify-content-around justify-content-md-center">
                                                    
                                                    <a href="<?= BASE_URL ?>/subscribers/verify?email=<?= $subscriber['email'] ?>&csrf_token=<?= $csrf_token ?>" class="btn pt-3 px-2 btn-success" onclick="return confirm('Are you sure want to Verify?')">
                                                        Verify
                                                    </a>
                                            </div>
                                        </td>
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
