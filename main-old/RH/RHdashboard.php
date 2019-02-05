<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Dashboard</title>
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="main.css">

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
  <nav class="main-header navbar navbar-expand bg-dark navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
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
        <span class="brand-text font-weight-light">Receiving Home</span>
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
                require ('dbconnect.php');

                $query = "SELECT firstName, lastName from PERSON JOIN USER ON person.personID = user.personID WHERE userID = '$uid' AND programType = 'RH'";
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
                Orphans
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="RHorphans.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Maintenance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHreferral.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Referrals</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="socialworker.php" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Social Workers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="swapp.php" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Applications
              </p>
            </a>
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
                <a href="RHlist.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHreceive2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHrelease.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHadjustment.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Adjustment</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="RHreports.php" class="nav-link">
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
              <li class="breadcrumb-item"><a href="#" class="text-light">Home</a></li>
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
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Critical Stocks</span>
                
                <?php
                  $a = "SELECT COUNT(stockNo) FROM a_stocks WHERE qtyOnHand < criticalAmount AND (stockType ='O' OR stockType = 'G')";
                  $b = mysqli_query($con, $a);
                  $c = mysqli_fetch_row($b);

                    echo '<span class="info-box-number">
                      '.$c[0].'
                      </span>';
                ?>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Referrals</span>
                <?php
                    require ('dbconnect.php');

                    $query = "SELECT COUNT(orphanID) AS total FROM orphan WHERE applicationStatus = 'Pending'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_row($result);

                    if ($row[0]>0)
                    {
                      echo '<span class="info-box-number">
                      '.$row[0].'
                      <small><a href="application.php" class="pull-right"><button class="btn btn-danger btn-sm">View</button></a></small></span>';
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

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-archive"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Cases</span>
                <?php
                    require ('dbconnect.php');

                    $query = "SELECT COUNT(orphanID) AS total FROM orphan WHERE applicationStatus = 'Processing'";
                    $result = mysqli_query($con, $query);

                    if ($result)
                    {
                        $row = mysqli_fetch_row($result);
                        echo "<span class='info-box-number'>".$row[0]."</span>";
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
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-child text-light"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Current Orphan Count</span>

                <?php
                  $query = "SELECT COUNT(orphanID) FROM orphan WHERE applicationStatus = 'Accepted' OR applicationStatus = 'Processing'";
                  $result = mysqli_query($con, $query);
                  $row = mysqli_fetch_row($result);

                  if ($row[0]>24)
                    {
                      echo '<span class="info-box-number">
                      '.$row[0].'
                      <span><i class="fa fa-exclamation-circle text-danger pull-right"></i><span></span>';
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
        <!-- /.row -->

         <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Recently Accepted Orphans</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <th>Name</th>
                  <th>Referred By</th>

                  <?php
                    $date = date('Y-m-d', strtotime('-7 days'));

                    $q = "SELECT firstName, lastName, socialWorkerID FROM person JOIN orphan JOIN o_referral ON person.personID = orphan.personID AND orphan.orphanID = o_referral.orphanID WHERE applicationStatus = 'Accepted' ORDER BY orphan.orphanID desc LIMIT 5";
                    $r = mysqli_query($con, $q);
                    
                    while ($s = mysqli_fetch_array($r))
                    {
                      $swid = $s['socialWorkerID'];

                      $a = "SELECT firstName, lastName FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE socialWorkerID = '$swid'";
                      $b = mysqli_query($con, $a);
                      $c = mysqli_fetch_array($b);

                      echo '<tr>';
                      echo '<td>'.$s['firstName'].' '.$s['lastName'].'</td>';
                      echo '<td>'.$c['firstName'].' '.$c['lastName'].'</td>';
                      echo '</tr>';
                    }
                  ?>
                </table>
              </div>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Recently Processed Orphans</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <th>Name</th>
                  <th>Case Status</th>

                  <?php
                    $date = date('Y-m-d', strtotime('-7 days'));

                    $q = "SELECT firstName, lastName, caseStatus FROM person JOIN orphan ON person.personID = orphan.personID WHERE applicationStatus = 'Processing' ORDER BY orphanID desc LIMIT 5";
                    $r = mysqli_query($con, $q);
                    
                    while ($s = mysqli_fetch_array($r))
                    {
                      echo '<tr>';
                      echo '<td>'.$s['firstName'].' '.$s['lastName'].'</td>';
                      echo '<td>'.$s['caseStatus'].'</td>';
                      echo '</tr>';
                    }
                  ?>
                </table>
              </div>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Recently Adopted Orphans</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <th>Name</th>
                  <th>Adoptive Parent</th>

                  <?php

                    $q = "SELECT firstName, lastName, adopterName FROM person JOIN orphan JOIN o_adoptiondetails ON person.personID = orphan.personID AND orphan.orphanID = o_adoptiondetails.orphanID WHERE applicationStatus = 'Adopted' ORDER BY orphan.orphanID desc LIMIT 5";
                    $r = mysqli_query($con, $q);
                    $t = mysqli_num_rows($r);

                    if ($t>0)
                    {
                      while ($s = mysqli_fetch_array($r))
                      {
                        echo '<tr>';
                        echo '<td>'.$s['firstName'].' '.$s['lastName'].'</td>';
                        echo '<td>'.$s['country'].'</td>';
                        echo '</tr>';
                      }
                    }

                    else
                    {
                      echo '<tr><td colspan="2"><center>No data available in table.</center></td></tr>';
                    }
                    
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-warning">
              <h3 class="card-title">Current Orphan Count Per Gender</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
		              <canvas id="canvas1"></canvas>
	              </div>
                
                <label>Total Count: 
                  <?php
                    echo $row[0];
                  ?>
                </label>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-warning">
              <h3 class="card-title">Current Orphan Count Per Case Status</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder2" style="width:100%">
		              <canvas id="canvas2"></canvas>
	              </div>
                
                  <label>Total Count: <?php echo $row[0]; ?></label>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-danger">
              <h3 class="card-title">Admitted Orphans Per Year</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder3" style="width:100%">
		              <canvas id="canvas3"></canvas>
	              </div>
                
                <label>Total Count: <?php echo $row[0]; ?></label>
              </div>
            </div>
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header bg-danger">
                <h3 class="card-title">Orphans Ready for Adoption</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <th>Case Number</th>
                  <th>Name</th>
                  <th>Birthdate</th>
                  <th>Case Status</th> 

                  <?php

                    $q = "SELECT firstName, lastName, caseNo, birthdate, caseStatus FROM person JOIN orphan ON person.personID = orphan.personID WHERE applicationStatus = 'Accepted' AND birthdate <> NULL";
                    $r = mysqli_query($con, $q);
                    $t = mysqli_num_rows($r);

                    if ($t>0)
                    {
                      while ($s = mysqli_fetch_array($r))
                      {
                        $age = date_diff(date_create($s['birthdate']), date_create('today'))->y;
                        
                        if ($age>1)
                        {
                          echo '<tr>';
                          echo '<td>'.$s['caseNo'].'</td>';
                          echo '<td>'.$s['firstName'].' '.$s['lastName'].'</td>';
                          echo '<td>'.$s['birthdate'].'</td>';
                          echo '<td>'.$s['caseStatus'].'</td>';
                          echo '</tr>';
                        }                      
                      }
                    }

                    else
                    {
                      echo '<tr><td colspan="4"><center>No data available in table.</center></td></tr>';
                    }
                    
                  ?>
                </table>
              </div>
            </div>
          </div>
          </div>
          
        
         <!--WARNINGS-->
         <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Inventory</h3>
              </div>
              <div class="card-body">
                <table class="table table-condensed table-bordered table-striped">
                  <th>Item Name</th>
                  <th>Unit</th>
                  <th>Quantity</th>
                  <th></th>

                  <?php
                    $a = "SELECT * FROM a_stocks JOIN a_unit ON a_stocks.unitID = a_unit.unitID WHERE stockType = 'O' OR stockType = 'G'";
                    $b = mysqli_query($con, $a);
                    
                    while ($c = mysqli_fetch_array($b))
                    {
                      if ($c['qtyOnHand']<$c['criticalAmount'])
                      {
                        $status = "<span class='badge bg-danger'>Critical</span><span><a href='stockcard.php?stockno=".$c['stockNo']."' class='pull-right'><button class='btn btn-success btn-sm'>View Stock</button></a></span>";
                      }

                      else
                      {
                        $status = "";
                      }

                      echo "<tr>";
                      echo "<td>".$c['itemName']."</td>";
                      echo "<td>".$c['unitName']."</td>";
                      echo "<td>".$c['qtyOnHand']."</td>";
                      echo "<td>".$status."</td>";
                    }
                  ?>
                  
                  </table>
              </div>

            </div></div></div>
        <!---->


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
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

    var getMale = function(){
      return <?php
        $select = "SELECT COUNT(orphanID) FROM person JOIN orphan ON person.personID = orphan.personID WHERE person.gender = 'M' and applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $male = $disp[0];
        echo $male;
      ?>;
    };

    var getFemale = function(){
      return <?php
        $sel = "SELECT COUNT(orphanID) FROM person JOIN orphan ON person.personID = orphan.personID WHERE person.gender = 'F' and applicationStatus = 'Accepted'";
        $g = mysqli_query($con, $sel);
        $dis = mysqli_fetch_row($g);

        $female = $dis[0];
        echo $female;
      ?>;
    };

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						//randomScalingFactor(),
						//randomScalingFactor(),
            getMale(),
            getFemale(),
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Male',
					'Female',
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

    var getNeglected = function(){
      return <?php
        $gn = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Neglected' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $neglected = $disp[0];
        echo $neglected;
      ?>;
    };

    var getFoundling = function(){
      return <?php
        $gf = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Foundling' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $gf);
        $disp = mysqli_fetch_row($get);

        $foundling = $disp[0];
        echo $foundling;
      ?>;
    };

    var getAbandoned = function(){
      return <?php
        $ga = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Abandoned' AND applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $ga);
        $disp = mysqli_fetch_row($get);

        $abandoned = $disp[0];
        echo $abandoned;
      ?>;
    };

		var config2 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
            getNeglected(),
            getFoundling(),
            getAbandoned(),
					],
					backgroundColor: [
						window.chartColors.yellow,
						window.chartColors.green,
            window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Neglected',
					'Foundling',
          'Abandoned',
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

    //BAR CHART
    //var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var color = Chart.helpers.color;
    
    var getN1 = function(){
      return <?php
        $gn = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Neglected' AND admissionDate LIKE '%2018%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $n1 = $disp[0];
        echo $n1;
      ?>;
    };

    var getF1 = function(){
      return <?php
        $gf = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Foundling' AND admissionDate LIKE '%2018%'";
        $get = mysqli_query($con, $gf);
        $disp = mysqli_fetch_row($get);

        $f1 = $disp[0];
        echo $f1;
      ?>;
    };
    
    var getA1 = function(){
      return <?php
        $ga = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Abandoned' AND admissionDate LIKE '%2018%'";
        $get = mysqli_query($con, $ga);
        $disp = mysqli_fetch_row($get);

        $a1 = $disp[0];
        echo $a1;
      ?>;
    };

    var getN2 = function(){
      return <?php
        $gn = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Neglected' AND admissionDate LIKE '%2017%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $n2 = $disp[0];
        echo $n2;
      ?>;
    };

    var getF2 = function(){
      return <?php
        $gf = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Foundling' AND admissionDate LIKE '%2017%'";
        $get = mysqli_query($con, $gf);
        $disp = mysqli_fetch_row($get);

        $f2 = $disp[0];
        echo $f2;
      ?>;
    };
    
    var getA2 = function(){
      return <?php
        $ga = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Abandoned' AND admissionDate LIKE '%2017%'";
        $get = mysqli_query($con, $ga);
        $disp = mysqli_fetch_row($get);

        $a2 = $disp[0];
        echo $a2;
      ?>;
    };

    var getN3 = function(){
      return <?php
        $gn = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Neglected' AND admissionDate LIKE '%2016%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $n3 = $disp[0];
        echo $n3;
      ?>;
    };

    var getF3 = function(){
      return <?php
        $gf = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Foundling' AND admissionDate LIKE '%2016%'";
        $get = mysqli_query($con, $gf);
        $disp = mysqli_fetch_row($get);

        $f3 = $disp[0];
        echo $f3;
      ?>;
    };
    
    var getA3 = function(){
      return <?php
        $ga = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Abandoned' AND admissionDate LIKE '%2016%'";
        $get = mysqli_query($con, $ga);
        $disp = mysqli_fetch_row($get);

        $a3 = $disp[0];
        echo $a3;
      ?>;
    };

    var getN4 = function(){
      return <?php
        $gn = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Neglected' AND admissionDate LIKE '%2015%'";
        $get = mysqli_query($con, $gn);
        $disp = mysqli_fetch_row($get);

        $n4 = $disp[0];
        echo $n4;
      ?>;
    };

    var getF4 = function(){
      return <?php
        $gf = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Foundling' AND admissionDate LIKE '%2015%'";
        $get = mysqli_query($con, $gf);
        $disp = mysqli_fetch_row($get);

        $f4 = $disp[0];
        echo $f4;
      ?>;
    };
    
    var getA4 = function(){
      return <?php
        $ga = "SELECT COUNT(orphanID) FROM orphan WHERE caseStatus = 'Abandoned' AND admissionDate LIKE '%2015%'";
        $get = mysqli_query($con, $ga);
        $disp = mysqli_fetch_row($get);

        $a4 = $disp[0];
        echo $a4;
      ?>;
    };

		var barChartData = {
			labels: ['2015', '2016', '2017', '2018'],
			datasets: [{
				label: 'Neglected',
				backgroundColor: window.chartColors.red,
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					getN4(),
					getN3(),
					getN2(),
          getN1()
				]
			}, {
				label: 'Foundling',
				backgroundColor: window.chartColors.blue,
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					getF4(),
					getF3(),
					getF2(),
          getF1()
				]
			}, {
				label: 'Abandoned',
				backgroundColor: window.chartColors.yellow,
				borderColor: window.chartColors.yellow,
				borderWidth: 1,
				data: [
					getA4(),
					getA3(),
					getA2(),
          getA1()
				]
			}]

		};
    //END BAR CHART

		window.onload = function() {
      var myChart1 = document.getElementById('canvas1').getContext('2d');
			window.myDoughnut = new Chart(myChart1, config);
			var myChart2 = document.getElementById('canvas2').getContext('2d');
			window.myDoughnut = new Chart(myChart2, config2);
      var myChart3 = document.getElementById('canvas3').getContext('2d');
			window.myBar = new Chart(myChart3, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					}
				}
			});
		};

  </script>
</body>
</html>
