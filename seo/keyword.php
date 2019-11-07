<? 
$judul = " Keyword Research Tool ";
include '../head.php';
?>
<style>
.textarea{
    background: url(http://i.imgur.com/2cOaJ.png);
    background-attachment: local;
    background-repeat: no-repeat;
    padding-left: 35px;
    padding-top: 10px;
    border-color:#ccc;
}
</style>
<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Keyword Research </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
<form method="GET">


<input class="form-control"type="text" name="key" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" placeholder="Masukan Keyword" />



</br>


<input class="btn btn-info btn-hover"type="submit" value="Mulai" name="submit" />


</form>
</div>
  		  
  	</div>
  </div>

<?php
if (isset($_GET["key"]) && $_GET['key'] !== "") {    
$alphas1 = range('A', 'Z');    
$alphas2 = range('a', 'z');  
$keyword = $_GET['key'];    
echo '<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Hasil </center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>Silahkan Copy Result Dibawah Ini :<br><textarea id="txtarea" style="background: url(http://i.imgur.com/2cOaJ.png);
    background-attachment: local;  background-repeat: no-repeat;
    padding-left: 35px;padding-top: 10px;border-color:#ccc;" class="form-control"  rows="15" cols="90" readonly>';             
foreach ($alphas1 as $a1) {        
foreach ($alphas2 as $a2) {            
$xml = simplexml_load_file("http://suggestqueries.google.com/complete/search?output=toolbar&hl=id&q=$keyword.' '.$a1.$a2");            
foreach ($xml->children() as $child) {                               
foreach ($child->suggestion->attributes() as $dta) {              
                           
                             
echo $dta.'&#13;&#10;';      
}           
 }                 
   }
   
 }
} 
else {
}

?>
</textarea>
<br>
<br>
</div>
  		  <script type="text/javascript">
function SelectAll(id)
{
    document.getElementById(id).focus();
    document.getElementById(id).select();
}
</script>
  	</div>
  </div>
<? include 'footer.php'; ?>