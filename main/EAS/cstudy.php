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
  <link rel="stylesheet" type="text/css" href="css/viewsponsor.css">

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
<script src="backend/updatesch.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "ordering": true,
      "order": [[ 0, "desc" ]]
    });
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "order": [[ 0, "desc" ]],
      "info": false,
      "autoWidth": true
    });
  });
</script>
<!-- /SCRIPTS -->
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
              <li class="breadcrumb-item active">Case Study</li>
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

                      $query = "SELECT firstName, middleName, lastName, person.photo, currentYrLevel, scholar.personID FROM person LEFT JOIN scholar on person.personID = scholar.personID WHERE scholarID = $scholar_id";

                      $res = mysqli_query($con, $query);
                      $rec = mysqli_fetch_array($res);

                      $sch_pid = $rec['personID'];

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
                       src="../img/no-image.jpg"
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
                      <a class="dropdown-item" data-toggle='modal' data-target='#modal-default'>Add Case Study</a>
                      <a class="dropdown-item" href="viewscholar.php?scholarid=<?php echo $scholar_id?>"> Profile</a>
                      <a class="dropdown-item" href="s_application.php?scholarid=<?php echo $scholar_id?>"> View Application</a>
                      <a class="dropdown-item" href="expense.php?scholarid=<?php echo $scholar_id?>">Expenses</a>
                      <a class="dropdown-item" href="medical.php?scholarid=<?php echo $scholar_id?>"'>Medical</a>
                      <a class="dropdown-item" href="academic.php?scholarid=<?php echo $scholar_id?>">Academics</a>
                      <a class="dropdown-item" href="sponsordet.php?scholarid=<?php echo $scholar_id?>">Sponsor</a>
                    </div>
                  </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        <div id="modal-default" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Case Study</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("M-d-Y");
              ?>
              <div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <span><?php echo $date?></span><br/>
                        </div>
                <form method="post" action="backend/addcstudy.php" enctype="multipart/form-data">
                        <label for="iname" id="name">Title:</label>
                        <input type="text" class="form-control swd" name="title" style="width: 80%;"/><br/>
                        <label for="file" id="cs">File:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <input type="file" name="fileToUpload"/><br/>
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

            <?php

               $qry = "SELECT school FROM person JOIN scholar ON person.personID = scholar.personID WHERE scholarID = $scholar_id";
               $qwe = mysqli_query($con, $qry);
               $info = mysqli_fetch_row($qwe);

            ?>

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Scholarship Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i>School</strong>

                <p class="text-muted">
                  <?php echo $info[0]; ?>
                </p>

                <hr>

                <?php 

                $qru = "SELECT firstName, lastName, donationType, amount FROM person JOIN sponsor JOIN scholar ON person.personID = sponsor.personID AND sponsor.sponsorID = scholar.sponsorID WHERE scholar.scholarID = '$scholar_id'";
                $result = mysqli_query($con, $qru);
                $row = mysqli_fetch_array($result);

                $type = $row['donationType'];

                if($type == "HSM" || $type == "EM"){
                  $type = "Monthly";
                }
                elseif($type == "HSY" || $type == "EY"){
                  $type = "Yearly";
                }

                ?>

                <strong><i class="fa fa-user mr-1"></i> Sponsor Name</strong>

                <p class="text-muted"><?php echo $row['firstName'].''.$row['lastName'];?></p>

                <hr>

                <strong><i class="fa fa-credit-card mr-1"></i> Sponsor Type</strong>

                <p class="text-muted"><?php echo $type?></p>

                <hr>

                <strong><i class="fa fa-money mr-1"></i> Sponsor Amount</strong>

                <p class="text-muted">Php <?php echo $row['amount']?>.00</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
                <div class="card" id="cbody3">
                  <div class="card-header">
                    <span class="cheader">Case Study</span>
                    <button type='button' class='btn btn-success btn-flat float-right' data-toggle='modal' data-target='#modal-default'>
                      <span>Add Case Study&nbsp&nbsp</span>
                      <i class='fa fa-plus'></i>
                    </button>
                    </div>
                  <div class="card-body">
                      <div class="form-group">
                          <?php 

                        $sql2 = "SELECT * FROM is_casestudy WHERE personID = '$sch_pid'";
                        $result2 = mysqli_query($con, $sql2);

                          echo ' <table id="example1" class="table table-bordered table-striped text-center">
                          <thead>
                            <tr>
                              <th>Date Uploaded</th>
                              <th>Case Study Title</th>
                              <th>File Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>';
                          while ($row2 = mysqli_fetch_array($result2))
                          {

                            echo '<tr>
                            <td>'.$row2['dateUploaded'].'</td>
                            <td>'.$row2['title'].'</td>
                            <td>'.$row2['fileName'].'</td>
                            <td><button type="button" class="btn btn-warning">Download &nbsp<i class="fa fa-download"></i></button></td>
                            </tr>';
                          }

                      ?>

                    </tbody>
                    </table>

                      <!--form-group-->
                      </div>
                  <!--card-body-->
                  </div>
              <!--card-->
              </div>
            <!--col-md-->
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
