<?php
require_once 'business.php';
class Recruit extends DB_business{
    
    function __construct() {
        $this->table = "chieusinh";
        $this->key = "ID_CHIEUSINH";
        parent::__construct();    
    }
    function select_three_recruit(){
        $select="ID_CHIEUSINH,TEN_CHIEUSINH,NGAYMO_CHIEUSINH,MOTA_CHIEUSINH,ID_IMG";
        $from=0;
        $to=3;
        return $this->select_limit($select,$from,$to);  
    }
}