<?php
require_once 'business.php';
class Tutor extends DB_business{
    
    function __construct(){
        $this->table="giasu";
        $this->key="ID_GS";
        parent::__construct();
    }
    function select_four_tutor(){
        $select = "ID_GS, TEN_GS, GIOITHIEU_GS,ID_IMG ";
        $where="DUYET_GS = 1";
        $from=0;
        $to=4;        
        return $this->select_where_limit($select,$where,$from,$to);
    }
    function select_once_tutor($id){
        $select='*';        
        return $this->select_by_id($select,$id);
    }
}