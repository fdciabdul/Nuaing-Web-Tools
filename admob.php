<?php 
$judul = " Admob Online Tools ";
include 'head.php';
?>
 
<center>
<form method = "POST">
       ID Publisher <input class="form-control" placeholder="Masukan ID Publiser" type= "text" name= "id" />
         ID Banner: <input class="form-control"  placeholder="Masukan ID Banner" type = "text" name = "banner" />
          Ukuran Banner :

 

<input  class="form-control" type= "text" size="4" value="400" name ="lebar" />
<input  class="form-control" type= "text" size="4" value="300" name = "tinggi"/>
</br>
</br>
         <input class="btn btn-info" type="submit" value="Mulai"/>
</form>
</br> <font color="red"> Note: KALAU MISALKAN IKLAN GAMUNCUL COBA RELOAD HALAMAN INI DAN ULANGI LAGI SAMPE MUNCUL ATAU AKTIFKAN VPN MU </font>
</center>
<hr>
<?php
      $id = $_POST['id'];
      $banner = $_POST['banner'];
      $h = $_POST['tinggi'];
      $w = $_POST['lebar'];
?>

<script>
        function Shuffle(o) {
            for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
            return o;
        }
        var packages = [
            'com.health.insurance',
            'com.trolls.imdb',
        ];
        var admob = [
[
'<?php echo $id; ?>',
'<?php echo $banner; ?>',
],
];
        Shuffle(packages);
        var loop = packages.length - admob.length;
        var x = 0;
        while(x < 1 * admob.length){
            for (var i = 0; i < packages.length - loop; i++) {
                var source_banner = 'https://googleads.g.doubleclick.net/mads/gma?preqs=0&u_sd=1.5&u_w=300&msid='+ packages[i] +'&cap=a&js=afma-sdk-a-v3.3.0&toar=0&isu=W%27+Math.floor%28Math.random%28%29*9%29+%27EEABB8EE%27+Math.floor%28Math.random%28%29*99%29+%27C2BE770B684D%27+Math.floor%28Math.random%28%29*99999%29+%27ECB&cipa=0&format=300x250_mb&net=wi&app_name=1.android.'+ packages[i] +'&hl=en&u_h=%27+Math.floor%28Math.random%28%29*999%29+%27&carrier=%27+Math.floor%28Math.random%28%29*999999%29+%27&ptime=0&u_audio=4&u_so=p&output=html&region=mobile_app&u_tz=480&client_sdk=1&ex=1&client=ca-app-pub-'+ admob[i][0] +'&slotname='+ admob[i][1] +'&caps=inlineVideo_interactiveVideo_mraid1_clickTracking_sdkAdmobApiForAds&jsv=18" target="_blank" height="<?php echo $h;?>" width="<?php echo $w;?>" frameborder="0" scrolling="no" width="0" height="0" marginwidth="0" marginheight="0"';
            }
            document.write('<iframe target="_blank" src="'+ source_banner +'"/></iframe>');
            x++;
        }
"";
 </script>

</br>
</br>
<?php 

include 'footer.php';

?>