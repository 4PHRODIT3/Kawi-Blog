<?php

    $auth = Authorization::checkAuthor();
    $header_files[] = BASE_URL.'/assets/css/panel.css';
    $header_files[] = "https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css";
    $footer_files[] =  BASE_URL."/assets/js/panel.js";
    $footer_files[] = "https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js";
    $meta_data['document_title'] = 'Kawi: Article Edit Panel';
    
    require "./view/template/header.view.php";
    require "./view/template/dashboard.view.php";
    
?>
<form class="p-0" action="/article/manipulate/edit" method="POST" enctype="multipart/form-data">
    <div class="row">
            <div class="col-12 col-lg-9 ">
                <div class="card my-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Create New Content</h4>
                        <button type="button" class="btn btn-transparent button-effect-remove btn-sm" id="toggle-size"><img src="<?= BASE_URL ?>/assets/icons/icons8-full-screen-64.png" alt="" class="icon"></button>
                    </div>
                    <div class="card-body">
                        <?php printAlert() ?>
                        
                            <input type="hidden" name="csrf_token" value="<?= generateCSRFToken(); ?>">
                            <input type="hidden" name="id" value="<?= $previous_data['id'] ?>">
                            <div class="form-group">
                                <label class="mb-3" for="article_title" >Content Title</label>
                                <input  type="text" class="form-control" id="article_title" required  name="article_title" value="<?= $previous_data['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="mb-3" for="article_description" >Content Descriptiion</label>
                                <input  type="text" class="form-control" id="article_description" required  name="article_description" value="<?= $previous_data['description'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="content_img">Content Cover</label>
                                <input type="file" name="content_img" id="content_img" accept="image/*" class="form-control h-100">
                            </div>
                            <div class="form-group">
                                <label class="mb-3" for="article_contents" >Content Body</label>
                                <textarea  type="text" class="form-control" id="article_contents" required cols="30" rows="10" name="article_contents" ><?= $previous_data['contents'] ?></textarea>
                                    
                            </div>
                            
                            <div class="form-group text-right mt-3">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to update this article?')">Update and Publish</button>
                            </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-lg-3 my-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Tag A Category</h4>
                    </div>
                    <div class="card-body">
                        <label class="mb-3" for="category_id">Select A Category</label>
                        <select class="custom-select" name="category_id" id="category_id" onfocus="this.size=5" onblur='this.size=1;'  onchange="this.size=1;this.blur()">
                            <?php foreach ($categories as $key => $category): ?>
                                
                                <option class="spacing-sm" value="<?= $category['id'] ?>" <?= $previous_data['category_id'] == $category['id'] ? 'selected' : '' ?>><?= $category['title'] ?></option>
                                
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<?php
require "./view/template/footer.view.php"
?>
<script>
    $(document).ready(function() {
        $('#article_contents').summernote({
            placeholder: '',
            tabsize: 2,
            height: 400
        });
    });
</script>