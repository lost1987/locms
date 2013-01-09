<?php

if( ! defined('BASEPATH')) exit('No direct script access allowed');

 Class DB {
 	
	private $link;
	public $queryState;
	private $debug = FALSE;
	private $trans_state;
 	
	function DB(){

        $host = Config::item('DB','HOST');
        $user =  Config::item('DB','USERNAME');
        $pwd = Config::item('DB','PASSWORD');
        $debug = Config::item('DB','DEBUG');
        $database = Config::item('DB','DBNAME');

		$this -> link = mysql_connect($host,$user,$pwd);
		
		if(empty($this -> link)){
			exit('database init error!');
		}
		
		$this -> init($database,$debug);
	}
	
	private function init($database,$debug){
		$this -> trans_state = TRUE;
		mysql_select_db($database);
		if($debug)$this -> debug = TRUE;
		mysql_query("SET NAMES UTF8");
	}
	
	public function query($sql){
		$this -> queryState = mysql_query($sql);
		if(!$this -> queryState){
			if($this -> debug){
				die(mysql_error());
			}
		}
		return $this;
	}
	
	public function insert_id(){
		return mysql_insert_id();
	}
	
	public function result_array(){
		$list = array();
		while($row = mysql_fetch_assoc($this->queryState)){
			$list[] = $row;
		}
		return $list;
	}
	
	public function row_array(){
		if($row = mysql_fetch_assoc($this->queryState)){
			return $row;
		}
		return '';
	}

     public function result_object(){
         $list = array();
         while($row = mysql_fetch_object($this->queryState)){
             $list[] = $row;
         }
         return $list;
     }

     public function row_object(){
         if($row = mysql_fetch_object($this->queryState)){
             return $row;
         }
         return '';
     }

     public function insert($tablename , $array){
          $sql = "insert into ";
          $sql_key = '(';
          $sql_val = '(';
          if(is_array($array) && count($array)>0 && !empty($tablename)){
              foreach($array as $ckey => $cvalue){
                    $sql_key .= "$ckey,";
                    if(gettype($cvalue) == 'string' || empty($cvalue)){
                        $sql_val .= "'$cvalue',";
                    }else{
                        $sql_val .= "$cvalue,";
                    }
              }
              $sql_key = substr($sql_key,0,strlen($sql_key) - 1);
              $sql_val = substr($sql_val,0,strlen($sql_val) - 1);
              $sql_key .= ') ';
              $sql_val .= ')';
              $sql .= $tablename." ".$sql_key.' values '.$sql_val ;

              if(mysql_query($sql)){
                  return TRUE;
              }
              return FALSE;
          }
     }

     /**
      * @param $tablename
      * @param $array
      * @param $condition exp: id=5
      */
     public function update($tablename,$array,$condition){
         $sql = "update ";
         if(is_array($array) && count($array)>0 && !empty($tablename) && !empty($condition)){
             $sql .= "$tablename set ";
             foreach($array as $ckey => $cvalue){
                 $sql .= "$ckey=";
                 if(gettype($cvalue) == 'string' || empty($cvalue)){
                     $sql .= "'$cvalue',";
                 }else{
                     $sql .= "$cvalue,";
                 }
             }
             $sql = substr($sql,0,strlen($sql) - 1);
             $sql .= " where ".$condition;
             if(mysql_query($sql)){
                 return TRUE;
             }
             return FALSE;
         }
     }
	
	public function trans_begin(){
		mysql_query('SET AUTOCOMMIT = 0');
	}
	
	public function trans_end(){
		mysql_query('SET AUTOCOMMIT = 1');
	}
	
	public function trans_status(){
		return $this -> trans_state;
	}
	
	public function trans_commit(){
		mysql_query('COMMIT');
	}
	
	public function trans_rollback(){
		mysql_query('ROLLBACK');
	}
	
	public function getLink(){
		return $this -> link;
	}

    public function num_rows(){
        return mysql_num_rows($this->queryState);
    }
	
	public function close(){
		mysql_close();
	}
 }

?>