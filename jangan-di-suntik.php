<?php 
/* 
Plugin Name: Jangan di Suntik
Plugin URI: http://www.teguh.info/plugin-anti-suntik-sql-dari-luar.aspx
Description: Safe Your WordPress from SQL Injection Attacks
Author URI: http://www.teguh.info/
Author: Teguh Aditya
Version: 0.1
*/
?>
<?
/**
* default settings
**/

global $user_ID; if($user_ID) {
	if(!current_user_can('level_10')) {
		if (strlen($_SERVER['REQUEST_URI']) > 255 || 
			stripos($_SERVER['REQUEST_URI'], "eval(") || 
			stripos($_SERVER['REQUEST_URI'], "CONCAT") || 
			stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") || 
			stripos($_SERVER['REQUEST_URI'], "base64")) {
				echo "This site secured by Jangan di Suntik";
				@header("HTTP/1.1 414 Request-URI Too Long");
				@header("Status: 414 Request-URI Too Long");
				@header("Connection: Close");
				@exit;
		}
	}
} ?>