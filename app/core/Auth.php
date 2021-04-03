<?php

class Auth
{
    public static function check()
    {
        if (session_id() == '') {
            session_start();
        }

        if (!isset($_SESSION['user']) || is_null($_SESSION['user'])) {
            session_destroy();
            header('location: /auth/login');
            exit;
        }
    }


    public static function login()
    {

        if (isset($_POST['email']) && isset($_POST['password'])) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = ['message' => 'Please, fill all the fields!'];

                header('location: /auth/login');
                exit;
            }

            $email = $_POST['email'];
            $password = $_POST['password'];


            $database = DatabaseFactory::getFactory()->getConnection();
            $query = $database->prepare("SELECT *
                FROM users
                WHERE email = :email");
            $query->execute(array(':email' => $email));

            $user = $query->fetch();

            if (!$user) {
                $_SESSION['error'] = ['message' => 'User does not exist!'];
                header('location: /auth/login');
                exit;
            }

            if (!password_verify($password, $user->password)) {
                $_SESSION['error'] = ['message' => 'Invalid credentials!'];
                header('location: /auth/login');
                exit;
            }

            $_SESSION['user'] = $user;

            header('location: /products');
            exit;
        }
    }

    public static function logout()
    {
        session_destroy();
    }

    public static function register()
    {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = ['message' => 'Please, fill all the fields!'];
                header('location: /auth/register');
                exit;
            }

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $database = DatabaseFactory::getFactory()->getConnection();

            $query = $database->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
            $query->execute(array(':email' => $email));

            if ($query->rowCount() == 0) {
                $query = $database->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
                $query->execute(array(
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $password,
                ));
                $count =  $query->rowCount();
                if ($count == 1) {
                    header('location: /auth/login');
                    exit();
                }
            } else {
                $_SESSION['error'] = ['message' => 'User already exists'];
            }
        }
    }
}
