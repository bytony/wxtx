<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: mysql.class.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class bidcms_mysql {

	var $version = '';
	var $querynum = 0;
	var $link = null;

	function connect($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0, $halt = TRUE, $dbcharset2 = '') {

		$func = empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect';
		if(!$this->link = @$func($dbhost, $dbuser, $dbpw, 1)) {
			$halt && $this->halt('Can not connect to MySQL server');
		} else {
			if($this->version() > '4.1') {
				global $bidcmscharset, $bidcmsdbcharset;
				$dbcharset = $dbcharset2 ? $dbcharset2 : $bidcmsdbcharset;
				$dbcharset = !$dbcharset && in_array(strtolower($bidcmscharset), array('utf-8', 'big5', 'utf8','gbk')) ? str_replace('-', '', $bidcmscharset) : $dbcharset;
				$serverset = $dbcharset ? 'character_set_connection='.$dbcharset.', character_set_results='.$dbcharset.', character_set_client='.$dbcharset : '';
				$serverset .= $this->version() > '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
				$serverset && mysql_query("SET $serverset", $this->link);
			}
			$dbname && @mysql_select_db($dbname, $this->link);
		}

	}

	function select_db($dbname) {
		return mysql_select_db($dbname, $this->link);
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function fetch_first($sql) {
		return $this->fetch_array($this->query($sql));
	}

	function result_first($sql) {
		return $this->result($this->query($sql), 0);
	}

	function query($sql, $type = '') {
		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
			'mysql_unbuffered_query' : 'mysql_query';
		
		if(!($query = $func($sql, $this->link))) {
			if(in_array($this->errno(), array(2006, 2013)) && substr($type, 0, 5) != 'RETRY') {
				$this->close();
				require ROOT_PATH.'/inc/config.inc.php';
				$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect, true, $dbcharset);
				return $this->query($sql, 'RETRY'.$type);
			} elseif($type != 'SILENT' && substr($type, 5) != 'SILENT') {
				
				$this->halt('MySQL Query Error', $sql);
			}
		}

		$this->querynum++;
		return $query;
	}

	function affected_rows() {
		return mysql_affected_rows($this->link);
	}

	function error() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}

	function errno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}

	function result($query, $row = 0) {
		$query = @mysql_result($query, $row);
		return $query;
	}

	function num_rows($query) {
		$query = mysql_num_rows($query);
		return $query;
	}

	function num_fields($query) {
		return mysql_num_fields($query);
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	function fetch_row($query) {
		$query = mysql_fetch_row($query);
		return $query;
	}

	function fetch_fields($query) {
		return mysql_fetch_field($query);
	}
	function list_fields($query)
	{
		$fields=array();
		$columns = mysql_num_fields($query);
		for ($i = 0; $i < $columns; $i++) {
			$fields[]=mysql_field_name($query, $i);
		} 
		return $fields;
	}
	
	function version() {
		if(empty($this->version)) {
			$this->version = mysql_get_server_info($this->link);
		}
		return $this->version;
	}

	function close() {
		return mysql_close($this->link);
	}
	function __destruct()
	{
		$this->close();
	}
	function halt($message = '', $sql = '') {
		$timestamp=time();
		if($message) {
		$errmsg = "<b>BIDCMS info</b>: $message<br/>";
		}
		$errmsg .= "<b>Time</b>: ".gmdate("Y-n-j g:ia", $timestamp)."<br/>";
		$errmsg .= "<b>Script</b>: ".$_SERVER['PHP_SELF']."<br/>";
		if($sql) {
			$errmsg .= "<b>SQL</b>: ".htmlspecialchars(str_replace($GLOBALS['bidcmstable_prefix'],'',$sql))."<br/>";
		}
		$errmsg .= "<b>Error</b>:  ".$this->error()."<br/>";
		$errmsg .= "<b>Errno.</b>:  ".$this->errno();

		echo $errmsg;
		//exit($errmsg);
	}
}

?>
