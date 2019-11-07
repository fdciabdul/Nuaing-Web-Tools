
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
  		  
  	
<?
  if(isset($_GET['q']))
           {
$tanya = $_GET['q'];
$kanyut = str_replace(' ', '+', $tanya);
echo '
<div class="container"">
  	<div class="panel panel-primary">
<table class="table table-hover"><thead><tr><th>Pertanyaan yang sesuai dengan '.$kanyut.'<th></tr></thead><tbody>';
$json_url = "https://nuaing.web.id/nanya/api.php?type=quora&q=".$kanyut;
$aw = file_get_contents($json_url);
$json = json_decode($aw, true);
      
      foreach ($json as $item) {
 if(array_key_exists($item['title'], $abbreviations)) {
        echo "<tr><td> Pertanyaan Tidak Ada".$abbreviations[$item['title']] . PHP_EOL;
 echo "</td></tr>";
    } else {
        echo '<tr><td title="deskripsi" data-container="body" data-toggle="popover" data-placement="top" data-content='.$item['description'].' data-original-title="Deskripsi">'.$item['title'].PHP_EOL;
echo "</td></tr>";
    }
}
    
}
?>
<?
include '../footer.php'; ?>