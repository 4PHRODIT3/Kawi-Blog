<?php

$header_files[] = BASE_URL.'/assets/css/front-panel.css';
$footer_files[] = BASE_URL.'/assets/js/front-panel.js';
$meta_data['document_title'] = 'Kawi: Burmese Blog';

require "./view/template/header.view.php";
require "./view/template/front-panel.view.php";


?>

<div class="row ">
    <div class="col-12">
        <div class="row">
            <div class="col-12 p-0 lastest background-cover">
                <img src="<?= BASE_URL  ?>/assets/img/pexels-element-digital-1550334.jpg" alt="Photo by Element5 Digital from Pexels" class="w-100 h-100">
                <div class="text">
                    <h1>Let us Know Your Ideas or Problems</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-xl-5 p-4">
                <div class="card form-card rounded shadow-lg">
                
                <div class="p-4">
                    <form action="https://formsubmit.co/f7f8ed2f45aa14c221db88d138b39867" method="POST">
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" name="email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message"  rows="10" class="form-control">Hello!</textarea>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
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
