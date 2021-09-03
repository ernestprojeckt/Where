<?php


namespace App\Model;



use Common\Database\DbConnector;
use Common\Database\Slect;

class Galerry extends AbstractModel
{

    private $dbconnectorGarry;

    public function __construct()
    {
        $connect = new DbConnector();
        $this->dbconnectorGarry = $connect->connect();

    }

    public function getAllTitle(): array
    {
        $sql = Slect::class;


        $result = $this->dbconnectorGarry->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);



    }
}