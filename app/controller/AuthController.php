<?php

class AuthController
{

    public function login()
    {
        Auth::login();

        $error = '';
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            $error = $_SESSION['error']['message'];
            unset($_SESSION['error']);
        }

        require '../app/views/login.php';
    }

    public function logout()
    {
        Auth::logout();

        header('location: /auth/login');
        exit;
    }

    public function register()
    {
        Auth::register();

        $error = '';
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error']['message'];
            unset($_SESSION['error']);
        }

        require '../app/views/register.php';
    }
}
