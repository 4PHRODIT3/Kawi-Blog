<?php

require "./vendor/autoload.php";
define('BASE_URL', "http://".$_SERVER['HTTP_HOST']);
$meta_data = [
    'document_title' => '',
];
$header_files = [];
$footer_files = [];

App::bind('config', require './config.php');
App::bind('query_builder', new QueryBuilder(Connection::make(App::getData('config'))));
