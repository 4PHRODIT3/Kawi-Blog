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

function cleanString($string)
{
    $string = htmlentities(stripslashes(trim($string)), ENT_QUOTES);
    return $string;
}

function removeStyles($string)
{
    return strip_tags(htmlspecialchars_decode($string));
}

function beautifyStyles($string)
{
    return html_entity_decode($string);
}

function compressText($string)
{
    if (strlen($string) > 120) {
        return substr($string, 0, 120).'....';
    } else {
        return $string;
    }
}

function generateCSRFToken()
{
    $token = bin2hex(random_bytes(32));
    $_SESSION['user']['csrf_token'] = $token;
    return $token;
}

function checkCSRF($token)
{
    $session_token = $_SESSION['user']['csrf_token'];
    if ($session_token == $token) {
        return true;
    } else {
        return false;
    }
}

function filterFromDBData($data_array, $key)
{
    $result_data = array_filter($data_array, function ($d) use ($key) {
        return $d['id'] == $key;
    });
    return $result_data[array_keys($result_data)[0]];
}
