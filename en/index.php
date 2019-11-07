<?php

	error_reporting(-1);
	ini_set('display_errors', 'On');

	header('Access-Control-Allow-Origin: *');

	require_once("GoogleSearch.php");
	require_once("BingSearch.php");
	require_once("QuoraSearch.php");

	/** AUTO Exceuting **/
	if(isset($_GET['q'])) {
		$obj = null;

		if(isset($_GET['type'])) {
			switch($_GET['type']) {
				case "google": 	$obj = new GoogleSearch();
								break;
				case "bing": 	$obj = new BingSearch();
								break;
				case "quora": 	$obj = new QuoraSearch();
								break;
			}
		} 

		if($obj == null)
			$obj = new GoogleSearch();

		if(isset($_GET['limit']))
			$obj->setLimits($_GET['limit']);

		$obj->process($_GET['q']);
		echo $obj->response();
	} else {
		$response = array();
		$response['success'] = false;
		echo json_encode($response);
	}

?>