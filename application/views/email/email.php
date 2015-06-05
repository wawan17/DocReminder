<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MPM Rent| Notification</title>
        
        <!-- Load CSS -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <style>
            body {
                background: #eee;
            }
            
            .container {
                width: 100%;
                height: 100%;
                padding: 50px;
                background: #fff;
            }
            
            table {
                width: 100%;
                border-collapse: collapse;
                border: 3px solid #ccc;
            }
            
        </style>
    
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <h2><?php echo $day_to_expire; ?> Days to expire</h2>
                </div>
            </div>
            <div class="row">
                <table>
                    <tr>
                        <td><label>Doc. Number</label></td>
                        <td>:</td>
                        <td><span><?php echo $no_doc; ?></span></td>
                    </tr>
                    <tr>
                        <td><label>Title</label></td>
                        <td>:</td>
                        <td><span><?php echo $title;?></span></td>
                    </tr>
                    <tr>
                        <td><label>Description</label></td>
                        <td>:</td>
                        <td><span><?php echo $description; ?></span></td>
                    </tr>
                    <tr>
                        <td><label>From Date</label></td>
                        <td>:</td>
                        <td><span><span><?php echo $from_date; ?></span></span></td>
                    </tr>
                    <tr>
                        <td><label>To Date</label></td>
                        <td>:</td>
                        <td><span><?php echo $to_date; ?></span></td>
                    </tr>
                    <tr>
                        <td><label>Status</label></td>
                        <td>:</td>
                        <td><span><?php echo $status; ?></span></td>
                    </tr>
                </table>
            </div>
                
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <p>
                        <a download href="http://mpm-rent.co.id/legal/uploads/<?php echo date('Ymd', strtotime($from_date))."_".  str_replace(" ", "_", $title).'.pdf';?>">Klik disini</a> jika anda ingin mengunduh dokumen ini.
                    </p>
                    <p>
                        <a href="http://mpm-rent.co.id/legal/outside/confirm/?d=<?php echo $no_doc; ?>&t=<?php echo $title; ?>&fd=<?php echo $from_date; ?>&td=<?php echo $to_date; ?>&desc=<?php echo $description; ?>&s=<?php echo $status; ?>">Klik disini</a> jika anda ingin mengakhiri kontrak ini.
                    </p>
                    <p>
                        <a href="http://mpm-rent.co.id/legal/outside/confirm_add/?d=<?php echo $no_doc; ?>&t=<?php echo $title; ?>&fd=<?php echo $from_date; ?>&td=<?php echo $to_date; ?>&desc=<?php echo $description; ?>&s=<?php echo $status; ?>">Klik disini</a> jika anda ingin memperbarui dan memperpanjang kontrak ini.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <small>Supported by IT Department PT. Mitra Pinasthika Mustika Rent</small>
                </div>
            </div>
        </div>
    </body>
</html>