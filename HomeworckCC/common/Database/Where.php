<?php


namespace Common\Database;


class Where extends DbConnector
{
    protected $where;

    public function andWhere($where)
    {
        $this->where[] = ['and' => $where];
    }
    public function orWhere($where)
    {
        $this->where[] = ['or' => $where];
    }
    public function getWhere()
    {
        $field = '';
        if(empty($this->where)){
            return NULL;
        } else{
            foreach ($this->where as $value){
                foreach ($value as $operand=>$data){
                    foreach ($data as $before=>$after){
                        if(!empty($string)){
                            $string .= " $operand ";
                        }
                        $field .=  "$before = $after" ;
                    }
                }
            }
            return $field;
        }
    }
}
//[
// 'id' => 1,
// 'litle' => 'teset',
//]
//['like', ['columnName', 'value']]

//$this->where[] = ['and' => $where]
//or
//'id = 5'
//[