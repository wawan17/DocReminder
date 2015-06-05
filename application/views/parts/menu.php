<div id="sidebar">
    <div id="sidebar-wrapper">
        <h1 id="sidebar-title">
            <a href="#">Cashflow</a>
        </h1>

	<!-- Logo (221px wide) -->
	<a href="#">
            <img id="logo" src="<?php echo base_url('assets/images/logoMPMR.png'); ?>" alt="Cashflow System" />
        </a>
	<div id="profile-links">
            <div> Hallo, <?php echo ucwords($this->session->userdata('name')); ?></div>
            <br />
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
        <br /><br />
        <a href="<?php echo base_url('home/logout');?>" title="Sign Out"><b>Sign Out</b></a>
	</div>
            
        <!-- Accordion Menu -->
        <ul id="main-nav">  
            <li>
                <a href="#" class="nav-top-item no-submenu current">
                    Dashboard
                </a>
            </li>
            
            <?php foreach ($menu as $menus) { ?>
            <li>
                <a href="#" class="nav-top-item">
                    <?php echo ucwords($menus->module_group_name); ?>
                </a>
                <ul>
                    <?php
                    $this->load->model('m_module_user');
                    $submenu = $this->m_module_user->get_page_id($menus->module_group_id);
                    foreach ($submenu->result() as $submenus) { ?>
                    <li><a href="#kodperkiraan" onclick="$('#main-content').load('<?php echo base_url($submenus->file); ?>');"><?php echo ucwords($submenus->module_name); ?></a></li>
                    <?php } ?>
<!--                    <li><a href="#kodperkiraan" onclick="$('#main-content').load('<?php //echo base_url('kode_perkiraan'); ?>');">Kode Perkiraan</a></li>
                    <li>---------------------------------------------------</li>
                    <li><a href="#user" onclick="$('#main-content').load('<?php //echo base_url('user'); ?>');">User</a></li>
                    <li><a href="#user_group" onclick="$('#main-content').load('<?php //echo base_url('user_group'); ?>');">Grup User</a></li>-->
                </ul>
            </li>
            <?php } ?>

<!--            <li>
                <a href="#" class="nav-top-item" id="navtop3">
                    Transaction
                </a>
                <ul>
                    <li><a href="#kaspenerimaan" onclick="$('#main-content').load('<?php // echo base_url('kas_penerimaan'); ?>');">Input Penerimaan Kas</a></li>
                    <li><a href="#kaspengeluaran" id="sub3menu2" onclick="$('#main-content').load('<?php // echo base_url('kas_pengeluaran'); ?>');">Input Pengeluaran Kas</a></li>
                    <li>---------------------------------------------------</li>
                    <li><a href="#validasipenerimaan" onclick="$('#main-content').load('<?php // echo base_url('kas_penerimaan/validasi_kas_penerimaan'); ?>');">Validasi Penerimaan Kas</a></li>
                    <li><a href="#validasipengeluaran" id="sub3menu2" onclick="$('#main-content').load('<?php // echo base_url('kas_pengeluaran/validasi_kas_pengeluaran'); ?>');">Validasi Pengeluaran Kas</a></li>
                </ul>
            </li>
            
            <li>
                <a href="#" class="nav-top-item" id="navtop3">
                    Report
                </a>
                <ul>
                    <li><a href="#reportpenerimaan" onclick="$('#main-content').load('<?php // echo base_url('report/laporan_penerimaan_kas'); ?>');">Laporan Penerimaan Kas</a></li>
                    <li><a href="#reportpengeluaran" id="sub3menu2" onclick="$('#main-content').load('<?php // echo base_url('report/laporan_pengeluaran_kas'); ?>');">Laporan Pengeluaran Kas</a></li>
                    <li><a href="#reportbalanced" id="sub3menu2" onclick="$('#main-content').load('<?php // echo base_url('report/laporan_saldo_kas'); ?>');">Laporan Saldo Kas</a></li>
                </ul>
            </li>-->
        </ul> 
        <!-- End #main-nav -->
    </div>
</div> <!-- End #sidebar -->

<div id="main-content">
    <noscript>
        <div class="notification error png_bg">
            <div>
                Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
            </div>
        </div>
    </noscript>