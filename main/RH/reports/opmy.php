<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Release</title>

  <link rel="stylesheet" href="../../../plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../main.css">

  <!-- SCRIPTS -->
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../dist/js/adminlte.js"></script>
    <script src="../../../dist/js/demo.js"></script>
    <script src="../../../plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../../../plugins/chartjs-old/Chart.min.js"></script>
    <script src="../../../dist/js/pages/dashboard2.js"></script>
  <!-- SCRIPTS -->

  <script src="../../chart.js/dist/Chart.bundle.js"></script>
	<script src="../../chart.js/samples/utils.js"></script>
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
          <img src="../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <?php
                $uid = $_SESSION['userid'];
                require ('../dbconnect.php');

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
          <li class="nav-item has-treeview">
            <a href="../RHdashboard.php" class="nav-link">
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
                <a href="../RHorphans.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Maintenance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../RHreferral.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Referrals</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../socialworker.php" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Social Workers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../swapp.php" class="nav-link">
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
                <a href="../RHlist.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../RHreceive2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../RHrelease.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../RHadjustment.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Adjustment</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../RHreports.php" class="nav-link active">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../logout.php" class="nav-link">
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
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../RHdashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="../RHreports.php" class="text-light">Reports</a></li>
              <li class="breadcrumb-item active">List of Admitted Orphans per Year</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

     <div class="row">
        <div class="col-md-10" style="margin-left: 100px">
          <div class="card">
            <div class="card-header">
                <center><h2><strong>REPORTS</strong></h2></center>
            </div>
            <div class="card-body">
            <center><h4>List of Admitted Orphans per Year</h4></center>
                <div class="row">
                    <form method="post" action="opmy.php">
                        <div class="form-inline">
                            <label style="margin-left: 180px; margin-right: 10px;">Admission Month and Year</label>
                            <select name="year" class="form-control" style="margin-right: 10px">
                                <option>2000</option>
                                <option>2001</option>
                                <option>2002</option>
                                <option>2003</option>
                                <option>2004</option>
                                <option>2005</option>
                                <option>2006</option>
                                <option>2007</option>
                                <option>2008</option>
                                <option>2009</option>
                                <option>2010</option>
                                <option>2011</option>
                                <option>2012</option>
                                <option>2013</option>
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                            </select>
                            <select name="month" class="form-control" style="margin-right: 10px">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <button type="submit" name="submit" class="submit btn btn-success">Submit</button>
                        </div>
                    </form>  
                </div>

                <?php

                    if (isset($_POST["submit"])){
                        $admission = $_POST["year"];
                        $admonth = $_POST["month"];

                        if ($admonth=="01"){
                            $month = "January";
                        } else if ($admonth=="02"){
                            $month = "February";
                        } else if ($admonth=="03"){
                            $month = "March";
                        } else if ($admonth=="04"){
                            $month = "April";
                        } else if ($admonth=="05"){
                            $month = "May";
                        } else if ($admonth=="06"){
                            $month = "June";
                        } else if ($admonth=="07"){
                            $month = "July";
                        } else if ($admonth=="08"){
                            $month = "August";
                        } else if ($admonth=="09"){
                            $month = "September";
                        } else if ($admonth=="10"){
                            $month = "October";
                        } else if ($admonth=="11"){
                            $month = "November";
                        } else if ($admonth=="12"){
                            $month = "December";
                        }

                        echo "<br/><div class='col-lg-12'>";
                        echo "<center><h4>".$month.", ".$admission."</h4></center>";
                        echo "</div>";

                        $title = "Orphans Admitted per Year - ".$month.", ".$admission;

                        require('../../../connection.php');

                        $query = "SELECT caseNo AS 'Case Number', concat(firstName, ' ', lastName) AS Name, caseStatus AS 'Case Status' FROM person JOIN orphan on person.personID = orphan.personID WHERE admissionDate LIKE '$admission-$admonth-%%'";
                        $res = mysqli_query($con, $query);

                        echo "<div class='col-lg-12'>";
                        
                        if ($res){ 
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<th>Case Number</th>";
                            echo "<th>Name</th>";
                            echo "<th>Case Category</th>";

                            while ($rec=mysqli_fetch_array($res))
                            {
                                echo "<tr>";
                                echo "<td>".$rec['Case Number']."</td>";
                                echo "<td>".$rec['Name']."</td>";
                                echo "<td>".$rec['Case Status']."</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        }

                        echo "</div>";

                        echo '<br/><a href="genpdf.php?query='.$query.'&title='.$title.'" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i>&nbsp;Print</a>';
                    }

                ?>
              
            </div>
          </div>
        </div>
      </div>
        
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

</body>


</html>

