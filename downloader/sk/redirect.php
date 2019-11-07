<?php
if(isset($_GET['u'])){
	include "samehadakuClass.php";
	$sm = new samehadakuClass();
	$u = base64_decode($_GET['u']);
	$link = $sm->Bypass($u);
	header('Location: '.$link);
}else{
	echo "<H1>KONTOL</h1>";
}