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
            padding: 20px;
        }
        .container{
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            
        }
        .container .img{
            width: 280px;
            height: 280px;
            margin-bottom: 40px;
            
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

        @media screen and (max-width:300px) {
            .heading{
                font-size: 25px;
            }
            .link{
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    
<div class="container">
    <img class="img" src="<?= BASE_URL ?>/assets/img/kawi-403.webp" alt="">
    <div class="text-center">
        <h4 class="heading">403 Unauthorized User!</h4>
        <p class="explanation">You Little Shit is <span class="error">Unauthorize to Enter</span>  This System. Go Back Before We Chase Your Location!</p>
        <a href="/" class="link">Go Back</a>
    </div>
</div>
</body>
</html>