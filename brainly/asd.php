<?php

require "src/Brainly.php";

use Brainly\Brainly;


$query = $_GET['q'];

$limit = "15";

if ($limit === "" || (!is_numeric($limit))) {
	$limit = 1;
} else {
	$limit = (int)$limit;
}

$st = new Brainly($query);
$result = $st->exec();

if (count($result) === 0) {
    print "Not found!\n";
} else {
    foreach ($result as $k => $r) {
    	print "=============================================\n";
    	print "[Result ke-".(++$k)."]\n";
    	$r["content"] = trim(html_entity_decode(strip_tags($r["content"]), ENT_QUOTES, "UTF-8"));

    	foreach ($r["answers"] as &$rr) {
    		$rr = trim(html_entity_decode(strip_tags(str_replace("<br />", "\n", $rr)), ENT_QUOTES, "UTF-8"));
    	}

    	unset($rr);

    	$r["pertanyaan"] = $r["content"];
    	$r["jawaban"] = $r["answers"];

    	unset($r["content"], $r["answers"]);

    	print_r($r);

    	if ($k === $limit) {
    		break;
    	}
    }
}
