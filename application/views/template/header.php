<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<?php echo assets::icon('apple-icon.png'); ?>
	<?php echo assets::icon('favicon.png'); ?>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>RSU AVISENA</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->

    <?php echo assets::css('bootstrap.min.css'); ?>
    <?php echo assets::css('dataTables.bootstrap.css'); ?>
	<?php echo assets::css('bootstrap-datepicker3.min.css');?>
    <?php echo assets::css('select2.min.css'); ?>
    <?php echo assets::css('animate.min.css'); ?>
    <?php echo assets::css('paper-dashboard.css'); ?>
    <?php echo assets::css('themify-icons.css'); ?>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo base_url('layanan?d=active');?>" class="simple-text">
				<center><?php echo assets::images('rs-avisena-logo.jpg'); ?></center>
                </a>
            </div>
			<!--Menu-->
<ul class="nav">
                <li class="<?php if(isset($_GET['d'])){echo 'active';} ?>">
                    <a href="<?php echo base_url('layanan?d=o');?>">
                        <i class="ti-home"></i>
                        <p>Home</p>
                    </a>
                </li>
				<!-- <li class="<?php #if(isset($_GET['p'])){echo 'active';} ?>">
                    <a href="<?php # echo base_url('layanan/pasien?p=o');?>">
                        <i class="ti-user"></i>
                        <p>Data Pasien</p>
                    </a>
                </li> -->
				<li class="<?php if(isset($_GET['f'])){echo 'active';} ?>">
                    <a href="<?php echo base_url('layanan/form-transaksi?f=o')?>">
                        <i class="ti-pencil-alt"></i>
                        <p>Form pasien</p>
                    </a>
                </li>
				<!-- <li class="<?php if(isset($_GET['t'])){echo 'active';} ?>">
                    <a href="<?php echo base_url('layanan/form-transaksi?t=o')?>">
                        <i class="ti-layers-alt"></i>
                        <p>Form Transaksi</p>
                    </a>
                </li> -->
				<li class="<?php if(isset($_GET['l'])){echo 'active';} ?>">
                    <a href="<?php echo base_url('layanan/laporan?l=o')?>">
                        <i class="ti-files"></i>
                        <p>Data Laporan</p>
                    </a>
                </li>
				<li class="<?php if(isset($_GET['m'])){echo 'active';} ?>">
                    <a href="<?php echo base_url('layanan/logout?m=o')?>">
                        <i class="ti-lock"></i>
                        <p>Logout</p>
                    </a>
                </li>
</ul>
			<!--end menu -->
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
					<?php
	if(isset($_GET['d']))
	{
		echo'<a class="navbar-brand" href="#">HOME</a>';		
	}
	if(isset($_GET['p']))
	{
		echo'<a class="navbar-brand" href="#">DATA PASIEN</a>';		
	}
	if(isset($_GET['f']))
	{
		echo'<a class="navbar-brand" href="#">FORM PASIEN</a>';		
	}
	if(isset($_GET['t']))
	{
		echo'<a class="navbar-brand" href="#">FORM TRANSAKSI</a>';		
	}
	if(isset($_GET['l']))
	{
		echo'<a class="navbar-brand" href="#">DATA LAPORAN</a>';		
	}
					?>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li class="<?php if(isset($_GET['s'])){echo 'active';} ?>">
                            <a href="<?php echo base_url('layanan/settings?s=o');?>">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
