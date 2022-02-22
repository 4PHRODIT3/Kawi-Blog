<?php

require "./vendor/autoload.php";

/*
* Dynamic Paths for sources like image, view templates, icons and so forth
* Add or Removes roles from these not from db
* Default Timezone Set
*/

define('BASE_URL', "http://".$_SERVER['HTTP_HOST']);
define('ROLES', [
    ['role' => 'User','value' => 1],
     ['role' => 'Author','value' => 2],
    ['role' => 'Admin','value' => 3],
 ]);
date_default_timezone_set("Asia/Rangoon");

/*
* Dynamic data for the pages when we render the views templates
* Includes meta data, css and js files
* You can assign data into these from templates in the /view directory
*/

$meta_data = [
    'document_title' => '',
];
$header_files = [];
$footer_files = [];

/*
* Binding keys only once as a service container after the server boots
* Includes reusable data such as db connections, configuration data, mail server credentials
*/

App::bind('config', require './db_config.php');
App::bind('query_builder', new QueryBuilder(Connection::make(App::getData('config'))));
App::bind('mail_server_credentials', ['username' => 'kawii.official69@gmail.com','password' => 'testing69']); // That is testing mail with any data  xD
