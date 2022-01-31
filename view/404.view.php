<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contents Not Found</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: "Roboto", sans-serif;
        }
        .text-center{
            text-align: center;
        }
        .container{
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .container .img{
            width: 250px;
            height: 250px;
            margin-bottom: 40px;
            margin-top: -100px;
        }
        .heading{
            font-size: 40px;
            letter-spacing: 0.24rem;
            margin-bottom: 25px;
        }
        .explanation{
            font-size: 20px;
            letter-spacing: 0.1rem;
            margin-bottom: 20px;
        }
        .link{
            font-size: 25px;
            letter-spacing: 0.1rem;
            color: blue;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    
<div class="container">
    <img class="img" src="<?= BASE_URL ?>/assets/img/kawi-404.webp" alt="">
    <div class="text-center">
        <h4 class="heading">404 Contents Not Found!</h4>
        <p class="explanation">May be <span class="error">Wrong Paths</span> or Contents are <span class="error">Permanently Deleted</span> by Owners.</p>
        <a href="/" class="link">Go Back</a>
    </div>
</div>
</body>
</html>