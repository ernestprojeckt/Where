<?php


namespace App\Model;



use Common\Database\DbConnector;

class index extends AbstractModel
{

    private $dbconnectorIndex;

    public function __construct()
    {
        $connect = new DbConnector();
        $this->dbconnectorIndex = $connect->connect();

    }

    public function getAllTitle(): array
    {
        $sql = 'SELECT * FROM Galerry';
        $result = $this->dbconnectorIndex->query($sql);
        return $result->fetchAll();



    }
}