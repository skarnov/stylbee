<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<html>
    <head>
        <meta charset="utf-8" />
        <title>Stylbee Administrator</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url();?>admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/css/style-default.css" rel="stylesheet" id="style_color" />
        <link href="<?php echo base_url();?>admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <script>
            function check_delete()
            {
                var chk=confirm('Are You Want To Delete This');
                if(chk)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        </script>
    </head>

    <body class="fixed-top">
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <div class="sidebar-toggle-box hidden-phone">
                        <div class="icon-reorder"></div>
                    </div>
                    <a class="brand" href="">
                        <img src="<?php echo base_url();?>images/stylbee.png" alt="" style="margin-top: -5%;" />
                    </a>
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="username"><?php echo $this->session->userdata('admin_name');?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <li><a href="<?php echo base_url();?>super_admin/logout">Logout</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar-scroll">
                <div id="sidebar" class="nav-collapse collapse">
                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                    <div class="navbar-inverse">
                        <form class="navbar-search visible-phone">
                            <input type="text" class="search-query" placeholder="Search" />
                        </form>
                    </div>
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="sidebar-menu">
                        <li class="sub-menu active">
                            <a class="" href="<?php echo base_url();?>super_admin">
                                <i class="icon-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url();?>" target="_blank">
                                <i class="icon-user"></i>
                                <span>View Website</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-book"></i>
                                <span>Category Manager</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo base_url(); ?>super_admin/add_category">And Category</a></li>
                                <li><a class="" href="<?php echo base_url(); ?>super_admin/add_subcategory">Add Subcategory</a></li>
                                <li><a class="" href="<?php echo base_url(); ?>super_admin/manage_category">Manage Category</a></li>
                                <li><a class="" href="<?php echo base_url(); ?>super_admin/manage_subcategory">Manage Subcategory</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="<?php echo base_url(); ?>super_admin/manage_slider" class="">
                                <i class="icon-fire"></i>
                                <span>Slider Control</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-book"></i>
                                <span>Brand Manager</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo base_url(); ?>super_admin/add_brand">And Brand</a></li>                                
                                <li><a class="" href="<?php echo base_url(); ?>super_admin/manage_brand">Manage Brand</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-book"></i>
                                <span>Product Manager</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo base_url(); ?>super_admin/add_product">And Product</a></li>
                                <li><a class="" href="<?php echo base_url(); ?>super_admin/manage_product">Manage Product</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="<?php echo base_url(); ?>super_admin/manage_customer" class="">
                                <i class="icon-cogs"></i>
                                <span>Customer Manager</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="<?php echo base_url(); ?>super_admin/manage_order" class="">
                                <i class="icon-th"></i>
                                <span>Order Manager</span>
                            </a>
                        </li>
                        </hr>
                        <li class="sub-menu">
                            <a href="<?php echo base_url(); ?>super_admin/about_cms" class="red-box">
                                <i class="icon-fire"></i>
                                <span>About CMS</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->  
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->   
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h3 class="page-title">
                                Dashboard
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="<?php echo base_url();?>">Home</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Dashboard
                                </li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <!--BEGIN METRO STATES-->
                        <div class="metro-nav">
                            <div class="metro-nav-block nav-block-orange">
                                <a data-original-title="" href="<?php echo base_url(); ?>super_admin/add_product">
                                    <i class="icon-user"></i>
                                    <div class="info"></div>
                                    <div class="status">Add Product</div>
                                </a>
                            </div>
                            <div class="metro-nav-block nav-block-yellow">
                                <a data-original-title="" href="<?php echo base_url(); ?>super_admin/add_subcategory">
                                    <i class="icon-tags"></i>
                                    <div class="info"></div>
                                    <div class="status">Add Subcategory</div>
                                </a>
                            </div>
                            <div class="metro-nav-block nav-block-grey">
                                <a data-original-title="" href="<?php echo base_url(); ?>super_admin/add_brand">
                                    <i class="icon-comments-alt"></i>
                                    <div class="info"></div>
                                    <div class="status">Add Brand</div>
                                </a>
                            </div>
                            <div class="metro-nav-block nav-block-blue double">
                                <a data-original-title="" href="<?php echo base_url(); ?>super_admin/manage_order">
                                    <i class="icon-eye-open"></i>
                                    <div class="info"></div>
                                    <div class="status">Manage Orders</div>
                                </a>
                            </div>
                            <div class="metro-nav-block nav-block-red">
                                <a data-original-title="" href="<?php echo base_url(); ?>super_admin/manage_slider">
                                    <i class="icon-bar-chart"></i>
                                    <div class="info"></div>
                                    <div class="status">Slider Manager</div>
                                </a>
                            </div>
                        </div>
                        <div class="space10"></div>
                        <!--END METRO STATES-->
                    </div>
                    <?php echo $dashboard;?>
                    <!-- END PAGE CONTENT-->         
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div id="footer">
            2014 &copy; Developed By Arnov.
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script src="<?php echo base_url();?>admin/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url();?>admin/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script type="<?php echo base_url();?>admin/text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
        <script type="<?php echo base_url();?>admin/text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url();?>admin/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url();?>admin/assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>admin/js/excanvas.js"></script>
        <script src="<?php echo base_url();?>admin/js/respond.js"></script>
        <![endif]-->
        <script src="<?php echo base_url();?>admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>admin/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>admin/assets/chart-master/Chart.js"></script>
        <!--common script for all pages-->
        <script src="<?php echo base_url();?>admin/js/common-scripts.js"></script>
        <!--script for this page only-->
        <script src="<?php echo base_url();?>admin/js/easy-pie-chart.js"></script>
        <script src="<?php echo base_url();?>admin/js/sparkline-chart.js"></script>
        <script src="<?php echo base_url();?>admin/js/home-page-calender.js"></script>
        <script src="<?php echo base_url();?>admin/js/chartjs.js"></script>
        <!-- END JAVASCRIPTS -->   
    </body>
</html>