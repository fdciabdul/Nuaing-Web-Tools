<?

$judul = 'Auto Unfriend Facebook';
include '../head.php';
?>
<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Paste Your Token to Login</center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
<form method="GET">
Token Facebook: 

<input class="form-control" type="text" name="token" class="form-control" placeholder="Token Facebook"><br>
Masukan Tahun  : 
<input type="text" class="form-control" name="tahun" class="form-control" placeholder="Last Years Your Facebook Friend Active"><br>
<input class="btn btn-info" type="submit" name="submit"  >  <a class="btn btn-info" href="token.php">Get Token</a><br>
</center>
  		  </div>
  		  
  	</div>
  </div>
  		  
  	</div>
  </div>

NOTICE : Proses Ini Membutuhkan Waktu Yang Sedikit Aga Lama

</br>
</br>
<?php
if(isset($_GET['token']))
           {
$access_token = $_GET['token'];
$min_y = $_GET['tahun'];
function friendlist($token){
	$a = json_decode(file_get_contents('https://graph.facebook.com/me/friends?access_token='.$token), true);
	return $a['data'];
}
function last_active($id, $tok){
	$a = json_decode(file_get_contents('https://graph.facebook.com/'.$id.'/feed?access_token='.$tok.'&limit=1'), true);
	$date = $a['data'][0]['created_time'];
	$aa = strtotime($date);
	return date('Y', $aa);
}

function unfriend($id, $token){
	$url = 'https://graph.facebook.com/me/friends?uid='.$id.'&access_token='.$token;
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $result = curl_exec($ch);
    curl_close($ch);
	return $result;
}
echo '<table class="table table-hover"><thead><tr><th>Nama</th><th>Tahun</th><th>Status</th></tr></thead><tbody>';
$FL = friendlist($access_token);
foreach($FL as $list){
	$name = $list['name'];
	$id = $list['id'];
	$date = last_active($id, $access_token);
	if($date < $min_y){
      echo '<tr><td>';
		echo $name;
      echo '</td><td><span class="btn btn-primary btn-xs">';
      echo $date;
      echo '</span></td>';
      echo ' <td><span class="btn btn-danger btn-xs">';
      unfriend($id, $access_token);
     echo 'Ga Aktif</span></td>';
	}else{
      echo '<tr><td>';
		echo $name;
      echo '</td><td><span class="btn btn-primary btn-xs">';
      echo $date;
		echo  '</span></td><td><span class="btn btn-success btn-xs">Aktif</span></td>';
	}
}
}
?>
<? include '../footer.php'; ?>
