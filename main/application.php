<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Sponsors</title>


<!-- CSS -->

<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables/ajax-bootstrap.css">
<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
      li
      {
        list-style-type: none;
      }

       #box
      {
        display: inline-block;
      }

      .photo
      {
        border-radius: 50%;
        height: 80px;
        width: 80px;
      }
     
      .content 
      {
        background-color:#2dcc70;
      }

      /*input[type="text"], input[type="number"], input[type="date"], select*/
      label
      {
        margin-right: 20px;
      }

      .custom-select {
      background: none;
      }
  </style>
<!-- CSS -->

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
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-male"></i>
              <p>
                Sponsors
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
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
            <a href="accounts.php" class="nav-link">
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
            <center><h1 class="m-0 text-light"><strong>SCHOLARS</strong></h1></center>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item">Applications</li>
              <li class="breadcrumb-item active">Scholar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div id="addSponsor" class="modal fade" role="dialog" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Scholar</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      </div>

                      <?php
                        $date = date("Y-d-mm");
                      ?>
                      
                      <div class="modal-body">
                            <form method="post" action="backend/addsponsor.php">
                            <div class="form-inline pull-right" align="right">
                              <label for="dtoday" id="rdate">Date:</label>
                              <input type="text" class="form-control dt" name="dtoday" value="<?php echo $date?>" disabled/ ><br/>
                            </div><br/><br/><br/>
                    
                            <div class="form-inline">
                              <label>First Name</label>  
                              <input type="text" class="form-control" name="fn"/>
                            </div><br/>

                            <div class="form-inline">
                              <label>Middle Name</label>  
                              <input type="text" class="form-control" name="mn"/>
                            </div><br/>

                            <div class="form-inline">
                              <label>Last Name</label>  
                              <input type="text" class="form-control" name="ln"/>
                            </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Street</label>
                            <input type="text" class="form-control" name="street"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">City</label>
                            <input type="text" class="form-control" name="city"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">ZIP</label>
                            <input type="text" class="form-control" name="zip"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Country</label>
                            <input type="text" class="form-control" name="country"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Birthdate</label>
                            <input type="date" class="form-control" name="bday"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Telephone Number</label>
                            <input type="text" class="form-control" name="telno"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Scholar Count</label>
                            <input type="number" class="form-control" min="1" name="scholar"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Donation Type</label>
                            <select class="form-control" name="dtype">
                              <option value="EM">Elementary - Monthly</option>
                              <option value="EY">Elementary - Yearly</option>
                              <option value="HSM">High School - Monthly</option>
                              <option value="HSY">High School - Yearly</option>
                            </select>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Amount</label>
                            <input type="number" class="form-control" min="0" name="amount"/><br/>
                          </div><br/>
                      </div>
              
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-success" value="Add Sponsor"/>
                        </form>
                      </div>
                    </div>
            <!-- /.modal-content -->
                  </div>
          <!-- /.modal-dialog -->
              </div>
        <!-- /.modal -->

      <div class="row">
        <div class="col-md-10" style="margin-left: 100px">
          <div class="card">
            <div class="card-header">
                <center><h2>Pending Applications</h2></center>
            </div>
            <div class="card-body" id="rtbl">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr>
            <th>Name</th>
              <th>Date Submitted</th>
              <th><center>Action</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
                require ('../connection.php');

                $query = "SELECT * FROM person JOIN scholar on person.personID = scholar.personID JOIN s_appform as app on scholar.scholarAppID = app.scholarAppID WHERE type = 'S' AND applicationStatus = 'Pending'";
    
                $rec = mysqli_query($con, $query);
        
                if ($rec) 
                {
                  while ($res = mysqli_fetch_array($rec)) 
                  {
                    $date = $res['submissionDate'];
                    $date = date("M-d-Y", strtotime($date));
                    $id = $res['scholarID'];

                    echo  "<tr>
                        <td>".$res['firstName']." ".$res['lastName']."</td>
                        <td>".$date."</td>
                        <td><center>
                        <a href='viewscholarapp.php?scholarid=".$res['scholarID']."' id='view' class='boton btn btn-warning'><span><i class='fa fa-eye'></i></span>&nbsp;&nbsp;&nbsp;View</a>
                        <a href='#decline".$id."' data-toggle='modal' id='dec' class='boton btn btn-danger'><span><i class='fa fa-times'></i></span>&nbsp;&nbsp;&nbsp;Decline</a>
                      </center></td>
                      </tr>";

                      echo "<div id='decline".$id."' class='modal fade' role='dialog'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h4 class='modal-title'>Decline</h4>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span></button>
                          </div>
                          <div class='modal-body'>
                            <p>You are the declining the application from ".$res['firstName']." ".$res['lastName']."</p>
                            <p>Are you sure you want to decline the application?</p>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                            <form method='post' action='backend/declineapp.php'>
                            <input type='hidden' value='".$id."' name='oid'/>
                            <input type='submit' name='submit' class='btn btn-success' value='Confirm'/>
                        </form>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->";
                  }
                }
            ?>


              
              
              <tfoot>
                <tr>
                <th>Name</th>
              <th>Date Submitted</th>
              <th><center>Action</center></th>
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
