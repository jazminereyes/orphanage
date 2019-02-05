<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Concordia | Scholar Profile</title>
  <?php 
  session_start();
  ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- css -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/ajax-bootstrap.css">
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/profile.css">
  <link rel="stylesheet" type="text/css" href="css/medical.css">


<!-- SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../plugins/jquery/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/computebmi.js"></script>
<script src="backend/validatenum.js"></script>
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
      <center>
        <img src="../icons/Concordia.jpg"><br/>
        <span class="brand-text font-weight-light">EAS</span><br/>
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
          <li class="nav-item has-treeview">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Maintenance
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="scholar.php" class="nav-link active">
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
          <div class="col-sm-12">
          </div><!-- /.col -->
          </div>
          <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="scholar.php" class="text-light">Scholars</a></li>
              <?php

                if(isset($_GET["scholarid"])){
                  $scholar_id = $_GET["scholarid"];
                }
                else{
                  $scholar_id = $_SESSION["sid"];
                  $_SESSION["sid"] = $scholar_id;
                }

                $query = "SELECT firstName, lastName FROM person JOIN scholar on person.personID = scholar.personID WHERE scholarID = $scholar_id";

                $res = mysqli_query($con, $query);

                $rec = mysqli_fetch_row($res);

                echo '<li class="breadcrumb-item"><a href="viewscholar.php?scholarid='.$scholar_id.'" class="text-light">'.$rec[0].' '.$rec[1].'</a></li>';
              ?>
              <li class="breadcrumb-item active">Medical</li>
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

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <?php
                      if(isset($_GET["scholarid"])){
                      $scholar_id = $_GET["scholarid"];
                    }
                    else{
                      $scholar_id = $_SESSION["sid"];
                      $_SESSION["sid"] = $scholar_id;
                    }

                      $query = "SELECT firstName, middleName, lastName, person.photo, currentYrLevel FROM person LEFT JOIN scholar on person.personID = scholar.personID WHERE scholarID = $scholar_id";

                      $res = mysqli_query($con, $query);
                      $rec = mysqli_fetch_array($res);

                      $yrlvl = $rec['currentYrLevel'];
            
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
                $yrlvl = "SHS - Grade 11";
            }
            elseif($yrlvl == "SHS_G12"){
                $yrlvl = "SHS - Grade 12";
            }


            if($rec[3] == ""){
              echo '<div class="text-center">
                  <img class="profile-user-img img-fluid"
                       src="../img/no-image.png"
                       alt="User profile picture">
                </div>';

            }else{
                        echo '<div class="text-center">
                              <img class="profile-user-img img-fluid"
                                   src="../'.$rec[3].'"
                                   alt="User profile picture">
                            </div>';
            }

                echo'<h3 class="profile-username text-center">'.$rec[0].' '.$rec[2].'</h3>



                <p class="text-muted text-center">'.$yrlvl.'</p>';

                ?>

                    <button type="button" class="btn btn-primary btn-block btn-flat dropdown-toggle" data-toggle="dropdown">
                      <span class="caret">Actions</span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="width: 85%">
                      <a class="dropdown-item" href="cstudy.php?scholarid=<?php echo $scholar_id?>">Case Study</a>
                      <a class="dropdown-item" href="viewscholar.php?scholarid=<?php echo $scholar_id?>">Profile</a>
                      <a class="dropdown-item" href="s_application.php?scholarid=<?php echo $scholar_id?>"> View Application</a>
                      <a class="dropdown-item" href="expense.php?scholarid=<?php echo $scholar_id?>">Expenses</a>
                      <a class="dropdown-item" href="#"'>Medical</a>
                      <a class="dropdown-item" href="academic.php?scholarid=<?php echo $scholar_id?>">Academics</a>
                      <a class="dropdown-item" href="sponsordet.php?scholarid=<?php echo $scholar_id?>">Sponsor</a>
                    </div>
                  </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        

          </div>
          <!-- /.col -->

          <div class="col-md-9">
          <!-- About Me Box -->
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body box-profile" id="cbody">

                <?php 

                  $get = "SELECT height, weight, remarks, BMI FROM s_medicalreport as m JOIN scholar as s ON m.scholarID = s.scholarID WHERE s.scholarID = '$scholar_id' ORDER BY medicalID DESC LIMIT 1";
                  $qwe = mysqli_query($con, $get);
                  $info = mysqli_fetch_array($qwe);
                ?> 
                <strong><i class="fas fa-ruler-vertical mr-1"></i>Height</strong>
                <p class="text-muted"><?php echo $info['height']?> cm</p>

                <hr>

                <strong><i class="fas fa-weight-hanging mr-1"></i> Weight</strong>

                <p class="text-muted"><?php echo $info['weight']?> kg</p>

                <hr>

                <strong><i class="fas fa-balance-scale mr-1"></i> Weight Status</strong>

                <p class="text-muted"><?php echo $info['remarks']?></p>

                <hr>

                <strong><i class="fa fa-weight mr-1"></i> BMI</strong>

                <p class="text-muted"><?php echo $info['BMI']?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div id="modal-default" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Update Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("M-d-Y");
              ?>
              <div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control" name="dtoday" value="<?php echo $date?>" disabled style="width: 40%"/><br/>
                        </div><br/>
                <form method="post" action="backend/updatebmi.php">
                        
                        <div class="row">
                          <div class="col-6">
                             <label for="crit" id="cmt">Height(cm)</label>
                             <input type="number" class="form-control input" id="height" name="height" onchange="displayBMI()" required /><br/>
                          </div>

                          <div class="col-6">
                              <label for="count" id="icount">Weight(kg)</label>
                              <input type="number" class="form-control input" id="weight" name="weight" onchange="displayBMI()" required/><br/>
                          </div>                        
                        </div>
                        <div class="col-12">
                          <label class="lblto">BMI</label>
                          <input type="text" class="form-control input" id="bmi" name="bmi" readonly />
                        </div>
                        <div class="col-12">
                          <label class="lblto">Remarks</label>
                          <input type="text" class="form-control input" id="remarks" name="remarks" readonly />
                        </div>
                        
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                    <input type="hidden" value=<?php echo $scholar_id?> name="sid"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="col-md-12" id="cb">
        <div class="card">
              <div class="card-header">
                <span class="head">Medical Report</span>
                <div class="btn-group float-right">
                    <button type="button" class="btn btn-success btn-flat" data-toggle='modal' data-target='#modal-default'>
                      <span>Update&nbsp&nbsp</span>
                      <i class="fa fa-edit"></i>
                    </button>
                  </div>
       
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Date Checked</th>
                          <th>Height</th>
                          <th>Weight</th>
                          <th>BMI</th>
                          <th>Remarks</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                  <?php

                    $query = "SELECT * FROM s_medicalreport WHERE scholarID = '$scholar_id'";
                    $result = mysqli_query($con, $query);

                    if ($result)
                    {
                      while ($rec = mysqli_fetch_row($result))
                      {
                        echo '<tr>
                        <td>'.$rec[6].'</td>
                        <td>'.$rec[2].'</td>
                        <td>'.$rec[3].'</td>
                        <td>'.$rec[4].'</td>
                        <td>'.$rec[5].'</td>
                        </tr>';
                      }
                    }
                  ?>

                  </tbody>

                  <tfoot>
                      <tr>
                          <th>Date Checked</th>
                          <th>Height</th>
                          <th>Weight</th>
                          <th>BMI</th>
                          <th>Remarks</th>
                      </tr>
                  </tfoot>
                  </table>
              </div>
              <!-- .card-body -->
        </div>
        <!-- .card -->  
        </div>
        <br/><br/><br/>
        <!-- .col -->
      </div><!-- /.container-fluid -->
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
