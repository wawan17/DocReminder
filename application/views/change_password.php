<?php
if (isset($user)) {
    foreach ($user as $row1) {
        $user_id1 = $row1->user_id;
        $user_group_id1 = $row1->user_group_id;
        $username1 = $row1->username;
        $password1 = "*****";
        $name1 = $row1->name;
    }
} else {
    $user_id1 = '';
    $user_group_id1 = '';
    $username1 = '';
    $password1 = '';
    $name1 = '';
}
?>

<!--<h2><strong>User</strong></h2>
<p class="inttro">Input informasi yang dibutuhkan</p>-->

<div class="content-box">
    <div class="content-box-header">
        <h3><?php echo $title; ?></h3>
    </div>
    <div class="content-box-content">
        <form id="form">
            <fieldset>
                <div class="column-left">
                    
                    <input type="hidden" name="txtUsername" id="txtUsername" value="<?php echo $username1; ?>">
                    <input type="hidden" name="txtUserGroupId" id="txtUserGroupId" value="<?php echo $user_group_id1; ?>">
                    <input type="hidden" name="txtName" id="txtName" value="<?php echo $name1; ?>">
                    
                    <p>
                        <label>New Password</label>
                        <input name="txtPassword" id="txtPassword" placeholder="<?php echo $password1; ?>" type="password" class="text-input">
                    </p>
                    <p>
                        <label>Confirm New Password</label>
                        <input name="txtPassword2" id="txtPassword2" placeholder="<?php echo $password1; ?>" type="password" class="text-input">
                    </p>
                    
                    <p>
                        <input type="button" id="update" class="button" value="Simpan">
                        <input type="button" id="cancel" class="button" value="Batal">
                    </p>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<div id="footer">
    <small> 
        &#169; Copyright 2013 PT Mitra Pinasthika Mustika Rent | Developed by IT Department | <a href="#">Top</a>
    </small>
</div> 


<!-- Load script -->
<script src="<?php echo base_url('assets/scripts/jquery.growl.js'); ?>"></script>
<script src="<?php echo base_url('assets/scripts/jquery.dataTables.js'); ?>"></script>
<script>
    $(document).ready(function() {
        
        $('#cancel').click(function () {
            $('#content').load('<?php echo base_url('dashboard'); ?>');
        });

        $('#update').click(function () {
            var password = $('#txtPassword').val();
            var password1 = $('#txtPassword2').val();
            if (password==='' || password1==='') {
                $.growl.error({title: 'Error', message: 'Form tidak boleh kosong'});
            } else if(password!==password1) {
                $.growl.error({title: 'Error', message: 'Password tidak sama'});
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('user/update'); ?>',
                    data: $('#form').serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        $.growl.error({title: 'Error', message: errorThrown});
                    },
                    success: function (response) {
                        $('#form').trigger('reset');
                        $.growl.notice({title: 'Success', message: response});
                        //$.jGrowl(response, {position: 'bottom-right', life: '5000'});
                        $('#content').load('<?php echo base_url('dashboard'); ?>');
                    }
                });
            }
        });
    });
</script>
<!-- /Load script -->