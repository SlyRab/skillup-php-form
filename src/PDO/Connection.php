<?php

namespace Test\PDO;

use PDO;

class Connection
{
    public static function make() {

        $table = 'CREATE TABLE IF NOT EXISTS Users(id INTEGER AUTO_INCREMENT PRIMARY KEY, 
            email VARCHAR(30) UNIQUE NOT NULL , password VARCHAR(30) NOT NULL, firstName VARCHAR(30), lastName VARCHAR(30),
    phone VARCHAR(30))';

        try {
            $db = new PDO('mysql:host=mysql:3306;dbname=db', 'user', 'password');

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec($table);
        } catch (\Throwable $exception)
        {
            die();
        }

        return $db;
    }
}