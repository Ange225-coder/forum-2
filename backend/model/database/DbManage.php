<?php

    declare(strict_types = 1);

    namespace App\Model\Database;

    use PDO;

    class DbManage
    {
        protected function dbConnect(): PDO
        {
            return $db = new PDO('mysql:host=mysql_db;dbname=forum;charset=utf8;', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
    }