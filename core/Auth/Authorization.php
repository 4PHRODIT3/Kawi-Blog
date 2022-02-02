<?php

class Authorization
{
    public static function checkSuperUser()
    {
        $auth = Authentication::check();
        if (isset($auth)) {
            if ($auth['role_id'] >= 2) {
                return $auth['role_id'];
            } else {
                renderView('403');
            }
        } else {
            redirect('/user/login', "?error=Please Login to Continue!");
        }
    }
}
