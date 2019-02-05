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

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/custom.css">

  <!---->
  
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
  </style>

  <style>
    .content 
    {
      background-color:#2dcc70;
    }
    
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-dark navbar-light">
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
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <?php
                require ('../connection.php');

                $userid = $_SESSION['userid'];

                $query = "SELECT firstName, lastName from PERSON JOIN USER ON person.personID = user.personID WHERE programType = 'Admin' AND userID = '$userid'";
                $result = mysqli_query($con, $query);

                if ($result)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<a href='#' class='d-block'>".$row[0]." ".$row[1]."</a>";
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
          <li class="nav-item">
            <a href="orphans.php" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Orphans
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="scholars.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Scholars
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sponsors.php" class="nav-link">
              <i class="nav-icon fa fa-male"></i>
              <p>
                Sponsors
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Applications
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sponsorapplications.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sponsor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="socialworkerapplications.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Social Worker</p>
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
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Maintenance</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="unit.php" class="nav-link">
                            <i class="fa fa-minus nav-icon"></i>
                            <p>Unit of Measurement</p>
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="list.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="receive2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="release.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adjustment.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Adjustment</p>
                </a>
              </li>
            </ul>
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
            <a href="accounts.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Accounts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
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

    <!-- Main content -->
    <section class="content">
      <br/><br/>
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-exclamation-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Critical Stocks</span>

                <?php
                  $a = "SELECT COUNT(stockNo) FROM a_stocks WHERE qtyOnHand < criticalAmount";
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
                <span class="info-box-text">Pending Applications</span>
                <?php
                    require ('../connection.php');

                    $query = "SELECT COUNT(scholarID) AS total FROM scholar WHERE applicationStatus = 'Pending'";
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
                    require ('../connection.php');

                    $query = "SELECT COUNT(orphanID) AS total FROM orphan WHERE applicationStatus = 'Processing'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_row($result);

                      echo '<span class="info-box-number">
                      '.$row[0].'
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
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-child text-light"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Current Number of Orphans</span>

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
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
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
                      $sw = $s['socialWorkerID'];
                      $t = "SELECT firstName, lastName FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE socialworkerID = '$sw'";
                      $u = mysqli_query($con, $t);
                      $v = mysqli_fetch_row($u);

                      echo '<tr>';
                      echo '<td>'.$s['firstName'].' '.$s['lastName'].'</td>';
                      echo '<td>'.$v[0]." ".$v[1].'</td>';
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
                <h3 class="card-title">Recently Accepted Scholars</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <th>Name</th>
                  <th>Referred By</th>

                  <?php
                    $date = date('Y-m-d', strtotime('-7 days'));

                    $q = "SELECT firstName, lastName, referredBy FROM person JOIN scholar JOIN s_appform ON person.personID = scholar.personID AND scholar.scholarAppID = s_appform.scholarAppID WHERE applicationStatus = 'Accepted' ORDER BY scholar.scholarID desc LIMIT 5";
                    $r = mysqli_query($con, $q);
                    
                    while ($s = mysqli_fetch_array($r))
                    {
                      echo '<tr>';
                      echo '<td>'.$s['firstName'].' '.$s['lastName'].'</td>';
                      echo '<td>'.$s['referredBy'].'</td>';
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

                    $q = "SELECT firstName, lastName, country FROM person JOIN sponsor ON person.personID = sponsor.personID WHERE applicationStatus = 'A' ORDER BY sponsor.sponsorID desc LIMIT 5";
                    $r = mysqli_query($con, $q);
                    
                    while ($s = mysqli_fetch_array($r))
                    {
                      echo '<tr>';
                      echo '<td>'.$s['firstName'].' '.$s['lastName'].'</td>';
                      echo '<td>'.$s['country'].'</td>';
                      echo '</tr>';
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!--CHARTS-->
        <div class="row">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Orphans Per Case Status</h3>

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
                  echo '<br/><p><strong>Total Count: </strong>'.$row[0].'</p>';
                ?>
              </div>
            </div>
          </div>
  
        <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Active and Inactive Sponsors</h3>

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
                  $n = "SELECT COUNT(sponsorID) FROM sponsor WHERE applicationStatus = 'A'";
                  $o = mysqli_query($con, $n);
                  $p = mysqli_fetch_row($o);

                  echo '<br/><p><strong>Total Count: </strong>'.$p[0].'</p>';
                ?>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Current Number of Orphans per Status</h3>

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
            <div class="card-header bg-primary">
                <h3 class="card-title">Count of Received and Released Items</h3>

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
                  $date = date('Y');

                  $i = "SELECT COUNT(releaseID) FROM a_release WHERE dateReleased LIKE '$date-%-%'";
                  $j = mysqli_query($con, $i);
                  $k = mysqli_fetch_row($j);

                  $l = "SELECT COUNT(referenceNo) FROM a_receive WHERE dateReceived LIKE '$date-%-%'";
                  $m = mysqli_query($con, $l);
                  $g = mysqli_fetch_row($m);

                  $total = $k[0] + $g[0];

                  echo '<br/><p><strong>Total Number of Transactions: </strong>'.$total.'</p>';
                ?>
              </div>
            </div>
          </div>
        </div>

        <!--WARNINGS-->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Critical Stocks in Inventory</h3>
              </div>
              <div class="card-body">
                <table class="table table-condensed table-bordered table-striped">
                  <th>Item Name</th>
                  <th>Unit</th>
                  <th>Quantity</th>

                  <?php
                    $a = "SELECT * FROM a_stocks JOIN a_unit ON a_stocks.unitID = a_unit.unitID WHERE qtyOnHand < criticalAmount";
                    $b = mysqli_query($con, $a);
                    
                    while ($c = mysqli_fetch_array($b))
                    {
                      echo "<tr>";
                      echo "<td>".$c['itemName']."</td>";
                      echo "<td>".$c['unitName']."</td>";
                      echo "<td>".$c['qtyOnHand']."</td>";
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

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="../plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>

<script src="chart.js/dist/Chart.bundle.js"></script>
<script src="chart.js/samples/utils.js"></script>
<script>
    var getFoundling = function(){
      return <?php
        $select = "SELECT COUNT(orphanID) FROM person JOIN orphan ON person.personID = orphan.personID WHERE caseStatus = 'Foundling' AND (applicationStatus = 'Accepted' OR applicationStatus = 'Processing')";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $foundling = $disp[0];
        echo $foundling;
      ?>;
    };

    var getNeglected = function(){
      return <?php
        $select = "SELECT COUNT(orphanID) FROM person JOIN orphan ON person.personID = orphan.personID WHERE caseStatus = 'Neglected' AND (applicationStatus = 'Accepted' OR applicationStatus = 'Processing')";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $neglected = $disp[0];
        echo $neglected;
      ?>;
    };

    var getAbandoned = function(){
      return <?php
        $select = "SELECT COUNT(orphanID) FROM person JOIN orphan ON person.personID = orphan.personID WHERE caseStatus = 'Abandoned' AND (applicationStatus = 'Accepted' OR applicationStatus = 'Processing')";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $abandoned = $disp[0];
        echo $abandoned;
      ?>;
    };
    
    var getActive = function(){
      return <?php
        $select = "SELECT COUNT(sponsorID) FROM sponsor WHERE activeFlag = 1 AND applicationStatus = 'A'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $active = $disp[0];
        echo $active;
      ?>;
    };

    var getInactive = function(){
      return <?php
        $select = "SELECT COUNT(sponsorID) FROM sponsor WHERE activeFlag = 0 AND applicationStatus = 'A'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $inactive = $disp[0];
        echo $inactive;
      ?>;
    };

    var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						getFoundling(),
						getNeglected(),
						getAbandoned()
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Foundling',
					'Neglected',
					'Abandoned'
				]
			},
			options: {
				responsive: true
			}
		};
    
    var config2 = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						getActive(),
						getInactive()
					],
					backgroundColor: [
						window.chartColors.blue,
						window.chartColors.yellow
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Active',
					'Inactive'
				]
			},
			options: {
				responsive: true
			}
		};

    var getAccepted = function(){
      return <?php
        $select = "SELECT COUNT(orphanID) FROM orphan WHERE applicationStatus = 'Accepted'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $accepted = $disp[0];
        echo $accepted;
      ?>;
    };

    var getPending = function(){
      return <?php
        $select = "SELECT COUNT(orphanID) FROM orphan WHERE applicationStatus = 'Pending'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $pending = $disp[0];
        echo $pending;
      ?>;
    };

    var getProcessing = function(){
      return <?php
        $select = "SELECT COUNT(orphanID) FROM orphan WHERE applicationStatus = 'Processing'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $processing = $disp[0];
        echo $processing;
      ?>;
    };

    var getAdopted = function(){
      return <?php
        $select = "SELECT COUNT(orphanID) FROM orphan WHERE applicationStatus = 'Adopted'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $adopted = $disp[0];
        echo $adopted;
      ?>;
    };

    var config3 = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						getAccepted(),
						getProcessing(),
            getAdopted(),
            getPending()
					],
					backgroundColor: [
						window.chartColors.blue,
						window.chartColors.yellow,
            window.chartColors.green,
            window.chartColors.red,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Accepted',
					'Processing',
          'Adopted',
          'Pending'
				]
			},
			options: {
				responsive: true
			}
		};
    
    var getreceive1 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-01-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive1 = $disp[0];
        echo $receive1;
      ?>;
    };

    var getreceive2 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-02-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive2 = $disp[0];
        echo $receive2;
      ?>;
    };

    var getreceive3 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-03-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive3 = $disp[0];
        echo $receive3;
      ?>;
    };

    var getreceive10 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-10-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive10 = $disp[0];
        echo $receive10;
      ?>;
    };

    var getreceive4 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-04-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive4 = $disp[0];
        echo $receive4;
      ?>;
    };
    var getreceive5 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-05-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive5 = $disp[0];
        echo $receive5;
      ?>;
    };
    var getreceive6 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-06-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive6 = $disp[0];
        echo $receive6;
      ?>;
    };
    var getreceive7 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-07-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive7 = $disp[0];
        echo $receive7;
      ?>;
    };
    var getreceive8 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-08-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive8 = $disp[0];
        echo $receive8;
      ?>;
    };
    var getreceive9 = function(){
      return <?php
        $select = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '%-09-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $receive9 = $disp[0];
        echo $receive9;
      ?>;
    };


    var getrelease1 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-01-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release1 = $disp[0];
        echo $release1;
      ?>;
    };

    var getrelease2 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-02-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release2 = $disp[0];
        echo $release2;
      ?>;
    };

    var getrelease3 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-03-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release3 = $disp[0];
        echo $release3;
      ?>;
    };

    var getrelease10 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-10-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release10 = $disp[0];
        echo $release10;
      ?>;
    };

    var getrelease4 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-04-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release4 = $disp[0];
        echo $release4;
      ?>;
    };
    var getrelease5 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-05-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release5 = $disp[0];
        echo $release5;
      ?>;
    };
    var getrelease6 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-06-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release6 = $disp[0];
        echo $release6;
      ?>;
    };
    var getrelease7 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-07-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release7 = $disp[0];
        echo $release7;
      ?>;
    };
    var getrelease8 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-08-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release8 = $disp[0];
        echo $release8;
      ?>;
    };
    var getrelease9 = function(){
      return <?php
        $select = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '%-09-%'";
        $get = mysqli_query($con, $select);
        $disp = mysqli_fetch_row($get);

        $release9 = $disp[0];
        echo $release9;
      ?>;
    };
    

    var config4 = {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October'],
				datasets: [{
					label: 'Received Items',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
						getreceive1(),
						getreceive2(),
						getreceive3(),
						getreceive4(),
            getreceive5(),
            getreceive6(),
            getreceive7(),
            getreceive8(),
            getreceive9(),
            getreceive10()
					],
					fill: false,
				}, {
					label: 'Released Items',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [
						getrelease1(),
						getrelease2(),
						getrelease3(),
						getrelease4(),
            getrelease5(),
            getrelease6(),
            getrelease7(),
            getrelease8(),
            getrelease9(),
            getrelease10()
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

    var color = Chart.helpers.color;
    
    window.onload = function() {
			var myChart1 = document.getElementById('canvas1').getContext('2d');
			window.myPie = new Chart(myChart1, config);
      var myChart2 = document.getElementById('canvas2').getContext('2d');
			window.myPie = new Chart(myChart2, config2);
      var myChart3 = document.getElementById('canvas3').getContext('2d');
      window.myPie = new Chart(myChart3, config3);
      var myChart4 = document.getElementById('canvas4').getContext('2d');
			window.myLine = new Chart(myChart4, config4);
		};
    

  </script>
</body>
</html>
