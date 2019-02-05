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
            <a href="dashboard.php" class="nav-link active">
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

                $rec = mysqli_fetch_row($res);

                echo '<li class="breadcrumb-item"><a href="viewscholar.php?scholarid='.$scholar_id.'" class="text-light">'.$rec[0].' '.$rec[1].'</a></li>';
              ?>
              <li class="breadcrumb-item active">Academic</li>
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
                                   src="data:image/jpeg;base64,'.base64_encode($rec[3]).'"
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
                      <a class="dropdown-item" href="s_application.php?scholarid=<?php echo $scholar_id?>">View Application</a>
                      <a class="dropdown-item" href="expense.php?scholarid=<?php echo $scholar_id?>">Expenses</a>
                      <a class="dropdown-item" href="medical.php?scholarid=<?php echo $scholar_id?>"'>Medical</a>
                      <a class="dropdown-item" href="#">Academics</a>
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
                <strong><i class="fa fa-book mr-1"></i>School</strong>
                <p class="text-muted">
                  <?php 

                  $get = "SELECT school FROM scholar WHERE scholarID = '$scholar_id'";
                  $qwe = mysqli_query($con, $get);
                  $info = mysqli_fetch_row($qwe);

                  echo $info[0]; ?>
                </p>

                <hr>

                <?php 

                $qru = "SELECT firstName, lastName, donationType, amount FROM person JOIN sponsor JOIN scholar ON person.personID = sponsor.personID AND sponsor.sponsorID = scholar.sponsorID WHERE scholar.scholarID = $scholar_id";
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

                <p class="text-muted"><?php echo $row['firstName'].' '.$row['lastName']; ?></p>

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
        </div>
        <!-- /.row -->

        <div class="col-md-12" id="cb">
        <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active tb" href="#activity" data-toggle="tab">List of Grades</a></li>
                  <li class="nav-item"><a class="nav-link tb" href="#timeline" data-toggle="tab">List of Grade Averages</a></li>
                </ul>

                
        
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <div class="btn-group float-right">
                    <button type="button" class="btn btn-success btn-flat" data-toggle='modal' data-target='#modal-default'>
                      <span>Add Grade&nbsp&nbsp</span>
                      <i class="fa fa-plus"></i>
                    </button>

        <div id="modal-default" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("M-d-Y");
              ?>
              <div class="modal-body">

                <form name="grades" method="post" action="backend/addgrade.php">
                    <div class="row">
                      <div class="col-md-6 form-inline">
                        <label for="iname" id="name">School Year</label>
                        <select type="text" class="form-control" id="syr" name="syr"  style="width: 60%" required><br/>

                        <?php
                          $date = date("Y");
                          $maxdate = $date + 1;
                          
                          while($maxdate >= $date){
                            $mindate = $maxdate-1;
                            echo '<option value="'.$mindate.'-'.$maxdate.'">'.$mindate.'-'.$maxdate.'</option>';

                            $maxdate-=1;
                          }
                        ?>
                        </select>
                      </div>
                      <div class="col-md-6 form-inline">
                        <label for="iname" id="name">Grading Period</label>
                        <select type="text" class="form-control" id="height" name="grading"  style="width: 60%" required><br/>
                          <option value="1st">1st</option>
                          <option value="2nd">2nd</option>
                          <option value="3rd">3rd</option>
                          <option value="4th">4th</option>
                        </select>
                      </div>
                    </div><br/>

                <center>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover tblcustom text-center" style="padding:0px; margin-bottom: 0px;">
                      <thead>
                        <tr>
                          <td width="50%">Subject</td>
                          <td width="50%">Grade</td>
                        </tr>
                      </thead>
                        
                      <tbody style="padding:0px;">
                        <tr>
                          <td>Math</td>
                          <td><input class="text-center input decimal gr" type="number" name="math" id="math" onchange="computeavg()" value="" required></td>
                        </tr>
                        <tr>
                          <td>English</td>
                          <td><input class="text-center input decimal gr" type="number" name="eng" id="eng" onchange="computeavg()" value="" required></td>
                        </tr>
                        <tr>
                          <td>Filipino</td> 
                          <td><input class="text-center input decimal gr" type="number" name="fil" id="fil" onchange="computeavg()" value="" required/></td>
                        </tr>
                        <tr>
                          <td>Science</td>
                          <td><input class="text-center input decimal gr" type="number" name="sci" id="sci" onchange="computeavg()" value="" required/></td>
                        </tr>
                        <tr>
                          <td>History</td>
                          <td><input class="text-center input decimal gr" type="number" name="histo" id="histo" onchange="computeavg()" value="" required></td>
                        </tr>
                        <tr>
                          <td>MAPEH</td>
                          <td><input class="text-center input decimal gr" type="number" name="mapeh" id="mapeh" onchange="computeavg()" value="" required></td>
                        </tr>
                        <tr>
                          <td>TLE</td>
                          <td><input class="text-center input decimal gr" type="number" name="tle" id="tle" onchange="computeavg()" value="" required /></td>
                        </tr>
                        <tr>
                          <td>Values Education</td>
                          <td><input class="text-center input decimal gr" type="number" name="val" id="val" onchange="computeavg()" value="" required /></td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold;">Average</td>
                          <td><input class="text-center form-control input" type="number" name="avg" id="avg" readonly style="border:none;" /></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                    </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input type="hidden" name="sid" value="<?php echo $scholar_id?>" />
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>School Year</th>
                          <th>Grading Period</th>
                          <th>Subject</th>
                          <th>Grade</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                      <?php

        $query = "SELECT schoolYr, semester, subject, grade FROM s_grades JOIN s_academicsummary JOIN scholar ON s_grades.academicID = s_academicsummary.academicID AND s_academicsummary.scholarID = scholar.scholarID WHERE s_academicsummary.scholarID = '".$scholar_id."'";
        $result = mysqli_query($con, $query);

        if ($result)
        {
          while ($rec = mysqli_fetch_row($result))
          {
            echo '<tr>
            <td>'.$rec[0].'</td>
            <td>'.$rec[1].'</td>
            <td>'.$rec[2].'</td>
            <td>'.$rec[3].'</td>
            </tr>';
          }
        }
    ?>
                  </tbody>

                  <tfoot>
                    <tr>
                          <th>School Year</th>
                          <th>Grading Period</th>
                          <th>Subject</th>
                          <th>Grade</th>
                    </tr>
                  </tfoot>
              
              </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                  

                  <div class="active tab-pane" id="activity">
                  <table id="example2" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>School Year</th>
                          <th>Grading Period</th>
                          <th>Average</th>
                      </tr>
                  </thead>
      <tbody>
      <?php

       $query = "SELECT schoolYr, semester, average FROM s_academicsummary WHERE scholarID = '".$scholar_id."'";
        $result = mysqli_query($con, $query);

        if ($result)
        {
          while ($rec = mysqli_fetch_row($result))
          {
            echo '<tr>
            <td>'.$rec[0].'</td>
            <td>'.$rec[1].'</td>
            <td>'.$rec[2].'</td>
            </tr>';
          }
        }
    ?>
      </tbody>

                  <tfoot>
                    <tr>
                          <th>School Year</th>
                          <th>Grading Period</th>
                          <th>Average</th>
                    </tr>
                  </tfoot>
      </table>
                  </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">

                  <center><span style="font-size: 200%">Statement of Expense for the Year:</span>
                  <select class="form-control" name="year" style="display: inline-block; width: 10%; font-size: 120%">

                   <?php


      $query = "SELECT DISTINCT YEAR(releaseDate), scholarID FROM s_expensestatement as e JOIN s_budget as b ON e.budgetID = b.budgetID WHERE scholarID = '$scholar_id'";
      $a = mysqli_query($con, $query);

      while ($b = mysqli_fetch_row($a))
      {
        echo '<option value="'.$b[0].'">'.$b[0].'</option>';
      }

      echo '';
    
  ?>
               </select></center>
                <center><table class="table table-bordered text-center" style="width: 60%">
                  <tr>
                    <th>Expense Category</th>
                    <th>Amount</th>
                  </tr>

                  <?php
        $supp = 0;
        $proj = 0;
        $uni = 0;
        $contrib = 0;
        $transpo = 0;

        $query2 = "SELECT expenseCategory, amount FROM s_expensestatement WHERE budgetID = '$bid' AND releaseDate LIKE '2018-%%-%%'";
        $res = mysqli_query($con, $query2);
        
        while ($rec = mysqli_fetch_row($res))
        {
            if ($rec[0]=="supplies")
            {
                $supp = $supp + $rec[1];
            }

            else if ($rec[0]=="projects")
            {
                $proj = $proj + $rec[1];
            }

            else if ($rec[0]=="uniform")
            {
                $uni = $uni + $rec[1];
            }

            else if ($rec[0]=="contributions")
            {
                $contrib = $contrib + $rec[1];
            }

            else if ($rec[0]=="transportation")
            {
                $transpo = $transpo + $rec[1];
            }
        }

        echo '<tr>
        <td class="tdexpense">School Supplies</td>
        <td class="tdexpense">'.$supp.'</td>
        </tr>';
        echo '<tr>
        <td class="tdexpense">School Projects</td>
        <td class="tdexpense">'.$proj.'</td>
        </tr>';
        echo '<tr>
        <td class="tdexpense">School Uniform</td>
        <td class="tdexpense">'.$uni.'</td>
        </tr>';
        echo '<tr>
        <td class="tdexpense">School Contributions</td>
        <td class="tdexpense">'.$contrib.'</td>
        </tr>';
        echo '<tr>
        <td class="tdexpense">Transportation</td>
        <td class="tdexpense">'.$transpo.'</td>
        </tr>';
        echo '<tr>
        <td class="tdexpense">TOTAL EXPENSE</td>
        <td class="tdexpense">'.($supp + $proj + $uni + $contrib + $transpo).'</td>
        </tr>';


    ?>
                  
                </table></center>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- .col -->
      </div><!-- /.container-fluid -->
      <br/>
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
