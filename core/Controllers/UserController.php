<?php

// Controller class and methods for the route 'user'

use function PHPSTORM_META\type;

class UserController
{
    public function index()
    {
        $users_data = [
            'users' => App::getData('query_builder')->retrieve('users'),
        ];
        renderView('users', $users_data);
    }

    public function showPreusers()
    {
        $preuser_data = ['preusers' => App::getData('query_builder')->retrieve('preusers')];
        renderView('preusers', $preuser_data);
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
        $check_existed = App::getData('query_builder')->retrieve('users', ['email' => $user_data['email']]);
        if (!empty($check_existed)) {
            redirect('/user/login', '?error=Email Already Registered!');
        }
        if ($user_data['password'] != $user_data['confirm-password']) {
            redirect('/user/register', '?error=Passwords Must Be The Same');
        }
        $key = randomKeyGen();
        $insert_data = [
            'name' => $user_data['username'],
            'email' => $user_data['email'],
            'password' => password_hash($user_data['password'], PASSWORD_BCRYPT),
            'verify_key' => $key,
        ];
        require './mail_templates.php';
        $message = $templates['verification_template'];
        Mail::sendMail($user_data['email'], 'Verify Your Email', $message);
        App::getData('query_builder')->create('preusers', $insert_data);
        redirect('/user/login', '?success=Please Check your Mail For Verification');
    }

    public function verifyUser()
    {
        $token = $_GET['token'];
        if (isset($token)) {
            $user_data = App::getData('query_builder')->retrieve('preusers', ['verify_key' => $token]);
            if (!empty($user_data)) {
                $user_data = $user_data[0];
                $data = [
                    'name' => $user_data['name'],
                    'email' => $user_data['email'],
                    'password' => $user_data['password'],
                ];
                App::getData('query_builder')->create('users', $data);
                App::getData('query_builder')->delete('preusers', ['verify_key' => $token]);
                redirect('/user/login', '?success=Please Login.');
            } else {
                die("Invalid Token! Please Register Again.");
            }
        } else {
            die("Invalid Token! Please Register Again.");
        }
    }
    
    public function removePreUser()
    {
        $auth = Authorization::checkSuperUser();
        if (isset($auth)) {
            $token = $_GET['token'];
            if (isset($token)) {
                App::getData('query_builder')->delete('preusers', ['verify_key' => $token]);
            } else {
                redirect('/user/preusers', '?error=Invalid Token!');
            }
        }
    }

    public function loginUser()
    {
        $login_data = $_POST;
        
        if (!validateForm($login_data)) {
            redirect('/user/login', '?error=Please Fill Missing Fields');
        }
        $user_data = App::getData('query_builder')->retrieve('users', ['email' => $login_data['email']]);
        if (empty($user_data)) {
            $preuser = App::getData('query_builder')->retrieve('preusers', ['email' => $login_data['email']]);
            if (!empty($preuser)) {
                redirect('/user/login', '?error= Check your email for Verification');
            } else {
                redirect('/user/login', '?error= Unregistered Email!');
            }
        } else {
            if (intval($user_data[0]['banned']) !== intval(1)) {
                if (!password_verify($login_data['password'], $user_data[0]['password'])) {
                    redirect('/user/login', '?error=Invalid Credentials');
                } else {
                    $token = '';
                    if (isset($login_data['cookie-login'])) {
                        $token = implode("~", [$user_data[0]['name'],$user_data[0]['password'],$user_data[0]['created_at'],rand(1111, 9999)]);
                        $duration = time() + 3600 * 24 * 30;
                        setcookie("token", $token, $duration, '/');
                    }
                    session_start();
                    $_SESSION['user'] = $user_data[0];
                    App::getData('query_builder')->update('users', [
                        'cookie_login' => $token,
                        'session_id' => session_id(),
                        'updated_at' => date('Y-m-d H:i:s')
                    ], ['email' => $login_data['email']]);
                    if ($user_data[0]['role_id'] > 0) {
                        redirect("/user/admin");
                    } else {
                        redirect('/');
                    }
                }
            } else {
                redirect('/user/login', '?error=You Have Been Banned! Contact Admin.');
            }
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
