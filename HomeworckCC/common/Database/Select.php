<?php

//'SELECT Galerry.id as gallery_id, post.id as post_id, Galerry.title as gallery_title, post.title as post_title FROM Galerry INNER JOIN post ON Galerry.id = post.galerry_id WHERE post.id = 2 OR post.id = 3 order by post.id DESC ';
namespace Common\Database;


class Select extends Where
{

    protected $tableName;
    protected $columnName = '*';
    protected $orderBy;
    protected $orderName;
    protected $join;
    protected $joinName;
    protected $PastON;

    /**
     * @param mixed $tableName
     */
    public function setTableName($tableName): void
    {
        $this->tableName = $tableName;
    }

    /**
     * @param mixed $columnName
     */
    public function setColumnName($columnName): void
    {
        $this->columnName = $columnName;
    }

    /**
     * @param mixed $orderBy
     */
    public function setOrderBy($orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @param mixed $linit
     */
    public function setLinit($linit): void
    {
        $this->linit = $linit;
    }

    /**
     * @param mixed $join
     */
    public function setJoin($join): void
    {
        $this->join = $join;
    }

    public function getSQL()
    {
            $sql = 'SELECT ' . $this->buildColumns() . 'FROM' . $this->buildTableName() . 'JOIN' . $this->buildJoin() . ' ON ' . $this->BuildPustOn() . 'WHERE' . $this->ConnectWhere() . ' ORDER BY POST ' . $this->BuildOrder();
    }
//'SELECT Galerry.id as gallery_id, post.id as post_id, Galerry.title as gallery_title, post.title as post_title FROM Galerry INNER JOIN post ON Galerry.id = post.galerry_id WHERE post.id = 2 OR post.id = 3 order by post.id DESC ';
    protected function buildColumns()
    {
        if (is_array($this->columnName)){
            $colunnString = '';
            foreach ($this->columnName as $key=>$value){
                if(!empty($this->columnString)){
                    $colunnString .=',';
                }
                if(is_int($key)){
                    $colunnString .=$value;
                }else{
                    $colunnString .= $value . ' as ' . $key . ',';
                }
            }
            return $colunnString;
        }elseif (is_string($this->columnName)){
            return $this->columnName;
        }
        throw new Exception('parsing columns not found.');
    }

    protected function buildTableName()
    {
        if (is_array($this->tableName)){
            $tableString = '';
            foreach ($this->tableName as $key=>$value){
                if(!empty($this->tableString)){
                    $tableString .=',';
                }
                if(is_int($key)){
                    $tableString .=$value;
                }else{
                    $tableString .= $value . ' as ' . $key . ',';
                }
            }
            return $tableString;
        }elseif (is_string($this->tableName)){
            return $this->tableName;
        }
        throw new Exception('parsing columns not found.');
    }

    protected function buildJoin($joinName=Null , $join ,)
    {
        $this->join = (isset($join)
            && isset($joinName)) ? ' '
            . $join : '';
        $this->joinName =  ' '
            . $joinName;
    }
    protected function BuildPustOn($PastON)
    {
        $this->PastON = (isset($PastON)
            && isset($this->joinWith));
    }
    protected function BuildOrder($orderBy,$orderName)
    {
        $this->orderBy = (isset($orderName));
        $this->orderName = (isset($orderName)
            && isset($orderBy));
    }
    public function ConnectWhere()
    {
        $whereObj = new Where();
        $whereObj->andWhere
        ([ 'gallery_id' => 2,
            'gallery.id' => 3]);
        $this->where = ' WHERE ' . $whereObj->getWhere();
    }
}


