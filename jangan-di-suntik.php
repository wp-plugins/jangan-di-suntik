<?php
/*
Plugin Name: Jangan di Suntik
Plugin URI: http://www.premiumagc.com/jangan-di-suntik/
Description: Safe Your WordPress from SQL Injection Attacks.
Version: 0.5
Author: Teguh Aditya
Author URI: http://www.teguhaditya.com/
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
*/
/*
    Copyright (C) 2010 - 2011 Teguh Aditya (email : teguhaditya@ovi.com)
*/
/*
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
function jangan_di_suntik() {
if (strlen($_SERVER['REQUEST_URI']) > 255 || 
stripos($_SERVER['REQUEST_URI'], "eval(") || 
stripos($_SERVER['REQUEST_URI'], "CONCAT") || 
stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") || 
stripos($_SERVER['REQUEST_URI'], "base64")) {
echo '<html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL was not found on this server.</p><p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p></body></html>';
@header("HTTP/1.1 414 Request-URI Too Long");
@header("Status: 414 Request-URI Too Long");
@header("Connection: Close");
@exit;
}
}
add_action( 'get_header', 'jangan_di_suntik' );
?>