<?php

class Mysql {
 private $db_host;     
 private $db_user;     
 private $db_pass;     
 private $db_name;     
 private $db_charset;  

 private $conn;
 private $query_id;   
 private $result;     
 private $num_rows;   
 private $insert_id;  


 function __construct ($db_host,$db_user,$db_pass,$db_name,$db_charset,$conn) {
	$this->db_host = $db_host ;
	$this->db_user = $db_user ;
	$this->db_pass = $db_pass ;
	$this->db_name = $db_name ;
	$this->db_charset = $db_charset ;
	$this->conn = $conn ;
	$this->connect();
 }

 function __destruct () {
	@mysql_close($this->conn);
 }

 public function connect () {
	if ($this->conn == 'pconn') {
	 @$this->conn = mysql_pconnect($this->db_host,$this->db_user,$this->db_pass);
	} else {
	 @$this->conn = mysql_connect($this->db_host,$this->db_user,$this->db_pass);
	}
	if (!$this->conn) {
	 $this->show_error('error！');
	}
	if (!@mysql_select_db($this->db_name,$this->conn)) {
	 $this->show_error("error $this->db_name ");
	}
	mysql_query("SET NAMES $this->db_charset");
	return $this->conn;
 }


 public function query ($sql) {
	if ($this->query_id) $this->free_result();
	$this->query_id = @mysql_query($sql,$this->conn);
	if (!$this->query_id) $this->show_error("SQL <b>\"$sql\"</b> error");
	return $this->query_id;
 }


 public function findall ($table_name) {
	$this->query("select * from $table_name");
 }

// mysql_fetch_array
 public function fetch_array () {
	if ($this->query_id) {
	 $this->result = mysql_fetch_array($this->query_id);
	 return $this->result;
	}
 }


    public function delete($table, $condition, $url = '') {
        $this->result=$this->query("DELETE FROM $table WHERE $condition");
        return $this->result;
    }

// ......

 public function fetch_assoc () {
	if ($this->query_id) {
	 $this->result = mysql_fetch_assoc($this->query_id);
	 return $this->result;
	}
 }

 public function fetch_row () {
	if ($this->query_id) {
	 $this->result = mysql_fetch_row($this->query_id);
	 return $this->result;
	}
 }

 public function fetch_object () {
	if ($this->query_id) {
	 $this->result = mysql_fetch_object($this->query_id);
	 return $this->result;
	}
 }

// 获取 num_rows
 public function num_rows () {
	if ($this->query_id) {
	 $this->num_rows = mysql_num_rows($this->query_id);
	 return $this->num_rows;
	}
 }

 public function insert_id () {
	return $this->insert_id = mysql_insert_id();
 }

 public function show_tables () {
	$this->query("show tables");
	if ($this->query_id) {
		echo " $this->db_name  ".$this->num_rows($this->query_id)." <br/>";
		$i = 1;
		while ($row = $this->fetch_array($this->query_id)){
			 echo "$i -- $row[0]<br/>";
			 $i ++;
		}
	}
 }

 public function show_dbs(){
	$this->query("show databases");
	if ($this->query_id) {
		echo " ".$this->num_rows($this->query_id)." <br/>";
		$i = 1;
		while ($this->row = $this->fetch_array($this->query_id)){
			 echo "$i -- ".$this->row[Database]."<br />";
			 $i ++;
		}
	}
 }

 public function drop_db ($db_name='') {
 	if ($db_name == '') {
 		$db_name = $this->db_name;
		$this->query("DROP DATABASE $db_name");
	}else {
		$this->query("DROP DATABASE $db_name");
	}
	if ($this->query_id) {
		return " $db_name ";
	}else {
		$this->show_error(" $db_name ");
	}
}

 public function drop_table ($table_name) {
	$this->query("DROP TABLE $table_name");
 	if ($this->query_id) {
		return " $table_name ";
	}else {
		$this->show_error(" $table_name ");
	}

}

public function create_db ($db_name) {
	$this->query("CREATE DATABASE $db_name");
	if($this->query_id){
		return " $db_name ";
	}else {
		$this->show_error(" $db_name ");
	}
}

 public function get_info(){
	echo mysql_get_server_info();
 }

 public function show_error ($msg) {
	$errinfo = mysql_error();
	echo "$msg <br/> $errinfo<p>";
 }

 public function free_result () {
	if ( @mysql_free_result($this->query_id) )
	unset ($this->result);
	$this->query_id = 0;
 }

} // End class



?>