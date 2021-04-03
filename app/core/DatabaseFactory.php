<?php

class DatabaseFactory
{
    private static $factory;
    private $database;

    public static function getFactory()
    {
        if (!self::$factory) {
            self::$factory = new DatabaseFactory();
        }
        return self::$factory;
    }

    public function getConnection()
    {
        if (!$this->database) {

            try {
                $config = Config::get('database');

                // PDO::FETCH_OBJ
                $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
                $this->database = new PDO(
                    $config['db_type'] . ':host=' . $config['db_host'] . ';dbname=' .
                        $config['db_name'] . ';port=' . $config['db_port'] . ';charset=' . $config['db_charset'],
                    $config['db_user'],
                    $config['db_pass'],
                    $options
                );
            } catch (PDOException $e) {

                echo 'Database connection failure. Please try again later.' . '<br>';
                echo 'Error code: ' . $e->getCode();
                // echo 'Message: ' . $e->getMessage();

                exit;
            }
        }
        return $this->database;
    }
}
