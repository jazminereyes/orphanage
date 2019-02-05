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

  <!-- css -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables/ajax-bootstrap.css">
  <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/profile.css">
  <style type="text/css">
    hr{
      margin: 0px;
      margin-bottom: 5px;
    }

    #cbody{
      padding-bottom: 0px;
      padding-top: 10px;
    }

    #cb{
      padding-left: 0px;
      padding-right: 0px;
    }

    .tb{
      border-radius: 0px;
    }

    @media (min-width: 576px){
    
         .modal-dialog {
        max-width: 700px;
        margin: 1.75rem auto;
        }
    }

    .gr{
      margin-bottom: 0px;
    }
    .tblcustom td{
      padding: 0.2em;
    }
  </style>

<!-- SCRIPTS -->
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=".././../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../../plugins/jquery/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/validatenum.js"></script>
<script src="backend/computeavg.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
  <!-- SCRIPTS -->


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

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <center>
        <img src="../icons/Concordia.jpg"><br/>
        <span class="brand-text font-weight-light">EAS</span>
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
                require ('../backend/dbconnect.php');

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
          <li class="nav-item has-treeview">
            <a href="../dashboard.php" class="nav-link">
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
                <a href="../scholar.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../sponsor.php" class="nav-link">
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
                <a href="../app_scholar.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../app_sponsor.php" class="nav-link">
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
                <a href="../list.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../receive.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive through Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../release.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../budget.php" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Scholar Budget
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../reports.php" class="nav-link active">
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
              <li class="breadcrumb-item active">Monthly Inventory Report</li>
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
            <div class="form-inline" style="margin-left: 150px">
                    <label style="margin-right: 10px">Month and Year</label>
                    <form action="mi.php" method="post">
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
                        <select name="type" class="form-control">
                            <option value="purchased">Purchased</option>
                            <option value="issued">Issued</option>
                        </select>
                        <input type="submit" value="Submit" name="submit" class="btn btn-success"/>
                    </form>
                </div>
              
                <?php

                    require ('../../../connection.php');

                    if(isset($_POST['submit'])){
                        $month = $_POST['month'];
                        $year = $_POST['year'];
                        $type = $_POST['type'];

                        if ($month=="01"){
                            $name = "January";
                        } else if ($month=="02"){
                            $name = "February";
                        } else if ($month=="03"){
                            $name = "March";
                        } else if ($month=="04"){
                            $name = "April";
                        } else if ($month=="05"){
                            $name = "May";
                        } else if ($month=="06"){
                            $name = "June";
                        } else if ($month=="07"){
                            $name = "July";
                        } else if ($month=="08"){
                            $name = "August";
                        } else if ($month=="09"){
                            $name = "September";
                        } else if ($month=="10"){
                            $name = "October";
                        } else if ($month=="11"){
                            $name = "November";
                        } else if ($month=="12"){
                            $name = "December";
                        }

                        if($type=='purchased'){
                            $query = "SELECT SUM(qtyReceived) FROM a_receive WHERE dateReceived LIKE '$year-$month-%'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$name.", ".$year." - Purchased Items</h4></center>";

                            $title = $name.", ".$year." - Purchased Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No purchased Items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Purchased Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Purchased Items: ";
                            
                        } elseif($type=='donation'){
                            $query = "SELECT SUM(qtyDonated) FROM a_donation JOIN a_donationdetails ON a_donation.donationID = a_donationdetails.donationID WHERE donationDate LIKE '$year-$month-%'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$name.", ".$year." - Donated Items</h4></center>";

                            $title = $name.", ".$year." - Donated Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No donated items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Donated Items: '.$count.'</label></center>';
                            }
                            
                            $label = "Total Number of Donated Items: ";

                        } elseif($type=='issued'){
                            $query = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '$year-$month-%' AND releaseType = 'I'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$name.", ".$year." - Issued Items</h4></center>";

                            $title = $name.", ".$year." - Issued Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No issued items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Issued Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Issued Items: ";

                        } elseif($type=='garage'){
                            $query = "SELECT SUM(qtyReleased) FROM a_release WHERE dateReleased LIKE '$year-$month-%' AND releaseType = 'G'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$name.", ".$year." - Items for Garage Sale</h4></center>";

                            $title = $name.", ".$year." - Items for Garage Sale";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No items for garage sale.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Items for Garage Sale: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Items for Garage Sale: ";

                        } elseif($type=='damaged'){
                            $query = "SELECT SUM(qtyAdjusted) FROM a_adjustment WHERE dateAdjusted LIKE '$year-$month-%' AND remarks = 'Damaged'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$name.", ".$year." - Damaged Items</h4></center>";

                            $title = $name.", ".$year." - Damaged Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No damaged items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Damaged Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Damaged Items: ";

                        } elseif($type=='lost'){
                            $query = "SELECT SUM(qtyAdjusted) FROM a_adjustment WHERE dateAdjusted LIKE '$year-$month-%' AND remarks = 'Lost'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$name.", ".$year." - Lost Items</h4></center>";

                            $title = $name.", ".$year." - Lost Items";

                            if($count==0){
                                $count = 0;
                                echo '<br/><center><label>No lost items.</label></center>';
                            } else{
                                echo '<br/><center><label>Total Number of Lost Items: '.$count.'</label></center>';
                            }

                            $label = "Total Number of Lost Items: ";

                        } elseif($type=='unaccounted'){
                            $query = "SELECT SUM(qtyAdjusted) FROM a_adjustment WHERE dateAdjusted LIKE '$year-$month-%' AND remarks = 'Unaccounted'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_row($result);

                            $count = $row[0];

                            echo "<br/><br/><center><h4>".$name.", ".$year." - Unaccounted Items</h4></center>";

                            $title = $name.", ".$year." - Unaccounted Items";

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

