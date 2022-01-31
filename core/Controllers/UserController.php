<?php

// Controller class and methods for the route 'user'

class UserController
{
    public function index()
    {
    }

    public function login()
    {
        renderView('login');
    }

    public function register()
    {
        renderView('register');
    }

    public function createUser()
    {
        $user_data = $_POST;
        if (!validateForm($user_data)) {
            redirect('/user/register', 'error=Please Fill Missing Fields');
        }
        if ($user_data['password'] != $user_data['confirm-password']) {
            redirect('/user/register', 'error=Passwords Must Be The Same');
        }
        $insert_data = [
            'name' => $user_data['username'],
            'email' => $user_data['email'],
            'password' => password_hash($user_data['password'], PASSWORD_BCRYPT),
        ];
        App::getData('query_builder')->create('users', $insert_data);
        redirect('/user/register', 'success=Success! Please Login');
    }

    public function loginUser()
    {
        $login_data = $_POST;
        if (!validateForm($login_data)) {
            redirect('/user/login', 'error=Please Fill Missing Fields');
        }
        $user_data = App::getData('query_builder')->retrieve('users', ['email' => $login_data['email']])[0];
        if (empty($user_data) || !password_verify($login_data['password'], $user_data['password'])) {
            redirect('/user/login', 'error=Invalid Credentials');
        }
        if (isset($login_data['cookie-login'])) {
            $token = implode("~", [$user_data['name'],$user_data['password'],$user_data['created_at'],rand(1111, 9999)]);
            $duration = time() + 3600 * 24 * 30;
            setcookie("token", $token, $duration, '/');
            App::getData('query_builder')->update('users', [
                'cookie_login' => $token,
                'updated_at' => date('Y-m-d H:i:s')
            ], ['email' => $login_data['email']]);
        }
        session_start();
        $_SESSION['user'] = $user_data;
        redirect("/user/admin");
    }

    public function adminPanel()
    {
        return renderView('panel', ['content' => "Hello! This is admin panel."]);
    }
    public function logoutUser()
    {
        session_start();
        session_unset();
        session_destroy();
        
        unset($_COOKIE['token']);
        setcookie('token', null, -1, '/');

        redirect('/user/login', "?success=Logout Successfully!");
    }
}
