<?php
require_once 'database.php';

class DB_business extends Database{
    
    protected $table="", $key="";
    
    function __construct() {
        parent::connect();
    }
    function __destruct() {
        parent::dis_connect();
    }
            function add_new($data){
        return parent::insert($this->table, $data);
    }
    function delete_by_id($id){
           return $this->remove($this->table, $this->key.'='.(int)$id);
    }
    function update_by_id($data,$id){
        return $this->update($this->table,$data,$this->key.'='.(int)$id);
    }
    function select_by_id($select,$id){
        $sql = "Select $select from ".$this->table." where ".$this->key." = ".(int)$id;
        return $this->get_row($sql);
    }
    function select_where_limit($select,$where,$from,$to){
      $sql = "SELECT ".$select
           . " FROM ".$this->table          
           . " WHERE ".$where." ORDER BY ".$this->key." DESC LIMIT ".$from.",".$to;
      return $this->get_list($sql);
    }
    function select_limit($select,$from,$to){
        $sql="SELECT ".$select
            ." FROM ".$this->table
            ." ORDER BY ".$this->key
            ." DESC LIMIT ".$from.",".$to;        
        return $this->get_list($sql);
    }
    function select_where_inner($select,$inner,$key,$id){
        $sql="SELECT ".$select
             ." FROM ".$this->table
             ." INNER JOIN ".$inner
             ." On ".$this->table.".".$key." = ".$inner.".".$key
             ." Where ".$this->key." = ".$id;
        return $this->get_list($sql);
    }
}