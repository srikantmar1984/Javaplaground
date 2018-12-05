<?php 
include 'session_check.php';
include 'schoolclass.php'; 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EduWorld | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="bootstrap/font-awesome.css" rel="stylesheet" type="text/css"/>
  <link href="bootstrap/ionicons.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>W</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Edu</b>World</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user-icon-6.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["user_name"] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user-icon-6.png" class="img-circle" alt="User Image">

                <p>
                  Teacher                
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
              <a href="logout.php"><i class="ion-log-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user-icon-6.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["user_name"] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="dropdown messages-menu">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Administration</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
                <li><a href="#" onclick=openUrl("changepsw.php")><i class="fa fa-circle-o"></i>Change Password</a></li>
                <li><a href="#" onclick=openUrl("users.php")><i class="fa fa-circle-o"></i>Users</a></li>
                <li><a href="#" onclick=openUrl("masterdtls.php")><i class="fa fa-circle-o"></i>Master Details</a></li>
          </ul>
        </li>
       
        <li class="dropdown messages-menu">
          <a href="#">
            <i class="fa fa-share"></i> <span>Process</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick=openUrl("studententry.php")><i class="fa fa-circle-o"></i>Student Entry</a></li>

            <li><a href="#" onclick=openUrl("studentFile.php")><i class="fa fa-circle-o"></i>Student File Upload</a></li>
            <li><a href="#" onclick=openUrl("editstud.php")><i class="fa fa-circle-o"></i>Edit Details</a></li>
            <li><a href="#" onclick=openUrl("studentdetails.php")><i class="fa fa-circle-o"></i>Student Details</a></li>
                
          </ul>
        </li>
        <li class="dropdown messages-menu">
          <a href="#">
            <i class="fa fa-calculator"></i> <span>Reports</span>
            <i class="fa fa-book pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick=openUrl("statusreport.php")><i class="fa fa-circle-o"></i>Status Report</a></li>
            
            
            
          </ul>
        </li>
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="display_content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content" >
      <?php ?>
      <div class="row" >
        <div class="col-lg-6 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Applications</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $scl->getTotstud()?></h3>

              <p>Student Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      
      </div>
  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2016 Edu World</strong> All rights
    reserved.
  </footer>
 <form id="excel" target="iframe" action="Export.php" method="post">
                <input id="htmlData" name="Content" type="hidden" value="">
                <input id="act" name="act" type="hidden" value="">
            <iframe id="iframe" style="display:none" >
            </iframe>
            </form>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  	function openUrl(vUrl)
		{
                    //alert(vUrl);
			$("#display_content").empty();
			$("#display_content").html('');
			
			   $.post(vUrl, function(data)
				{
						$("#display_content").html('');
				 		$("#display_content").html(data);
					
                                });
			
		}

	
</script>






<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="bootstrap/js/exportToExcel.js"></script>

</body>
</html>

