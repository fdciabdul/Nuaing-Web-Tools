<?php 
$judul =" Disclaimer Generator Bahasa Indonesia ";
include '../head.php';
?>
<style>
.form-control {
background:none;
}
</style>
<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Disclaimer Generator </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center> <h2> DISCLAIMER GENERATOR BAHASA INDONESIA</h2>

<form name="myForm" id="myForm" action="disclaimer.php" onsubmit="return validateForm('myForm');" method="get">

<input widht="150" class="form-control" type="text" pattern="https?://.+" name="situs" placeholder="URL Situs Mu" autocomplete="off">


<input class="form-control input-sm"type="text" name="nama" placeholder="Nama Situs Mu" autocomplete="off"><input class="form-control" type="text" name="email" placeholder="Email Situs Mu" autocomplete="off">



</br>


<button class="btn btn-info btn-hover"type="submit" name="submit" />


</form>
</div>
  		  
  	</div>
  </div>



<? include 'footer.php'; ?>
