$(document).ready(function(){
    $('.modal-trigger').leanModal();
function load_modal(){
        $("#thisModal").show().load("./php/modal.php");
    }
var postId = 0;
var postBodyElement = null;

$(".editButton").click(function(){
            bodyElement = $(this).parent().parent();
            var nama = bodyElement.find("#namaUser").text();
            var kelas = bodyElement.find("#kelasUser").text();
            var ikut = bodyElement.find("#ikutUser").text();
            var user = bodyElement.find("#idUser").val();

            $("#userID").val($.trim(user));
            $("#inputNama").val($.trim(nama));
            $("#inputKelas").val($.trim(kelas));
            $("#inputIkut").val($.trim(ikut));
           $('#modal-edit').openModal();
        });
$(".delButton").on('click', function(){
    bodyElement = $(this).parent().parent();
    var nama = bodyElement.find("#namaUser").text();
    window.userid = bodyElement.find("#idUser").val(); // Deklarasi global variable supaya bisa di akses di fungsi lain
  swal({
    title: "Anda Yakin?",
    text: "Peserta \""+nama+"\" akan di hapus",
    type: "warning",
    showCancelButton: true,
    cancleButtonText: "Batal",
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Hapus",
    closeOnConfirm: false
  },
  function(){
    $.ajax({
        type: "POST",
        url : "./php/random.php",
        data : {delete: "", id : window.userid },
        success: function(){
            swal({
                title : "Dihapus!",
                text: "Berhasil di hapus",
                type: "success",
                timer: 2000
            });
            $("#modal1").fadeOut("slow").closeModal();
                load_modal();
            $(".confirm").click(function(){
                $("#modal1").fadeOut("slow").closeModal();
                load_modal();
            });
        }
    });
    
  });
});
$("#saveButton").click(function(){
    var id = $("#userID").val();
    var nama = $("#inputNama").val();
    var kelas = $("#inputKelas").val();
    var ikut = $("#inputIkut").val();
    $.ajax({
        type: "POST",
        url : "./php/random.php",
        data : { update: "", id: id, nama: nama, kelas: kelas, ikut: ikut},
        success : function(){
            $('#modal1').closeModal();
            swal({
                title : "Berhasil!",
                text: "Data peserta berhasil di simpan!",
                type: "success",
                timer: 2000
            });
            $('#modal-edit').closeModal();
            load_modal();
        }
    });
});
$("#addButton").click(function(){
    var nama = $("#addNama").val();
    var kelas = $("#addKelas").val();
    var ikut = $("#addIkut").val();
   
    $.ajax({
        type: "POST",
        url : "./php/random.php",
        data : { add: "", nama: nama, kelas: kelas, ikut: ikut},
        success : function(){
            $('#modal1').closeModal();
            swal({
                title : "Berhasil!",
                text: "Peserta telah ditambahkan!",
                type: "success",
                timer: 2000
            });
            $('#modal-add').closeModal();
            load_modal();
        }
    });
});
});