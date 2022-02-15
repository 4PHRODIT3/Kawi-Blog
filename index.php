<?php

require "./core/helperFunctions.php";
require "./core/boot.php";


Router::load("./routes.php")->redirect(parse_url(trimURI(), PHP_URL_PATH), $_SERVER['REQUEST_METHOD']);
