n<!DOCTYPE html>
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

    .input{
      margin-left: 0px;
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
<script src="backend/computebal.js"></script>
<script src="backend/validatenum.js"></script>
<script src="z_script.js"></script>
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
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
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
                <a href="scholar.php" class="nav-link">
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
              <li class="breadcrumb-item active">Expenses</li>
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
                      <a class="dropdown-item" href="#">Expenses</a>
                      <a class="dropdown-item" href="medical.php?scholarid=<?php echo $scholar_id?>"'>Medical</a>
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

                $qru = "SELECT firstName, lastName, donationType, amount FROM person JOIN user JOIN sponsor JOIN scholar ON person.personID = user.personID AND user.userID = sponsor.userID AND sponsor.sponsorID = scholar.sponsorID WHERE scholar.scholarID = '$scholar_id'";
                $result = mysqli_query($con, $qru);
                $row = mysqli_fetch_array($result);

                if(mysqli_num_rows($result) == 0){
                  $details =  "<br/><br/><center><span>No sponsor yet. 
                  Click <a <a href='sponsordet.php?scholarid=".$scholar_id."'>here</a> to assign.
                  </span></center><br/><br/>";
                }
                else{

                $type = $row['donationType'];
                $sponsorAmt = $row['amount'];

                if($type == "HSM" || $type == "EM"){
                  $type = "Monthly";
                }
                elseif($type == "HSY" || $type == "EY"){
                  $type = "Yearly";
                }

                $details = ' <strong><i class="fa fa-book mr-1"></i> Sponsor Name</strong>
                <p class="text-muted">'.$row['firstName'].' '.$row['lastName'].'</p>

                <hr>

                <strong><i class="fa fa-money mr-1"></i> Sponsor Type</strong>

                <p class="text-muted">'.$type.'</p>

                <hr>

                <strong><i class="fa fa-credit-card mr-1"></i>Sponsor Amount</strong>

                <p class="text-muted">'.$row['amount'].'</p>';

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


      <?php 

      $qru = "SELECT firstName, lastName, donationType, amount, email, country FROM person JOIN user JOIN sponsor JOIN scholar ON person.personID = user.personID AND user.userID = sponsor.userID AND sponsor.sponsorID = scholar.sponsorID WHERE scholar.scholarID = '$scholar_id'";
                $result = mysqli_query($con, $qru);
                $row = mysqli_fetch_array($result);

                if(mysqli_num_rows($result) != 0){
                  $btn =  "<button type='button' class='btn btn-success btn-flat' data-toggle='modal' data-target='#modal-default2'>
                      <span>Add Expense&nbsp&nbsp</span>
                      <i class='fa fa-plus'></i>
                    </button>";
                  $budbtn = '<li class="nav-item"><a class="nav-link tb" href="#timeline" data-toggle="tab">Budget Monitoring</a></li>';
                }
                else{
                  $btn = "<button type='button' class='btn btn-success btn-flat' data-toggle='modal' data-target='#assignspon'>
                      <span>Add Expense&nbsp&nbsp</span>
                      <i class='fa fa-plus'></i>
                    </button>";
                  $budbtn = "";
                }
      ?>

        <div class="col-md-12" id="cb">
        <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active tb" href="#activity" data-toggle="tab">Expenses</a></li>
                  <?php echo $budbtn ?>
                  <li class="nav-item"><a class="nav-link tb" href="#settings" data-toggle="tab">Statement of Expense</a></li>
                </ul>
                    
        <div id="modal-default2" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Expense Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("M-d-Y");
              ?>

             <!--  <script type="text/javascript">
                $(function(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate() + 5;
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        var minDate= year + '-' + month + '-' + day;

        $('#date').attr('min', minDate);
    });
              </script> -->
              <div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control" name="dtoday" id="date" value="<?php echo $date?>" disabled style="width: 40%"/><br/>
                        </div>
                <form method="post" action="backend/addexpense.php">

                    
                    <input type="hidden" id="scholar" value="<?php echo $scholar_id ?>" name="scholar"/>

                <?php

                $sel = "SELECT budgetID, amountRemaining, amountSpent FROM s_budget WHERE scholarID = '$scholar_id'";
                $get = mysqli_query($con, $sel);
                $sq = mysqli_fetch_array($get);
                $budid = $sq['budgetID'];
                $rem = $sq['amountRemaining'];
                $spent = $sq['amountSpent'];

                ?>

                        
                        <label>Purpose</label>
                        <input type="text" class="form-control input" name="purpose" required/><br/>
                        <div class="row">
                          <div class="col-6">
                            <label for="cat">Category</label>
                            <select class="form-control input" name="category" onchange="displayBalance(this.value)" required>
                              <option value="" disabled selected>--Select Category--</option>
                              <option value="supplies">School Supply</option>
                              <option value="projects">School Project</option>
                              <option value="uniform">School Uniform</option>
                              <option value="contributions">School Contribution</option>
                              <option value="transportation">Tranportation</option>
                            </select>
                          </div>
                          <div class="col-6">
                            <div id="rem">
                              <label class="lblto">Remaining Balance</label>
                              <input type="text" class="form-control input" readonly id="balance" name="balance" />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <label for="count" id="icount">Quantity</label>
                            <input type="number" class="form-control val input" id="quantity" name="quantity" min="1" required/><br/>
                          </div>
                          <div class="col-6">
                            <label for="crit" id="cmt">Amount</label>
                            <input type="number" class="form-control input amt" id="price" name="price" onchange="displayBal()" required/><br/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <label class="lblto">Current Balance</label>
                            <input type="number" class="form-control input" id="crem" name="crem" value=<?php echo $rem ?> readonly/>
                          </div>
                          <div class="col-6">
                            <label class="lblto">Computed Remaining Balance</label>
                            <input type="number" class="form-control input" id="tbal" name="tbal" readonly/>
                          </div>
                        </div>
                        
                        
                        <label id="name">Authorized By</label>
                        <input type="text" class="form-control input" name="auth" required/><br/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                <script type="text/javascript">
                  
                </script>

                    <input type="hidden" value="<?php echo $budid ?>" name="budid"/>
                    <input type="hidden" value="<?php echo $spent ?>" name="spent"/>
                
                    <input type="submit" name="submit" class="btn btn-success" value="Add expense" onclick="validateBalance()"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

      </div><!-- /.card-header -->


       <div id="assignspon" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">No sponsor yet.</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              
              <div class="modal-body">

              <span><?php echo $rec['firstName'] ?> does not have sponsor yet. Please assign <a href="sponsordet.php?scholarid=<?php echo $scholar_id?>">here</a> first before adding expense.</span>
                        
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>


                    <input type="hidden" value="<?php echo $budid ?>" name="budid"/>
                    <input type="hidden" value="<?php echo $spent ?>" name="spent"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
              <div class="card-body">
              
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <div class="btn-group float-right">
                    <?php echo $btn ?>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Release Date</th>
                          <th>Purpose</th>
                          <th>Category</th>
                          <th>Quantity</th>
                          <th>Amount</th>
                          <th>Authorized By</th>
                          <th>Balance</th>
                      </tr>
                  </thead>
                  
                  <tbody>
        <?php

        $query = "SELECT budgetID FROM s_budget WHERE scholarID = '$scholar_id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);

        $query2 = "SELECT releaseDate, purpose, expenseCategory, quantity, amount, equivSupplies, equivProjects, equivUniform, equivContrib, equivTranspo, balance, receivedBy FROM s_expensestatement JOIN s_budget ON s_expensestatement.budgetID = s_budget.budgetID WHERE s_expensestatement.budgetID = '".$row[0]."'";
        $res = mysqli_query($con, $query2);

        if ($res)
        {


          while ($rec = mysqli_fetch_row($res))
          {
            if ($rec[2] == "supplies")
            {
              $category = "School Supplies";
              $balance = $rec[5];
            }

            else if ($rec[2] == "projects")
            {
              $category = "School Projects";
              $balance = $rec[6];
            }

            else if ($rec[2] == "uniform")
            {
              $category = "School Uniform";
              $balance = $rec[7];
            }

            else if ($rec[2] == "contributions")
            {
              $category = "School Contributions";
              $balance = $rec[8];
            }

            else if ($rec[2] == "transportation")
            {
              $category = "Transportation";
              $balance = $rec[9];
            }

            echo '<tr>
            <td>'.$rec[0].'</td>
            <td>'.$rec[1].'</td>
            <td>'.$category.'</td>
            <td>'.$rec[3].'</td>
            <td>Php '.$rec[4].'</td>
            <td>'.$rec[11].'</td>
            <td>Php '.$rec[10].'</td>
            </tr>';
          }
        }
        
      ?>
                  </tbody>

                  <tfoot>
                    <tr>
                         <th>Release Date</th>
                          <th>Purpose</th>
                          <th>Category</th>
                          <th>Quantity</th>
                          <th>Amount</th>
                          <th>Authorize By</th>
                          <th>Balance</th>
                    </tr>
                  </tfoot>
              
              </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">

                  <div class="active tab-pane" id="activity">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
        <th width="20%" rowspan="2">Expense Category</th>
        <th width="5%" rowspan="2">Percentage(%)</th>
        <th width="15%" rowspan="2">Equivalent Amount</th>
        <th width="45%" colspan="3" style="border-bottom: none">Total Amount</th>
      </tr>
      <tr>
        <th width="15%">Spent</th>
        <th width="15%">Remaining</th>
        <th width="15%" style="border-right: none">Credited</th>
      </tr>
      </thead>
      <tbody>

      <?php

        $supp = 0;
        $proj = 0;
        $uni = 0;
        $contrib = 0;
        $transpo = 0;

        $query = "SELECT equivSupplies, equivProjects, equivUniform, equivContrib, equivTranspo, schoolSuppPercent, schoolProjPercent, schoolUniPercent, schoolContribPercent, transpoPercent, amountSpent, amountRemaining, amountCredited, budgetID FROM s_budget JOIN s_budgetallocation ON s_budget.budgetAllocationID = s_budgetallocation.budgetAllocationID WHERE scholarID = '$scholar_id'";

        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);

        $p_supply = "0.".$row[5];
        $p_proj = "0.".$row[6];
        $p_unif = "0.".$row[7];
        $p_cont = "0.".$row[8];
        $p_transpo = "0.".$row[9];

        $e_supply = $sponsorAmt*$p_supply;
        $e_proj = $sponsorAmt*$p_proj;
        $e_unif = $sponsorAmt*$p_unif;
        $e_cont = $sponsorAmt*$p_cont;
        $e_transpo = $sponsorAmt*$p_transpo;

        $bid = $row[13];

        $query2 = "SELECT expenseCategory, amount FROM s_expensestatement JOIN s_budget ON s_expensestatement.budgetID = s_budget.budgetID WHERE scholarID = '$scholar_id'";

        $res = mysqli_query($con, $query2);
        
        if ($res)
        {
            while ($rec = mysqli_fetch_row($res))
            {
              if ($rec[0] == "supplies")
              {
                $supp = $supp + $rec[1];
              }

              else if ($rec[0] == "projects")
              {
                $proj = $proj + $rec[1];
              }

              else if ($rec[0] == "uniform")
              {
                $uni = $uni + $rec[1];
              }

              else if ($rec[0] == "contributions")
              {
                $contrib = $contrib + $rec[1];
              }

              else if ($rec[0] == "transportation")
              {
                $transpo = $transpo + $rec[1];
              }

            }
        }

        $r_supp = $e_supply - $supp;

        $suppcr = $supp + $r_supp;
        $projcr = $proj + $row[1];
        $unicr = $uni + $row[2];
        $contribcr = $contrib + $row[3];
        $transpocr = $transpo + $row[4];

        echo '<tr>
        <td>School Supplies</td>
        <td>'.$row[5].'</td>
        <td>'.$e_supply.'</td>
        <td>'.$supp.'</td>
        <td>'.$r_supp.'</td>
        <td>'.$suppcr.'</td>
        </tr>';

        echo '<tr>
        <td>School Projects</td>
        <td>'.$row[6].'</td>
        <td>'.$e_proj.'</td>
        <td>'.$proj.'</td>
        <td>'.$row[1].'</td>
        <td>'.$projcr.'</td>
        </tr>';

        echo '<tr>
        <td>School Uniform</td>
        <td>'.$row[7].'</td>
        <td>'.$e_unif.'</td>
        <td>'.$uni.'</td>
        <td>'.$row[2].'</td>
        <td>'.$unicr.'</td>
        </tr>';

        echo '<tr>
        <td>School Contributions</td>
        <td>'.$row[8].'</td>
        <td>'.$e_cont.'</td>
        <td>'.$contrib.'</td>
        <td>'.$row[3].'</td>
        <td>'.$contribcr.'</td>
        </tr>';

        echo '<tr>
        <td>Transportation</td>
        <td>'.$row[9].'</td>
        <td>'.$e_transpo.'</td>
        <td>'.$transpo.'</td>
        <td>'.$row[4].'</td>
        <td>'.$transpocr.'</td>
        </tr>';
      ?>
      </tbody>
      </table>
                  </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">

                  <input type="hidden" id="bid" value="<?php echo $bid ?>" name="bid"/>
                  <input type="hidden" id="scholar" value="<?php echo $scholar_id ?>" name="scholar"/>
                  <center><span style="font-size: 200%">Statement of Expense for the Year:</span>
                  <select class="form-control" name="year" style="display: inline-block; width: 10%; font-size: 120%" onchange="getStatement(this.value)">
                  <option value="" disabled selected>--Select Year--</option>

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
                
                <div id="statement">
                <center><table class="table table-bordered text-center" style="width: 60%">
                  <tr>
                    <th>Expense Category</th>
                    <th>Amount</th>
                  </tr>
                  <tr>
                    <td>School Supplies</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>School Projects</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>School Uniform</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>School Contributions</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Transportation</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>TOTAL EXPENSE</td>
                    <td></td>
                  </tr>
                  </table></center>
              </div>
                  
                
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- .col -->
        <br/>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

</body>
</html>
