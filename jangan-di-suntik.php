<?php 
/* 
Plugin Name: Jangan di Suntik
Plugin URI: http://www.teguh.info/plugin-anti-suntik-sql-dari-luar.aspx
Description: Safe Your WordPress from SQL Injection Attacks
Author URI: http://www.teguh.info/
Author: Teguh Aditya
Version: 0.2
*/
?>
<?
/**
* default settings
**/


		if (strlen($_SERVER['REQUEST_URI']) > 255 || 
			stripos($_SERVER['REQUEST_URI'], "eval(") || 
			stripos($_SERVER['REQUEST_URI'], "CONCAT") || 
			stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") || 
			stripos($_SERVER['REQUEST_URI'], "base64")) {
				echo "<title>Jangan di Suntik Protected</title><center>This site secured by <a href='http://wordpress.org/extend/plugins/jangan-di-suntik/'>Jangan di Suntik</a></center>";
				@header("HTTP/1.1 414 Request-URI Too Long");
				@header("Status: 414 Request-URI Too Long");
				@header("Connection: Close");
				@exit;
		}
?>