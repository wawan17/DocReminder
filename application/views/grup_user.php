<?php
$module_id1[] = '';

if (isset($user_group1)) {
    foreach ($user_group1 as $row1) {
        $user_group_id1 = $row1->user_group_id;
        $user_group_name1 = $row1->user_group_name;
        $remark = $row1->remark;
    }

    foreach ($user_access1 as $row2) {
        $id1 = $row2->id;
        $module_id1[] = $row2->module_id;
    }
} else {
    $user_group_id1 = $max_id;
    $user_group_name1 = '';
    $remark = '';
}

$mod1 = in_array('1', $module_id1);
$mod2 = in_array('2', $module_id1);
$mod3 = in_array('3', $module_id1);
$mod4 = in_array('4', $module_id1);
$mod5 = in_array('5', $module_id1);
$mod6 = in_array('6', $module_id1);
$mod7 = in_array('7', $module_id1);
$mod8 = in_array('8', $module_id1);
$mod9 = in_array('9', $module_id1);
$mod10 = in_array('10', $module_id1);
$mod11 = in_array('11', $module_id1);
$mod12 = in_array('12', $module_id1);
$mod13 = in_array('13', $module_id1);
?>


<!--<h2><strong>User Group</strong></h2>
<p class="inttro">Input informasi yang dibutuhkan</p>-->

<div class="content-box">
    <div class="content-box-header">
        <h3>Form Input User</h3>
    </div>
    <div class="content-box-content">
        <form id="form">
            <fieldset>
                <div class="column-big">   
                    <p>
                        <input name="txtUserGroupId" type="hidden" class="text-input small-input" value="<?php echo $user_group_id1; ?>">
                        <input name="txtUserGroupName" value="<?php echo $user_group_name1; ?>" type="text" class="text-input small-input">
                        <label>User Group Name</label>
                    </p>
                    <p>
                        <label>Remark</label>
                        <input name="txtRemark" value="<?php echo $remark; ?>" type="text" class="text-input small-input">
                    </p>
                </div>
                <div class="clear"></div>

                <div class="column-left">
                    <p>
                        <label>Input User</label>
                        <input name="module[]" <?php if($mod1==1) { echo "checked=\"checked\""; }?> type="checkbox" value="1">
                    </p>
                    <p>
                        <label>Input Grup User</label>
                        <input name="module[]" <?php if($mod2==1) { echo "checked=\"checked\""; }?> type="checkbox" value="2">
                    </p>
                    <p>
                        <label>Input Client</label>
                        <input name="module[]" <?php if($mod3==1) { echo "checked=\"checked\""; }?> type="checkbox" value="3">
                    </p>
                    <p>
                        <label>Input Department</label>
                        <input name="module[]" <?php if($mod4==1) { echo "checked=\"checked\""; }?> type="checkbox" value="4">
                    </p>
                    <p>
                        <label>Input Subdepartment</label>
                        <input name="module[]" <?php if($mod5==1) { echo "checked=\"checked\""; }?> type="checkbox" value="5">
                    </p>
                    
                    <p>
                        <?php if(isset($user_group1)) { ?>
                        <input type="button" id="cancel" class="button" value="Cancel">
                        <input type="button" id="update" class="button" value="Update">
                        <input type="button" id="delete" class="button" value="Delete">
                        <?php } else { ?>
                        <input type="button" id="simpan" class="button" value="Simpan">
                        <input type="reset" class="button" value="Cancel">
                        <?php } ?>
                    </p>
                </div>
                <div class="column-right">
                    <p>
                        <label>Input Document Category</label>
                        <input name="module[]" <?php if($mod6==1) { echo "checked=\"checked\""; }?> type="checkbox" value="6">
                    </p>
                    <p>
                        <label>Laporan Kontrak Selesai</label>
                        <input name="module[]" <?php if($mod7==1) { echo "checked=\"checked\""; }?> type="checkbox" value="7">
                    </p>
                    <p>
                        <label>Lap. Perpanjang Kontrak</label>
                        <input name="module[]" <?php if($mod8==1) { echo "checked=\"checked\""; }?> type="checkbox" value="8">
                    </p>
                    <p>
                        <label>Input Document</label>
                        <input name="module[]" <?php if($mod12==1) { echo "checked=\"checked\""; }?> type="checkbox" value="12">
                    </p>
                    <p>
                        <label>User Change Password</label>
                        <input name="module[]" <?php if($mod13==1) { echo "checked=\"checked\""; }?> type="checkbox" value="13">
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
            <th>USER GROUP ID</th>
            <th>USER GROUP NAME</th>
            <th>REMARK</th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($user_group->result() as $row) { ?>
            <tr>
                <td><a id="<?php echo $row->user_group_id; ?>" href="#"><?php echo strtoupper($row->user_group_id); ?></a></td>
                <td><a id="<?php echo $row->user_group_id; ?>" href="#"><?php echo strtoupper($row->user_group_name); ?></a></td>
                <td><?php echo strtoupper($row->remark); ?></td>
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
<script src="<?php echo base_url('assets/scripts/jquery.dataTables.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#simpan').click(function() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('user_group/add'); ?>',
                data: $('#form').serialize(),
                error: function(jqXHR, textStatus, errorThrown) {
                    $.growl.error({title: 'Error', message: errorThrown});
                },
                success: function(response) {
                    $('#form').trigger('reset');
                    $('#content').load('<?php echo base_url('user_group'); ?>');
                    $.growl.notice({title: 'Success', message: response});
                }
            });
        });
        
        $('#update').click(function() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('user_group/update'); ?>',
                data: $('#form').serialize(),
                error: function(jqXHR, textStatus, errorThrown) {
                    $.growl.error({title: 'Error', message: errorThrown});
                },
                success: function(response) {
                    $('#form').trigger('reset');
                    $('#content').load('<?php echo base_url('user_group'); ?>');
                    $.growl.notice({title: 'Success', message: response});
                }
            });
        });
        
        $('#delete').click(function () {
            var c = confirm('Anda yakin akan menghapus grup user ini?');
            if (c === true) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('user_group/delete'); ?>',
                    data: $('#form').serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        $.growl.error({title: 'Error', message: errorThrown});
                    },
                    success: function (response) {
                        $('#form').trigger('reset');
                        $.growl.notice({title: 'Success', message: response});
                        //$.jGrowl(response, {position: 'bottom-right', life: '5000'});
                        $('#content').load('<?php echo base_url('user_group'); ?>');
                    }
                });
            }
        });
        
        $('#cancel').click(function(){
            $('#form').trigger('reset');
            $('#content').load('<?php echo base_url('user_group'); ?>');
        });

        $('#data-table').dataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, 100, 200, 500, "All", -1], [10, 20, 25, 50, 100, 200, 500, "Semua"]],
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ]
        });

        $('#data-table tbody').on('click', 'a', function() {
            var id = this.id;
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('user_group/index'); ?>/' + id,
                success: function(data, textStatus, jqXHR) {
                    $('#content').load('<?php echo base_url('user_group/index'); ?>/' + id);
                }
            });
        });

    });
</script>
<!-- /Load script -->