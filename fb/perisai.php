<?
$judul = ' Perisai Foto Profile Facebook'; 
 include '../head.php' ?>

<center>
<form method="get">
<img src="https://accelerator-origin.kkomando.com/wp-content/uploads/2016/10/Screen-Shot-2016-10-17-at-10.20.45-AM.png" class="img-responsive"/>
<h2> Activate Profile Guard Facebook</h2>
<label for="inputToken">Masukan Token Facebook Mu</label>
<p>

<input class="form-control"  type="text" name="token" required autofocus>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" value="submit" type="submit">Submit Access Token</button>
<a href="token.php" class="btn btn-primary" >Get Token!</a>
</form>


<?php
$token = $_GET['token'];
$md5 = md5(time());
$hash = substr($md5, 0, 8)."-".substr($md5, 8, 4)."-".substr($md5, 12, 4)."-".substr($md5, 16, 4)."-".substr($md5, 20, 12);
function curl($url, $post=null) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if($post != null) {
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
$me = json_decode(curl("https://graph.facebook.com/me?fields=id&access_token=".$token));
if($me && $me->id) {
    $var = "{\"0\":{\"is_shielded\":true,\"session_id\":\"$hash\",\"actor_id\":\"$me->id\",\"client_mutation_id\":\"$hash\"}}";
    $hajar = json_decode(curl("https://graph.facebook.com/graphql", array(
        "variables" => $var,
        "doc_id" => "1477043292367183",
        "query_name" => "IsShieldedSetMutation",
        "strip_defaults" => "true",
        "strip_nulls" => "true",
        "locale" => "en_US",
        "client_country_code" => "US",
        "fb_api_req_friendly_name" => "IsShieldedSetMutation",
        "fb_api_caller_class" => "IsShieldedSetMutation",
        "access_token" => $token
    )));
    if($hajar->data->is_shielded_set->is_shielded) echo ' <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> The Shield Has Been Added To Your Profile Facebook.
  </div>
</div> ';
    else "Failed";
}


?>

<br>
<br>
