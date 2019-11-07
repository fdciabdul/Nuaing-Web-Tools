
<? $judul = " Presentasi Helper ";
   include '../head.php';

?>


<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Masukan Kata Kunci Pertanyaan </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>

<form methode="get">
<input type="text" autocomplete="off" class="form-control is-valid sm" name="q"/></br>
<input type="submit"  class="btn btn-info btn-sm"/>
</form>
</center>
  		  </div>
</div>
  		  
  	
<?php
  if(isset($_GET['q']))
           {
$tanya = $_GET['q'];
$kanyut = str_replace(' ', '+', $tanya);
echo '
<div class="container">
  	<div class="panel panel-info">
<table class="table table-hover"><thead><tr><th>Pertanyaan dan jawaban yang sesuai dengan '.$kanyut.'</th></tr></thead><tbody>';

$json_url = "https://nuaing.web.id/brainly/example.php?q=".$kanyut;
$aw = file_get_contents($json_url);
$json = json_decode($aw, true);
      foreach ($json as $tanya) {
    echo "<tr><td =\"info\">".$tanya['content'] . "</td></tr>";
    echo "<tr class=\"success\"><td>".$tanya['answers'][0]."</td></tr>";
    
}
}
?>
</div></div>