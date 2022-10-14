<?php

namespace Core;

use PDO;

abstract class Model
{

    /**
     * @return PDO|null
     */
    protected static function getDBConnection()
    {
        static $db = null;

        if ($db === null) {
            $host = '';
            $dbname = '';
            $username = '';
            $password = '';

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }

    public function getAll($sql)
    {
        $stmt = self::getDBConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}