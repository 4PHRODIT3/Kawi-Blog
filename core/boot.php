<?php

require "./vendor/autoload.php";
define('BASE_URL', "http://".$_SERVER['HTTP_HOST']);

define('ROLES', [
    ['role' => 'User','value' => 1],
     ['role' => 'Author','value' => 2],
    ['role' => 'Admin','value' => 3],
 ]);

$meta_data = [
    'document_title' => '',
];
$header_files = [];
$footer_files = [];

App::bind('config', require './config.php');
App::bind('query_builder', new QueryBuilder(Connection::make(App::getData('config'))));