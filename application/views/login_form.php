<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Masuk Ekspedisi |  Trac Palembang</title>
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

    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/main.css">



    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>kialap/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
body {
background:url(<?=base_url()?>kialap/img/city.png) #364150 ;	

}

h3 {
	font-color:white;
}
</style>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3 style="color:#ccc"> </h3>
				<p> </p>
			</div>
			
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
					<center><img src="<?=base_url()?>kialap/img/logo/logonew.png"></center>
					<br> 
					<?=$this->session->flashdata('sukses');?>
					
                        <form action="<?=base_url()?>index.php/welcome/do_login" id="loginForm" method="post">
						
						
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Silahkan masukan username"name="username"  class="form-control">
                               
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password"  placeholder="Silahkan masukan password"  name="password" class="form-control">
                                <span class="help-block small"> &nbsp; </span>
                            </div>
                            
                            <button  type="submit" class="btn btn-primary btn-bloc pull-right loginbtn">Masuk</button>
                            
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p style="color:#999">Copyright © 2019 Trac Palembang | Ekspedisi </p>
			</div>
		</div>   
    </div>
    <!-- jquery
		============================================ -->
    <script src="<?=base_url()?>kialap/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?=base_url()?>kialap/js/bootstrap.min.js"></script>

</body>

</html>