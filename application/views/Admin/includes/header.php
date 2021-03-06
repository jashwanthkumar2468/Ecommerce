<?php

$adminId = '';
$adminId = $this->session->userdata('AdminId');
if($adminId == '')
{
  redirect(base_url().'EcoDashAdmin/SignOut');
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ecommerce Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('backendassets') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url('backendassets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
  var base_url = '<?php echo base_url(); ?>';
  </script>
</head>
<style>
    .btn-primary{
        background-color:black; 
    }
    .btn-primary:hover{
        background-color:#492c10;
    }
    .btn-danger{
        border:1px solid #492c10;;
        background-color:#492c10;
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('EcoDashAdmin/Dashboard'); ?>" class="logo">
      <span class="logo-lg">Premlal Jewellery</span>
   <!-- <span class="logo-mini"><img src="<?php echo base_url('frontendassets');?>/images/ggl.jpg" class="img img-responsive"></span>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      
      <!-- logo for regular state and mobile devices
      <span class="logo-lg"><b></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background:black">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url('EcoDashAdmin/SignOut'); ?>" class="dropdown-toggle">Sign Out</a>
            
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background:black">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel 
      <div class="user-panel">
        <div class="pull-left image">
          <!--<img src="<?php echo base_url('frontendassets');?>/images/ggl.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url('EcoDashAdmin/Dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <!--<li><a href="<?php echo base_url('EcoDashAdmin/Categories') ?>"><i class="fa fa-tags fw"></i> <span>Categories</span></a></li>-->
		    
        <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tags fw"></i> 
                            <span>Categories</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview" >
                                <a href="<?php echo base_url('EcoDashAdmin/Categories') ?>">
                                    <i class="fa fa-angle-double-right"></i>
                                    <span>Main Menu</span>
                                </a>
                                    
                            </li>
                             <li class="treeview" >
                                <a href="<?php echo base_url('EcoDashAdmin/SubMenu') ?>">
                                    <i class="fa fa-angle-double-right"></i>
                                    <span>Sub Menu</span>
                                </a>
                                    
                            </li>
                            <li class="treeview" >
                                <a href="<?php echo base_url('EcoDashAdmin/SubMenuList') ?>">
                                    <i class="fa fa-angle-double-right"></i>
                                    <span>Sub Menu List</span>
                                </a>
                                    
                            </li>
                          </ul>  
		    </li>
			<!-- making charges tree view -->
			<li class="treeview">
                        <a href="#">
                            <i class="fa fa-tags fw"></i> 
                            <span>Making Charges Menu</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview" >
                                <a href="<?php echo base_url('EcoDashAdmin/MakingCharges') ?>">
                                    <i class="fa fa-angle-double-right"></i>
                                    <span>Making Charges</span>
                                </a>
                                    
                            </li>
                             <li class="treeview" >
                                <a href="<?php echo base_url('EcoDashAdmin/addweights') ?>">
                                    <i class="fa fa-angle-double-right"></i>
                                    <span>Add Weights</span>
                                </a>
                                    
                            </li>
                            <li class="treeview" >
                                <a href="<?php echo base_url('EcoDashAdmin/StyleModel') ?>">
                                    <i class="fa fa-angle-double-right"></i>
                                    <span>Add Style-Model</span>
                                </a>
                                    
                            </li>
                          </ul>  
		    </li>
			<!-- making charges tree view -->
			
			
			
			
			
			
			
			<!--<li><a href="<?php echo base_url('EcoDashAdmin/addweights') ?>"><i class="fa fa-dashboard"></i> <span>Add Weights</span></a></li>
		<li><a href="<?php echo base_url('EcoDashAdmin/Stone_type1') ?>"><i class="fa fa-dashboard"></i> <span>Add Stones</span></a></li>
			
        <li><a href="<?php echo base_url('EcoDashAdmin/StyleModel') ?>"><i class="fa fa-dashboard"></i> <span>Add Style-Model</span></a></li>-->
		
		<li><a href="<?php echo base_url('EcoDashAdmin/Products') ?>"><i class="fa fa-dashboard"></i> <span>Products</span></a></li>
		
		 <li><a href="<?php echo base_url('EcoDashAdmin/StoneCategories') ?>"><i class="fa fa-dashboard"></i> <span>Stone Categories</span></a></li>	
		 
		 
		 
        <!--<li><a href="<?php echo base_url('EcoDashAdmin/Orders') ?>"><i class="fa fa-dashboard"></i> <span>Orders</span></a></li>-->

        <!--<li><a href="<?php echo base_url('EcoDashAdmin/UpdateGoldRate') ?>"><i class="fa fa-dashboard"></i> <span>Update Gold Rate</span></a></li>--> 
        <!--  <li><a href="<?php echo base_url('EcoDashAdmin/Stone_type') ?>"><i class="fa fa-dashboard"></i> <span>Stone Type</span></a></li>   -->
        <!--<li><a href="<?php echo base_url('EcoDashAdmin/Carat_type') ?>"><i class="fa fa-dashboard"></i> <span>Carat Type</span></a></li>      
        <li><a href="<?php echo base_url('EcoDashAdmin/MakingCharges') ?>"><i class="fa fa-dashboard"></i> <span>Making Charges</span></a></li>   -->   
         
		 <li><a href="<?php echo base_url('EcoDashAdmin/RegisteredUsers') ?>"><i class="fa fa-dashboard"></i> <span>RegisteredUsers</span></a></li>
		 
		 <li><a href="<?php echo base_url('EcoDashAdmin/StaffMembers') ?>"><i class="fa fa-dashboard"></i> <span>Staff Members</span></a></li>
		 
		 <li><a href="<?php echo base_url('EcoDashAdmin/AssignedUsers') ?>"><i class="fa fa-dashboard"></i> <span>Assigned Users</span></a></li>
		 
		 <li><a href="<?php echo base_url('EcoDashAdmin/UserOrders') ?>"><i class="fa fa-dashboard"></i> <span>User Orders</span></a></li>
		   
        <!--
		<li class="treeview"> 
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manage Companies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
		-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<style>
@media only screen and (max-width: 500px) {
	.table-container{
		border-right-width: 1px;
		bottom: 0;
		display: block;
		left: 0;
		overflow-x: scroll;
		overflow-y: auto;
		padding: 0;
		transition: all 0.2s ease 0s;
		width: 250px;
		z-index: 1000;
	}
}
</style>

<script type="text/javascript">
    setTimeout(function(){$('.sidebar-toggle').trigger('click');},0);
</script>