<?php

class Authorization
{
    public static function checkSuperUser()
    {
        $auth = Authentication::check();
        
        if (isset($auth)) {
            if ($auth['role_id'] > 1) {
                return $auth;
            } else {
                renderView('403');
            }
        } else {
            redirect('/user/login', "?error=Please Login to Continue!");
        }
    }
    public static function checkAuthor()
    {
        $auth = Authentication::check();

        if (isset($auth)) {
            if ($auth['role_id'] >= 1) {
                return $auth;
            } else {
                renderView('403');
            }
        } else {
            redirect('/user/login', "?error=Please Login to Continue!");
        }
    }
}
