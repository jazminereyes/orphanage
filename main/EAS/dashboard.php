<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Dashboard</title>
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <style type="text/css">
    .bg-custom{
      background-color: #376742;
      color: white;
    }
  </style>

  <!-- SCRIPTS -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/adminlte.js"></script>
    <script src="../../dist/js/demo.js"></script>
    <script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../../plugins/chartjs-old/Chart.min.js"></script>
    <script src="../../dist/js/pages/dashboard2.js"></script>
  <!-- SCRIPTS -->

    <script src="../chart.js/dist/Chart.bundle.js"></script>
	<script src="../chart.js/samples/utils.js"></script>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand sidebar-dark-primary navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="color: white"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-cogs"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <center>
        <img src="../icons/Concordia.jpg"><br/>
        <span class="font-weight-light">EAS</span><br/>
        <span class="brand-text font-weight-light" style="font-size: 65%">(Educational Assistance Through Scholarship)</span>
      </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <?php
                $uid = $_SESSION['userid'];
                require ('backend/dbconnect.php');

                $query = "SELECT firstName, lastName from PERSON JOIN USER ON person.personID = user.personID WHERE userID = '$uid' AND programType = 'EAS'";
                $result = mysqli_query($con, $query);

                if ($result)
                {
                    $row = mysqli_fetch_array($result);
                    echo "<a href='#' class='d-block'>".$row['firstName']." ".$row['lastName']."</a>";
                }
            ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Maintenance
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="scholar.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sponsor.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sponsor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Application
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="app_scholar.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="app_sponsor.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sponsor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-archive"></i>
              <p>
                Inventory
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="list.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="receive.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive through Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="release.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="budget.php" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Scholar Budget
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reports.php" class="nav-link">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Sign Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Scholar Applications</span>
                <?php
                    require ('backend/dbconnect.php');

                    $query = "SELECT COUNT(scholarID) AS total FROM scholar WHERE applicationStatus = 'Pending'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_row($result);

                    if ($row[0]>0)
                    {
                      echo '<span class="info-box-number">
                      '.$row[0].'
                      <small><a href="app_scholar.php" class="pull-right"><button class="btn btn-danger btn-sm">View</button></a></small></span>';
                    }

                    else
                    {
                      echo '<span class="info-box-number">
                      '.$row[0].'
                      </span>';
                    }
                ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-folder-open text-light"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sponsor Applications</span>
                <?php
                    require ('backend/dbconnect.php');

                    $query = "SELECT COUNT(sponsorID) AS total FROM sponsor WHERE applicationStatus = 'P'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_row($result);

                    if ($row[0]>0)
                    {
                      echo '<span class="info-box-number">
                      '.$row[0].'
                      <small><a href="app_sponsor.php" class="pull-right"><button class="btn btn-warning btn-sm">View</button></a></small></span>';
                    }

                    else
                    {
                      echo '<span class="info-box-number">
                      '.$row[0].'
                      </span>';
                    }
                ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Current No. of Scholars</span>
                
                <?php
                  $a = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted'";
                  $b = mysqli_query($con, $a);
                  $c = mysqli_fetch_row($b);

                  if ($c[0]>0)
                  {
                    echo '<span class="info-box-number">
                    '.$c[0].'
                  <small><a href="scholar.php" class="pull-right"><button class="btn btn-info btn-sm">View</button></a></small></span>';
                  }

                  else
                  {
                    echo '<span class="info-box-number">
                      '.$c[0].'
                      </span>';
                  }
                ?>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users text-light"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Current No. of Sponsors</span>
                <?php
                    require ('backend/dbconnect.php');

                    $query = "SELECT COUNT(sponsorID) AS total FROM sponsor WHERE activeFlag = 1";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_row($result);

                    if ($row[0]>0)
                    {
                      echo '<span class="info-box-number">
                      '.$row[0].'
                      <small><a href="sponsor.php" class="pull-right"><button class="btn btn-success btn-sm">View</button></a></small></span>';
                    }

                    else
                    {
                      echo '<span class="info-box-number">
                      '.$row[0].'
                      </span>';
                    }
                ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- row -->

          <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-custom">
                <h3 class="card-title">Recently Accepted Scholars</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <th>Name</th>
                  <th>Current Year Level</th>

                  <?php

                    $q = "SELECT scholarID, firstName, lastName, currentYrLevel FROM person JOIN scholar ON person.personID = scholar.personID WHERE applicationStatus = 'Accepted' ORDER BY scholar.scholarID desc LIMIT 5";
                    $r = mysqli_query($con, $q);
                    
                    while ($s = mysqli_fetch_array($r))
                    {
                      $yrlvl = $s['currentYrLevel'];
            
            if($yrlvl == "Elem_G1"){
                $yrlvl = "Elementary - Grade 1";
            }
            elseif($yrlvl == "Elem_G2"){
                $yrlvl = "Elementary - Grade 2";
            }
            elseif($yrlvl == "Elem_G3"){
                $yrlvl = "Elementary - Grade 3";
            }
            elseif($yrlvl == "Elem_G4"){
                $yrlvl = "Elementary - Grade 4";
            }
            elseif($yrlvl == "Elem_G5"){
                $yrlvl = "Elementary - Grade 5";
            }
            elseif($yrlvl == "Elem_G6"){
                $yrlvl = "Elementary - Grade 6";
            }
            elseif($yrlvl == "HS_G7"){
                $yrlvl = "High School - Grade 7";
            }
            elseif($yrlvl == "HS_G8"){
                $yrlvl = "High School - Grade 8";
            }
            elseif($yrlvl == "HS_G9"){
                $yrlvl = "High School - Grade 9";
            }
            elseif($yrlvl == "HS_G10"){
                $yrlvl = "High School - Grade 10";
            }
            elseif($yrlvl == "SHS_G11"){
                $yrlvl = "Senior High School - Grade 11";
            }
            elseif($yrlvl == "SHS_G12"){
                $yrlvl = "Senior High School - Grade 12";
            }

                      echo '<tr>';
                      echo '<td><a href="viewscholar.php?scholarid='.$s['scholarID'].'">'.$s['firstName'].' '.$s['lastName'].'</a></td>';
                      echo '<td>'.$yrlvl.'</td>';
                      echo '</tr>';
                    }
                  ?>
                </table>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-custom">
                <h3 class="card-title">Recently Accepted Sponsors</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <th>Name</th>
                  <th>Country</th>

                  <?php
                    $q = "SELECT sponsorID, firstName, lastName, country FROM person JOIN sponsor ON person.personID = sponsor.personID WHERE applicationStatus = 'A' ORDER BY sponsorID desc LIMIT 5";
                    $r = mysqli_query($con, $q);
                    
                    while ($s = mysqli_fetch_array($r))
                    {
                      echo '<tr>';
                      echo '<td><a href="viewsponsor.php?sponsorid='.$s['sponsorID'].'">'.$s['firstName'].' '.$s['lastName'].'</a></td>';
                      echo '<td>'.$s['country'].'</td>';
                      echo '</tr>';
                    }
                  ?>
                </table>
              </div>

            </div>
          </div>
        </div><!-- row -->

         <!--CHARTS-->
         <div class="row">
          <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">Current Number of Elementary Scholars</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
		              <canvas id="canvas1"></canvas>
                </div>
                
                <?php
                  $d = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND currentYrLevel LIKE '%Elem%'";
                  $e = mysqli_query($con, $d);
                  $f = mysqli_fetch_row($e);

                  echo '<br/><p><strong>Total Count: </strong>'.$f[0].'</p>';
                ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">Current Number of High School Scholars</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
		              <canvas id="canvas2"></canvas>
                </div>
                
                <?php
                  $g = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND currentYrLevel LIKE '%HS%'";
                  $h = mysqli_query($con, $g);
                  $i = mysqli_fetch_row($h);

                  echo '<br/><p><strong>Total Count: </strong>'.$i[0].'</p>';
                ?>
              </div>
            </div>
          </div>
        
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">Sponsors per Donation Type</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
		              <canvas id="canvas3"></canvas>
                </div>
                
                <?php
                  echo '<br/><p><strong>Total Count: </strong>'.$row[0].'</p>';
                ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">Accepted Scholars Per Year</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
		              <canvas id="canvas4"></canvas>
                </div>
                
                <?php
                  $j = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' OR applicationStatus = 'Graduated'";
                  $k = mysqli_query($con, $j);
                  $l = mysqli_fetch_row($k);

                  echo '<br/><p><strong>Total Count: </strong>'.$l[0].'</p>';
                ?>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">Inventory Release and Receive Per Month</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
		              <canvas id="canvas5"></canvas>
                </div>
            
              </div>
            </div>
          </div>
        </div>
            

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-custom">
                <h3 class="card-title">Recently Released Supplies</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <th>Date Released</th>
                  <th>Item Name</th>
                  <th>Quantity</th>
                  <th>Released By</th>
                  <th>Released To</th>

                  <?php
                    $q = "SELECT firstName, lastName, releaseDate, purpose, quantity, receivedBy, exp.budgetID FROM s_expensestatement as exp JOIN s_budget AS bud ON exp.budgetID = bud.budgetID JOIN scholar on bud.scholarID = scholar.scholarID JOIN person on scholar.personID = person.personID ORDER BY statementID desc LIMIT 5";
                    $r = mysqli_query($con, $q);
                    
                    while ($s = mysqli_fetch_array($r))
                    {
                      echo '<tr>';
                      echo '<td>'.$s['releaseDate'].'</td>';
                      echo '<td>'.$s['purpose'].'</td>';
                      echo '<td>'.$s['quantity'].'</td>';
                      echo '<td>'.$s['receivedBy'].'</td>';
                      echo '<td>'.$s['firstName'].' '.$s['lastName'].'</a></td>';
                      echo '</tr>';
                    }
                  ?>
                </table>
              </div>

            </div>
          </div>
        </div>

        

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<script>
   var getG1 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G1%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getG2 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G2%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getG3 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G3%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };
    
    var getG4 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G4%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getG5 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G5%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getG6 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G6%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						getG1(),
            getG2(),
            getG3(),
            getG4(),
            getG5(),
            getG6()
					],
					backgroundColor: [
						"#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", window.chartColors.red
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Grade 1',
					'Grade 2',
					'Grade 3',
					'Grade 4',
					'Grade 5',
          'Grade 6'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};


    var getG7 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G7%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };
    
    var getG8 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G8%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getG9 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G9%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getG10 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G10%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getG11 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G11%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getG12 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE currentYrLevel LIKE '%G12%' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

		var config2 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						getG7(),
            getG8(),
            getG9(),
            getG10(),
            getG11(),
            getG12()
					],
					backgroundColor: [
						"#B78338", "#915C4C","#40686A","#5580A0","#E3A6A1", "#19B3B1"
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Grade 7',
					'Grade 8',
					'Grade 9',
					'Grade 10',
					'Grade 11',
          'Grade 12'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};


    var getEM = function(){
      return <?php
        $gn = "SELECT COUNT(sponsorID) FROM sponsor WHERE donationType = 'EM' AND activeFlag = 1";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getEY = function(){
      return <?php
        $gn = "SELECT COUNT(sponsorID) FROM sponsor WHERE donationType = 'EY' AND activeFlag = 1";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getHSM = function(){
      return <?php
        $gn = "SELECT COUNT(sponsorID) FROM sponsor WHERE donationType = 'HSM' AND activeFlag = 1";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getHSY = function(){
      return <?php
        $gn = "SELECT COUNT(sponsorID) FROM sponsor WHERE donationType = 'HSY' AND activeFlag = 1";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

		var config3 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						getEM(),
            getEY(),
            getHSM(),
            getHSY()
					],
					backgroundColor: [
						"#F2DD66", "#9A1B27","#747BA9","#3B3857"
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Elementary - Monthly',
					'Elementary - Yearly',
					'High School - Monthly',
					'High School - Yearly'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

    var getE2015 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND admissionDate LIKE '2015-%-%' AND currentYrLevel LIKE '%Elem%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getE2018 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND admissionDate LIKE '2018-%-%' AND currentYrLevel LIKE '%Elem%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getE2016 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND admissionDate LIKE '2016-%-%' AND currentYrLevel LIKE '%Elem%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getE2017 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND admissionDate LIKE '2017-%-%' AND currentYrLevel LIKE '%Elem%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getH2015 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND admissionDate LIKE '2015-%-%' AND currentYrLevel LIKE '%HS%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getH2018 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND admissionDate LIKE '2018-%-%' AND currentYrLevel LIKE '%HS%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getH2016 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND admissionDate LIKE '2016-%-%' AND currentYrLevel LIKE '%HS%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getH2017 = function(){
      return <?php
        $gn = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted' AND admissionDate LIKE '2017-%-%' AND currentYrLevel LIKE '%HS%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var color = Chart.helpers.color;
		var barChartData = {
			labels: ['2015', '2016', '2017', '2018'],
			datasets: [{
				label: 'Elementary',
				backgroundColor: "#B2D6CA",
				borderColor: "#B2D6CA",
				borderWidth: 1,
				data: [
					getE2015(),
					getE2016(),
					getE2017(),
					getE2018()
				]
			}, {
				label: 'High School',
				backgroundColor: "#FE5858",
				borderColor: "#FE5858",
				borderWidth: 1,
				data: [
					getH2015(),
					getH2016(),
					getH2017(),
					getH2018()
				]
			}]

		};

    var getRel1 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-01-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel2 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-02-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel3 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-03-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel4 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-04-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel5 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-05-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel6 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-06-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel7 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-07-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel8 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-08-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel9 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-09-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel10 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-10-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel11 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-11-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRel12 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '2018-12-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    //
    var getRec1 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-01-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

   var getRec2 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-02-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec3 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-03-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec4 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-04-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec5 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-05-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec6 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-06-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec7 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-07-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec8 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-08-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec9 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-09-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec10 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-10-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec11 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-11-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    var getRec12 = function(){
      return <?php
        $gn = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '2018-12-%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $a = $disp[0];
        echo $a;
      ?>;
    };

    

    var config5 = {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					label: 'Released Items',
					backgroundColor: "#FFA289",
					borderColor: "#FFA289",
					data: [
						getRel1(),
						getRel2(),
						getRel3(),
						getRel4(),
						getRel5(),
						getRel6(),
						getRel7(),
            getRel8(),
            getRel9(),
            getRel10(),
            getRel11(),
            getRel12()
					],
					fill: false,
				}, {
					label: 'Received Items',
					fill: false,
					backgroundColor: "#50293C",
					borderColor: "#50293C",
					data: [
						getRec1(),
						getRec2(),
						getRec3(),
						getRec4(),
						getRec5(),
						getRec6(),
						getRec7(),
            getRec8(),
            getRec9(),
            getRec10(),
            getRec11(),
            getRec12()
					],
				}]
			},
			options: {
				responsive: true,
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};


		window.onload = function() {
			var ctx = document.getElementById('canvas1').getContext('2d');
			window.myDoughnut = new Chart(ctx, config);
      var myChart2 = document.getElementById('canvas2').getContext('2d');
			window.myDoughnut = new Chart(myChart2, config2);
      var myChart3 = document.getElementById('canvas3').getContext('2d');
			window.myDoughnut = new Chart(myChart3, config3);
      var myChart4 = document.getElementById('canvas4').getContext('2d');
			window.myBar = new Chart(myChart4, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					}
				}
			});
      var myChart5 = document.getElementById('canvas5').getContext('2d');
			window.myLine = new Chart(myChart5, config5);
		};
</script>
</body>
</html>
