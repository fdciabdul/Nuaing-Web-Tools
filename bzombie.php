<?php 
$judul =" BlogSpot Zombie Searcher ";
include 'head.php';
?>
<form method = "POST">
       Masukan Keyword:  <input class="form-control" placeholder="Anak Kampung" type= "text" name= "keyword" />
Masukan Tahun:  <input class="form-control" placeholder="2013" type= "text" name= "tahun" />
          
</br>
         <input class="btn btn-info" type="submit" value="Mulai"/>
</form>
<?php
if(isset($_POST["keyword"]) && trim($_POST["keyword"]) != "")
{
 $keyword = $_POST['keyword'];

$tahun = $_POST['tahun'];

echo '<center>
Klik Link Dibawah Ini </br>
<a href="https://www.google.co.uk/search?q=site:blogspot.com '.$keyword.'+inurl:/'.$tahun.'/" class="btn btn-warning" target="_blank"><i class="fa fa-search"></i> Cari Blog Nya </a>';
}
?>