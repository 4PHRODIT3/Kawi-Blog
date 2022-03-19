<?php

?>
<div class="row">
    <div class="col-12 newsletter-subscription-container px-0">
        <div class="newsletter-subscription w-100 h-100 d-flex align-items-center justify-content-center">
            <div class="text-center px-3 px-md-5 py-5 px-xl-0">
                <h2><span class="text-danger">Subscribe</span> & <span class="text-warning">Get Updated  With Us</span></h2>
                <p class="my-4">Subscribe to receive occasional update contents.</p>
                <form class="mt-5 mx-auto" action="<?= BASE_URL ?>/newsletter/subscribe" method="POST">
                    <div class="form-row mx-auto" style="max-width:400px">
                        <div class="col-12 form-group mb-5 mb-md-3">
                            <input type="text" required class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="col-12 form-group mb-5 mb-md-3">
                            <input type="email" required class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-12 " style="max-height: 78px;">
                            <div class="g-recaptcha" data-sitekey="6Ldv5_IeAAAAADGb9f359FmTuvtOdDEr9YHlZktM"></div>
                        </div>
                        <div class="col-12  text-left">
                            <button class="btn btn-danger">Subscribe</button>
                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-sm btn-primary up-arrow py-2 px-1" id="up-arrow">
            <img src="<?= BASE_URL ?>/assets/icons/icons8-logout-rounded-up-48.png" alt="arrow icon" class="icon">
        </button>
    </div>
    <div class="col-12"> 
        <div class="row footer p-3 p-lg-5 align-baseline">
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="d-flex flex-column">
                    <img src="<?= BASE_URL ?>/assets/img/kawi-logo.svg" class="brand svg-light" alt="Kawi Logo">
                    <h6 class="text ml-1">Kawi is a burmese blog providing contents <br> for different types of people. Disclaimer - No copyright infringement intended. We don't own anything from website contents. We are using data from Akhayar Lifestyle Blog for the purpose of testing.</h6>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="d-flex flex-column h-100 justify-content-center w-100 links-align">
                    <div class=""><h5 class="text-warning mb-4">References</h5></div>
                    <div class="text-left d-flex flex-column">
                        <div class="mb-3"><a target="_blank" href="https://akhayarlifestyle.com/" class="text  link">Contents By Akhayar Lifestyle</a></div>
                        <div class="mb-3"><a target="_blank" href="https://undraw.co/" class="text  link">Illustrations by Undraw</a></div>
                        <div class="mb-3"><a target="_blank" href="https://icons8.com" class="text  link">Icons by Icons8</a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="d-flex flex-column h-100 justify-content-center w-100 links-align">
                    <div class="text-left"><h5 class="text-warning mb-4">Quick Links</h5></div>
                    <div class="text-left d-flex flex-column">
                        <div class="mb-3"><a href="<?= BASE_URL ?>" class="text  link">Home</a></div>
                        <div class="mb-3"><a href="<?= BASE_URL ?>/categories" class="text  link">Categories</a></div>
                        <div class="mb-3"><a href="<?= BASE_URL ?>/contact" class="text  link">Contact Us</a></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center mt-5">
                    <span class="footer-text text-center mt-0 mt-xl-3">Copyright&nbsp;&copy;&nbsp;2022-2023 Kawi Blog, Powered by <a target="_blank" href="http://github.com/4PHRODIT3/" class="link">Rinn</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

    