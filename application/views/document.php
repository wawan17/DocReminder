<?php
if (isset($document)) {
    foreach ($document as $result) {
        $no_doc = $result->no_doc;
        $no_doc_ori = $result->no_doc_ori;
        $title = $result->title;
        $descriptiom = $result->description;
        $from_date = substr($result->from_date,8,2)."/".substr($result->from_date,5,2)."/".substr($result->from_date,0,4);
        $to_date = substr($result->to_date,8,2)."/".substr($result->to_date,5,2)."/".substr($result->to_date,0,4);
        $email = $result->email;
        $status = $result->status;
    }
    $readonly ='readonly=""';
} else {
    $no_doc = '';
    $no_doc_ori = '';
    $title = '';
    $descriptiom = '';
    $from_date = '';
    $to_date = '';
    $email = '';
    $status = '';
    $readonly='';
}
?>
<!--<h2><strong>Document</strong></h2>
<p class="inttro">Input informasi yang dibutuhkan</p>-->

<div class="content-box">
    <div class="content-box-header">
        <h3>Form Input Dokumen</h3>
    </div>
    <div class="content-box-content">
        <form id="form" name="form" enctype="multipart/form-data">
            <fieldset>
                <div class="column-big">
                    <p>
                        <label>Document Number</label>                                        
                        <input <?php echo $readonly; ?> type="text" class="text-input " name="no_doc" value="<?php echo $no_doc_ori; ?>">
                    </p>
                    <p>
                        <label>Subject</label>
                        <input type="text" class="text-input small-input" name="title" value="<?php echo $title; ?>">
                    </p>
                    <p>
                        <label>Description</label>
                        <input type="text" class="text-input medium-input" name="description" value="<?php echo $descriptiom; ?>">
                    </p>
                    <p>
                        <label>From Date</label>
                        <input id="from_date" type="text" placeholder="DD/MM/YYYY" class="text-input dateP" name="from_date" value="<?php echo $from_date; ?>">
                    </p>
                    <p>
                        <label>To Date</label>
                        <input id="to_date" type="text" placeholder="DD/MM/YYYY" class="text-input dateP" name="to_date" value="<?php echo $to_date; ?>">                                        
                    </p>
                    <p>
                        <label>Email</label>
                        <input type="text" class="text-input medium-input" name="email" placeholder="email@mpm-rent.com" value="<?php echo $email; ?>">
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pisahkan dengan koma jika lebih dari satu email
                    </p>
                    <p>
                        <label>Upload</label>
                        <input type="file" name="fileLegal">
                    </p>
                    <p>
                        <label>Close</label>
                        <input type="checkbox" class="checkbox text-input" name="status" value="c" <?php if ($status == 'c') { echo "checked=\"checked\""; } ?>> 
                    </p>
                    <p>
                        <?php if ($no_doc == '') { ?>
                            <input type="button" id="simpan" class="button" value="Simpan">
                            <input type="reset" class="button" value="Cancel">
                            <input type="button" name="files" id="import" class="button" value="Import From Excel">
                            <input accept=".xlsx" type="file" style="display: none" name="userfile" id="importfile">
                            <a class="button" href="<?php echo base_url('document/export_to_excel'); ?>">Export to excel</a>
                           
                        <?php } else { ?>
                            <input type="button" id="cancel" class="button" value="Cancel">
                            <input type="button" id="update" class="button" value="Update">
                            <input type="button" id="delete" class="button" value="Delete">
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
            <th>No. Doc</th>
            <th>Title</th>
            <th>Description</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Email</th>
            <th>Status</th>
            <th>Create Date</th>
            <th>Last Edit</th>
            <th>Created By</th>
            <th>Last Edited By</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($documents->result() as $row) { if ($row->status == 'o' ) {$stat="OPEN";}else{$stat="CLOSED";}?>
        <tr>
            <td><a id="<?php echo $row->no_doc;?>" href="#"><?php echo strtoupper($row->no_doc_ori); ?></a></td>
            <td><?php echo strtoupper($row->title); ?></td>
            <td><?php echo strtoupper($row->description); ?></td>
            <td><?php echo substr($row->from_date,8,2)."/".substr($row->from_date,5,2)."/".substr($row->from_date,0,4);  ?></td>
            <td><?php echo substr($row->to_date,8,2)."/".substr($row->to_date,5,2)."/".substr($row->to_date,0,4); ?></td>
            <td><?php echo strtoupper($row->email); ?></td>
            <td><?php echo $stat; ?></td>
            <td><?php echo date('d/m/Y', strtotime($row->create_date)); ?></td>
            <td><?php if ($row->last_edit_date !== null) { echo date('d/m/Y', strtotime($row->last_edit_date));} ?></td>
            <td><?php echo strtoupper($row->created_by); ?></td>
            <td><?php echo strtoupper($row->last_edited_by); ?></td>
            <td><a download href="<?php echo base_url('uploads/'.date('Ymd', strtotime($row->from_date)).'_'.  str_replace(" ", "_", $row->title)).".pdf"; ?>">Download</a></td>
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
$(document).ready(function () {
    $('#simpan').click(function () {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('document/add'); ?>',
            data: $('#form').serialize(),
            error: function (jqXHR, textStatus, errorThrown) {
                $.growl.error({title: 'Error', message: errorThrown});
            },
            success: function (response) {
                $('#form').trigger('reset');
                $.growl.notice({title: 'Success', message: response});
                //$.jGrowl(response, {position: 'bottom-right', life: '5000'});
                $('#content').load('<?php echo base_url('document'); ?>');
            }
        });
        
        var formData = new FormData($("#form")[0]);
        $.ajax({
            type:'POST',
            data: formData,
            url:'<?php echo base_url('document/upload_file'); ?>',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function() {
                // nothing
            }
        });
    });
    

    $('#cancel').click(function () {
        $('#content').load('<?php echo base_url('document'); ?>');
    });

    $('#update').click(function () {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('document/update'); ?>',
            data: $('#form').serialize(),
            error: function (jqXHR, textStatus, errorThrown) {
                $.growl.error({title: 'Error', message: errorThrown});
            },
            success: function (response) {
                $('#form').trigger('reset');
                $.growl.notice({title: 'Success', message: response});
                //$.jGrowl(response, {position: 'bottom-right', life: '5000'});
                $('#content').load('<?php echo base_url('document'); ?>');
            }
        });
        
        var formData = new FormData($("#form")[0]);
        $.ajax({
            type:'POST',
            data: formData,
            url:'<?php echo base_url('document/upload_file'); ?>',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function() {
                // nothing
            }
        });
    });

    $('#delete').click(function () {
        var c = confirm('Anda yakin akan menghapus dokumen ini?');
        if (c === true) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('document/delete'); ?>',
                data: $('#form').serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    $.growl.error({title: 'Error', message: errorThrown});
                },
                success: function (response) {
                    $('#form').trigger('reset');
                    $.growl.notice({title: 'Success', message: response});
                    //$.jGrowl(response, {position: 'bottom-right', life: '5000'});
                    $('#content').load('<?php echo base_url('document'); ?>');
                }
            });
        }
    });

    $('#data-table').dataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [[10, 25, 50, 100, 200, 500, -1], [10, 25, 50, 100, 200, 500, "Semua"]],
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [0]}
        ]
    });

    $('#data-table tbody').on('click', 'a', function () {
        var id = this.id;
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('document/index'); ?>/' + id,
            success: function (data, textStatus, jqXHR) {
                $('#content').load('<?php echo base_url('document/index'); ?>/' + id);
            }
        });
    });
    
    $('#import').click(function(){
        $('#importfile').click();         
    });
        
        
    $('#importfile').change(function() {
        var formData = new FormData();
        var file = $('#importfile')[0].files[0];

        formData.append('userfile', file);
        $.each($('#form').serializeArray(), function(a,b) {
            formData.append(b.name, a.value);
        });

        $.ajax({
            type : 'POST',
            url : '<?php echo base_url('document/import_from_excel');?>',
            data : formData,
            processData: false,
            contentType: false,
            error: function (jqXHR, textStatus, errorThrown) {
                    $.growl.error({title: 'Error', message: errorThrown});
            },
            success : function(response) {
                $.growl.notice({title: 'Success', message: response});
                $('#content').load('<?php echo base_url('document'); ?>');
            }
        });
    });
    
    $('.dateP').datepicker({
                dateFormat: 'dd/mm/yy',
                changeYear: true,
                changeMonth: true
            });
    
    

});
</script>
<!-- /Load script -->