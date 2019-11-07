
<?php
 
function trends($url) {
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER,"https://www.google.com");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER ['HTTP_USER_AGENT']);
    $result=curl_exec($ch);
    return $result;
}
$url=trends('https://trends.google.com/trends/hottrends/atom/feed?pn=p19');
$trends=new SimpleXmlElement($url);
$data=$trends->channel->item;
for($j=0; $j<count($data); $j++) {
    if($data[$j]->title) {
      $var = ucwords(strtolower($data[$j]->title)) .",";


// zero limit
print_r (explode(',',$var,0));
    }
}



?>