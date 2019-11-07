<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Jakarta');
/*
$config['dbhost'] 	= 'localhost';
$config['dbuser'] 	= 'insidehe_db';
$config['dbname'] 	= 'insidehe_db';
$config['dbpass'] 	= 'mana123:;123';
$conn             	= mysqli_connect($config['dbhost']  ,$config['dbuser'], $config['dbpass'], $config['dbname']);
// Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
*/
// Web Config
$config['host']     = 'http://nuaing.web.id/bs'; //Base URL
$config['name']     = 'Bootstrap 4'; //Web Name
$config['author']   = 'NTHANFP'; //Author
$config['mt']       = 0; //Maintenance (0 or 1)
if($config['mt'] == 1){
    die('Site Maintenance');
    exit();
}
// Include Files
//require('func.php');
//require('other-func.php');
?>
