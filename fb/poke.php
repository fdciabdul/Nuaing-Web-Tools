<?php
$judul = "Auto POKE FRIENDS Facebook";
include '../head.php';
?>
<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Paste Your Token to Login</center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
                <form method="GET" action="poke1.php">
                    <div class="form-group">
                        <label for="token">Input Token :</label>
                        <input class="form-control" name="token" type="text">
                    </div>
                
                    
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit" name="submit">poke</button>  <a class="btn btn-danger" href="token.php" >Get Token</a>
                      
                    </div>
                </form>
</center>
  		  </div>
  		  
  	</div>
  </div>