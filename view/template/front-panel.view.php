<div class="row p-0">
    <div class="col-12 p-0">
        <nav class="d-flex p-3 p-md-5 p-lg-3 px-xl-3 nav-header align-items-center justify-content-between">
            <a href="<?= BASE_URL ?>">
                <img src="<?= BASE_URL ?>/assets/img/kawi-logo.svg" class="brand svg-light" alt="Kawi Logo">
            </a>

            <ul class="align-items-center mb-0 w-50 justify-content-around  d-flex custom-nav  px-lg-0">
                <div class="d-flex d-xl-none justify-content-start w-100 p-3 p-md-5 mb-5">
                    <a href="<?= BASE_URL ?>">
                        <img src="<?= BASE_URL ?>/assets/img/kawi-logo.svg" class="brand svg-light" alt="Kawi Logo">
                    </a>
                </div>
                <li class="nav-btn mr-0 mr-xl-4">
                    <a href="<?= BASE_URL ?>" class="text-light d-flex align-items-center"><img src="<?= BASE_URL ?>/assets/icons/icons8-home-page-64.png" alt="Home Icon" class="icon mr-3"><h6 class="mb-0">Home</h6></a>
                </li>
                <li class="nav-btn mr-0 mr-xl-4 ">
                    <a href="<?= BASE_URL ?>/categories" class="text-light d-flex align-items-center"><img src="<?= BASE_URL ?>/assets/icons/icons8-categorize-16.png" alt="Categories Icon" class="icon mr-3"><h6 class="mb-0">Categories</h6></a>
                </li>
                <li class="nav-btn mr-0 mr-xl-4 ">
                    <a href="<?= BASE_URL ?>/contact" class="text-light d-flex align-items-center"><img src="<?= BASE_URL ?>/assets/icons/icons8-contact-details-64.png" alt="Contact Icon" class="icon mr-3"><h6 class="mb-0">Contact US</h6></a>
                </li>
                <li class="nav-btn mr-0 mr-xl-4">
                    <a href="#" id="search-btn" class="text-light d-flex align-items-center"> <img src="<?= BASE_URL ?>/assets/icons/icons8-search.svg" alt="Search Icon" class="icon mr-3 svg-light"><h6 class="mb-0">Search</h6></a>
                </li>
                
            </ul>
            
            <button class="btn hover-effect-remove d-block d-xl-none svg-light" id="nav-toggler">
                <img src="<?= BASE_URL ?>/assets/icons/icons8-menu.svg" alt="Menu Icon" class="icon">
            </button>
        </nav>

        <div class="search-modal hide-modal">
            <div class="min-vh-100">
                <form class="form-inline" action="<?= BASE_URL ?>/search" id="home-search-form">
                    
                    <input autocomplete="off" type="text" class="form-control ml-3 search-bar" name="q" placeholder="Search Anything..." />
                    <button class="btn button-effect-remove  p-1" id="home-search-btn" type="submit">
                        <img src="<?= BASE_URL ?>/assets/icons/icons8-light-search.svg" alt="Search Icon" class="icon">
                    </button>
                    <div class="text-center w-100 mt-5">
                        <button type="button" class="btn btn-danger" id="close-search-btn">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>