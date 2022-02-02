<?php

use Helpers\Sessions;

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}

function trimURI()
{
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    return $uri;
}

function renderView($uri, $data = [])
{
    extract($data);
    return require "./view/$uri.view.php";
}

function validateForm($data)
{
    $validate = true;
    foreach ($data as $key => $val) {
        if (empty($data[$key])) {
            $validate = false;
        }
    }
    return $validate;
}

function redirect($path, $message='')
{
    $url = BASE_URL.$path;
    header("Location: $url".$message);
}

function includeFiles($files, $file_type)
{
    if (!empty($files)) {
        if ($file_type == "css") {
            foreach ($files as $file) {
                echo "<link rel=stylesheet href='".$file."'>";
            }
        } else {
            foreach ($files as $file) {
                echo "<script src='".$file."'></script>";
            }
        }
    }
}

function printAlert()
{
    if (isset($_GET['error'])) {
        echo "<div class='alert alert-danger' role='alert'>".$_GET['error']."</div>";
    }
    if (isset($_GET['success'])) {
        echo "<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
    }
}

function compareUsers($user_role, $obj_role)
{
    if ($user_role > $obj_role) {
        return true;
    } else {
        return false;
    }
}

function killSession($obj_sessid)
{
    session_id($obj_sessid);
    session_start();
    session_destroy();
    session_commit();
}

function restoreSession($my_sessid)
{
    session_id($my_sessid);
    session_start();
}
