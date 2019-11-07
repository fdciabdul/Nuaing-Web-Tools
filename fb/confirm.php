<form method="get">
<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Konfir Teman</h3>
              </div>
              <div class="card-body">
               
                <input class="form-control" name="token" type="text" placeholder="Default input">
                <br>
                <input class="btn btn-info" type="submit" value="Gass">
              </div>
              <!-- /.card-body -->
            </div>
                </form>
            <!-- /.card -->
<?php
if (isset($_GET['token']))
{
$access_token = $_GET['token'];
$kelamin  = "male"; //male untuk confirm cowok
$me='';


/**
  Copyright:
  ----------
  Tempat Download Script
  unduhscript.blogspot.com
  ----------
  We are the BAD guys :-P
  Please don't remove this credits (saya juga pengen terkenal atuh gan :-P)
  ----------
**/


$stat=json_decode(auto('https://graph.facebook.com/me/friendrequests?access_token='.$access_token.'&limit=1000'),true);  //ubah limit sesukamu
if(ereg("k"."ha"."r"."is"."ma",$me)){
for($i=1;$i<=count($stat[data]);$i++){
 if($stat[data][$i-1][from][name] != ""){
  $gender=json_decode(auto('https://graph.facebook.com/'.$stat[data][$i-1][from][id].'?fields=gender&access_token='.$access_token),true);
  if($gender==""){
  }elseif($gender[gender]==$kelamin){
   auto('https://graph.facebook.com/me/friends/'.$stat[data][$i-1][from][id].'?access_token='.$access_token.'&method=post');
   echo "<a href=\"http://m.facebook.com/".$stat[data][$i-1][from][id]."\" target=\"_blank\">".$stat[data][$i-1][from][name]."</a> => sukses diconfirm</br>";
  }
 }
}
}

function auto($url){
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch,CURLOPT_URL,$url);
   $cx=curl_exec($ch);
  curl_close($ch);
  return($cx);
  }
            
            
}
?>