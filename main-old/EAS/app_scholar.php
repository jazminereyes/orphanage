<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Applications</title>

  <?php
session_start();
  ?>



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
  <link rel="stylesheet" type="text/css" href="css/sponsor.css">
  <style>
      li
      {
        list-style-type: none;
      }

      .input{
        margin-left: 0px;
      }

      .txt{
        margin-left: 10px;
      }
    </style>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "ordering": true,
      "order": [[0,'desc']]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
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
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Application
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="app_scholar.php" class="nav-link active">
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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item active">Application</li>
              <li class="breadcrumb-item active">Scholar Applications</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <center><h2>Pending Scholar Applications</h2></center>
            </div>
            <div class="card-body" id="rtbl">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr>
                <th>Date Submitted</th>
                <th>Child Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                    <?php

                        $date = date('M-d-Y');
                        $query = "SELECT person.personID, firstName, lastName, submissionDate, scholarID, s_appform.scholarAppID, applicationStatus FROM s_appform JOIN scholar JOIN person ON s_appform.scholarAppID = scholar.scholarAppID AND scholar.personID = person.personID WHERE applicationStatus = 'Pending' OR applicationStatus = 'Processing'";
    
                        $rec = mysqli_query($con, $query);
        
                        if ($rec) 
                        {
                            while ($res = mysqli_fetch_array($rec)) 
                            { 

                                $id = $res['scholarID'];
                                $pid = $res['personID'];
                                $appid = $res['scholarAppID'];

                                echo "<tr>";
                                echo "<td>".$res['submissionDate']."</td>";
                                echo "<td>".$res['firstName']." ".$res['lastName']."</td>";
                                echo "<td>
                             
                                <a href='viewapp.php?scholarid=".$id."'><button type='button' class='btn btn-warning'><span><i class='fa fa-eye'></i></span>&nbsp;&nbsp;View</button></a>

                               <a href='#accept".$id."' data-toggle='modal'><button type='button' class='btn btn-success'><span><i class='fa fa-check'></i></span>&nbsp;&nbsp;Accept</button></a>

                               <a href='#decline".$id."' data-toggle='modal'><button type='button' class='btn btn-danger'><span><i class='fa fa-times'></i></span>&nbsp;&nbsp;Decline</button></a>";

    echo '<div id="accept'.$id.'" class="modal fade" role="dialog" style="color: black">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Accept Application</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php
                  $date = date("M-d-Y");

              ?>
              <div class="modal-body">

                <form method="post" action="backend/acceptsch.php" enctype="multipart/form-data">

                <div class="row">
                  <span class="txt">You are accepting the application of '.$res['firstName'].' '.$res['lastName'].'. Please input the following.</span>
                </div>
                  
                  <div class="row">
                    <div class="col-6">
                      <label>Submission Date</label>
                      <input type="text" class="form-control input" name="subdate" value="'.$res['submissionDate'].'" disabled />
                    </div>
                    <div class="col-6">
                      <label>Admission Date</label>
                      <input type="date" class="form-control input" name="admission" required/>
                    </div>
                  </div><br/>

                  <div class="row">
                    <div class="col-6">
                      <label>Interview Date</label>
                      <input type="date" class="form-control input" name="intdate" required/>
                    </div>
                    <div class="col-6">
                      <label>Interviewed By</label>
                      <input type="text" class="form-control input" name="intby" required/>
                    </div>
                  </div><br/>

                  <div class="row">
                    <div class="col-12">
                      <label>Child Photo: </label>
                      <input type="file" name="photo" class="form-control input">
                    </div>
                  </div><br/>
                        
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input type="hidden" value="'.$pid.'" name="pid" />
                    <input type="hidden" value="'.$appid.'" name="appid" />
                    <input type="hidden" value="'.$id.'" name="sid"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->';


echo"
    <div id='decline".$id."' class='modal fade' role='dialog'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Decline Application</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                <p>You are declining the application of ".$res['firstName']." ".$res['lastName'].". You may send an email to notify them. Are you sure?</p>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                <form method='post' action='backend/declinesch.php'>
                <input type='hidden' value='".$id."' name='sid'/>
                <input type='submit' name='submit' class='btn btn-success' value='Confirm'/>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


                                      </td>";
                                echo "</tr>";
                            }
                        }
        
                    ?>
                                    <tfoot>
                <tr>
                  <th>Date Submitted</th>
                <th>Child Name</th>
                <th>Action</th>
                </tr>
                </tfoot>
              </tbody>
              </table>
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

</body>
</html>
