<?php
namespace sphereerp\utils;
class actions{
	static function log($where,$what){
		$conn=new db();
		return $conn->sql("INSERT INTO sys_logs VALUES('',?,?,?,?,?,?)",[$where,$what,session['u'],datestamp,'',ipaddress]);
	}	
}
