<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>Reminder Trigger</title>
        <link rel="shortcut-icon" href="<?php echo base_url('assets/images/pavicon.png'); ?>" />

        <!-- Load CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>" />
<!--        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" />-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/invalid.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.jgrowl.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.growl.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui-1.8.13.custom.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/pace.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/report.css'); ?>" />

        <style>
            body {
                //background: -webkit-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.15) 30%, rgba(255,255,255,.3) 32%, rgba(255,255,255,0) 33%) 0 0, -webkit-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.1) 11%, rgba(255,255,255,.3) 13%, rgba(255,255,255,0) 14%) 0 0, -webkit-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 17%, rgba(255,255,255,.43) 19%, rgba(255,255,255,0) 20%) 0 110px, -webkit-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) -130px -170px, -webkit-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) 130px 370px, -webkit-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.1) 11%, rgba(255,255,255,.2) 13%, rgba(255,255,255,0) 14%) 0 0, -webkit-linear-gradient(45deg, #343702 0%, #184500 20%, #187546 30%, #006782 40%, #0b1284 50%, #760ea1 60%, #83096e 70%, #840b2a 80%, #b13e12 90%, #e27412 100%);
                background-color: #840b2a;
                //background: -moz-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.15) 30%, rgba(255,255,255,.3) 32%, rgba(255,255,255,0) 33%) 0 0, -moz-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.1) 11%, rgba(255,255,255,.3) 13%, rgba(255,255,255,0) 14%) 0 0, -moz-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 17%, rgba(255,255,255,.43) 19%, rgba(255,255,255,0) 20%) 0 110px, -moz-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) -130px -170px, -moz-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) 130px 370px, -moz-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.1) 11%, rgba(255,255,255,.2) 13%, rgba(255,255,255,0) 14%) 0 0, -moz-linear-gradient(45deg, #343702 0%, #184500 20%, #187546 30%, #006782 40%, #0b1284 50%, #760ea1 60%, #83096e 70%, #840b2a 80%, #b13e12 90%, #e27412 100%);
                background-color: #840b2a;
                //background: -o-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.15) 30%, rgba(255,255,255,.3) 32%, rgba(255,255,255,0) 33%) 0 0, -o-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.1) 11%, rgba(255,255,255,.3) 13%, rgba(255,255,255,0) 14%) 0 0, -o-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 17%, rgba(255,255,255,.43) 19%, rgba(255,255,255,0) 20%) 0 110px, -o-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) -130px -170px, -o-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.2) 11%, rgba(255,255,255,.4) 13%, rgba(255,255,255,0) 14%) 130px 370px, -o-radial-gradient(rgba(255,255,255,0) 0, rgba(255,255,255,.1) 11%, rgba(255,255,255,.2) 13%, rgba(255,255,255,0) 14%) 0 0, -o-linear-gradient(45deg, #343702 0%, #184500 20%, #187546 30%, #006782 40%, #0b1284 50%, #760ea1 60%, #83096e 70%, #840b2a 80%, #b13e12 90%, #e27412 100%);
                background-size: 1000px 1000px, 410px 410px, 610px 610px, 530px 530px, 730px 730px, 1000px 1000px;
                background-color: #eee;
            }

            .reminder-box {
                width: 380px;
                padding: 20px;
                height: 200px;
                margin: 50px auto;
                background: #666;
                border-radius: 5px;
                box-shadow: 0 0 5px 0 #777;
                color: #fff;
            }
            
            .reminder-box h1 {
                margin-top: 30px;
                font-size: 30px;
                font-family: 'Arial';
                width: 100%;
                text-align: center;
                font-weight: bold;
                text-shadow: 0 0 2px #000;
            }
            
            .reminder-box p {
                margin-top: 20px;
                color: red;
                text-decoration: blink;
                text-align: center;
                font-size: 24px;
                font-family: 'Arial';
            }
            
            .logo {
                margin-top: 50px;
                width: 100%;
                text-align: center;
                height: 50px;
            }
            
            #log-err {                
                width: 280px;
                padding: 10px;
                height: 30px;
                overflow: hidden;
                background: #141414;
                background: rgba(255,0,0,0.8);
                border-radius: 6px;
                margin: 50px auto;
                box-shadow: 0px 0px 5px rgba(255,0,0,.3);    
                color: #ccc;
                font-family: 'Arial';
                font-size: 11px;
                font-weight: bold;
                line-height: 15px;  
            }
        </style>
    </head>
    <body>
        <div class="logo">
            <img src="<?php echo base_url('assets/images/logoMPMR.png'); ?>">
        </div>
        
        <div class="reminder-box">
            <h1>Mail Reminder Trigger</h1>
            <p>Please don't close the windows!</p>
        </div>
        
        
        <!-- Load script -->
        <script src="<?php echo base_url('assets/scripts/jquery.js');?>"></script>
        <script src="<?php echo base_url('assets/scripts/jquery-ui.js');?>"></script>
        <script src="<?php echo base_url('assets/scripts/jquery.jgrowl.min.js');?>"></script>
        <script src="<?php echo base_url('assets/scripts/popup.js');?>"></script>
        <script src="<?php echo base_url('assets/scripts/pace.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/scripts/jquery.growl.js'); ?>"></script>
        
        <!-- Load Javascript --> 

        <script>
        function checkTime() {
            var today = new Date();
            var hour = today.getHours();
            var minute = today.getMinutes();
            var second = today.getSeconds();

            hour = ( hour < 10 ? "0" : "" ) + hour;
            minute = ( minute < 10 ? "0" : "" ) + minute;
            second = ( second < 10 ? "0" : "" ) + second;

            var timeString=hour+":"+minute+":"+second;
            var defaultTimeString="06:06:06";

            if(timeString===defaultTimeString) {
                $.ajax({
                    type : 'POST',
                    url : '<?php echo base_url('outside/check_document'); ?>',
                    success: function() {
                        $.jGrowl('Document has checked');
                    }
                });
            }
        }

        $(document).ready(function (){
           

           setInterval(checkTime,1000);
        });
        </script>
    </body>
</html>