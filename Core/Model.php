<?php

namespace Core;

use PDO;
use Exception;

abstract class Model
{
    /**
     * @var $table
     */
    protected $table;

    /**
     * @param \Core\Config $config
     * @param \Core\Env $env
     * @return PDO|null
     * @throws Exception
     */
    protected static function getDBConnection()
    {
        static $db = null;

        if ($db === null) {
            $config = new Config();
            $db_params = $config->getDatabaseToUse();

            if (!count($db_params)) {
                throw new Exception('Invalid database parameters');
            }

            $host = $db_params['db_host'];
            $dbname = $db_params['db_database'];
            $username = $db_params['db_username'];
            $password = $db_params['db_password'];

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAll()
    {
        $sql = "SELECT * FROM ".$this->getTableName()."";
        $stmt = self::getDBConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        if ($this->table) {
            $table_name = $this->table;
        }
        else {
            $table_name = strtolower(convertToCamelCase(class_basename($this)));
            $this->setTable($table_name);
        }

        return $table_name;
    }

    /**
     * @param $table
     */
    public function setTable($table) {
        $this->table = $table;
    }
}