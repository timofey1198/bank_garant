<?php

class MYSQL {
var $hostname;
var $port;
var $server;
var $username;
var $password;
var $pconnect;
var $link;
var $database;
var $table;
var $q_parts;
var $query;
var $result;
var $num_rows;
var $affected;
var $error;
var $errno;
function MYSQL($login = '', $password = '', $host = '', $db_name = false, $prn_err = true, $die_err = true, $log_err = false) {
	global $MAIN;
	$this->hostname	= 			$host;
	$this->username	=			$login;
	$this->password	=			$password;
	$this->pconnect	=			false;
	$this->link		=			NULL;
	$this->database =			$db_name;
	$this->prn_err	= $prn_err;
	$this->die_err	= $die_err;
	$this->log_err	= $log_err;

	$this->table	= (string)	NULL;
	$this->q_parts	= (array)	NULL;
	$this->query	= (string)	NULL;
	$this->result	=			NULL;
	$this->last_id	=			NULL;
	$this->num_rows	= (integer)	NULL;
	$this->affected	= (integer)	NULL;
	$this->error	= (string)	NULL;
	$this->errno	= (integer)	NULL;
}
function handle_error($str='') {
	$this->errno = @mysql_errno();
	$this->error = @mysql_error();
	// Enchance it...
	print "Error query or connect to database: <br>\n";
	print $this->query . "<BR>\n";
	print $this->errno . " : " . $this->error . "<BR>\n";
	if (isset($str)) print "<b>Query:</b> <br>\n" . $str . "<BR>\n";
	exit;
}
function connection() {
	$this->link = $this->pconnect ? @mysql_pconnect($this->hostname, $this->username, $this->password) : @mysql_connect($this->hostname, $this->username, $this->password);
	if (!$this->link) {
		$this->handle_error();
	}
	$flag=mysql_select_db($this->database, $this->link);
	if (!$flag) {
		$this->handle_error();
	}
}
function close() {
	if($this->link and !$this->pconnect)
		return mysql_close($this->link);
	else Return true;
}
function sql_query($query='', $ret=false) {
	if($query == '') $query = $this->query;
	else $this->query = $query;
	$result = @mysql_query($query, $this->link);
	if (!$result) {
		$this->handle_error($query);
	}
	if(!$ret) {
		$this->result = $result;
		$this->affected = @mysql_affected_rows();
		$this->num_rows = @mysql_num_rows($result);
	}
	else return $result;
}
function fnumrows($result) {
	Return @mysql_num_rows($result);
}
function get_single_result($res=false) {
	if($res) Return @mysql_result($res, 0, 0);
	else return @mysql_result($this->result, 0, 0);
}
function get_result_row($res=false) {
	if($res) return @mysql_fetch_array($res);
	return @mysql_fetch_array($this->result);
}
function get_all($res=false) {
	if(!$res) $res= $this->result;
	$num_rows=@mysql_num_rows($res);
	for($i=0;$i<$num_rows;$i++)
		$result[]=@mysql_fetch_array($res);
	Return $result;
}
function use_database() {
	$this->query = "USE " . $this->database;
	$this->sql_query();
}
function create_table() {
	$this->query = "CREATE TABLE IF NOT EXISTS " . $this->table . " ( " . $this->q_parts[0] . " ) " . $this->q_parts[1];
	$this->sql_query();
}
function drop_table() {
	$this->query = "DROP TABLE IF EXISTS " . $this->table;
	$this->sql_query();
}
function insert_data() {
	$this->query = "INSERT INTO " . $this->table . " SET " . $this->q_parts[0];
	$this->sql_query();
}
function insert_id() {
	$this->last_id = mysql_insert_id();
	return $this->last_id;
}
function update_data() {
	$this->query = "UPDATE " . $this->table . " SET " . $this->q_parts[0] . " WHERE " . $this->q_parts[1];
	$this->sql_query();
}
function delete_data($clear_table = FALSE) {
	$clear_table = (boolean) $clear_table;
	$this->query = "DELETE FROM " . $this->table . ($clear_table ? "" : " WHERE " . $this->q_parts[0]);
	$this->sql_query();
}
function get_mysql_version() {
	return '';
	$this->query = "SELECT ALL VERSION()";
	$this->sql_query();
	return "MySQL/" . $this->get_single_result();
}
function count_items($table) {
	$this->query = "SELECT ALL COUNT(*) FROM " . $table;
	$this->sql_query();
	return $this->get_single_result();
}
}
?>