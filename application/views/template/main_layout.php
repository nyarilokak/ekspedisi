<?php  error_reporting(0); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$title?> | Ekspedisi Trac Palembang </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>kialap/img/logo/logonew.png">
    
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>kialap/css/bootstrap-theme.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/owl.theme.css">
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/calendar/fullcalendar.print.min.css">
	
	   <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/data-table/bootstrap-editable.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/style.css">
	
	  <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/form/all-type-forms.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
	<!-- autocomplete ui -->
	<link rel="stylesheet" href="<?php echo base_url()?>kialap/js/autocomplete/jquery-ui.css">
	 <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/modals.css">	
    <script src="<?=base_url()?>kialap/js/vendor/modernizr-2.8.3.min.js"></script>
	
	  <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href="<?php echo base_url();?>kialap/js/autocomplete/js/jquery.autocomplete.css" rel="stylesheet" />
	
	  <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url();?>kialap/css/datapicker/datepicker3.css">
	
	
	    <!-- chosen CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url();?>kialap/css/chosen/bootstrap-chosen.css">
	
</head>

  <style>
		
			body {
				
				background-color:#efefef;
			
			}
			
			/* Center the loader */

			#loader {

			position: absolute;

			left: 50%;

			top: 50%;

			z-index: 1;

			width: 150px;

			height: 150px;

			margin: -75px 0 0 -75px;

			border: 16px solid #f3f3f3;

			border-radius: 50%;

			border-top: 16px solid #3498db;

			width: 120px;

			height: 120px;

			-webkit-animation: spin 2s linear infinite;

			animation: spin 2s linear infinite;

			}

			@-webkit-keyframes spin {

			0% { -webkit-transform: rotate(0deg); }

			100% { -webkit-transform: rotate(360deg); }

			}

			@keyframes spin {

			0% { transform: rotate(0deg); }

			100% { transform: rotate(360deg); }

			}

			/* Add animation to "page content" */

			.animate-bottom {

			position: relative;

			-webkit-animation-name: animatebottom;

			-webkit-animation-duration: 1s;

			animation-name: animatebottom;

			animation-duration: 1s

			}

			@-webkit-keyframes animatebottom {

			from { bottom:-100px; opacity:0 }

			to { bottom:0px; opacity:1 }

			}

			@keyframes animatebottom {

			from{ bottom:-100px; opacity:0 }

			to{ bottom:0; opacity:1 }

			}
			
			#myDiv {

			display: none;

			}

			.blink {
				
				color:red;

				animation: blink-animation 1s steps(5, start) infinite;

				-webkit-animation: blink-animation 1s steps(5, start) infinite;

				}

				@keyframes blink-animation {

				to {

				visibility: hidden;

				}

				}

				@-webkit-keyframes blink-animation {

				to {

				visibility: hidden;

				}

				}


		</style>
		
			<script>

		// Loading Page

		var myVar;



		function myFunction() {

		myVar = setTimeout(showPage, 500);

		}



		function showPage() {

		document.getElementById("loader").style.display = "none";

		document.getElementById("myDiv").style.display = "block";

		}

		</script>

<body onload="myFunction()" style="margin:0;">
	<div id="loader"></div>
	<div style="display:none;" id="myDiv" class="animate-bottom">
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="<?=base_url()?>index.php/apps/dashboard"><img class="main-logo" src="<?=base_url()?>kialap/img/logo/logonew1.png" alt=""  height="20"/></a>
                <strong><a href="<?=base_url()?>index.php/apps/dashboard"><img src="<?=base_url()?>kialap/img/logo/logonew.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
					
					<li><a  href="<?=base_url()?>index.php/apps/dashboard"><span class="fa fa-home icon-wrap"></span> Home </a></li>
                             
						<?php if($_SESSION['levelapps']=='administrator' || $_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='adh') { ?>
							
                        <li>
                            <a class="has-arrow" href="#">
								   <span class="fa fa-database icon-wrap"></span>
								   <span class="mini-click-non">Master Data</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a  href="<?=base_url()?>index.php/apps/master/satuan"><span class="mini-sub-pro">BBM</span></a></li>
                                <li><a  href="<?=base_url()?>index.php/apps/master/jenis"><span class="mini-sub-pro">Rute</span></a></li>                                
								<li><a  href="<?=base_url()?>index.php/apps/master/unit"><span class="mini-sub-pro">Driver</span></a></li>
                                <li><a  href="<?=base_url()?>index.php/apps/master/material"><span class="mini-sub-pro">Kendaraan</span></a></li>
								 <li><a  href="<?=base_url()?>index.php/apps/master/customer"><span class="mini-sub-pro">Customer</span></a></li>
                               
                            </ul>
                        </li>
						<?php } ?>
						
					
						
						<?php if($_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='administrator' || $_SESSION['levelapps']=='adh') { ?>						
						
						<?php if($_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='administrator') { ?>	
						<li> <a  href="<?=base_url()?>index.php/apps/transaction/expedition/request/2/adm"><span class="fa fa-check-square icon-wrap"></span> Verifikasi Ekspedisi	</a> </li>
						<?php } ?>
						
						<?php if($_SESSION['levelapps']=='adh') { ?>	
						<li> <a  href="<?=base_url()?>index.php/apps/transaction/expedition/request/3/adh"><span class="fa fa-random icon-wrap"></span> Pending Transfer </a> </li>
						<?php } ?>
						
						<li> <a  href="<?=base_url()?>index.php/apps/transaction/expedition/history"><span class="fa fa-file-text-o icon-wrap"></span> History Ekspedisi	</a> </li>
						
						
						<?php } ?>
						
						<!-- laporan untuk admin masuk dan admin keluar -->
						
						<?php if($_SESSION['levelapps']=='pdi') { ?>
						<li> <a  href="<?=base_url()?>index.php/apps/transaction/expedition"><span class="fa fa-play  icon-wrap"></span> Request Ekspedisi	</a> </li>
						<li><a  href="<?=base_url()?>index.php/apps/transaction/expedition/request/2/pdi"> <span class="fa fa-check-square icon-wrap"></span>  Verifikasi </a></li>
						<li><a  href="<?=base_url()?>index.php/apps/transaction/expedition/history"><span class="fa fa-file-text-o icon-wrap"></span>   History Ekspedisi </a></li>
                      
						<?php } ?>			
						
						
                       <?php if($_SESSION['levelapps']=='administrator' || $_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='adh') { ?>
						
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
							<span class="fa fa-wrench icon-wrap"></span> <span class="mini-click-non">Pengaturan</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
							<?php if($_SESSION['levelapps']=='administrator') { ?>
						
                                <li><a href="<?=base_url()?>index.php/apps/setting/user"><span class="mini-sub-pro">User</span></a></li>
                                <li><a  href="<?=base_url()?>index.php/apps/setting/user/reset_password"><span class="mini-sub-pro"> Reset Password</span></a></li>
							
							<?php } ?>
							
							
							<li><a href="<?=base_url()?>index.php/apps/setting/ongkir"><span class="mini-sub-pro"> Biaya Kirim </span></a></li>                             
								
							
							</ul>
                        </li>
					   <?php } ?>
                   
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="<?=base_url()?>kialap/img/logo/logonew1.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-warning navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<img src="<?=base_url()?>kialap/img/profile/icon.png" alt="" />
															<span class="admin-name"> <?php echo $this->session->userdata('ex_nama');?> <small>(<?php echo $this->session->userdata('levelapps');?>)</small> </span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">                                                       
                                                      <!--  <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Change Password</a>
                                                        </li> -->
                                                        <li><a href="<?=base_url()?>index.php/welcome/logout"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                
                                                       
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
									<?php if($_SESSION['levelapps']=='administrator' || $_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='adh') { ?>
						
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#"> Master Data <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a  href="<?=base_url()?>index.php/apps/master/satuan">BBM</a></li>
												<li><a  href="<?=base_url()?>index.php/apps/master/jenis">Rute</a></li>                                
												<li><a  href="<?=base_url()?>index.php/apps/master/unit">Driver</a></li>
												<li><a  href="<?=base_url()?>index.php/apps/master/material">Kendaraan</a></li>
												<li><a  href="<?=base_url()?>index.php/apps/master/customer">Customer</a></li>
											   
                                            </ul>
                                        </li>
									<?php } ?>
									
									<?php if($_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='administrator' || $_SESSION['levelapps']=='adh') { ?>						
						
									<?php if($_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='administrator') { ?>	
									<li> <a  href="<?=base_url()?>index.php/apps/transaction/expedition/request/2/adm"><span class="fa fa-check-square icon-wrap"></span> Verifikasi Ekspedisi	</a> </li>
									<?php } ?>
									
									<?php if($_SESSION['levelapps']=='adh') { ?>	
									<li> <a  href="<?=base_url()?>index.php/apps/transaction/expedition/request/3/adh"><span class="fa fa-random icon-wrap"></span> Pending Transfer </a> </li>
									<?php } ?>
									
									<li> <a  href="<?=base_url()?>index.php/apps/transaction/expedition/history"><span class="fa fa-file-text-o icon-wrap"></span> History Ekspedisi	</a> </li>
									
									
									<?php } ?>
                                        
										<?php if($_SESSION['levelapps']=='administrator' || $_SESSION['levelapps']=='admin' || $_SESSION['levelapps']=='adh') { ?>
						
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Pengaturan <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <?php if($_SESSION['levelapps']=='administrator') { ?>
						
												<li><a href="<?=base_url()?>index.php/apps/setting/user">User</a></li>
												<li><a  href="<?=base_url()?>index.php/apps/setting/user/reset_password"> Reset Password</a></li>
											
											    <?php } ?>											
											
											    <li><a href="<?=base_url()?>index.php/apps/setting/ongkir">Biaya Kirim </a></li>                             
								
							
                                            </ul>
                                        </li>
										<?php } ?>
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
		
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                 <br>
				  <?php  $this->load->view($main);?>
				
            </div>
        </div>
		 <br><br><br>
        <div class="footer-copyright-area" style="position:fixed; bottom:0; width:100%; margin-top:3000px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2019 Trac Palembang - Ekspedisi | Development by Ardian Saputra</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
    <!-- jquery
		============================================ -->
    <script src="<?=base_url()?>kialap/js/vendor/jquery-1.12.4.min.js"></script>
	 
    <!-- bootstrap JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/bootstrap.min.js"></script>
	
	 <!-- Memanggil file .js untuk proses autocomplete -->
   
    <script type="text/javascript" src="<?php echo base_url();?>kialap/js/autocomplete/js/jquery.autocomplete.js"></script>

    <!-- wow JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?=base_url()?>kialap/js/counterup/waypoints.min.js"></script>
    <script src="<?=base_url()?>kialap/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=base_url()?>kialap/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?=base_url()?>kialap/js/metisMenu/metisMenu-active.js"></script>
	
	 <!-- data table JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/data-table/bootstrap-table.js"></script>
    <script src="<?=base_url()?>kialap/js/data-table/tableExport.js"></script>
    <script src="<?=base_url()?>kialap/js/data-table/data-table-active.js"></script>
    <script src="<?=base_url()?>kialap/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?=base_url()?>kialap/js/data-table/bootstrap-editable.js"></script>
    <script src="<?=base_url()?>kialap/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?=base_url()?>kialap/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?=base_url()?>kialap/js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/editable/jquery.mockjax.js"></script>
    <script src="<?=base_url()?>kialap/js/editable/mock-active.js"></script>
    <script src="<?=base_url()?>kialap/js/editable/select2.js"></script>
    <script src="<?=base_url()?>kialap/js/editable/moment.min.js"></script>
    <script src="<?=base_url()?>kialap/js/editable/bootstrap-datetimepicker.js"></script>
    <script src="<?=base_url()?>kialap/js/editable/bootstrap-editable.js"></script>
    <script src="<?=base_url()?>kialap/js/editable/xediable-active.js"></script>
	
	
    <!-- morrisjs JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/morrisjs/raphael-min.js"></script>
    <script src="<?=base_url()?>kialap/js/morrisjs/morris.js"></script>
    <script src="<?=base_url()?>kialap/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?=base_url()?>kialap/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?=base_url()?>kialap/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/calendar/moment.min.js"></script>
    <script src="<?=base_url()?>kialap/js/calendar/fullcalendar.min.js"></script>
    <script src="<?=base_url()?>kialap/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/main.js"></script>
	
	  <!-- icheck JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/icheck/icheck.min.js"></script>
    <script src="<?=base_url()?>kialap/js/icheck/icheck-active.js"></script>
	
	<!-- datapicker JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/datapicker/bootstrap-datepicker.js"></script>
	<script src="<?=base_url()?>kialap/js/datapicker/datepicker-active.js"></script>
	
	  <!-- chosen JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/chosen/chosen.jquery.js"></script>
    <script src="<?=base_url()?>kialap/js/chosen/chosen-active.js"></script>
	

   
       <!-- ONLY NUMBER -->
<script language="javascript">

function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
	
</body>

</html>