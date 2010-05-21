<?php
/*
Plugin Name: Jangan di Suntik
Plugin URI: http://www.teguh.info/plugin-anti-suntik-sql-dari-luar.aspx
Description: Safe Your WordPress from SQL Injection Attacks.
Version: 0.4
Author: Teguh Aditya
Author URI: http://www.teguh.info
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
*/
?>
<?php
/*  Copyright © 2010 Jangan di Suntik (email : teguhaditya@ovi.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
error_reporting(0);
/* safe plugin source from error reporting */
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
				echo "<title>Jangan di Suntik Protected</title><center>This site secured by <a href='http://wordpress.org/extend/plugins/jangan-di-suntik/'>Jangan di Suntik</a><br>Copyright © 2010 - <a href='http://www.teguh.info/'>Teguh Aditya</a></center>";
				@header("HTTP/1.1 414 Request-URI Too Long");
				@header("Status: 414 Request-URI Too Long");
				@header("Connection: Close");
				@exit;
		}
?>