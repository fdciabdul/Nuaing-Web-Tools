<?php
ob_start();
ini_set('max_execution_time', FALSE);
$a = array('../', './', 'index.php', '.php', '.html', '/etc/', 'd.php');
foreach($a as $b){ if($b == $_POST['video']){ die(); } }
if(substr($_POST['lnk'], 0, 7)!=='http://'){ $_POST['lnk'] = 'http://'.$_POST['lnk']; }
$html = file_get_contents($_POST['lnk']);
preg_match_all('#<meta property="og:title" content="(.*?)" />#', $html, $title);
if(!file_exists([0].'.mp4')){ 
$video_data = file_get_contents($_POST['video']);
file_put_contents($title[1][0].'.mp4', $video_data);
}
if(file_exists($title[1][0].'.mp4')){	
header('Cache-Control: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename='.$title[1][0].'.mp4');
header('Content-Type: video/mp4');
header('Content-Transfer-Encoding: binary');
readfile($title[1][0].'.mp4');
}