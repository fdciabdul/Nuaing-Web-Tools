<?php
if(isset($_POST['group'], $_POST['fr'], $_POST['token'])){
    $token = $_POST['token'];
    $group = $_POST['group'];
    $fr= $_POST['fr'];
    $api = file_get_contents('https://graph.fb.me/'.$group.'/members?member='.$fr.'&access_token='.$token.'&method=post');
    if($api == 'true'){
        echo 'ok';
    }else{
        echo 'fail';
    }
}
?>