<?php

$judul = "Auto Invite Friend To Group Facebook";
include($_SERVER['DOCUMENT_ROOT'].'/head.php');
?>
<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Paste Your Token to Login</center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
                <form method="POST" action="invite.php">
                    <div class="form-group">
                        <label for="token">Input Token :</label>
                        <input class="form-control" name="token" type="text">
                    </div>

                        <input class="btn btn-danger" type="submit" name="submit"/>
</form>