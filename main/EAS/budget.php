<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Assets</title>

  <?php
    session_start();
    ?>

  <style>
      li
      {
        list-style-type: none;
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

  <!-- CSS -->
    <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/ajax-bootstrap.css">
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/list.css">
  <link rel="stylesheet" type="text/css" href="css/budget.css">

  <!-- CSS -->


  <!-- SCRIPTS -->
    <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/jquery/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script src="z_script.js"></script>
<script src="backend/computepct.js"></script>
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
        <span class="brand-text font-weight-light">EAS</span>
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
            <a href="budget.php" class="nav-link active">
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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item active">Assets</li>
              <li class="breadcrumb-item active">Scholar Budget</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div id="modal-default" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Elementary - Monthly</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">

               <form method="post" action="backend/updatebudget.php">         

                <center>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover tblcustom text-center" style="padding:0px; margin-bottom: 0px;">
                      <thead>
                        <tr>
                          <td width="50%">Expense Category</td>
                          <td width="50%">Percentage</td>
                        </tr>
                      </thead>
                        
                      <tbody style="padding:0px;">
                        <tr>
                          <td>School Supplies</td>
                          <td><input class="text-center input decimal gr" type="number" name="supp" id="supp" onchange="computepct()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Projects</td>
                          <td><input class="text-center input decimal gr" type="number" name="proj" id="proj" onchange="computepct()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Uniform</td> 
                          <td><input class="text-center input decimal gr" type="number" name="unif" id="unif" onchange="computepct()" value=""/></td>
                        </tr>
                        <tr>
                          <td>School Contributions</td>
                          <td><input class="text-center input decimal gr" type="number" name="cont" id="cont" onchange="computepct()" value="" /></td>
                        </tr>
                        <tr>
                          <td>Transportation</td>
                          <td><input class="text-center input decimal gr" type="number" name="transpo" id="transpo" onchange="computepct()" value=""></td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold;">Total</td>
                          <td><input class="text-center form-control input" type="number" name="total" id="total" readonly style="border:none;" /></td>
                        </tr>
                      </tbody>
                    </table>
                    <hr/>
                    <label>Effectivity Period</label>
                    <input class="form-control" type="date" name="ep" required>
                  </div>
                </div>
                    </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                   <input type="hidden" name="budid" value="1"/>
                   <input type="submit" name="submit" class="btn btn-success" value="Confirm" onclick="validatepct()"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="modal-default2" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Elementary - Yearly</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">

               <form method="post" action="backend/updatebudget.php">         

                <center>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover tblcustom text-center" style="padding:0px; margin-bottom: 0px;">
                      <thead>
                        <tr>
                          <td width="50%">Expense Category</td>
                          <td width="50%">Percentage</td>
                        </tr>
                      </thead>
                        
                      <tbody style="padding:0px;">
                        <tr>
                          <td>School Supplies</td>
                          <td><input class="text-center input decimal gr" type="number" name="supp" id="supp2" onchange="computepct2()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Projects</td>
                          <td><input class="text-center input decimal gr" type="number" name="proj" id="proj2" onchange="computepct2()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Uniform</td> 
                          <td><input class="text-center input decimal gr" type="number" name="unif" id="unif2" onchange="computepct2()" value=""/></td>
                        </tr>
                        <tr>
                          <td>School Contributions</td>
                          <td><input class="text-center input decimal gr" type="number" name="cont" id="cont2" onchange="computepct2()" value="" /></td>
                        </tr>
                        <tr>
                          <td>Transportation</td>
                          <td><input class="text-center input decimal gr" type="number" name="transpo" id="transpo2" onchange="computepct2()" value=""></td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold;">Total</td>
                          <td><input class="text-center form-control input" type="number" name="total" id="total2" readonly style="border:none;" /></td>
                        </tr>
                      </tbody>
                    </table>
                    <label>Effectivity Period</label>
                    <input class="form-control" type="date" name="ep" required>
                  </div>
                </div>
                    </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                   <input type="hidden" name="budid" value="2"/>
                   <input type="submit" name="submit" class="btn btn-success" value="Confirm" onclick="validatepct2()"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="modal-default3" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Highschool - Monthly</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">

               <form method="post" action="backend/updatebudget.php">         

                <center>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover tblcustom text-center" style="padding:0px; margin-bottom: 0px;">
                      <thead>
                        <tr>
                          <td width="50%">Expense Category</td>
                          <td width="50%">Percentage</td>
                        </tr>
                      </thead>
                        
                      <tbody style="padding:0px;">
                        <tr>
                          <td>School Supplies</td>
                          <td><input class="text-center input decimal gr" type="number" name="supp" id="supp3" onchange="computepct3()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Projects</td>
                          <td><input class="text-center input decimal gr" type="number" name="proj" id="proj3" onchange="computepct3()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Uniform</td> 
                          <td><input class="text-center input decimal gr" type="number" name="unif" id="unif3" onchange="computepct3()" value=""/></td>
                        </tr>
                        <tr>
                          <td>School Contributions</td>
                          <td><input class="text-center input decimal gr" type="number" name="cont" id="cont3" onchange="computepct3()" value="" /></td>
                        </tr>
                        <tr>
                          <td>Transportation</td>
                          <td><input class="text-center input decimal gr" type="number" name="transpo" id="transpo3" onchange="computepct3()" value=""></td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold;">Total</td>
                          <td><input class="text-center form-control input" type="number" name="total" id="total3" readonly style="border:none;" /></td>
                        </tr>
                      </tbody>
                    </table>
                    <hr/>
                    <label>Effectivity Period</label>
                    <input class="form-control" type="date" name="ep" required>
                  </div>
                </div>
                    </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                   <input type="hidden" name="budid" value="3"/>
                   <input type="submit" name="submit" class="btn btn-success" value="Confirm" onclick="validatepct3()"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="modal-default4" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Highschool - Yearly</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">

               <form method="post" action="backend/updatebudget.php">         

                <center>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover tblcustom text-center" style="padding:0px; margin-bottom: 0px;">
                      <thead>
                        <tr>
                          <td width="50%">Expense Category</td>
                          <td width="50%">Percentage</td>
                        </tr>
                      </thead>
                        
                      <tbody style="padding:0px;">
                        <tr>
                          <td>School Supplies</td>
                          <td><input class="text-center input decimal gr" type="number" name="supp" id="supp4" onchange="computepct4()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Projects</td>
                          <td><input class="text-center input decimal gr" type="number" name="proj" id="proj4" onchange="computepct4()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Uniform</td> 
                          <td><input class="text-center input decimal gr" type="number" name="unif" id="unif4" onchange="computepct4()" value=""/></td>
                        </tr>
                        <tr>
                          <td>School Contributions</td>
                          <td><input class="text-center input decimal gr" type="number" name="cont" id="cont4" onchange="computepct4()" value="" /></td>
                        </tr>
                        <tr>
                          <td>Transportation</td>
                          <td><input class="text-center input decimal gr" type="number" name="transpo" id="transpo4" onchange="computepct4()" value=""></td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold;">Total</td>
                          <td><input class="text-center form-control input" type="number" name="total" id="total4" readonly style="border:none;" /></td>
                        </tr>
                      </tbody>
                    </table>
                    <hr/>
                    <label>Effectivity Period</label>
                    <input class="form-control" type="date" name="ep" required>
                  </div>
                </div>
                    </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                   <input type="hidden" name="budid" value="4"/>
                   <input type="submit" name="submit" class="btn btn-success" value="Confirm" onclick="validatepct4()"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">       

    <div class="row">
      <div class="col-md-6">
          <center><h2>Elementary Budget Allocation</h2></center><br/>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item text-center" style="width: 50%"><a class="nav-link active" style="border-radius: 0em;" href="#activity2" data-toggle="tab">Monthly</a></li>
                  <li class="nav-item text-center" style="width: 50%"><a class="nav-link ctm"  style="border-radius: 0em;" href="#timeline2" data-toggle="tab">Yearly</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body text-center">
              <div>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity2">
                  <?php

                $sel = "SELECT * FROM s_budgetallocation where budgetAllocationID = '1'";
                $qry = mysqli_query($con, $sel);
                $row = mysqli_fetch_array($qry);

                $sponsorAmt = 1250;
                $p_supply = "0.".$row['schoolSuppPercent'];
                $p_proj = "0.".$row['schoolProjPercent'];
                $p_unif = "0.".$row['schoolUniPercent'];
                $p_cont = "0.".$row['schoolContribPercent'];
                $p_transpo = "0.".$row['transpoPercent'];

                $e_supply = $sponsorAmt*$p_supply;
                $e_proj = $sponsorAmt*$p_proj;
                $e_unif = $sponsorAmt*$p_unif;
                $e_cont = $sponsorAmt*$p_cont;
                $e_transpo = $sponsorAmt*$p_transpo;

                $budid = $row['budgetAllocationID'];
                // $date = new DateTime($row['effectivityPeriod']);

                // $now = new DateTime();
                
                // if($date < $now){
                //   $em_btn = "<div class='btn-group float-right'>
                //     <a href='' data-toggle='modal' data-target='#modal-default'><button type='button' class='btn btn-success btn-flat'>
                //       <span>Change Percentage&nbsp&nbsp</span>
                //       <i class='fa fa-edit'></i>
                //     </button></a>
                // </div>";
                // }
                // else{
                //    $em_btn = "<div class='btn-group float-right'>
                //     <a href='' data-toggle='modal' data-target='#modal-default'><button type='button' class='btn btn-success btn-flat' disabled>
                //       <span>Change Percentage&nbsp&nbsp</span>
                //       <i class='fa fa-edit'></i>
                //     </button></a>
                // </div>";
                // }

                ?>
 

      <div class="row">
        <div class="col-md-12">
          <label>Amount</label>
          <input class="form-control" type="text" name="amount" id="amt" value="Php 1,500.00" readonly>
        </div>
        <br/>
      </div>
      
      
      <table class="table table-bordered">
          <th>Expense Category</th>
          <th>Percentage</th>
          <th>Equivalent Amount</th>

          <tr>
              <td>School Supplies</td>
              <td><?php echo $row['schoolSuppPercent'] ?></td>
              <td><?php echo $e_supply ?></td>
          </tr>

          <tr>
              <td>School Projects</td>
              <td><?php echo $row['schoolProjPercent'] ?></td>
              <td><?php echo $e_proj ?></td>
          </tr>

          <tr>
              <td>School Uniform</td>
              <td><?php echo $row['schoolUniPercent'] ?></td>
              <td><?php echo $e_unif ?></td>
          </tr>

          <tr>
              <td>School Contributions</td>
              <td><?php echo $row['schoolContribPercent'] ?></td>
              <td><?php echo $e_cont ?></td>
          </tr>

          <tr>
              <td>Transportation</td>
              <td><?php echo $row['transpoPercent'] ?></td>
              <td><?php echo $e_transpo ?></td>
          </tr>
      </table>

      
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="timeline2">

                  <?php

                $sel = "SELECT * FROM s_budgetallocation where budgetAllocationID = '2'";
                $qry = mysqli_query($con, $sel);
                $row = mysqli_fetch_array($qry);

                $sponsorAmt = 12500;
                $p_supply = "0.".$row['schoolSuppPercent'];
                $p_proj = "0.".$row['schoolProjPercent'];
                $p_unif = "0.".$row['schoolUniPercent'];
                $p_cont = "0.".$row['schoolContribPercent'];
                $p_transpo = "0.".$row['transpoPercent'];

                $e_supply = $sponsorAmt*$p_supply;
                $e_proj = $sponsorAmt*$p_proj;
                $e_unif = $sponsorAmt*$p_unif;
                $e_cont = $sponsorAmt*$p_cont;
                $e_transpo = $sponsorAmt*$p_transpo;

                $budid = $row['budgetAllocationID'];
                // $date = new DateTime($row['effectivityPeriod']);

                // $now = new DateTime();
                
                // if($date < $now){
                //   $em_btn = "<div class='btn-group float-right'>
                //     <a href='' data-toggle='modal' data-target='#modal-default2'><button type='button' class='btn btn-success btn-flat'>
                //       <span>Change Percentage&nbsp&nbsp</span>
                //       <i class='fa fa-edit'></i>
                //     </button></a>
                // </div>";
                // }
                // else{
                //    $em_btn = "<div class='btn-group float-right'>
                //     <a href='' data-toggle='modal' data-target='#modal-default2'><button type='button' class='btn btn-success btn-flat' disabled>
                //       <span>Change Percentage&nbsp&nbsp</span>
                //       <i class='fa fa-edit'></i>
                //     </button></a>
                // </div>";
                // }

                ?>
 

      <div class="row">
        <div class="col-md-12">
          <label>Amount</label>
          <input class="form-control" type="text" name="amount" id="amt" value="Php 12,500.00" readonly>
        </div>
        <br/>
      </div>
      
      
      <table class="table table-bordered">
          <th>Expense Category</th>
          <th>Percentage</th>
          <th>Equivalent Amount</th>

          <tr>
              <td>School Supplies</td>
              <td><?php echo $row['schoolSuppPercent'] ?></td>
              <td><?php echo $e_supply ?></td>
          </tr>

          <tr>
              <td>School Projects</td>
              <td><?php echo $row['schoolProjPercent'] ?></td>
              <td><?php echo $e_proj ?></td>
          </tr>

          <tr>
              <td>School Uniform</td>
              <td><?php echo $row['schoolUniPercent'] ?></td>
              <td><?php echo $e_unif ?></td>
          </tr>

          <tr>
              <td>School Contributions</td>
              <td><?php echo $row['schoolContribPercent'] ?></td>
              <td><?php echo $e_cont ?></td>
          </tr>

          <tr>
              <td>Transportation</td>
              <td><?php echo $row['transpoPercent'] ?></td>
              <td><?php echo $e_transpo ?></td>
          </tr>
      </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->

            <br/>
          </div><!-- card -->
        </div><!-- /.col -->
        <div class="col-md-6">
          <center><h2>Highschool Budget Allocation</h2></center><br/>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item text-center" style="width: 50%"><a class="nav-link active" style="border-radius: 0em;" href="#activity" data-toggle="tab">Monthly</a></li>
                  <li class="nav-item text-center" style="width: 50%"><a class="nav-link ctm"  style="border-radius: 0em;" href="#timeline" data-toggle="tab">Yearly</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body text-center">
              <div>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <?php

                $sel = "SELECT * FROM s_budgetallocation where budgetAllocationID = '3'";
                $qry = mysqli_query($con, $sel);
                $row = mysqli_fetch_array($qry);

                $sponsorAmt = 1500;
                $p_supply = "0.".$row['schoolSuppPercent'];
                $p_proj = "0.".$row['schoolProjPercent'];
                $p_unif = "0.".$row['schoolUniPercent'];
                $p_cont = "0.".$row['schoolContribPercent'];
                $p_transpo = "0.".$row['transpoPercent'];

                $e_supply = $sponsorAmt*$p_supply;
                $e_proj = $sponsorAmt*$p_proj;
                $e_unif = $sponsorAmt*$p_unif;
                $e_cont = $sponsorAmt*$p_cont;
                $e_transpo = $sponsorAmt*$p_transpo;

                $budid = $row['budgetAllocationID'];
                // $date = new DateTime($row['effectivityPeriod']);

                // $now = new DateTime();
                
                // if($date < $now){
                //   $em_btn = "<div class='btn-group float-right'>
                //     <a href='' data-toggle='modal' data-target='#modal-default3'><button type='button' class='btn btn-success btn-flat'>
                //       <span>Change Percentage&nbsp&nbsp</span>
                //       <i class='fa fa-edit'></i>
                //     </button></a>
                // </div>";
                // }
                // else{
                //    $em_btn = "<div class='btn-group float-right'>
                //     <a href='' data-toggle='modal' data-target='#modal-default3'><button type='button' class='btn btn-success btn-flat' disabled>
                //       <span>Change Percentage&nbsp&nbsp</span>
                //       <i class='fa fa-edit'></i>
                //     </button></a>
                // </div>";
                // }

                ?>
 

      <div class="row">
        <div class="col-md-12">
          <label>Amount</label>
          <input class="form-control" type="text" name="amount" id="amt" value="Php 1,500.00" readonly>
        </div>
        <br/>
      </div>
      
      
      <table class="table table-bordered">
          <th>Expense Category</th>
          <th>Percentage</th>
          <th>Equivalent Amount</th>

          <tr>
              <td>School Supplies</td>
              <td><?php echo $row['schoolSuppPercent'] ?></td>
              <td><?php echo $e_supply ?></td>
          </tr>

          <tr>
              <td>School Projects</td>
              <td><?php echo $row['schoolProjPercent'] ?></td>
              <td><?php echo $e_proj ?></td>
          </tr>

          <tr>
              <td>School Uniform</td>
              <td><?php echo $row['schoolUniPercent'] ?></td>
              <td><?php echo $e_unif ?></td>
          </tr>

          <tr>
              <td>School Contributions</td>
              <td><?php echo $row['schoolContribPercent'] ?></td>
              <td><?php echo $e_cont ?></td>
          </tr>

          <tr>
              <td>Transportation</td>
              <td><?php echo $row['transpoPercent'] ?></td>
              <td><?php echo $e_transpo ?></td>
          </tr>
      </table>

      
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="timeline">

                  <?php

                $sel = "SELECT * FROM s_budgetallocation where budgetAllocationID = '4'";
                $qry = mysqli_query($con, $sel);
                $row = mysqli_fetch_array($qry);

                $sponsorAmt = 15000;
                $p_supply = "0.".$row['schoolSuppPercent'];
                $p_proj = "0.".$row['schoolProjPercent'];
                $p_unif = "0.".$row['schoolUniPercent'];
                $p_cont = "0.".$row['schoolContribPercent'];
                $p_transpo = "0.".$row['transpoPercent'];

                $e_supply = $sponsorAmt*$p_supply;
                $e_proj = $sponsorAmt*$p_proj;
                $e_unif = $sponsorAmt*$p_unif;
                $e_cont = $sponsorAmt*$p_cont;
                $e_transpo = $sponsorAmt*$p_transpo;

                $budid = $row['budgetAllocationID'];
                // $date = new DateTime($row['effectivityPeriod']);

                // $now = new DateTime();
                
                // if($date < $now){
                //   $em_btn = "<div class='btn-group float-right'>
                //     <a href='' data-toggle='modal' data-target='#modal-default4'><button type='button' class='btn btn-success btn-flat'>
                //       <span>Change Percentage&nbsp&nbsp</span>
                //       <i class='fa fa-edit'></i>
                //     </button></a>
                // </div>";
                // }
                // else{
                //    $em_btn = "<div class='btn-group float-right'>
                //     <a href='' data-toggle='modal' data-target='#modal-default4'><button type='button' class='btn btn-success btn-flat' disabled>
                //       <span>Change Percentage&nbsp&nbsp</span>
                //       <i class='fa fa-edit'></i>
                //     </button></a>
                // </div>";
                // }

                ?>
 

      <div class="row">
        <div class="col-md-12">
          <label>Amount</label>
          <input class="form-control" type="text" name="amount" id="amt" value="Php 15,000.00" readonly>
        </div>
        <br/>
      </div>
      
      
      <table class="table table-bordered">
          <th>Expense Category</th>
          <th>Percentage</th>
          <th>Equivalent Amount</th>

          <tr>
              <td>School Supplies</td>
              <td><?php echo $row['schoolSuppPercent'] ?></td>
              <td><?php echo $e_supply ?></td>
          </tr>

          <tr>
              <td>School Projects</td>
              <td><?php echo $row['schoolProjPercent'] ?></td>
              <td><?php echo $e_proj ?></td>
          </tr>

          <tr>
              <td>School Uniform</td>
              <td><?php echo $row['schoolUniPercent'] ?></td>
              <td><?php echo $e_unif ?></td>
          </tr>

          <tr>
              <td>School Contributions</td>
              <td><?php echo $row['schoolContribPercent'] ?></td>
              <td><?php echo $e_cont ?></td>
          </tr>

          <tr>
              <td>Transportation</td>
              <td><?php echo $row['transpoPercent'] ?></td>
              <td><?php echo $e_transpo ?></td>
          </tr>
      </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->

            <br/>
          </div>
          <!-- /.col -->
    </div>
    <!-- row -->
    

    </div>
    <!-- container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

</body>
</html>
