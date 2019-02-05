<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Scholars</title>

  <style>
      li
      {
        list-style-type: none;
      }

       #box
      {
        display: inline-block;
      }

      .photo
      {
        border-radius: 50%;
        height: 80px;
        width: 80px;
      }
     
      .content 
      {
        background-color:#2dcc70;
      }
  </style>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!-- page script -->
<script>
  $(document).ready(function() {
    $('#example1').DataTable();
} );
</script>
  <!-- SCRIPTS -->
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
          <li class="nav-item has-treeview">
            <a href="dashboard.php" class="nav-link">
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
                <a href="orphans.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Maintenance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="referrals.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Referrals</p>
                </a>
              </li>
            </ul>
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
            <a href="sponsors.php" class="nav-link active">
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
                <a href="application.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sponsorapplications.php" class="nav-link">
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
                Assets
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
                            <p>Unit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="stocks.php" class="nav-link">
                            <i class="fa fa-minus nav-icon"></i>
                            <p>Stocks</p>
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory</p>
                </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="list.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Inventory List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="receive.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Receive through Purchase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="donation.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Donation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="release.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Release</p>
                        </a>
                    </li>
                  </ul>
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
            <a href="pages/widgets.html" class="nav-link">
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
  <div class="content-wrapper" style="background-color:#2dcc70">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0 text-light"><strong>SPONSORS</strong></h1></center>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item active">Sponsors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <div class="row">
          <div class="col-md-3">
            <div class="card" id="cbody1">
                <div class="card-body">
                    <div class="form-group" style="margin-top: 10px">
                    <?php

                    $sponsor_id = $_GET["sponsorid"];

        $x = "SELECT COUNT(scholarID) FROM scholar WHERE sponsorID = '$sponsor_id'";
        $y = mysqli_query($con, $x);
        $z = mysqli_fetch_row($y);

        $a = "SELECT scholarCount FROM sponsor WHERE sponsorID = '$sponsor_id'";
        $b = mysqli_query($con, $a);
        $c = mysqli_fetch_row($b);
        $count = $z[0];

        if ($z[0] < $c[0])
        {
          $addsch = '<button id="btn1" class="btn btn-primary btn-flat btn-block">Assign Scholar</button>';
        }
        else
        {
          $addsch = '<button id="btn1" class="btn btn-success btn-flat btn-block disabled" >Assign Scholar</button>';          
        }

        if($z[0] == 0){
          $inflow = '<button id="btn2" class="btn btn-success btn-flat btn-block disabled">Add Sponsor Inflow</button>';
        }
        else{
          $inflow = '<button id="btn2" class="btn btn-primary btn-flat btn-block">Add Sponsor Inflow</button>';        
        }

                      $qry2 = "SELECT firstName, lastName, person.photo FROM sponsor JOIN user JOIN person ON sponsor.userID = user.userID AND user.personID = person.personID WHERE sponsorID = '$sponsor_id'";

                      $sql = mysqli_query($con, $qry2);
                      $g = mysqli_fetch_array($sql);


            if($g['photo'] == ""){
              echo '<center><div style="margin-bottom: 10px;">
                  <img class="profile-user-img img-fluid"
                       src="../icons/no-image.png"
                       alt="User profile picture" style="height: 160px; width: 160px">
                </div>';
                echo '<h4>'.$g['firstName'].' '.$g['lastName'].'</h4></center>';
                echo '<ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>No. of Scholars</b> <a class="float-right">'.$count.'</a>
                  </li>
           </ul>';

            }
            else{
                echo '<center><div style="margin-bottom: 10px">
                        <img class="profile-user-img img-fluid" 
                        src="data:image/jpeg;base64,'.base64_encode($g['photo']).'"
                        alt="User profile picture" style="height: 160px; width: 160px">
                      </div>';
                echo '<h4>'.$g['firstName'].' '.$g['lastName'].'</h4></center>';
                echo '<ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>No. of Scholars</b> <a class="float-right">'.$count.'</a>
                          </li>
                      </ul>';
                }

            ?></div>

                    </div>
                    </div>

           <!-- About Me Box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php 

                 $sel = "SELECT * FROM sponsor JOIN user JOIN person ON sponsor.userID = user.userID AND user.personID = person.personID WHERE sponsorID = '$sponsor_id'";

                      $sel2 = mysqli_query($con, $sel);
                      $info = mysqli_fetch_array($sel2);

               if ($info['donationType']=="EM")
                      {
                        $donation = "Elementary - Monthly";
                      }

                      else if ($info['donationType']=="EY")
                      {
                        $donation = "Elementary - Yearly";
                      }

                      else if ($info['donationType']=="HSM")
                      {
                        $donation = "High School - Monthly";
                      }

                      else if ($info['donationType']=="HSY")
                      {
                        $donation = "High School - Yearly";
                      }

                ?>

                <strong><i class="fa fa-user mr-1"></i> Email</strong>

                <p class="text-muted"><?php echo $info['email']?></p>

                <hr>

                <strong><i class="fa fa-money mr-1"></i> Contact No.</strong>

                <p class="text-muted"><?php echo $info['telNo']?></p>

                <hr>

                <strong><i class="fa fa-credit-card mr-1"></i> Sponsor Type</strong>

                <p class="text-muted"><?php echo $donation?></p>

                <hr>

                <strong><i class="fa fa-book mr-1"></i>Address</strong>

                <p class="text-muted">
                  <?php echo $info['street'].' '.$info['city'].' '.$info['country']; ?>
                </p>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-9">
            <div class="card" id="cbody2">
                <div class="card-header">
                  <span class="cheader">Sponsor Inflow</span>
                  <!-- <button class="btn btn-primary float-right" onclick="updateOrphan()" id="updatebtn">UPDATE</button> -->
                </div>
                <div class="card-body">
                       <form method="post" action="backend/updateOrph.php">
                  <?php

                       $sql2 = "SELECT name, dateReceived, amount FROM s_sponsorinflow JOIN scholar JOIN person ON s_sponsorinflow.scholarID = scholar.scholarID AND scholar.personID = person.personID WHERE scholar.sponsorID = '$sponsor_id' LIMIT 3";
                        $result2 = mysqli_query($con, $sql2);

                        if(mysqli_num_rows($result2) == 0){
                            echo '<center><span> No records yet.</span></center>';
                        }
                        else
                        {
                          echo ' <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Date Received</th>
                              <th>Name</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>';
                          while ($row2 = mysqli_fetch_array($result2))
                          {

                            echo '<tr>
                            <td>'.$row2['dateReceived'].'</td>
                            <td>'.$row2['name'].'</td>
                            <td>'.$row2['amount'].'</td>
                            </tr>';
                          }
                        }

                      ?>

                    </tbody>
                    </table>
        
                </div>
            </div>
          </div>
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
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
</body>
</html>
