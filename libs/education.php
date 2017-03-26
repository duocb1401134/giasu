<?php
require_once 'business.php';
class Education extends DB_business{
    
    function __construct() {
        $this->table="trinhdo";
        $this->key="ID_TRINHDO";
        parent::__construct();
    }
    function select_once($id){
        return $this->select_by_id("*", $id);
    }
}