<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>MPM Rent</title>
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

            .login {
                width: 300px;
                height: 285px;
                overflow: hidden;
                background: #1e1e1e;
                border-radius: 6px;
                margin: 50px auto;
                box-shadow: 0px 0px 5px rgba(0,0,0,.3);
            }

            .login .titulo {
                width: 298px;
                height: 14px;
                padding-top: 13px;
                padding-bottom: 13px;
                font-size: 14px;
                text-align: center;
                color: #bfbfbf;
                font-weight: bold;
                background: #121212;
                border: #2d2d2d solid 1px;
                margin-bottom: 30px;
                border-top-right-radius: 6px;
                border-top-left-radius: 6px;
                font-family: Arial;
            }

            .login form {
                width: 240px;
                height: auto;
                overflow: hidden;
                margin-left: auto;
                margin-right: auto;
            }

            .login form input[type=text], .login form input[type=password] {
                width: 200px;
                font-size: 12px;
                padding-top: 14px;
                padding-bottom: 14px;
                padding-left: 40px;
                border: none;
                color: #bfbfbf;
                background: #141414;
                outline: none;
                margin: 0;
            }

            .login form input[type=text] {
                border-top-left-radius: 6px;
                border-top-right-radius: 6px;
                border-top: #0b0b0b solid 1px;
                background: #141414; // url(http://dev.dhenriquez.com/test-img/icons/111-user.png) 10px center no-repeat;
            }

            .login form input[type=password] {
                border-bottom-left-radius: 6px;
                border-bottom-right-radius: 6px;
                border-top: #0b0b0b 1px solid;
                border-bottom: #353535 1px solid;
                background: #141414;
            }

            .login form .enviar {
                width: 240px;
                height: 48px;
                display: block;
                padding-top: 14px;
                padding-bottom: 14px;
                border-radius: 6px;
                border: none;
                border-top: #4eb2a8 1px solid;
                border-bottom: #161616 1px solid;
                background: #349e92;
                text-align: center;
                text-decoration: none;
                font-size: 12px;
                font-weight: bold;
                color: #FFF;
                text-shadow: 0 -1px #1d7464, 0 1px #7bb8b3;
                font-family: Arial;
            }

            .login .olvido {
                width: 240px;
                height: auto;
                overflow: hidden;
                padding-top: 25px;
                padding-bottom: 25px;
                font-size: 10px;
                text-align: center;
            }

            .login .olvido .col {
                width: 50%;
                height: auto;
                float: left;
            }

            .login .olvido .col a {
                color: #fff;
                text-decoration: none;
                font: 12px Arial;
            }

            /* http://meyerweb.com/eric/tools/css/reset/ 
               v2.0 | 20110126
               License: none (public domain)
            */

            html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
                font: inherit;
                vertical-align: baseline;
            }

            /* HTML5 display-role reset for older browsers */

            article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block }

            body { line-height: 1 }

            ol, ul { list-style: none }

            blockquote, q { quotes: none }

            blockquote:before, blockquote:after, q:before, q:after {
                content: '';
                content: none;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0;
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
        <section class="login">
            <div class="titulo">Staff Login</div>

            <?php echo form_open(base_url('home/login_process')); ?>
                <input type="text" name="uname" required title="Username required" placeholder="Username">
                <input type="password" name="pword" required title="Password required" placeholder="Password">
                <div class="olvido">
                    
                </div>
                <input type="submit" class="enviar" value="Submit">
            <?php echo form_close();?>
        </section>
        
        <?php if(isset($data)) { ?>
        <div id="log-err">
            <?php echo $data; ?>
        </div>
        <?php } ?>
        
        <!-- Load script -->
        <script src="<?php echo base_url('assets/scripts/jquery.js');?>"></script>
        
        <script>
            $(document).ready(function () {
                $('#log-err').delay(3000).fadeOut(500);
            });
        </script>
    </body>
</html>