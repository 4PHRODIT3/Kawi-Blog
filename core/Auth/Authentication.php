<?php

class Authentication
{
    public static function check()
    {
        session_start();
        $user = [];
        if (isset($_SESSION['user']['id'])) {
            $user = $_SESSION['user'];
            return $user;
        } elseif (isset($_COOKIE['token'])) {
            $user = Authentication::cookieLogin();
            $_SESSION['user'] = $user[0];
            App::getData('query_builder')->update("users", ['session_id' => session_id()], ['id' => $_SESSION['user']['id']]);
        } else {
            redirect('/user/login', '?error=Please Login to Continue');
        }
        
        return $user;
    }

    public static function cookieLogin()
    {
        $token = $_COOKIE['token'];
        if (!empty($token)) {
            $user = App::getData('query_builder')->retrieve('users', ['cookie_login' => $token]);
            if (!isset($user)) {
                redirect('user/login', "?error=Cookies Expired!");
            }
            return $user;
        } else {
            redirect('/user/login', "?error=Please Log in to Continue.");
        }
    }
}
