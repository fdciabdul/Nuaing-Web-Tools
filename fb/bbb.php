<?php $judul = 'Auto Delete Friends Facebook'; include '../head.php';?>

<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Paste Your Token to Login</center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
  <p>Delete Your Facebook Friends ( Random )</p>
  <form method="POST" action="">
      <div class="form-group">
          <label>Access Token :</label>
          <input id="email" type="text" class="form-control" name="token" placeholder="Paste Your Token Here.">
      </div>
      <div class="form-group">
          <label>Jumlah :</label>
          <select name="jumlah" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="1500">ALL</option>
                            </select>
      </div>
      <button type="submit" id="submit" class="btn btn-primary" name="submit">Delete!</button> 
      </form> <a class="btn btn-danger " href="token.php" aria-hidden="true">Get Token!</a>
</center>
  		  </div>
  		  
  	</div>
  </div>
      </div>
<?php
if(isset($_POST[submit])){
error_reporting(0);
$token =  $_POST[token]; 
$limit = $_POST[jumlah];
function hajar($yuerel, $dataAing=null) {
    $cuih = curl_init();
    curl_setopt($cuih, CURLOPT_URL, $yuerel);
    if($dataAing != null){
        curl_setopt($cuih, CURLOPT_POST, true);
        curl_setopt($cuih, CURLOPT_POSTFIELDS, $dataAing);
    }
    curl_setopt($cuih, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($cuih, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cuih, CURLOPT_SSL_VERIFYPEER, false);
    $eks = curl_exec($cuih);
    curl_close($cuih);
    return $eks;
}

echo '<table class="table table-hover"><thead><tr><th>Status</th><th>ID Facebook</th><th>Nama</th></tr></thead><tbody>';
$menta = hajar("https://graph.facebook.com/me/friends?fields=id,name&limit=".$limit."&access_token=" . $token);
$jason = json_decode($menta);
foreach ($jason->data as $data) {

    hajar("https://graph.facebook.com/me/friends?uid=".$data->id."&method=delete&access_token=" . $token);
 
echo "<tr><td>Terhapus</td><td> " . $data->id . "</td> <td> " . $data->name . "</td>";
}
}
?>
</div>
</div>
</div>
<?php include '../footer.php';?>