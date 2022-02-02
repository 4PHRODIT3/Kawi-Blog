<?php

    $auth = Authentication::check();
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
                    <h4>Users Management</h4>
                    <button type="button" class="btn btn-transparent button-effect-remove btn-sm" id="toggle-size"><img src="<?= BASE_URL ?>/assets/icons/icons8-full-screen-64.png" alt="" class="icon"></button>
                </div>
                <div class="card-body">
                    <?php printAlert(); ?>
                    <table class="table table-striped table-responsive-sm">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Manipulate</th>
                                    <th scope="col">Joined At</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($users as $key => $user): ?>
                                    <tr class=<?= $user['id'] == $auth['id'] ? 'active': '';  ?>>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= ROLES[$user['role_id']]['role'] ?></td>
                                            <td>
                                                <?php if ($user['role_id'] != 2): ?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle" onclick="showDropdown(this)">
                                                            Change Role
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <?php if ($user['role_id'] == 1): ?>
                                                                <a class="dropdown-item" href="/user/manipulate/role?id=<?= $user['id'] ?>&role_id=2" onclick="return confirm('Are you sure want to change this user\'s role?')">Admin</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="/user/manipulate/role?id=<?= $user['id'] ?>&role_id=0" onclick="return confirm('Are you sure want to change this user\'s role?')">User</a>
                                                            <?php else: ?>
                                                                <a class="dropdown-item" href="/user/manipulate/role?id=<?= $user['id'] ?>&role_id=1" onclick="return confirm('Are you sure want to change this user\'s role?')">Author</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="/user/manipulate/role?id=<?= $user['id'] ?>&role_id=2" onclick="return confirm('Are you sure want to change this user\'s role?')">Admin</a>
                                                            <?php endif ?>
                                                            
                                                        </div>
                                                    </div>
                                                    <a href="/user/manipulate/ban/id=<?= $user['id']  ?>" class="btn btn-danger">Ban</a>
                                                <?php endif ?>
                                            </td>
                                            <td><?= date('d M Y', strtotime($user['created_at'])) ?></td>
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
