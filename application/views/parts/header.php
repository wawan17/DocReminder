<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MPM Rent</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Load CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/invalid.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.jgrowl.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.growl.css'); ?>" /> 
        <link rel="stylesheet" href="<?php echo base_url('assets/css/pace.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/report.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style-new.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker_1.css'); ?>" />
        
        <!-- Load script -->
        <script src="<?php echo base_url('assets/scripts/jquery.js');?>"></script>
        <script src="<?php echo base_url('assets/scripts/jquery-ui.js');?>"></script>
        
    </head>
    <body>
        <!-- START HEADER -->
        <div id="header">
            <!-- Logo -->
            <div class="logo">
                <img src="<?php echo base_url('assets/images/logoMPMR.png');?>" alt="logo">
            </div>
            <!-- /Logo -->
            
            <!-- Menu -->
            <div class="menu-container">
                
                <ul class="menu-header">                    
                    <?php foreach ($menu as $menus) { ?>                    
                    <li><a href="#"><?php echo ucwords($menus->module_group_name); ?></a>
                        <ul class="menu-detail">
                            <?php
                            $this->load->model('m_module_user');
                            $submenu = $this->m_module_user->get_page_id($menus->module_group_id, $this->session->userdata('username'));
                            foreach ($submenu->result() as $submenus) { ?>
                            <li><a href="#submenu" onclick="$('#content').load('<?php echo base_url($submenus->file); ?>');"><?php echo ucwords($submenus->module_name); ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /Menu -->
            
            <!-- Time and Username -->
            <div class="welcome-message">
                <script>
                var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
                var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")

                function getthedate(){
                var mydate=new Date();
                var year=mydate.getYear();
                if (year < 1000)
                year+=1900;
                var day=mydate.getDay();
                var month=mydate.getMonth();
                var daym=mydate.getDate();
                if (daym<10)
                daym="0"+daym;
                var hours=mydate.getHours();
                var minutes=mydate.getMinutes();
                var seconds=mydate.getSeconds();
                var dn="AM";
                if (hours>=12)
                dn="PM";
                if (hours>12){
                hours=hours-12;
                }
                if (hours==0)
                hours=12;
                if (minutes<=9)
                minutes="0"+minutes;
                if (seconds<=9)
                seconds="0"+seconds;

                var cdate="<small><font color='#FFCC00' face='Arial'><b>"+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+"<br> "+hours+":"+minutes+":"+seconds
                +"</b></font></small>";
                if (document.all)
                document.all.clock.innerHTML=cdate
                else if (document.getElementById)
                document.getElementById("clock").innerHTML=cdate
                else
                document.write(cdate)
                }
                if (!document.all&&!document.getElementById)
                getthedate()
                function goforit(){
                if (document.all||document.getElementById)
                setInterval("getthedate()",1000)
                }
                </script>
                <span id="clock"></span>
                <span style="color: red !important"><strong style="color: red !important"><?php echo ucwords($this->session->userdata('name'));?></strong> | </span>
                <a href="<?php echo base_url('home/logout');?>" title="Sign Out"><b>Sign Out</b></a>
            </div>            
            <!-- /Time and Username -->
        </div>
        <!-- END HEADER -->
        
        <!-- START CONTENT -->
        <div id="content">