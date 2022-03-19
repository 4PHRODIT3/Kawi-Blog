<?php

use Helpers\Sessions;

use function PHPSTORM_META\map;

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
    if (stristr($uri, trim(FOLDER_NAME, '/'))) {
        $uri =trim(str_replace(trim(FOLDER_NAME, '/'), "", $uri), "/");
    }
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
    die(header("Location: $url".$message));
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
        echo "<div class='alert  alert-danger alert-dismissible fade show' role='alert'>".$_GET['error']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button> </div>";
    }
    if (isset($_GET['success'])) {
        echo "<div class='alert  alert-success alert-dismissible fade show' role='alert'>".$_GET['success']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
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

function compressText($string, $str_len = 120)
{
    if (strlen($string) > $str_len) {
        return mb_substr($string, 0, $str_len, 'utf-8').'....';
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

function randomKeyGen()
{
    $key = bin2hex(random_bytes(32)).md5('Kawi');
    return $key;
}

function filterFromDBData($data_array, $key, $keyname='id')
{
    $result_data = array_filter($data_array, function ($d) use ($key, $keyname) {
        return $d[$keyname] == $key;
    });
    return $result_data[array_keys($result_data)[0]];
}

function countFromDateArray($data_array, $key ="id")
{
    $result_arr = [];
    foreach ($data_array as $d) {
        $date = date("M d", strtotime($d[$key]));
        $result_arr[$date] = isset($result_arr[$date]) ? ++$result_arr[$date] : 1;
    }
    uksort($result_arr, "sortDates");
    return $result_arr;
}

function sortDates($d1, $d2)
{
    return strtotime($d1) < strtotime($d2) ? -1 : 1;
}

function insertImageToDB($file)
{
    $file = $file['content_img'];
    $allow_extensions = ['jpg','png','jpeg','webp'];
    if (!empty($file['name'])) {
        $file_type = explode('/', $file['type']);
        if ($file_type[0] == 'image' && in_array($file_type[1], $allow_extensions) && $file['error'] == 0) {
            $file_name = uniqid().'-'.$file['name'];
            move_uploaded_file($file['tmp_name'], './assets/uploads/'.$file_name);
            return $file_name;
        } else {
            redirect('/article', '?error=Only PNG, JPG, JPEG And WEBP Formats are allowed!');
        }
    } else {
        return null;
    }
}

function trimArrayValueWithKey($array, $key)
{
    $result_arr = [];
    array_map(function ($d) use (&$result_arr, $key) {
        array_push($result_arr, $d[$key]);
    }, $array);

    return $result_arr;
}
function validateEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}
function curlPostRequest($url, $params)
{
    $curl_handler = curl_init();
    curl_setopt($curl_handler, CURLOPT_URL, $url);
    curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $params);
    curl_setopt($curl_handler, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl_handler);
    curl_close($curl_handler);
    if (!empty($response)) {
        return json_decode($response, true);
    }
    return false;
}
