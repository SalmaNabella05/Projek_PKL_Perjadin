<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/pages/dashboard.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <div class="navbar navbar-fixed-top" style="position:fixed;">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
                <a class="brand" href="#"><img src="<?= base_url(); ?>assets/img/logoblok.png" width="75px">&nbsp;SISTEM MONITORING PERJALANAN DINAS</a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="label label-warning" style="font-size: 12pt;" id="notif"><i class="icon-medium icon-bell"></i>&nbsp;<?= $notif; ?></span>
                            </a>
                            <ul class="dropdown-menu" id="list">

                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 14pt;"><i class="icon-user"></i> Hi, <?php echo $this->session->userdata('nama'); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url(); ?>CSupervisor/pengaturan_akun/<?= $_SESSION['id_user'] ?>" style="font-size: 12pt;"><i class="icon-wrench"></i> Pengaturan</a></li>
                                <li><a href="<?= base_url(); ?>CLogin/logout" onclick="return confirm('Apakah anda yakin ingin keluar ?')" style="font-size: 12pt;"><i class="icon-signout"></i> Keluar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar-inner -->
    </div>