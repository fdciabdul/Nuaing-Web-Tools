<? $judul = " Github ZIP Downloader ";
   include 'head.php';
?>


<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Enter Github Repository Url </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>

<form methode="get">
<input type="text" class="form-control" name="q"/>
<input type="submit"  class="btn btn-info"/>
</form>
</center>
  		  </div>
  		  
  	</div>
  </div>
<?
  if(isset($_GET['q']))
           {
$url= $_GET['q'];
echo '
  <div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Download Github Repository </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
Download In Here
<a class="btn btn-info" href="'.$url.'/archive/master.zip">Download</a>
  		  </div>
  		  
  	</div>
  </div>';
}
?>