<?php
$judul = " Deface Page Maker";
include 'head.php';
?>
<style>
/* HIDE RADIO */
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #f00;
}
</style>


<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Enter Instagram Photo/Video Url </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>

<form methode="get">
<label>Nick : </label><input type="text" class="form-control" name="nama"/>
<label>Nama Team : </label><input type="text" class="form-control" name="tim"/>
<label>Logo : </label><input type="text" class="form-control" name="logo"/>
<label>Team Nick : </label><input type="text" class="form-control" name="teman"/>
<label>Message : </label><textarea  class="form-control" name="pesan"></textarea>

<label>
  <input type="radio" name="test" value="small" checked>
  <img src="http://api.screenshotmachine.com/?key=55c451&device=desktop&url=http://api.insideheartz.id/112.html&format=jpg&dimension=1024x768" widht="70" height="70">
</label>

<label>
  <input type="radio" name="test" value="big">
  <img src="http://api.screenshotmachine.com/?key=55c451&device=desktop&url=http://api.insideheartz.id/gvvb.html&format=jpg&dimension=1024x768" widht="70" height="70">
</label>
<input type="submit"  class="btn btn-info"/>
</form>
</center>
  		  </div>
  		  
  	</div>
  </div>

