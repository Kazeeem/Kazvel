<?php

namespace Core;

class Config
{
    /**
     * @return array
     */
    public function getDatabaseToUse()
    {
        $db_params = [];
        $db_connection = env('DB_TYPE', 'mysql');

        if ($db_connection == 'mysql') {
            $db_params = $this->useMysql();
        }

        return $db_params;
    }

    /**
     * @return array
     */
    public function useMysql()
    {
        return [
            'db_host' => env('DB_HOST'),
            'db_database' => env('DB_NAME'),
            'db_username' => env('DB_USER'),
            'db_password' => env('DB_PASS')
        ];
    }
}