<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

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
              <li class="breadcrumb-item active">List of Scholars Admitted per Year</li>
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
            <center><h4>List of Scholars Admitted per Year</h4></center>
                <div class="row">
                    <form method="post" action="spmy.php">
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

                        $title = "Scholars Admitted Per Year - ".$month.", ".$admission;

                        require('../../../connection.php');

                        $query = "SELECT admissionDate AS 'Admission Date', concat(firstName, ' ', lastName) AS Name, currentYrLevel AS 'Year Level' FROM person JOIN scholar on person.personID = scholar.personID WHERE admissionDate LIKE '$admission-$admonth-%%'";
                        $res = mysqli_query($con, $query);

                        echo "<div class='col-lg-12'>";
                        
                        if ($res){ 
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<th>Admission Date</th>";
                            echo "<th>Name</th>";
                            echo "<th>Current Year Level</th>";

                            while ($rec=mysqli_fetch_array($res))
                            {
                                $yrlvl = $rec['Year Level'];

                                if($yrlvl == "Elem_G1"){
                                    $yrlvl = "Elementary - Grade 1";
                                } elseif($yrlvl == "Elem_G2"){
                                    $yrlvl = "Elementary - Grade 2";
                                } elseif($yrlvl == "Elem_G3"){
                                    $yrlvl = "Elementary - Grade 3";
                                } elseif($yrlvl == "Elem_G4"){
                                    $yrlvl = "Elementary - Grade 4";
                                } elseif($yrlvl == "Elem_G5"){
                                    $yrlvl = "Elementary - Grade 5";
                                } elseif($yrlvl == "Elem_G6"){
                                    $yrlvl = "Elementary - Grade 6";
                                } elseif($yrlvl == "HS_G7"){
                                    $yrlvl = "High School - Grade 7";
                                } elseif($yrlvl == "HS_G8"){
                                    $yrlvl = "High School - Grade 8";
                                } elseif($yrlvl == "HS_G9"){
                                    $yrlvl = "High School - Grade 9";
                                } elseif($yrlvl == "HS_G10"){
                                    $yrlvl = "High School - Grade 10";
                                } elseif($yrlvl == "SHS_G11"){
                                    $yrlvl = "SHS - Grade 11";
                                } elseif($yrlvl == "SHS_G12"){
                                    $yrlvl = "SHS - Grade 12";
                                }                   

                                echo "<tr>";
                                echo "<td>".$rec['Admission Date']."</td>";
                                echo "<td>".$rec['Name']."</td>";
                                echo "<td>".$yrlvl."</td>";
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

