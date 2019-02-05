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
  <link href="../toastr/build/toastr.css" rel="stylesheet"/>

  <script src="../moment.js/moment.js"></script>
  <script src="../../client/jquery/jquery-3.3.1.min.js"></script>
  <script src="../toastr/build/toastr.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- SCRIPTS -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/adminlte.js"></script>
    <script src="../../dist/js/demo.js"></script>
    <script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../../plugins/chartjs-old/Chart.min.js"></script>
    <script src="../../dist/js/pages/dashboard2.js"></script>
  <!-- SCRIPTS -->

<!-- CSS -->

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
  <link rel="stylesheet" type="text/css" href="main.css">
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

<script>
  function validateDate()
  {
    var birthdate = document.getElementById('birthdate').value;
    var dapplied = document.getElementById('applied').value;

    var count = 0;

    toastr.options = {
      "positionClass": "toast-bottom-right"
    };

    if (moment(birthdate).isAfter(moment())==true)
    {
      count = 1;
      toastr.error('Birthdate cannot be later than today.');
    }

    if (moment(dapplied).isAfter(moment())==true)
    {
      count = 1;
      toastr.error('Application date cannot be later than today.');
      
    }

    if (count==1)
    {
      event.preventDefault();
    }
  }
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
    <a href="#" class="brand-link">
      <center>
        <img src="../icons/Concordia.jpg"><br/>
        <span class="brand-text font-weight-light">Receiving Home</span>
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
                require ('dbconnect.php');

                $query = "SELECT firstName, lastName from PERSON JOIN USER ON person.personID = user.personID WHERE userID = '$uid' AND programType = 'RH'";
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
            <a href="#" class="nav-link">
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
                Orphans
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="RHorphans.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Maintenance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHreferral.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Referrals</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Social Workers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="swapp.php" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Applications
              </p>
            </a>
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
                <a href="RHlist.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHreceive2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHrelease.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHadjustment.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Adjustment</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="RHreports.php" class="nav-link">
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
  <div class="content-wrapper" style="background-color:#2dcc70">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0 text-light"><strong>SOCIAL WORKERS</strong></h1></center>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="RHdashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item active">Social Workers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12" style="margin-left: 900px">
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addSocial">
          <span>Add Social Worker&nbsp;&nbsp;</span>
          <i class="fa fa-plus"></i>
          </button>
          
        </div>
      </div><br/>

      <div id="addSocial" class="modal fade" role="dialog" >
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Social Worker</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      </div>

                      <?php
                        $date = date("Y-d-m");
                      ?>
                      
                      <div class="modal-body">
                        <form method="post" action="db/addsw.php" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;First Name</label>
                              <input type="text" name="fn" class="form-control" required/>
                            </div>
                            <div class="col-lg-4">
                              <label>Middle Name</label>
                              <input type="text" name="mn" class="form-control"/>
                            </div>
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;Last Name</label>
                              <input type="text" name="ln" class="form-control" required/>
                            </div>
                          </div><br/>

                          <div class="row">
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>Birthday</label>
                              <input type="date" class="form-control" name="birthdate" id="birthdate"/>
                            </div>
                            <div class="col-lg-8">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;Address</label>
                              <input type="text" name="address" class="form-control" required/>
                            </div>
                          </div><br/>

                          <div class="row">
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;Contact Number</label>
                              <input type="text" name="telNo" class="form-control" required/>
                            </div>
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;Endorser Agency</label>
                              <input type="text" name="endorser" class="form-control" required/>
                            </div>
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;E-mail</label>
                              <input type="email" name="email" class="form-control" required/>
                            </div>
                          </div><br/> 

                          <div class="row">
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;Application Date</label>
                              <input type="date" name="dapp" class="form-control" id="applied" required/>
                            </div>
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;Identification Card</label>
                              <input type="file" name="social" class="form-control" required/>
                            </div>
                            <div class="col-lg-4">
                              <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;Password</label>
                              <input type="text" name="password" class="form-control" required/>
                            </div>
                          </div>
                      </div>
              
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-success" value="Add Social Worker" onclick="validateDate()"/>
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
                <center><h2>Active Social Workers</h2></center>
            </div>
            <div class="card-body" id="rtbl">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Social Worker</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                        $query = "SELECT socialWorkerID, firstName, lastName, endorserAgency, email FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE verifiedFlag = '1'";
                        
                            $result = mysqli_query($con, $query);

                            if ($result)
                            {
                              while ($rec = mysqli_fetch_array($result))
                              {
                                $date = date('M-d-Y');
                                $id = $rec['socialWorkerID'];
                                 echo '<tr>
                                      <td>'.$rec['firstName'].' '.$rec['lastName'].'</td>
                                      <td>'.$rec['endorserAgency'].'</td>
                                      <td>'.$rec['email'].'</td>';
                                echo "<td>
                             
                                <a href='viewsocialworker.php?swid=".$id."'><button type='button' class='btn btn-warning'><i class='fa fa-eye'></i>&nbsp;&nbsp;&nbsp;View</button></a>

                               <a href='#terminate".$id."' data-toggle='modal'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i>&nbsp;&nbsp;&nbsp;Set as inactive</button></a>


    <div id='terminate".$id."' class='modal fade' role='dialog'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Terminating Sponsor</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                <p>You are setting ".$rec['firstName']." ".$rec['lastName']." as inactive.</p>
                <label for='email'>An email will be sent to this address to notify them:</label>
            <form method='post' action='db/acceptref.php'>
            <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-envelope'></i></span>
                  </div>
                  <input type='email' name='email' class='in form-control' value='".$rec['email']."' readonly>
            </div>
            <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'>Subject:</span>
                  </div>
                  <input type='text' name='subject' class='in form-control' value='Inactivity Notification'>
            </div>
            <textarea class='form-control txt' rows='7' name='message'>Good day.
                  This email is to inform you that your referral validity has been revoked due to your 5-6 months of inactivity. You may reply to this message if you have any questions. Thank you for your kindness and cooperation. God bless you.</textarea>
              </div>

              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                <form method='post' action='backend/terminatesponsor.php'>
                <input type='hidden' value='".$id."' name='oid'/>
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
                  <th>Name</th>
                  <th>Location</th>
                  <th>Social Worker</th>
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
