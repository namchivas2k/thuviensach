<?php

class AuthService
{
    static function isLogin()
    {
        return isset($_SESSION['logined']);
    }

    static function login($username, $password)
    {
        //Simple
        $login = ($username == 'admin') && ($password == 'admin');
        if (!$login) return false;
        $_SESSION['logined'] = true;

        return true;
    }
}
