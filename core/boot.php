<?php

require "./vendor/autoload.php";
define('BASE_URL', "http://".$_SERVER['HTTP_HOST']);

App::bind('config', require './config.php');
App::bind('query_builder', new QueryBuilder(Connection::make(App::getData('config'))));
