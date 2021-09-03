<?php

namespace common\Database;

use PDO;

class DbConnector
{
    private $dns = 'mysql:dbname=newtest;host=localhost:3306';
    private $user = 'root';
    private $password = '';




    public function __construct()
    {
        $dirPath = __DIR__;
        $config = require $dirPath . '/../../config/db-config.php';
        $this->dns =
            $config['driver'] . ':' . 'dbname=' .
            $config['dbname'] . ';host' .
            $config['host'] . ':' .
            $config['port'];

        $this->user = $config['user'];
        $this->password = $config['password'];
    }



    public function connect()
    {
        $pdoObj = new \PDO($this->dns, $this->user, $this->password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        return $pdoObj;
    }

}

