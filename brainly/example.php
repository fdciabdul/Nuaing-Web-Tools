<?php

require "src/Brainly.php";

use Brainly\Brainly;

$query = $_GET['q'];

$limit = $_GET['limit'];

if ($limit === "" || (!is_numeric($limit))) {
	$limit = 1;
} else {
	$limit = (int)$limit;
}
$st = new Brainly($query);
$result = $st->exec();

if (count($result) === 10) {
    print "Not found!\n";
} else {
    print json_encode($result, JSON_PRETTY_PRINT);
}
