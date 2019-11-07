<form method="POST">
	<div class="form-group">
		<input required="" placeholder="Username" required="" class="form-control" type="text" name="username"/>
	</div>
	<div class="form-group">
		<input required="" placeholder="Password" required="" class="form-control" type="text" name="password"/>
	</div>	
	<div class="form-group">
		<select required="" class="form-control" name="tokentype">
			<option value="">Select Token Type</option>
			<option value="iphone">Iphone</option>
			<option value="android">Android</option>
		</select>
	</div>							
	<div class="form-group">
		<input style="color: #fff; background-color: #4caf50; border-color: #4caf50;" class="btn btn-info" value="Get Token" type="submit" name="execute"/> 
	</div>
</form>

<?php  
if (@$_POST['execute']) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$tokentype = $_POST['tokentype'];

	switch ($tokentype) {
		case 'iphone':
		function sign_creator(&$data){
			$sig = "";
			foreach($data as $key => $value){
				$sig .= "$key=$value";
			}
			$sig .= 'c1e620fa708a1d5696fb991c1bde5662';
			$sig = md5($sig);
			return $data['sig'] = $sig;
		}
		$api_key = '3e7c78e35a76a9299309885393b02d97';
		break;

		case 'android':
		function sign_creator(&$data){
			$sig = "";
			foreach($data as $key => $value){
				$sig .= "$key=$value";
			}
			$sig .= '62f8ce9f74b12f84c123cc23437a4a32';
			$sig = md5($sig);
			return $data['sig'] = $sig;
		}
		$api_key = '882a8490361da98702bf97a021ddc14d';
		break;

		default:
		echo "rerreror";
		break;
	}

	$data = array(
		"api_key" => $api_key,
		"email" => @$username,
		"format" => "JSON",
		"locale" => "en_US",
		"method" => "auth.login",
		"password" => @$password,
		"return_ssl_resources" => "0",
		"v" => "1.0"
		);
	sign_creator($data);
	$result = "https://graph.facebook.com/restserver.php?".http_build_query($data);

	$_SESSION['execute'] = "
	<script> 
		var span = document.createElement('span');
		span.innerHTML = '<div class=\"alert alert-primary\">Untuk Mendapatkan token Anda bisa, <a style=\"color:red\" target=\"_blank\" href=\"".$result."\">Klik Link ini</a> atau <br/>Buka URL dibawah ini :</div><input readonly onClick=\"this.select();\" value=\"".$result."\" class=\"form-control\"><br/><div class=\"alert alert-success\">Petunjuk Pengambilan Token, Klik Gambar dibawah ini :</div><a target=\"_blank\" href=\"img/howtoget+token.png\"><img width=\"100%\" src=\"img/howtoget+token.png\"/></a>';
		swal({
			title: 'Sukses Membuat URL !', 
			content: span,
		});
	</script>";
	header("Location: ./");
	exit;

}
?>