
<? $judul = " Presentasi Helper ";
   include '../head.php';

?>

<style>
h1 { font-weight: bold; color: #fff; font-size: 12px; } h2 { font-weight: bold; color: #fff; font-size: 24px; }
</style>
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
</div>
</div>
  	
<?
  if(isset($_GET['q']))
           {
$tanya = $_GET['q'];
$kanyut = str_replace(' ', '+', $tanya);
echo '
<div class="container"">
  	<div class="panel panel-primary">
<div class="panel-body">
  		  	<p align="left">';
$json_url = "https://nuaing.web.id/brainly/example.php?q=".$kanyut;
$aw = file_get_contents($json_url);
$json = json_decode($aw, true);
      
      foreach ($json as $tanya) {
    echo "<tr><td>Pertanyaan : ".$tanya['content'] . "</td></br><hr>";
    echo "<td>".$tanya['answers'][0]."</td></tr>";
}
}
?>
<?
include '../footer.php'; ?>