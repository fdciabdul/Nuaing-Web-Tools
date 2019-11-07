<?php include '../head.php'; ?>

<div class="col-md-5">
	<div class="box box-success">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-thumbs-up"></i> Auto Poke Friends </h4>
			
		</div>
		<div class="box-content">
			<h4><strong><p class="text-danger"> Hệ Thống Tự Động Chọc Friends Friends Bất Kỳ</p></strong></h4>
			<font style="color:#23c6c8;">Bước 1:</font> Sử Dụng Mục Bên " Danh Sách Bạn Bè" Để Chọn ID Friends Của Bạn.  <br />
			<hr>


<form action="" method="post">
			<div id="bodyup" class="form-group">
				<button type="submit" class="btn btn-success btn-block"  onClick="done()" >
					<i class="fa fa-exchange"></i> Thực Hiện
				</button>
			</div>
                       <div id="thongbao" style="display: none;">
				<button type="submit" class="btn btn-success btn-block" disabled>
					<i class="fa fa-refresh fa-spin"></i> Đang Thực Hiện
				</button><BR><BR>
                                <div class="alert alert-info"><i class="fa fa-refresh fa-spin"></i> Đang Thực Hiện - Vui Lòng Đợi!
                                </div>
                       </div>
		</div>
		<div class="box-footer">
<?php
$token= $_GET['token'];
$c = 0;

if( isset($_POST['id']) && is_array($_POST['id']) ) {
  foreach($_POST['id'] as $lol) {
	auto('https://graph.facebook.com/'.$lol.'/pokes?&access_token='.$token.'&method=post').'';
          $c++;
   }
echo '<div class="alert alert-info"> SUCCESS: Auto Poke Friends Thành Công.<br /> Đã Chọc '.$c.' Friends .<script type="text/javascript">toarst("success","Auto Poke Friends Thành Công!.","Lời Nhắn Từ Hệ Thống")</script></div>';
}

?>
			

		</div>
	</div>
</div>
<div class="col-md-7">
	<div class="box box-info">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-credit-card"></i> Danh Sách Bạn Bè </h4>
		</div>
		<div class="box-content">
		<div class="input-group" style="margin-left: 20px;">
                     <div class="checkbox" style="margin-left: 30px;">
                          <label><input type="checkbox" value="" onClick="checkbox(this)"> Chọn Tất Cả </label>
                     </div>
                          <div class="control-group">
<?php

$stat=json_decode(auto('https://graph.beta.facebook.com/me/friends?fields=id,name,bookmark_order&access_token='.$token.'&method=GET&limit=500'),true);
for($i=1;$i<=count($stat[data]);$i++){
if(!ereg($stat[data][$i-1][id],$log)){
?>
<div class="checkbox">
<label><input type="checkbox" value="<?=$stat[data][$i-1][id]?>" name="id[]"><a href="https://www.facebook.com/<?=$stat[data][$i-1][id]?>" target="_blank"><?=$stat[data][$i-1][name]?></a></label>
</div>
<?
if($i=='10'){
?>
                          </div>
                          <div class="control-group">
<?
}
?>
<?
}
}
?>
                        </div>
                 </div>
</form>
		</div>
		<div class="box-footer">
		</div>
	</div>
</div>

<script type="text/javascript">
function done()
	{
	$("#bodyup").hide();
	$("#thongbao").show();
	}
</script>
<script> 
function checkbox(source) {
  checkboxes = document.getElementsByName('id[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>


<?
require("MODAL-EMOJI.php");
?>
