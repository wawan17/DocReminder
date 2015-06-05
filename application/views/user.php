<?php
if (isset($user1)) {
    foreach ($user1 as $row1) {
        $user_id1 = $row1->user_id;
        $user_group_id1 = $row1->user_group_id;
        $user_group_name1 = $row1->user_group_name;
        $username1 = $row1->username;
        $password1 = "*****";
        $name1 = $row1->name;
    }
} else {
    $user_id1 = '';
    $user_group_id1 = '';
    $user_group_name1 = '';
    $username1 = '';
    $password1 = '';
    $name1 = '';
}
?>

<!--<h2><strong>User</strong></h2>
<p class="inttro">Input informasi yang dibutuhkan</p>-->

<div class="content-box">
    <div class="content-box-header">
        <h3>Form Input User</h3>
    </div>
    <div class="content-box-content">
        <form id="form">
            <fieldset>
                <div class="column-left">
                    <p>
                        <label>Username</label>
                        <input name="txtUserID" value="<?php echo $user_id1; ?>" type="hidden" class="text-input small-input">
                        <input name="txtUsername" id="txtUsername" value="<?php echo $username1; ?>" <?php if($username1!='') { echo "readonly=\"readonly\""; } ?> type="text" class="text-input small-input">
                    </p>
                    <p>
                        <label>Password</label>
                        <input name="txtPassword" id="txtPassword" placeholder="<?php echo $password1; ?>" type="password" class="text-input">
                    </p>
                    <p>
                        <label>Confirm Password</label>
                        <input name="txtPassword2" id="txtPassword2" placeholder="<?php echo $password1; ?>" type="password" class="text-input">
                    </p>
                    <p>
                        <label>User Group</label>
                        <select name="txtUserGroupId" class="select">
                            <?php
                            if ($user_group_id1!='') {
                                echo "<option value='".$user_group_id1."'>".ucwords($user_group_name1)."</option>";
                            }
                            ?>
                            <?php foreach($user_group->result() as $ug) { ?>
                            <option value="<?php echo $ug->user_group_id; ?>"><?php echo ucwords($ug->user_group_name); ?></option>
                            <?php } ?>
                        </select>
                    </p>
                    <p>
                        <label>Name</label>
                        <input name="txtName" value="<?php echo $name1; ?>" type="text" class="text-input small-input">
                    </p>
                    <p>
                        <?php if(isset($user1)) { ?>
                        <input type="button" id="cancel" class="button" value="Cancel">
                        <input type="button" id="update" class="button" value="Update">
                        <input type="button" id="delete" class="button" value="Delete">
                        <?php } else { ?>
                        <input type="button" id="simpan" class="button" value="Simpan">
                        <input type="reset" class="button" value="Cancel">
                        <?php } ?>
                    </p>
                </div>
            </fieldset>
        </form>
    </div>
</div>


<!-- Table -->
<table id="data-table">
    <thead>
        <tr>
            <th>USER ID</th>
            <th>USERNAME</th>
            <th>USER GROUP</th>
            <th>NAME</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user->result() as $row) { ?>
            <tr>
                <td><?php echo strtoupper($row->user_id); ?></td>
                <td><a id="<?php echo $row->username; ?>" href="#"><?php echo strtoupper($row->username); ?></a></td>
                <td><?php echo strtoupper($row->user_group_name); ?></td>
                <td><?php echo strtoupper($row->name); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- /Table -->

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
        $('#simpan').click(function() {
            var username = $('#txtUsername').val();
            var password = $('#txtPassword').val();
            var password1 = $('#txtPassword2').val();
            
            if((username==='') || (password==='') || (password1==='')) {
                $.growl.error({title: 'Error', message: 'Form tidak boleh kosong'});
            } else {
                if (password!==password1) {
                    $.growl.error({title: 'Error', message: 'Password tidak sama'});
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('user/add'); ?>',
                        data: $('#form').serialize(),
                        error: function (jqXHR, textStatus, errorThrown) {
                            $.growl.error({title: 'Error', message: errorThrown});
                        },
                        success: function(response) {
                            $('#form').trigger('reset');
                            $('#content').load('<?php echo base_url('user'); ?>');
                            $.growl.notice({title: 'Success', message: response});
                        }
                    });
                }
            }
        });
        
        $('#cancel').click(function () {
            $('#content').load('<?php echo base_url('user'); ?>');
        });

        $('#update').click(function () {
            var password = $('#txtPassword').val();
            var password1 = $('#txtPassword2').val();
            if (password!==password1) {
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
                        $('#content').load('<?php echo base_url('user'); ?>');
                    }
                });
            }
        });

        $('#delete').click(function () {
            var c = confirm('Anda yakin akan menghapus user ini?');
            if (c === true) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('user/delete'); ?>',
                    data: $('#form').serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        $.growl.error({title: 'Error', message: errorThrown});
                    },
                    success: function (response) {
                        $('#form').trigger('reset');
                        $.growl.notice({title: 'Success', message: response});
                        //$.jGrowl(response, {position: 'bottom-right', life: '5000'});
                        $('#content').load('<?php echo base_url('user'); ?>');
                    }
                });
            }
        });
        
        $('#data-table').dataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, 100, 200, 500, "All", -1], [10, 20, 25, 50, 100, 200, 500, "Semua"]],
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [0] }
            ]
        });
        
        $('#data-table tbody').on('click','a',function () {
            var id = this.id;
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('user/index'); ?>/' + id,
                success: function (data, textStatus, jqXHR) {
                    $('#content').load('<?php echo base_url('user/index'); ?>/' + id);
                }
            });
        });
    });
</script>
<!-- /Load script -->