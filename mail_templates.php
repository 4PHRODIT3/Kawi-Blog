<?php

$templates = [
    'verification_template' => '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Email Verification</title>

        <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap");
        .container {
            
            letter-spacing: 0.15rem !important;
            font-family: "Roboto", sans-serif !important;
            padding: 20px 15px;
        }
        .button {
            margin: 20px 0px;
            padding: 10px 15px;
            font-size: 18px;
            border: 0px;
            border-radius: 0.125rem;
            background: #6c63ff;
            color: white !important;
        }
        a {
            text-decoration: none;
        }
        
        </style>
    </head>
    <body>
        <div class="container">
        <div class="img-container">
            <img
            src="https://media.istockphoto.com/vectors/facial-recognition-technology-concept-tiny-male-and-female-characters-vector-id1237467005?k=20&m=1237467005&s=612x612&w=0&h=dzaNq418Ndu6RtbiXkkKQpgg2wOh7A8rvs47ZJlySqo="
            alt=""
            />
        </div>
        <h2>Email Verification</h2>
        <p>
            You recently register your email on Kawi Blog. Please verify your email
            to login.
        </p>
        <p style="margin-bottom:40px;">
            If someone using your account to register,
            <a href="mailto:kawii.official69@gmail.com" style="color: red"
            >Contact Us</a
            >.
        </p>
        <a href="'.BASE_URL.'/user/verify?token='.$key.'" class="button">Verify</a>
        </div>
    </body>
    </html>
    ',
    "subscription" => '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kawi Blog: Subscription</title>
    
        <style>
          @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap");
          .container {
            letter-spacing: 0.15rem !important;
            font-family: "Roboto", sans-serif !important;
            padding: 20px 15px;
          }
          .button {
            margin: 20px 0px;
            padding: 10px 15px;
            font-size: 18px;
            border: 0px;
            border-radius: 0.125rem;
            background: #f77b77;
            color: white !important;
          }
          a {
            text-decoration: none;
          }
        </style>
      </head>
      <body>
        <div class="container">
          <div class="img-container">
            <img
              src="https://media.istockphoto.com/vectors/facial-recognition-technology-concept-tiny-male-and-female-characters-vector-id1237467005?k=20&m=1237467005&s=612x612&w=0&h=dzaNq418Ndu6RtbiXkkKQpgg2wOh7A8rvs47ZJlySqo="
              alt=""
            />
          </div>
          <h2>Email Verification</h2>
          <p>
            Dear '.explode(' ', $name)[0].', you recently subscribe your email on Kawi Blog. Please verify your email
            to get high quality contents from us.
          </p>
          <p style="margin-bottom: 40px">
            If someone using your account to register,
            <a href="mailto:kawii.official69@gmail.com?subject=Unauthorized%20Subscription&body=Hi%20there,%20I%20did%20not%20subscribe%20newsletter%20from%20Kawi%20Blog%20and%20I%20want%20you%20to%20remove%20me%20from%20mailing%20list." style="color: red"
              >Let us Know</a
            >.
          </p>
          <a
            href="'.BASE_URL.'/newsletter/subscribe/verification?token='.$token.'&email='.$email.'"
            class="button"
            >Subscribe</a
          >
        </div>
      </body>
    </html>
    ',
];
