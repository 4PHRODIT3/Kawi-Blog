<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $meta_data['document_title'] ?></title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/icons/kawi-logo.ico" />
    <link
      rel="stylesheet"
      href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap"
      rel="stylesheet"
    />
    <?php includeFiles($header_files, 'css'); ?>
    
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">