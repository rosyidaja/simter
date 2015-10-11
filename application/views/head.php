 <!DOCTYPE html>
<html lang="en">
   
 <head>
        <meta charset="utf-8" />
        <title>Dashboard - Ace Admin</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--basic styles-->

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- Tree Menu -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/treemenu/css/tree.css" media="all" />
        <!--page specific plugin styles-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/colorpicker.css" />
        <!--fonts-->



        <!--ace styles-->

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
        <![endif]-->

        <!--inline styles related to this page-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a href="#" class="brand">
                        <small>
                            <i class="icon-leaf"></i>
                            D'Blue Farm
                        </small>
                    </a><!--/.brand-->
                </div><!--/.container-fluid-->
            </div><!--/.navbar-inner-->
        </div>
          <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <div class="sidebar" id="sidebar">
                <ul class="nav nav-list">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>">
                            <i class="icon-dashboard"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                           <i class="icon-cog"></i>
                            <span class="menu-text"> PENGATURAN </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="<?php echo site_url('setting'); ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manajemen Pengguna
                                    </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('setting/header'); ?>">
                                    <i class="icon-double-angle-right"></i>
                                   Header Laporan
                                </a>
                            </li>

                            <li>
                                <a href="treeview.html">
                                    <i class="icon-double-angle-right"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-desktop"></i>
                            <span class="menu-text"> DATA MASTER </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="<?php echo site_url('burung');?>">
                                    <i class="icon-double-angle-right"></i>
                                    Data Burung
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('kandang');?>">
                                    <i class="icon-double-angle-right"></i>
                                    Kandang
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('anakan');?>">
                                    <i class="icon-double-angle-right"></i>
                                    Anakan
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('indukan');?>">
                                    <i class="icon-double-angle-right"></i>
                                    Indukan
                                </a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-desktop"></i>
                            <span class="menu-text"> TRANSAKSI </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="elements.html">
                                    <i class="icon-double-angle-right"></i>
                                    Kandang
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('anakan/export_print'); ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Anakan
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('indukan/export_print'); ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Materi Indukan
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul><!--/.nav-list-->

                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="icon-double-angle-left"></i>
                </div>
            </div>