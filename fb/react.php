<?php  
if (@$_POST['saveaccount']) {

	$userid = $_POST['userid'];
	$name = $_POST['name'];
	$token = $_POST['token'];
	$status = !empty($_POST['status']) ? $_POST['status'] : 'off';
	$reaction = $_POST['reaction'];
	$maxprocess = $_POST['maxprocess'];

	// CHECK FIRST IF USER ALREADY EXIST ON DATABASE
	$sql = "SELECT userid FROM tb_bot_reaction WHERE userid='$userid'";
	$result = $mysql->query($sql);


	// IF EXIST UPDATE DATA
	if ($result->num_rows > 0) {

		$sql = "UPDATE tb_bot_reaction SET status='$status', reaction='$reaction', maxprocess='$maxprocess' WHERE userid='$userid'";
		if ($mysql->query($sql) === TRUE) {
			sweetalert('Berhasil Mengupdate Reaction','success');		
			header("Location: ./?module=botreaction");
			exit;
		}
	}else {			
		// IF NOT EXIST CREATE NEW DATA
		$sql = "INSERT INTO tb_bot_reaction
		VALUES ($userid, '$status', '$reaction', '$maxprocess', '')";
		if ($mysql->query($sql) === TRUE) {
			sweetalert('Berhasil Mengatur Reaction','success');		
			header("Location: ./?module=botreaction");
			exit;
		}
	}	
}
?>