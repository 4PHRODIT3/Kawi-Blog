<?php if (!isset($meta_data) || !isset($meta_data['description'])) {
    $meta_data = [
      'title' => 'Kawi Blog - We provide high quality contents for Burma.',
      'description' => 'Kawi is a online journal that you can enjoy contents about various type of genre in Burmese Language. We covers latest news, healthy lifestyle, general knowledge and information technology.',
      'img' => "kawi-blog.webp",
    ];
} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/icons/kawi-logo.ico" />
    <meta name="keywords" content="kawi,kawii,burmese blog, burmese articles, best online journel, online journel, ကဝိ, ကဝိ Blog, အွန်လိုင်းဂျာနယ်"/>
    <meta name="author" content="Htet Myat Linn"/>
    <!-- Primary Meta Tags -->
    <meta name="title" content="<?= $meta_data['title'] ?>">
    <meta name="description" content="<?= $meta_data['description'] ?>">
    <title><?= $meta_data['title'] ?></title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= BASE_URL ?>">
    <meta property="og:title" content="<?= $meta_data['title'] ?>">
    <meta property="og:description" content="<?= $meta_data['description'] ?>">
    <meta property="og:image" content="<?= BASE_URL ?>/assets/img/<?= $meta_data['img'] ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= BASE_URL ?>">
    <meta property="twitter:title" content="<?= $meta_data['title'] ?>">
    <meta property="twitter:description" content="<?= $meta_data['description'] ?>">
    <meta property="twitter:image" content="<?= BASE_URL ?>/assets/img/<?= $meta_data['img'] ?>">

    <link
      rel="stylesheet"
      href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Myanmar:wght@300;400;500;600&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap"
      rel="stylesheet"
    />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="tDEZdBRW"></script>
    <?php includeFiles($header_files, 'css'); ?>
    <style>
      .loader{
        position: fixed;
        top: 0;
        left: 0;
        z-index: 3000;
        background-color: white;
      }
      .loader img {
        width: 100px;
        height: 100px;
      }
    </style>
  </head>
  <body>
    <div id="fb-root"></div>
    <div class="loader h-100 w-100 d-flex align-items-center justify-content-center">
      <img alt="Loading GIF" src="<?= BASE_URL ?>/assets/img/Rocket.gif" />
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">