<?php
include 'koneksi.php';  
?>

<!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
            <h5>Peserta Arisan</h5>
            <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
              <a class="btn-floating btn-large orange modal-trigger" href="#modal-add">
                <i class="large material-icons">add</i>
              </a>
            </div>
                  
            <?php
              $sql = "SELECT*FROM users ORDER BY nama ASC";
              $query = $conn->query($sql);
              if ($query->num_rows > 0) {
                  while ($data = $query->fetch_assoc()) {
                  $nama = $data['nama'];
                  $kelas = $data['meta'];
                  $ikut = $data['ikut'];
                  $id = $data['user_id'];
                    echo '
                    <ul class="collection" style="margin: 0.5rem 4em 1rem 0"> 
                    
                      <li class="collection-item avatar">
                      <input id="idUser" value="'.$id.'" type="hidden"/>
                        <i class="material-icons circle green">perm_identity</i>
                        <span class="title" id="namaUser">'.$nama.'</span>
                        <p id="kelasUser">'.$kelas.'</p>
                        <p>Ikut : <span id="ikutUser">'.$ikut.'</span></p>
                         <div class="secondary-content"><a href="#modal-edit" class="editButton"><i class="material-icons">mode_edit</i></a> <a href="#!" class="delButton"><i class="material-icons">delete</i></a></div>
                      </li>
                    </ul>';
                }
              } else {
                echo "<blockquote>
                        Belum ada Peserta terdaftar, Silahkan tambahkan Peserta baru.
                      </blockquote>";
              }
            ?>
          </div>
  </div>
<!-- Modal Structure -->
  <div id="modal-edit" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Edit data peserta</h4>
      <div class="row">
        <form class="col s12">
        <input type="hidden" id="userID"/>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" class="validate" id="inputNama" placeholder="Nama Peserta">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">business</i>
              <input id="inputKelas" type="text" class="validate" placeholder="Kelas">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
            <i class="material-icons prefix">replay_10</i>
             <input id="inputIkut" type="number" maxlength="" class="validate" placeholder="Jumlah ikut">
            </div>
          </div>
        </form>
      </div>
          
    </div>
    <div class="modal-footer">
      <a class="waves-effect waves-light btn-large modal-action modal-close""><i class="material-icons left">not_interested</i>Batal</a>
      <a class="waves-effect waves-light btn-large" id="saveButton"><i class="material-icons left">done</i>Simpan Perubahan</a>
    </div>
  </div>
<!-- Modal Tambah -->
  <div id="modal-add" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Tambah Peserta</h4>
      <div class="row">
        <form class="col s12">
        <input type="hidden" id="userID"/>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" class="validate" id="addNama" placeholder="Nama Peserta">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">business</i>
              <input id="addKelas" type="text" class="validate" placeholder="Kelas">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
            <i class="material-icons prefix">replay_10</i>
             <input id="addIkut" type="number" maxlength="" class="validate" placeholder="Jumlah ikut">
            </div>
          </div>
        </form>
      </div>
          
    </div>
    <div class="modal-footer">
      <a class="waves-effect waves-light btn-large modal-action modal-close""><i class="material-icons left">not_interested</i>Batal</a>
      <a class="waves-effect waves-light btn-large" id="addButton"><i class="material-icons left">done</i>Simpan Perubahan</a>
    </div>
  </div>
  <script src="js/myjs.js"></script>