<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'insidehe_db');    // DB username
define('DB_PASSWORD', 'mana123:;123');    // DB password
define('DB_DATABASE', 'insidehe_db');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>