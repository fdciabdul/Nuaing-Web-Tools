<?php
  include './php/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Arisan Online</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  <script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#thisModal").show().load("./php/modal.php");
    $( "#kocok" ).click(function() {     
        $("#pemenang").hide(); // Hide elemen #pemenang
        $("#loader").show(function(){ // Jalankan animasi loading
          setTimeout(function(){ // Delay 3 detik
              $("#loader").fadeOut("slow").hide(); // Tutup animasi loading
              $("#pemenang").show().load("./php/random.php"); // Show element #pemenang
              // Load kontent dalam modal
                  $("#thisModal").show().load("./php/modal.php");
          }, 3000); // Waktu delay
        });
      });
    
  });

</script>

  <style>
    .secondary-content > a {
        color: #26A69A;
    }
    .modal .modal-footer {
      height: 80px;
    }
    .modal .modal-footer .btn, .modal .modal-footer .btn-large, .modal .modal-footer .btn-flat {
      margin: 6px 2px;
    }
    /* Button*/
    #reset {
      cursor: pointer;
    }

    /* Sweet */
    .sweet-alert .sa-icon.sa-custom {
      width: 200px !important;
      height: 200px !important;
    }
    /*modal */
    .modal .modal-content {
        padding: 6px 24px;
    }
  </style>
</head>
<body>
  <div class="container">
<div class="section"></div>
<div class="section"></div>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Arisan Online</h1>
      <br />
      <div class="row center">

        <div class="preloader-wrapper big active" id="loader" style="display:none">
          
          <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

        </div>
        <h5 class="header col s12 light" id="pemenang">klik "KOCOK" untuk memulai !</h5><br>
      
      </div>
      <div class="section"></div>
      <div class="row center">
        <a  class="btn-large waves-effect waves-light orange" id="kocok"><i class="material-icons left">loop</i>KOCOk</a>
        <a class="btn-large waves-effect waves-light orange modal-trigger" href="#modal1"><i class="material-icons left">supervisor_account</i>Peserta</a>
      </div>
      <br><br>
      
    </div>
  </div>


  </div>

 <div id="thisModal"></div>
          
  <!--  Scripts-->
  <script src="js/jquery.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/myjs.js"></script>
  </body>
</html>
