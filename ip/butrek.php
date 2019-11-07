<?php
/*

* BOT REACTION Versi 2
* BOT TANGGAP STATUS
Versi 2
* Created By: Endo Sulistio
* FB: https://facebook.com/100002167444279
* E-mail: edocyberar1@gmail.com
*** NOTE , Cukup edit bagian data login dan pilih type reaction sesuka hati kamuh, Masukan password dan email kamu. ***

****** EDIT SESUKA HATI KALIAN, ASALKAN JANGAN GANTI NAMA PEMBUAT ****** 
* Terimakasih
* Covered By Wangur Team
*** New **
* Fix Curl
* Type Reaction
* Tambahan Kopling
* Dan Menggunakan Karbu PA 15
* Plus Akrapovic Sebagai Lobang Hembusan Angin
* Siap Untuk Menggeber Performa :D

*/
########## TYPE REACTION ##########
$koplinge=array(
/*
(+) Pilih type reaction
(+) true : untuk mengaktifkan.
(+) false : untuk menonektifkan
(+) JANGAN true SEMUA ! PILIH SALAH SATU AJA !!
*/ 
      'suka' => false,
       'super' => false,
        'haha' => true,
         'wow' => false,
          'sedih' => false,
           'marah' => false,
//SEGERA//
'botLikeKomen' => 'Tunggu, Saya Mau Katokan Dulu :D',

  );

$bot = new bot($wangur);
$bot-> kopling=$koplinge;

class bot{
private $wangur;
public $kopling;
function __construct($dataLog){
 //Data Login
  $this->pass = 'mana123';
   $this->email = 'insidehe';
    }


private function get_contents($url,$type=null,$fields=null){
   $opts = array(
            42 => false,
            19913 => 1,
            10002 => $url,
            52 => false,
            10018 => 'Opera/9.80 (Series 60; Opera Mini/6.5.27309/34.1445; U; en) Presto/2.8.119 Version/11.10',
           78 => 5,
           13 => 5,
           47 => false,
            );
   $ch=curl_init();
   if($type){
       if($type == 1){
              $opts[10082] = 'coker_log';
              }
       if($type == 3){
              $opts[42] = false;
             
             }
       $opts[10031] = 'coker_log';
    }
  if($fields){
      $opts[47] = false;
      $opts[10015] = $fields;
      }
   curl_setopt_array($ch,$opts);
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
  }


public function home(){
   $url = $this->getUrl('m','home.php');
   $getToken = $this->get_contents($url,3); 
   $konten = strstr($getToken,'class="_3-8w">');
   $ft_id = explode('/reactions/picker/',$konten);
   $limit=count($ft_id);
 echo'<b>Type Reaction: '.$this->ubah($this->kopling,true).'</b><hr>';
 
for($i=0; $i<=$limit; $i++){
$id=$this->cut($ft_id[$i],'ft_id=','&');
 echo $id;
       if($id){
       if($this->getLog($id)){
      
        echo'<font color="green">[ Ok ]</font>';
          $this -> getReaction($id);
           }else{
       echo' <font color="red">Success..</font>';
  }
echo'<br>';
}
}
  
   }

private function saveFile($x,$y){
   $f = fopen($x,'w');
        fwrite($f,$y);
        fclose($f);
   }
private function getUrl($domain,$dir,$uri=null){
    if($uri){
         foreach($uri as $key =>$value){
             $parsing[] = $key . '=' . $value;
                }
             $parse = '?' . implode('&',$parsing);
                }
     return 'https://' . $domain . '.facebook.com/' . $dir . $parse; 
       }

public function cut($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}
}

public function getReaction($edo){
$gerr ='https://mobile.facebook.com/reactions/picker/?ft_id='.$edo;
    echo'<br>';
    $sukaa= $this->get_contents($gerr,3); 
    $suka= $this->cut($sukaa,'tanggapan</h1>','<div id="static');
    $ha= explode('/ufi/reaction/',$suka);
    $liha= count($ha);
  // echo $suka;

for($hai=0; $hai<=$liha; $hai++){
  $getha= $this -> cut($ha[$hai],$this->ubah($this->kopling,false),'"');
   
    if($getha){
      $hajarm='https://mobile.facebook.com/ufi/reaction/?ft_ent_identifier='.$edo.'&amp;reaction_'.$this->ubah($this->kopling,false).''.$getha;
      $hajar= str_replace('&amp;','&',$hajarm);
//   echo $hajar;
      echo'<br>';
      echo $this->get_contents($hajar,3);
      
    }
}
}
public function ubah($rem,$info){
 if($rem[suka]=='true'){
 $tipe='type=1'; $anu='Suka';
  }else if($rem[super]=='true'){
   $tipe='type=2'; $anu='Super';
    }else if($rem[haha]=='true'){
     $tipe='type=0'; $anu='Haha';
      }else if($rem[wow]=='true'){
       $tipe='type=3'; $anu='Wow';
        }else if($rem[sedih]=='true'){
         $tipe='type=7'; $anu='Sedih';
          }else if($rem[marah]=='true'){
           $tipe='type=8'; $anu='Marah';
            }
         if($info=='true'){
        return $anu;
      }else{
    return $tipe;
  }
}

public function getLog($y){
   if(file_exists('log.txt')){
       $log=file_get_contents('log.txt');
       }else{
       $log=' ';
       }

  if(ereg($y,$log)){
       return false;
       }else{
if(strlen($log) > 5000){
   $n = strlen($log) - 5000;
   }else{
  $n= 0;
   }
       $this->saveFile('log.txt',substr($log,$n).' '.$y);
       return true;
      }
 }

public function login(){
  $login = array(
     'pass' => $this -> pass,
     'email' => $this -> email,
     'login'  => 'Login',
             );
  $this->get_contents($this->getUrl('m','login.php'),1,$login);
   }

}

if($bot->home()){
    echo $bot->home();
    }else{
    $bot->login();
    }

?>