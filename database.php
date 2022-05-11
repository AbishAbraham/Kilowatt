<?php


define('DB_USER', 'root');
define('DB_PASS', '14232357');




$string = "mysql:host=localhost;dbname=dbmsdummy";
if(!$connection = new PDO($string,DB_USER,DB_PASS))
{
	die("Failed to connect");
}
$error="";

