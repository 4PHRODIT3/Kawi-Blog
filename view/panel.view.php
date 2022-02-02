<?php

    $auth = Authentication::check();
    
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    $meta_data['document_title'] = 'Kawi: Admin Panel';
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";
    
?>



<?php
require "./view/template/footer.view.php"
?>
