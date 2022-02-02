<?php

// Controller class and methods for the route 'user'

use function PHPSTORM_META\type;

class UserController
{
    public function index()
    {
        $users_data = ['users' => App::getData('query_builder')->retrieve('users')];
        renderView('users', $users_data);
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
            redirect('/user/register', '?error=Please Fill Missing Fields');
        }
        if ($user_data['password'] != $user_data['confirm-password']) {
            redirect('/user/register', '?error=Passwords Must Be The Same');
        }
        $insert_data = [
            'name' => $user_data['username'],
            'email' => $user_data['email'],
            'password' => password_hash($user_data['password'], PASSWORD_BCRYPT),
        ];
        App::getData('query_builder')->create('users', $insert_data);
        redirect('/user/register', '?success=Success! Please Login');
    }

    public function loginUser()
    {
        $login_data = $_POST;
        
        if (!validateForm($login_data)) {
            redirect('/user/login', '?error=Please Fill Missing Fields');
        }
        $user_data = App::getData('query_builder')->retrieve('users', ['email' => $login_data['email']])[0];
        if (intval($user_data['banned']) !== intval(1)) {
            if (empty($user_data) || !password_verify($login_data['password'], $user_data['password'])) {
                redirect('/user/login', '?error=Invalid Credentials');
            } else {
                $token = '';
                if (isset($login_data['cookie-login'])) {
                    $token = implode("~", [$user_data['name'],$user_data['password'],$user_data['created_at'],rand(1111, 9999)]);
                    $duration = time() + 3600 * 24 * 30;
                    setcookie("token", $token, $duration, '/');
                }
                session_start();
                $_SESSION['user'] = $user_data;
                App::getData('query_builder')->update('users', [
                    'cookie_login' => $token,
                    'session_id' => session_id(),
                    'updated_at' => date('Y-m-d H:i:s')
                ], ['email' => $login_data['email']]);
                redirect("/user/admin");
            }
        } else {
            redirect('/user/login', '?error=You Have Been Banned! Contact Admin.');
        }
    }

    public function adminPanel()
    {
        return renderView('panel');
    }

    public function updateRole()
    {
        $data = $_GET;
        if (empty($data['id'] || empty($data['role_id']))) {
            redirect('/user', '?error=Unable To Update Role!');
        } else {
            $obj_data = App::getData('query_builder')->retrieve('users', ['id' => $data['id']])[0];
            if (compareUsers(Authorization::checkSuperUser()['role_id'], $obj_data['role_id'])) {
                App::getData('query_builder')->update('users', ['role_id' => $data['role_id']], ['id' => $data['id']]);
                redirect('/user', "?success=Successfully Updated the Role!");
            } else {
                renderView('403');
            }
        }
    }
    public function banUser()
    {
        $ban_data = $_GET;
        if (empty($ban_data['id'])) {
            redirect('/user', '?error=Unable To Ban User');
        } else {
            $obj_data = App::getData('query_builder')->retrieve('users', ['id' => $ban_data['id']])[0];
            if (compareUsers(Authorization::checkSuperUser()['role_id'], $obj_data['role_id'])) {
                $banned_status = $ban_data['banned'] === 'true' ? 1 : 0;
                if ($banned_status == 1 && !empty($obj_data['session_id'])) {
                    $my_sessid = session_id();
                    session_commit();
                    killSession($obj_data['session_id']);
                    restoreSession($my_sessid);
                }
                App::getData('query_builder')->update('users', ['banned' => $banned_status,'cookie_login' => ''], ['id' => $ban_data['id']]);
                redirect('/user', "?success=Successfully Done!");
            } else {
                renderView('403');
            }
        }
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
