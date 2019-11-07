<?php
$judul = "Auto Invite Friend To Group Facebook";
include($_SERVER['DOCUMENT_ROOT'].'/head.php');
$utoken = $_POST['token']; ?>

<script>
function onClickHeader(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    }
}
    function exec() {
        $('#exec').addClass('btn btn-info').html('<i class="fa fa-spinner fa-spin" style="font-size:12px"></i> Memproses..').attr('disabled', 'disabled');
        var group = $('#group').val().trim();
        var token = $('#access_token').val().trim();
        var time = $('#time').val();
        var fr = $('#friend').val();
        var success = 0, fail = 0;
        $('#total').fadeIn('slow').text('Total: '+fr.length);
        for (let i = 0; i < fr.length; i++) {
            setTimeout(function(){
                $.post('progress.php', {group: group, fr: fr[i], token: token}, function(ds){
                    if(ds == 'ok'){
                        success++;
                        $('#success').fadeIn('slow').text('Success: ' + success);
                    }else{
                        fail++;
                        $('#fail').fadeIn('slow').text('Failed: ' + fail);
                    }
                });
                if ((i + 1) == group.length) {
                    $('#exec').removeClass('btn btn-info').addClass('btn btn-primary').text('Hoàn thành!').attr('disabled', 'disabled');
                }
            }, i * 1000 * time);
        }
    }
</script>
<div class="col-md-12" id="form">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Auto Invite Friend Facebook</h3>
        </div>
        <input type="hidden" value="<?php echo $utoken; ?>" id="access_token" name="access_token" />
        <div class="box-body">
            <div class="form-group">
                <label for="time"> ID Group Anda</label><br />
                <input type="number" name="group" id="group" class="form-control" placeholder="Masukan ID Grup Mu.." />
            </div>
            
            <div class="form-group">
                <label for="sl">Pilih Teman Yang Akan Diundang:</label>
                <select name="friend[]" id="friend" class="form-control" multiple style="height:300px">
                    <?php
                    $fr = json_decode(file_get_contents('https://graph.facebook.com/me/friends?access_token=' . $utoken . '&method=GET&fields=id,name&limit=4000'), true);
                    for ($i = 0; $i < count($fr['data']); $i++) {
                        ?>
                        <option value="<?php echo $fr['data'][$i]['id']; ?>" checked><?php echo ($i + 1) . '. ' . $fr['data'][$i]['name']; ?> </option>
                    <?php } ?>
                </select>

            </div>

            <div class="form-group">
                <label for="time"> Delay (Per Detik):</label><br />
                <input type="text" name="time" id="time" class="form-control" placeholder="Delay / Detik nya" />
            </div>

        </div>
        <div class="box-footer">
            <button type="button" class="btn btn-primary" id="exec" onclick="exec();">Auto Invite</button>
            <button id="total" class="btn btn-default" style="display:none"></button>
            <button id="success" class="btn btn-success" style="display:none"></button>
            <button id="fail" class="btn btn-danger"style="display:none"></button>
        </div>
    </div>
</div>