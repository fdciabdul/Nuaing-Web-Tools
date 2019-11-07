<?php
$date=date_create("2016-06-05");
$dateNow=date_create(date("Y-m-d"));
$diff=date_diff($date,$dateNow);
$result = $diff->format("%a");
if ($result > 3) {
    echo "Bisa";
} else {
    echo "Ngga";
}
