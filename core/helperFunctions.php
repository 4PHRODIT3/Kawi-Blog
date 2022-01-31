<?php

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
