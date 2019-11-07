<?php
$judul = "Auto Delete Statuses Facebook";
include '../head.php';
?>
<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Paste Your Token to Login</center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="token">Input Token :</label>
                        <input class="form-control" name="token" type="text">
                    </div>
                    <div class="form-group">
                        <label for="Jumlah">Number Of Deleted Statuses : </label>
                            <select name="jumlah" class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="1500">ALL</option>
                            </select>
                        
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit" name="submit">Delete Statuse!</button>  <a class="btn btn-danger" href="token.php" >Get Token</a>
                      
                    </div>
                </form>
</center>
  		  </div>
  		  
  	</div>
  </div>
              <table class="table table-hover"><thead><tr><th>ID Status</th><th>Status</th></tr></thead><tbody>
            </div>
            <div class="form-group">
                        <?php
if(isset($_POST[submit])){
$token = $_POST[token]; // token facebook
$limit = $_POST[jumlah]; // jumlah status yang mau dihapus

$ambil = json_decode(file_get_contents("https://graph.facebook.com/me/feed?access_token=".$token."&fields=id&limit=".$limit))->data;
foreach ($ambil as $data) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/".$data->id);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array("access_token" => $token));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$exec = json_decode(curl_exec($ch));
	curl_close($ch);
	if($exec)
		echo "<tr><td>".$data->id." </td><td>Terhapus</td>";
	else
		echo "<tr><td>".$data->id." </td> <td>Gagal</td>";
	sleep(1);
}
}
?>
                    </div>
        </div></div>
</body>
<? include '../footer.php'; ?>
