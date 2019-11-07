<?php
include 'scrapgrep.php';

$url = $_GET['url'];
$ref = 'http://www.google.com/';
$sg = new SimpleGrep($url, $ref);

$gue = $sg->hasil();
echo htmlspecialchars ($gue);