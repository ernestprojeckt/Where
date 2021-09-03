<?php


namespace App\Model;



use Common\Database\DbConnector;

class About extends AbstractModel
{
    private $dbconnector;

    public function __construct()
    {
        $connect = new DbConnector();
        $this->dbconnector = $connect->connect();

    }

    public function getAllTitle(): array
    {
        $sql = 'SELECT * FROM about';
        $result = $this->dbconnector->query($sql);
       return $result->fetchAll();



    }
}
