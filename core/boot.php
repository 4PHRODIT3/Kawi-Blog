<?php

require "./vendor/autoload.php";

/*
*If you are using xampp or other web server stack, you must add your folder name that is under htdocs folder.
*Be sure there is no slash after folder name.
*/

define('FOLDER_NAME', '/Kawi-Blog');

/*
* Dynamic Paths for sources like image, view templates, icons and so forth
* Add or Removes roles from these not from db
* Default Timezone Set
*/

if (strlen(FOLDER_NAME) > 1) {
    define('BASE_URL', "http://".$_SERVER['HTTP_HOST'].FOLDER_NAME);
} else {
    define('BASE_URL', "http://".$_SERVER['HTTP_HOST']);
}

define('ROLES', [
    ['role' => 'User','value' => 1],
     ['role' => 'Author','value' => 2],
    ['role' => 'Admin','value' => 3],
 ]);
date_default_timezone_set("Asia/Rangoon");

/*
* Binding keys only once as a service container after the server boots
* Includes reusable data such as db connections, configuration data, mail server credentials
*/

App::bind('config', require './db_config.php');
App::bind('query_builder', new QueryBuilder(Connection::make(App::getData('config'))));
App::bind('mail_server_credentials', ['username' => '','password' => "" ]);
