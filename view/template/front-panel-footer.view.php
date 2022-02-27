<?php

?>
<div class="row">
    <div class="col-12 newsletter-subscription-container p-0">
        <div class="newsletter-subscription w-100 h-100 d-flex align-items-center justify-content-center">
            <div class="text-center px-3 px-md-5 py-5 p-xl-0">
                <h2><span class="text-danger">Subscribe</span> & <span class="text-warning">Get Updated  With Us</span></h2>
                <p class="my-4">Subscribe to receive occasional update contents. We respect our privacy policy rules and 100% sure not to spam.</p>
                <form class="mt-5 mx-auto" action="/newsletter/subscribe" method="POST">
                    <div class="form-row ">
                        <div class="col-12 col-lg-5 form-group mb-5">
                            <input type="text" required class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="col-12 col-lg-5 form-group mb-5 ">
                            <input type="email" required class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-12 col-lg-1">
                            <button class="btn btn-danger">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    