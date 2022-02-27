<?php

$header_files[] = BASE_URL.'/assets/css/front-panel.css';
$footer_files[] = BASE_URL.'/assets/js/front-panel.js';
$meta_data['document_title'] = 'Kawi: Verification Succeeded';

require "./view/template/header.view.php";
require "./view/template/front-panel.view.php";
?>

<div class="row">
    <div class="col-12">
        <div class="row justify-content-center py-5 px-3 px-xl-0">
            <div class="col-12 col-md-6 col-xl-4 mb-5 mb-lg-0">
                <div class="d-flex align-items-center">
                    <img src="<?= BASE_URL ?>/assets/img/undraw_super_thank_you_re_f8bo.svg" class="w-100" />
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 pl-0 pl-md-5 ml-0 ml-lg-5">
                <div class="h-100 d-flex align-items-center">
                    <div class="">
                        <h2 class="mb-3">Thank you For Subscription</h2>
                        <p style="font-size: 18px; line-height:2em" class="pl-0 pl-xl-2">Dear <b class="text-danger"> <?= $ex['name'] ?></b>, you have subscribed Successfully!. Say tuned for our interesting and high quality contents. We will neither <b class="text-success">spam your inbox</b> nor <b class="text-success">sell your personal data</b>.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
require "./view/template/front-panel-footer.view.php";
require "./view/template/footer.view.php";
?>