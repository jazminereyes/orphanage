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

  <!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables/ajax-bootstrap.css">
<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="../mdb/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../mdb/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../mdb/css/style.css" rel="stylesheet">

  <style>
      li
      {
        list-style-type: none;
      }
      .content 
      {
        background-color:#2dcc70;
      }

      .card-body {
        padding: 1.25rem!important;
      }

      .sidebar-dark-primary {
        background-color: #343a40!important;
      }

      .bg-dark {
        background-color: #343a40!important;
      }

      .input-group>.form-control:not(:last-child) {
          margin-top: 6px;
      }

      .input-group>.input-group-append>.btn{
        margin-left: 0px;
      }

      .btn-custom{
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0), 0 2px 10px 0 rgba(0,0,0,0);
        -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0), 0 2px 10px 0 rgba(0,0,0,0);
      }

      .btn-close{
        color: #3a3434;
      }
  </style>

  <!-- SCRIPTS -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/jquery/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->

  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../mdb/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../mdb/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../mdb/js/mdb.min.js"></script>
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
          <button class="btn-custom btn btn-navbar btn-custom" type="submit">
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
          <li class="nav-item">
            <a href="orphans.php" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Orphans
              </p>
            </a>
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
            <a href="sponsors.php" class="nav-link">
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
                <a href="sponsorapplications.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sponsor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="socialworkerapplications.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Social Worker</p>
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
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Maintenance</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="unit.php" class="nav-link">
                            <i class="fa fa-minus nav-icon"></i>
                            <p>Unit of Measurement</p>
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="list.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="receive2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="release.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
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
            <a href="reports.php" class="nav-link">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
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
            <center><h1 class="m-0 text-light"><strong>ACCOUNTS</strong></h1></center>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item active">Accounts</li>
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
        <div class="col-md-12">
          <a href="addchild.php" class="btn btn-primary add float-right" data-toggle='modal' data-target='#modal-warning'>Add Account<i class="fa fa-plus" style="margin-left: 10px;"></i></a>
        </div>
      </div>
          

      <div class='modal modal-warning fade' id='modal-warning'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Add Account</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                <form method="post" action="backend/insertacct.php" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                      <label>First Name</label>
                      <input type="text" class="form-control" name="fn" required/>
                    </div>
                    <div class="col-lg-6">
                      <label>Middle Name</label>
                      <input type="text" class="form-control" name="mn"/>
                    </div>
                  </div><br/>
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="ln" required/>
                    </div>
                    <div class="col-lg-6">
                      <label>Program Type</label>
                      <select class="form-control" name="programtype" required>
                        <option value="RH">RH</option>
                        <option value="EAS">EAS</option>
                      </select>   
                    </div>
                  </div><br/>

                  <div class="row">
                    <div class="col-lg-6">
                      <label>Username</label>
                      <input type="text" class="form-control" maxlength="11" name="user" required/>
                    </div>
                    <div class="col-lg-6">
                      <label>Password</label>
                      <input type="text" class="form-control" maxlength="11" name="pass" required/>
                    </div>
                  </div><br/>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Photo</label>
                      <input type="file" class="form-control" name="photo">
                    </div>
                  </div>
                        
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left btn-close' data-dismiss='modal'>Cancel</button>
                <input type="submit" value="Confirm" name="submit" class="btn btn-outline btn-success"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

       <div class="row">
          <div class="col-md-12">
          <div class="card">
                    <div class="card-header text-center">
                    <!-- /.card-header -->
                    <h4>Active Accounts</h4>
                    </div>
                    <div class="card-body p-0" id="rtbl">
            <table id="example1" class="table table-bordered">
            <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Program</th>
                <th><center>Action</center></th>
                </tr>
                </thead>
                <tbody>
              
              <?php
                require ('../connection.php');

                $query = "SELECT username, programType, user.personID, firstName, lastName, userID FROM person JOIN user ON person.personID = user.personID WHERE type = 'U' AND (programType LIKE 'RH' OR programType LIKE 'EAS')";
    
                $rec = mysqli_query($con, $query);
        
                if ($rec) 
                {
                    while ($res = mysqli_fetch_array($rec)) 
                    {

                      $id = $res['personID'];
                      $uid = $res['userID'];

                        if ($res['programType']=="RH")
                        {
                          $program = "Receiving Home";
                        }

                        else
                        {
                          $program = "Educational Assistance thru Scholarship";
                        }

                        echo "<tr>";
                        echo "<td>".$res['username']."</td>";
                        echo "<td>".$res['firstName']." ".$res['lastName']."</td>";
						            echo "<td>".$program."</td>";
                        echo "<td><center>";
                        echo '<a href="#" data-toggle="modal" data-target="#modalConfirmDelete'.$id.'" ><button type="button" class="btn btn-danger"><i class="fa fa-times"></i></span>&nbsp;&nbsp;Terminate</button>

  <!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Terminate account?</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fa fa-times fa-4x animated rotateIn"></i><br/>
        <h6>You are terminating the account of '.$res['firstName'].' '.$res['lastName'].'. Are you sure?</h6>
      </div>

      <!--Footer-->
      <form method="post" action="backend/terminateacct.php">
      <div class="modal-footer flex-center">
        <input type="hidden" name="uid" value="'.$uid.'" />
        <a href="#"><input type="submit" name="submit" class="btn  btn-outline-danger" value="Yes"></a>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
      </form>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->';
                        echo "</center></td>";
                        echo "</tr>";
                    }
				}

              ?>
              </tbody>

              <tfoot>
              <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Program</th>
                <th><center>Action</center></th>
                </tr>
                </tfoot>
          </table>
          </div><!-- /. col-md-12 -->
        </div><!-- /. row -->

        </div></div></div>

      

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

</body>
</html>
