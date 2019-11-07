 <?php
    include 'koneksi.php';
    // Mereset Status ikut peserta menjadi Default (1)
    if (isset($_POST['reset'])) { 
            $sql = "UPDATE users SET ikut=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_POST['reset']);
            $stmt->execute();

    }
    // Mengacak array secara random, nilai 1 = beruntung, 0 = tidak beruntung
    elseif (isset($_POST['clickme'])) {
            // 1 = Beruntung, 0 = tidak berntung. semakin banyak 1 semakin besar beruntung begitu sebaliknya
            $a=array("0","1","1","0","0");
            // Mengacak array (beruntung/tidak)
            $random_keys=array_rand($a,1); 
            // Tampilkan hasil
            echo $a[$random_keys];
            exit;
    }
    // Mengupdate nilai kolom ikut pada database setiapkali Pemenang keluar
    elseif (isset($_POST['winner'])){
            $id = $_POST['user_id'];
            $query = $conn->query("SELECT*FROM users WHERE user_id='$id'");
            $data = $query->fetch_assoc();
            $id = $data['user_id'];
            $nama = $data['nama'];
            $ikut = $data['ikut'] - 1;
            $date = date("Y-m-d");

            $sql = "UPDATE users SET ikut =? WHERE user_id='$id'";
            $sql2 = "INSERT INTO winers VALUES (null, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt2 = $conn->prepare($sql2);

            $stmt->bind_param("i", $ikut);
            $stmt2->bind_param("ss", $id, $date);

            $stmt2->execute();
            $stmt->execute();
    } 
    // Penambahan Peserta baru
    elseif (isset($_POST['add'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $ikut = $_POST['ikut'];

        $sql = "INSERT INTO users VALUES (null, ?,?,?)";
        $pre = $conn->prepare($sql);
        $pre->bind_param("ssi", $nama, $kelas, $ikut);
         if($pre->execute()){
          echo "Disimpan";
         } else {
          echo "Gagal";
        } 
        exit;
    }
    // Update/Ubah data peserta
    elseif(isset($_POST['update'])){
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $kelas = $_POST['kelas'];
      $ikut = $_POST['ikut'];
      

      $sql = "UPDATE users SET nama=?, meta=?, ikut=? WHERE user_id='$id'";
      $pre = $conn->prepare($sql);
      $pre->bind_param("ssi", $nama, $kelas, $ikut);
       if($pre->execute()){
        echo "Disimpan";
       } else {
        echo "Gagal";
      }
      exit;
    }
    // Hapus/Delete data peserta
    elseif (isset($_POST['delete'])) {
      $id = $_POST['id'];
      $sql = "DELETE FROM users WHERE user_id='$id'";
      $query = $conn->query($sql);
      $query->execute();
    }
    // Tampilan default Mengacak nama pemenang yang di ambil dari database
     else {
        $query = $conn->query("SELECT * FROM users WHERE ikut != 0 ORDER BY RAND() LIMIT 1");
        // Jika status ikut peserta tidak 0
        if ($query->num_rows > 0){
            $data = $query->fetch_assoc();
            $id = $data['user_id'];
            $nama = $data['nama'];
            $ikut = $data['ikut'] - 1;

            $sql2= "SELECT date, nama FROM winers NATURAL LEFT JOIN users ORDER BY date DESC LIMIT 1";
            $get = $conn->query($sql2)->fetch_assoc();
            if ($conn->query($sql2)->num_rows !== 0) {
              $date=date_create($get['date']);
            } else {
              $date = date_create("0000-00-00");
            }
            $dateNow=date_create(date("Y-m-d"));
            $diff=date_diff($date,$dateNow);
            $result = $diff->format("%a");
            // Rubah nilai menjadi 0 untuk mematikan batas pengocklokan
            $dayLimit = '7'; // Hanya dapat melakukan pengoclokan (n) Hari sekali
            // Jika kurang dari (n) hari
            if ($result < $dayLimit) {
              $message = "Maaf..";
              $info = function() use ($result, $dayLimit, $get) {
                $lastWiner = $get['nama'];
                $sisa = $dayLimit - $result;
                echo "Pe-ngocok-an hanya dapat dilakukan <strong>$dayLimit Hari</strong> sekali.<br /><br />";
                echo "<small>Terakhir dikocok : <strong>$get[date]</strong>.<br />
                             Tersisa : <strong>$sisa Hari</strong> untuk pengocokan berikutnya.<br />
                             Pemenang Terakhir : <strong>$lastWiner</strong></small>";
              };
            } 
            // Jika lebih dari (n) Hari
            else {
              $message = $nama;
              // closure
              $info = function() use ($id){
                echo "<input type='hidden' name='users_id' id='users_id' value='$id'/>";
                echo '<a class="waves-effect waves-light btn green" id="clickme">Click Me !</a>
                  <div id="message-luckya" style="display:none;"></div>
                  <div id="luckyload" style="display:none;">
                    <div class="preloader-wrapper small active">
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
                  </div>';
                      };
            }  
         } 
         // Jika status ikut semua peserta = 0
         else {
            $message = "Tidak ada peserta tersisa. <a id='reset' style='cursor:pointer' class='tooltipped' data-position='top' data-delay='10' data-tooltip='Semua status ikut peserta akan direset menjadi default (1)'>Reset ?</a>";
            $info = function(){
            };
         }
         echo "<div class='row center'>";
         echo '<div id="loadingmsg" style="display:none" data-transition="fade">
          <div class="preloader-wrapper small active">
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
        
                </div>';
         echo "<div id='message'>$message</div><br />";
         echo $info();
         echo "<div id='message-lucky' style='display:none'></div>";
         echo "</div>";
    }
?>
<script>
$(document).ready(function(){
  function load_modal(){
          // Memanggil file modal.php
          $("#thisModal").show().load("./php/modal.php");
      }
    $("#message").fadeIn("slow");
    $('.tooltipped').tooltip({delay: 10});
    // Klik me
    $("#clickme").click(function(){
      $("#clickme").hide(); // Hide elemen #pemenang
        $("#luckyload").fadeIn("slow").show(function(){ // Jalankan animasi loading
          setTimeout(function(){ // Delay 3 detik
            $.ajax({
              type: "POST", // Kirim data POST
              url : "./php/random.php", // Target
              data : {clickme: "get"}, // name data $_POST['clickme'], value : "get"
              success: function(msg){ // Mengambil respon dari random.php simpan dalam var msg
                $("#luckyload").fadeOut("slow").hide(); // Tutup animasi loading
                var lucky = msg; // buat var lucky
                var userid = $("#users_id").val(); // ambil id dari value input hidden yg memiliki Id #users_id
                if (lucky == 1) {
                  swal({
                    title: "Selamat anda beruntung!",
                    text: "Makan-makan yaaaa... :'D",
                    imageUrl: "./img/successkid.png"
                  });
                  // kirim data post ke random.php bahwa user tersebut menang/beruntung
                  $.ajax({
                    type: "POST",
                    url: "./php/random.php",
                    data: {winner: "1", user_id: userid}
                  });
                  
                  $('#modal1').closeModal();
                  var message = "Selamat !";
                } else {
                  swal({
                    title: "Maaf anda belum beruntung",
                    text: "Yahh.. gak jadi makan-makan deh :(",
                    imageUrl: "./img/baby-sad1.jpg",
                    confirmButtonColor: "#DD6B55"
                  });
                  var message = "Jangan Menyerah !";
                }
                
                  $("#message-lucky").fadeIn("show").text(message).show();
              }
            });
              
          }, 2000); // Waktu delay
        });
          // Load kontent dalam modal
          $("#thisModal").show().load("./php/modal.php");
    });
    $("#reset").click(function(){
        var act = "1";
        var message = "Status telah di reset. Silakan klik \"KOCOK\" untuk memulai.";
        $("#message").hide();
        $("#loadingmsg").fadeIn("3000").show(function(){
            setTimeout(function(){
                $.ajax({
                    type : "POST",
                    url : "./php/random.php",
                    data : { reset: act},
                    success : function(){
                        $("#loadingmsg").fadeOut("slow").hide();
                        $("#message").fadeIn("slow").show().text(message);
                        $("#thisModal").show().load("./php/modal.php");
                    }
                });
            }, 2000);
        });
      });
});
</script>