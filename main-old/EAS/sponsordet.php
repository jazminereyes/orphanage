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

  </style>

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
            <a href="#" class="nav-link">
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

                $rec = mysqli_fetch_array($res);

                echo '<li class="breadcrumb-item"><a href="viewscholar.php?scholarid='.$scholar_id.'" class="text-light">'.$rec['firstName'].' '.$rec['lastName'].'</a></li>';
              ?>
              <li class="breadcrumb-item active">Sponsor Details</li>
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


            if($rec['photo'] == ""){
              echo '<div class="text-center">
                  <img class="profile-user-img img-fluid"
                       src="../img/no-image.png"
                       alt="User profile picture">
                </div>';

            }else{
                        echo '<div class="text-center">
                              <img class="profile-user-img img-fluid"
                                   src="data:image/jpeg;base64,'.base64_encode($rec['photo']).'"
                                   alt="User profile picture">
                            </div>';
            }

                echo'<h3 class="profile-username text-center">'.$rec['firstName'].' '.$rec['lastName'].'</h3>



                <p class="text-muted text-center">'.$yrlvl.'</p>';

                ?>

                    <button type="button" class="btn btn-primary btn-block btn-flat dropdown-toggle" data-toggle="dropdown">
                      <span class="caret">Actions</span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="width: 85%">
                      <a class="dropdown-item" href="cstudy.php?scholarid=<?php echo $scholar_id?>">Case Study</a>
                      <a class="dropdown-item" href="viewscholar.php?scholarid=<?php echo $scholar_id?>">Profile</a>
                      <a class="dropdown-item" href="s_application.php?scholarid=<?php echo $scholar_id?>">View Application</a>
                      <a class="dropdown-item" href="expense.php?scholarid=<?php echo $scholar_id?>">Expenses</a>
                      <a class="dropdown-item" href="medical.php?scholarid=<?php echo $scholar_id?>"'>Medical</a>
                      <a class="dropdown-item" href="academic.php?scholarid=<?php echo $scholar_id?>">Academics</a>
                      <a class="dropdown-item" href="#">Sponsor</a>

                    </div>
                  </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <?php

          $sel = "SELECT scholarID FROM scholar WHERE scholarID = '$scholar_id' AND sponsorID is NULL";
                          $qe = mysqli_query($con, $sel);
                          if(mysqli_num_rows($qe) != 0){
                             $link = "<button type='button' class='btn btn-success btn-flat float-right' data-toggle='modal' data-target='#modal-default2'>
                      <span>Assign Sponsor&nbsp&nbsp</span>
                      <i class='fa fa-edit'></i>
                    </button>";
                          }
                          else{

          $now = new DateTime();

          $check = "SELECT effectivityPeriod FROM scholar as s JOIN sponsor as sp ON s.sponsorID = sp.sponsorID JOIN s_budgetallocation as ba ON sp.donationType = ba.budgetType WHERE s.scholarID = '$scholar_id'";
          $que = mysqli_query($con, $check);
          $qas = mysqli_fetch_array($que);

          $date = new DateTime($qas['effectivityPeriod']);
          if($date < $now){
            $link = "<button type='button' class='btn btn-success btn-flat float-right' data-toggle='modal' data-target='#modal-default2'>
                      <span>Assign New Sponsor&nbsp&nbsp</span>
                      <i class='fa fa-edit'></i>
                    </button>";
          }
          else
            $link = "";

        }

          ?>

          <div class="col-md-9">
          <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <span style="font-size: 25px">Sponsor Details</span>
                <?php echo $link ?>
        <div id="modal-default2" class="modal fade" role="dialog" style="color: black">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Assign Sponsor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php
                  $date = date("M-d-Y");

              ?>
              <div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control dt" name="dtoday" value="<?php echo $date?>" disabled style="width: 40%" /><br/>
                        </div>
                <form method="post" action="backend/updatesponsor.php">
                        <label for="iname" id="name">Sponsors</label>
                        <select class="form-control input" id="spid" name="spid">
                          <?php

                          $wq = "SELECT currentYrLevel FROM scholar WHERE scholarID = '$scholar_id'";
                          $db = mysqli_query($con, $wq);
                          $i = mysqli_fetch_array($db);
                          $yr = $i['currentYrLevel'];

                          if($yr == "Elem_G1" || $yr == "Elem_G2" || $yr == "Elem_G3" || $yr == "Elem_G4" || $yr == "Elem_G5" || $yr == "Elem_G6"){
                            $type = "E";
                          }
                          else{
                            $type = "HS";
                          }

                          $sel = "SELECT sponsorID FROM scholar WHERE scholarID = '$scholar_id'";
                          $get = mysqli_query($con, $sel);
                          $id = mysqli_fetch_array($get);
                          $spid = $id['sponsorID'];

                          $asd = "SELECT firstName, lastName, sponsorID, donationType, amount FROM person as p JOIN user as u on u.personID = p.personID join sponsor as sp on p.personID = sp.personID WHERE u.programType = 'Sponsor' AND donationType LIKE '%$type%' AND applicationStatus = 'A'";
                          $qwe = mysqli_query($con, $asd);

                          while($info = mysqli_fetch_array($qwe)){

                            $sponsor_id =  $info['sponsorID'];

                            $x = "SELECT COUNT(scholarID) FROM scholar WHERE sponsorID = '$sponsor_id'";
                            $y = mysqli_query($con, $x);
                            $z = mysqli_fetch_row($y);
                            $scholCount = $z[0];

                            $a = "SELECT scholarCount FROM sponsor WHERE sponsorID = '$sponsor_id'";
                            $b = mysqli_query($con, $a);
                            $c = mysqli_fetch_row($b);
                            $prefcount = $c[0];

                            if($prefcount > $scholCount){
                               echo '<option value="'.$info['sponsorID'].'">'.$info['firstName'].' '.$info['lastName'].'</option>';
                            }
                            else{
                              echo '';
                            }

                            
                          }

                          ?>
                        </select>
                        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                    <input type="hidden" value="<?php echo $scholar_id?>" name="sid"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Assign"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
              </div>
              <div class="card-body box-profile" id="cbody">
                
                <?php 

                $qru = "SELECT firstName, lastName, donationType, amount, email, country FROM person JOIN sponsor JOIN scholar ON person.personID = sponsor.personID AND sponsor.sponsorID = scholar.sponsorID WHERE scholar.scholarID = '$scholar_id'";
                $result = mysqli_query($con, $qru);
                $row = mysqli_fetch_array($result);

                if(mysqli_num_rows($result) == 0){
                  $details =  "<br/><br/><center><span>No sponsor yet. 
                  Click <a href='' data-toggle='modal' data-target='#modal-default2'>here</a> to assign.
                  </span></center><br/><br/>";
                }
                else{

                $type = $row['donationType'];

                if($type == "HSM" || $type == "EM"){
                  $type = "Monthly";
                }
                elseif($type == "HSY" || $type == "EY"){
                  $type = "Yearly";
                }

                $details = ' <strong><i class="fa fa-book mr-1"></i> Sponsor Name</strong>
                <p class="text-muted">'.$row['firstName'].' '.$row['lastName'].'</p>

                <hr>

                <strong><i class="fa fa-user mr-1"></i> Email</strong>

                <p class="text-muted">'.$row['email'].'</p>

                <hr>

                <strong><i class="fa fa-credit-card mr-1"></i> Country</strong>

                <p class="text-muted">'.$row['country'].'</p>

                <hr>

                <strong><i class="fa fa-money mr-1"></i> Sponsor Type</strong>

                <p class="text-muted">'.$type.'</p>';

              }

                ?>

                <?php echo $details ?>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

</body>
</html>
