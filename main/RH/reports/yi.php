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
              <li class="breadcrumb-item"><a href="../dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="../reports.php" class="text-light">Reports</a></li>
              <li class="breadcrumb-item active">Yearly Inventory Report</li>
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
            <div class="form-inline" style="margin-left: 270px">
                    <label style="margin-right: 10px">Year</label>
                    <form action="yi.php" method="post">
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
                        <select name="type" class="form-control">
                            <option value="purchased">Purchased</option>
                            <option value="donation">Donation</option>
                            <option value="issued">Issued</option>
                            <option value="garage">Garage Sale</option>
                            <option value="disposed">Disposed</option>
                            <option value="lost">Lost</option>
                            <option value="unaccounted">Unaccounted</option>
                        </select>
                        <input type="submit" value="Submit" name="submit" class="btn btn-success"/>
                    </form>
                </div>
              
                <?php

                    require ('../../../connection.php');

                    if(isset($_POST['submit'])){
                        $year = $_POST['year'];
                        $type = $_POST['type'];

                        if($type=='purchased'){
                            $query = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '$year-%-%'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$year." - Purchased Items</h4></center>";

                            $title = $year." - Purchased Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No purchased Items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Purchased Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Purchased Items: ";
                            
                        } elseif($type=='donation'){
                            $query = "SELECT SUM(qtyDonated) FROM a_donation JOIN a_donationdetails ON a_donation.donationID = a_donationdetails.donationID WHERE donationDate LIKE '$year-%-%'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$year." - Donated Items</h4></center>";

                            $title = $year." - Donated Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No donated items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Donated Items: '.$count.'</label></center>';
                            }
                            
                            $label = "Total Number of Donated Items: ";

                        } elseif($type=='issued'){
                            $query = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '$year-%-%' AND releaseType = 'I'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$year." - Issued Items</h4></center>";

                            $title = $year." - Issued Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No issued items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Issued Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Issued Items: ";

                        } elseif($type=='garage'){
                            $query = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '$year-%-%' AND releaseType = 'G'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$year." - Items for Garage Sale</h4></center>";

                            $title = $year." - Items for Garage Sale";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No items for garage sale.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Items for Garage Sale: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Items for Garage Sale: ";

                        } elseif($type=='disposed'){
                            $query = "SELECT SUM(qtyAdjusted) FROM a_adjustment WHERE dateAdjusted LIKE '$year-%-%' AND remarks = 'Disposed'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$year." - Disposed Items</h4></center>";

                            $title = $year." - Disposed Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No disposed items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Disposed Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Disposed Items: ";

                        } elseif($type=='lost'){
                            $query = "SELECT SUM(qtyAdjusted) FROM a_adjustment WHERE dateAdjusted LIKE '$year-%-%' AND remarks = 'Lost'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$year." - Lost Items</h4></center>";

                            $title = $year." - Lost Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No lost items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Lost Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Lost Items: ";

                        } elseif($type=='unaccounted'){
                            $query = "SELECT SUM(qtyAdjusted) FROM a_adjustment WHERE dateAdjusted LIKE '$year-%-%' AND remarks = 'Unaccounted'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$year." - Unaccounted Items</h4></center>";

                            $title = $year." - Unaccounted Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No unaccounted items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Unaccounted Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Unaccounted Items: ";
                        }

                        echo '<br/><a href="inventory.php?count='.$count.'&label='.$label.'&title='.$title.'" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i>&nbsp;Print</a>';
                    }

                ?>

            </div>

              
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

