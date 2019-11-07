<?php
$mysqli = new mysqli("localhost", "insidehe_db", "mana123:;123", "insidehe_link");
if($mysqli->connect_error)
        {
        echo $mysqli->connect_error;
        }
    ?>

