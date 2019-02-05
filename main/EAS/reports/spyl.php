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
              <li class="breadcrumb-item active">List of Scholars per Year Level</li>
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
            <center><h4>List of Scholars per Year Level</h4></center>
                <div class="row">
                    <form method="post" action="spyl.php">
                        <div class="form-inline">
                            <label style="margin-left: 180px; margin-right: 10px;">Year Level</label>
                            <select name="year" class="form-control" style="margin-right: 10px">
                                <option value="Elem_G1">Elementary - Grade 1</option>
                                <option value="Elem_G2">Elementary - Grade 2</option>
                                <option value="Elem_G3">Elementary - Grade 3</option>
                                <option value="Elem_G4">Elementary - Grade 4</option>
                                <option value="Elem_G5">Elementary - Grade 5</option>
                                <option value="Elem_G6">Elementary - Grade 6</option>
                                <option value="HS_G7">High School - Grade 7</option>
                                <option value="HS_G8">High School - Grade 8</option>
                                <option value="HS_G9">High School - Grade 9</option>
                                <option value="HS_G10">High School - Grade 10</option>
                                <option value="SHS_G11">Senior High School - Grade 11</option>
                                <option value="SHS_G12">Senior High School - Grade 12</option>
                            </select>
                            <button type="submit" name="submit" class="submit btn btn-success">Submit</button>
                        </div>
                    </form>  
                </div>

                <?php

                    if (isset($_POST["submit"])){
                        $yrlvl = $_POST["year"];
                        $yr = $yrlvl;

                        if($yr == "Elem_G1"){
                            $yr = "Elementary - Grade 1";
                        } elseif($yr == "Elem_G2"){
                            $yr = "Elementary - Grade 2";
                        } elseif($yr == "Elem_G3"){
                            $yr = "Elementary - Grade 3";
                        } elseif($yr == "Elem_G4"){
                            $yr = "Elementary - Grade 4";
                        } elseif($yr == "Elem_G5"){
                            $yr = "Elementary - Grade 5";
                        } elseif($yr == "Elem_G6"){
                            $yr = "Elementary - Grade 6";
                        } elseif($yr == "HS_G7"){
                            $yr = "High School - Grade 7";
                        } elseif($yr == "HS_G8"){
                            $yr = "High School - Grade 8";
                        } elseif($yr == "HS_G9"){
                            $yr = "High School - Grade 9";
                        } elseif($yr == "HS_G10"){
                            $yr = "High School - Grade 10";
                        } elseif($yr == "SHS_G11"){
                            $yr = "SHS - Grade 11";
                        } elseif($yr == "SHS_G12"){
                            $yr = "SHS - Grade 12";
                        }

                        echo "<br/><div class='col-lg-12'>";
                        echo "<center><h4>List of Scholars in ".$yr."</h4></center>";
                        echo "</div>";

                        $title = "List of Scholars in ".$yr;

                        require('../../../connection.php');

                        $query = "SELECT concat(firstName, ' ', lastName) AS Name, school AS School, admissionDate AS 'Admission Date' FROM person JOIN scholar on person.personID = scholar.personID WHERE currentYrLevel = '$yrlvl' AND applicationStatus = 'Accepted'";
                        $res = mysqli_query($con, $query);

                        echo "<div class='col-lg-12'>";
                        
                        if ($res){ 
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<th>Name</th>";
                            echo "<th>School</th>";
                            echo "<th>Admission Date</th>";

                            while ($rec=mysqli_fetch_array($res))
                            {
                                echo "<tr>";
                                echo "<td>".$rec['Name']."</td>";
                                echo "<td>".$rec['School']."</td>";
                                echo "<td>".$rec['Admission Date']."</td>";
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

