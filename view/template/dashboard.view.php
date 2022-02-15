<?php
    $auth = Authentication::check();
    
    if ($auth['role_id'] < 1) {
        renderView('403');
    }
?>
<div class="row">
    <!-- Side Bar -->
<div class="col-12 col-lg-3 col-xl-2 left-side-bar vh-100">
    <div class="row">
    <div
        class="col-12 mt-4 d-flex justify-content-between "
    >
        <div class="brand d-flex flex-column w-100 align-items-center">
    
            <img src="<?= BASE_URL ?>/assets/img/kawi-logo.svg" alt="Kawi Logo" class="logo">
            <h5 class="text-light my-3">Admin Panel</h5>
        </div>
        <button
        class="btn btn-transparent close-left-side-bar d-flex justify-content-center align-items-center d-lg-none" 
        >
            <img src="<?= BASE_URL ?>/assets/icons/icons8-close.svg" alt="Close Icon" class="icon">
        </button>
    </div>
    <div class="col-12">
        <ul class="nav-menu px-2 ">
            <li class="nav-title">
                Overview
            </li>
            <li class="nav-item">
                <a href="<?= BASE_URL ?>/user/admin" class="nav-item-link ">
                    <span><i class="feather feather-home"></i> Statistics</span>
                </a>
            </li>
            <?php if ($auth['role_id'] > 1):?>
                <li class="nav-title">
                    Users
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>/user" class="nav-item-link"><span><i class="feather feather-plus-circle"></i> Manage Users</span></a>
                </li>
                <li class="nav-item">
                    <a href="/user/preusers" class="nav-item-link">
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="feather feather-list"></i> Pre Users</span>

                        </div>
                    </a>
                </li>
                    <li class="nav-title">
                        Categories
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASE_URL ?>/category" class="nav-item-link"><span><i class="feather feather-plus-circle"></i> Category List</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/category/manipulate" class="nav-item-link">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="feather feather-list"></i>Category Manage</span>
                            </div>
                        </a>
                    </li>

            <?php endif ?>
            <li class="nav-title">
                Articles
            </li>
            <li class="nav-item">
                <a href="<?= BASE_URL ?>/article" class="nav-item-link"><span><i class="feather feather-plus-circle"></i> Article Add</span></a>
            </li>
            <li class="nav-item">
                <a href="/article/manipulate" class="nav-item-link">
                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="feather feather-list"></i>Article Manipulate</span>
                    </div>
                </a>
            </li>
            
        </ul>
    </div>
    </div>
</div>

<div class="col-12 col-lg-9 col-xl-10 content left-shadow">
    <!-- Nav Bar -->
    <div class="row header">
        <div
            class="col-12 bg-light p-2 rounded d-flex justify-content-between align-items-center"
        >
            <button class="btn btn-light show-left-side-bar d-lg-none">
            <img src="<?= BASE_URL ?>/assets/icons/icons8-menu.svg"  alt="Menu Icon" class="icon">
            </button>
            <div class="form-inline d-none d-md-block">
                <input type="text" class="form-control ml-3 search-bar"  placeholder="Search Anything..." />
                <button class="btn button-effect-remove eclipse-rounded p-1">
                    <img src="<?= BASE_URL ?>/assets/icons/icons8-search.svg" style="width: 32px;height:32px;" alt="Search Icon" class="icon">
                </button>
            </div>
            <div class="d-flex align-items-center">
                <button
                    class="btn btn-light btn-sm mr-2 p-2"
                    type="button"
                    style="border-radius: 50%"
                >
                    <img
                    src="<?= BASE_URL ?>/assets/icons/icons8-mail-60.png"
                    alt="Message Icon"
                    class="icon"
                    />
                </button>
                <button
                    class="btn btn-light btn-sm mr-2 p-2"
                    type="button"
                    style="border-radius: 50%"
                >
                    <img
                    src="<?= BASE_URL ?>/assets/icons/icons8-notification-64.png"
                    alt="Notification Icon"
                    class="icon "
                    />
                </button>
                
                <div class="btn-group">
                    <button type="button" class="btn btn-light btn-sm mr-0 mr-xl-4 p-1"  style="border-radius: 50%" onclick="showDropdown(this)" onblur="setTimeout(hideDropdown,300,this)">
                        <img
                        src="<?= BASE_URL ?>/assets/img/<?= $auth['image'] ?>"
                        alt="Profile Image"
                        class="profile-avatar"
                        />
                    </button>
                    <div class="dropdown-menu">
                        
                        <a class="dropdown-item py-2 px-3" href="/user/profile?id=<?= $auth['id'] ?>">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item py-2 px-3" href="/user/logout" onclick="return confirm('Are you sure want to logout?')">Logout</a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
