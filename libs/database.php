<?php

class Database{
    private $__connect;
    private $host = "localhost",$user="root",$password="",$database="giasu";
    
    function connect(){
        if(!$this->__connect){
            $this->__connect = mysqli_connect($this->host, $this->user, $this->password, $this->database);
            mysqli_query($this->__connect, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }
    function dis_connect(){
        if($this->__connect){
            mysqli_close($this->__connect);
        }
    }
    function insert($table,$data){
        //connect database
        $this->connect();
        //luu ten truong
        $field_list='';
        // luu gia ri cho truong
        $value_list='';
        
        foreach($data as $key =>$value){
            $field_list = ",$key";
            // mysql_escape_string kim tra cac ky tu dat biet
            $value_list = ",'".mysql_escape_string($value)."'";
        }
        // sau khi chay vong lap se thua di dau , nen ta xoa day ,
        $sql = 'Insert INTO '.$table.'('.trim($field_list,',').') Values ('.trim($value_list,',').')';
        return mysqli_query($this->__connect, $sql);
    }
    function update($table,$data,$where){
        $this->connect();
        $sql='';
        // lap lai data
        foreach($data as $key=>$value){
            $sql.="$key = '".mysql_escape_string($value)."',";
        }
        $sql ='Update'.$table.'set '.trim($sql,',').' Where '.$where;
        return mysqli_query($this->__connect, $sql);
    }
    function remove($table,$where){
        $this->connect();
        $sql = "Delete from $table Where $where";
        return mysqli_query($this->__connect, $sql);
    }
    function get_list($sql){
        $this->connect();
        $result = mysqli_query($this->__connect, $sql);
        if(!$result){
            die($sql);
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)){
            $return[]=$row;
        }
        // xoa ket qua khoi vung nho
        mysqli_free_result($result);
        
        return $return;
    }
    function get_row($sql){
        $this->connect();
        $result  = mysqli_query($this->__connect,$sql);
        if(!$result){
            die($sql);
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if($row){
            return $row;
        }
        else
        {
            return FALSE;
        }
    }
}
