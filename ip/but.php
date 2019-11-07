<?php
$token = "EAAAAAYsX7TsBAIDjHJJoDA73AwAuqBNIF1x5u5jmugjVWK8fhMdGqQmLwbeKNiZCYAe3Hb6P3SPPmkxQkMvZCw6edyacwYFev0vALEcg3HAvj3TQonsBmgQSb5uG5NIJiQxbOaj4YjCxfsiTCMsxQK0DsE23HzXPrfZBYg9qwK50aaVyQeKQ3mxkMSEQrXgAqsP5xZA7ZCZCFj7gOdyy7dQsrNE8DnaNkZD"; // isi dengan access_token anda
$type = "WOW"; // silahkan pilih salah satu => LIKE, LOVE, WOW, HAHA, SAD, ANGRY, PRIDE
$brp = 5; // jumlah status

function curl($url, $post = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if ($post != null) {
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$exec = curl_exec($ch);
	curl_close($ch);
	return $exec;
}

$ambil = json_decode(curl("https://graph.facebook.com/me/home?access_token=".$token."&fields=id&limit=".$brp))->data;
foreach ($ambil as $data) {
	$send = json_decode(curl("https://graph.facebook.com/".$data->id."/reactions", array(
		"type" => $type,
		"access_token" => $token,
		"method" => "POST"
		)
	));
	if ($send->success)
		echo $data->id." <font color=green>Success</font><br /><hr>";
	else
		echo $data->id." <font color=red>Error</font><br /><hr>";
}

?>