<?php
$judul = "NIK KK generator";
  include 'function.php';
include 'head.php';

  $kueri = query("SELECT nama,kk,nik FROM `kknik` ORDER BY RAND() LIMIT 1");
  
foreach ( $kueri as $data ) 
                                
                                  $nama = $data["nama"];
                                  $kk = $data["kk"];
                                  $nik = $data["nik"];
                                ?>

     

<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4 align="center"><i class="fas fa-sign-in-alt"></i> NIK & KK Generator </h4>
  		</div>
  		  <div class="panel-body">
  		  	<center><img src="https://rei.animecharactersdatabase.com/uploads/chars/thumbs/200/5688-140384092.jpg" class="img-circle" widht="160" height="160"/></center>
<br>
<b>NAMA</b>: <?= $nama; ?> <br>
<b>NIK</b> : <?= $nik; ?><br>
<b>NO KK </b>: <?= $kk; ?><br>
            <br><center>
   <button type="button" class="btn btn-primary btn-xs" onClick="window.location.reload()" >Generate Again</button>    
  </div>
  </div>  </div>
 