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
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
<link href="../toastr/build/toastr.css" rel="stylesheet"/>
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
            <a href="RHdashboard.php" class="nav-link">
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
          <li class="nav-item has-treeview">
            <a href="socialworker.php" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Social Workers
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
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
  <div class="content-wrapper">
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
              <li class="breadcrumb-item">Applications</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">


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
              <th>Application Date</th>
              <th><center>Action</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
                require ('../../connection.php');

                $query = "SELECT * FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE verifiedFlag = '0'";
    
                $rec = mysqli_query($con, $query);
        
                if ($rec) 
                {
                  while ($res = mysqli_fetch_array($rec)) 
                  {
                    $id = $res['socialWorkerID'];
                    $pid = $res['personID'];

                    echo  "<tr>
                      <td>".$res['firstName']." ".$res['lastName']."</td>
                      <td>".$res['dateApplied']."</td>
                      <td><a href='#view".$id."' data-toggle='modal'><button type='button' class='btn btn-warning'><i class='fa fa-eye'></i>&nbsp;&nbsp;&nbsp;View</button></a>
                      <a href='#accept".$id."' data-toggle='modal'><button type='button' class='btn btn-success'><i class='fa fa-check'></i>&nbsp;&nbsp;&nbsp;Accept</button></a></td>
                      </tr>";

                    echo "<div id='view".$id."' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h4 class='modal-title'>Social Worker Details</h4>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span></button>
                        </div>
                        <div class='modal-body'>

                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='form-inline pull-right'>
                                        <label for='refdate' id='bday'>Application Date</label>
                                        <input type='text' class='form-control dt' name='bdate' value='".$res['dateApplied']."' disabled/ ><br/>
                                    </div>
                                </div>
                            </div><br/>

                            <div class='row'>
                                <div class='col-md-6'>
                                    <label for='cname' id='name'>Name</label>
                                    <input type='text' class='form-control swd' name='cname' value='".$res['firstName']." ".$res['lastName']."' disabled/><br/>
                                </div>
                                <div class='col-md-6'>
                                    <label for='place' id='pfound'>Address</label>
                                    <input type='text' class='form-control swd' name='place' value='".$res['address']."' disabled /><br/>
                                </div>
                            </div>
                                
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label for='refdate' id='bday'>Birthdate</label>
                                    <input type='text' class='form-control dt' name='bdate' value='".$res['birthdate']."' disabled/ ><br/>
                                </div>
                                <div class='col-md-6'>
                                    <label for='refdate' id='bday'>Endorser Agency</label>
                                    <input type='text' class='form-control dt' name='bdate' value='".$res['endorserAgency']."' disabled/ ><br/>
                                </div>
                            </div>
                                  
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label for='swname' id='sname'>Email</label>
                                    <input type='text' class='form-control swd' name='swname' value='".$res['email']."' disabled/><br/>
                                </div>
                                <div class='col-md-6'>
                                    <label for='swemail' id='semail'>Contact Number</label>
                                    <input type='text' class='form-control swd' name='swemail' value='".$res['contactNo']."' disabled/><br/>
                                </div>
                            </div> 
                        
                            <hr>
                            
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label>Identification Card</label>
                                    <a href='#img".$id."' data-toggle='modal'><img src='../../client/".$res['swIDCard']."' height='150' width='220'/></a>
                                </div>
                                <div class='col-md-6'>
                                    <label>Application Photo</label>
                                    <a href='#photo".$id."' data-toggle='modal'><img src='../../client/".$res['applicationPhoto']."' height='150' width='220'/></a>
                                </div>
                            </div>
                        </div>

                        <div class='modal-footer'>
                          <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Close</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
          ";

          echo "<div class='modal fade' role='dialog' id='img".$id."'>
          <div class='modal-dialog'>
                  <img src='../../client/".$res['swIDCard']."' height='500' width='700'/>
              </div>
          </div>
      </div>";

      echo "<div class='modal fade' role='dialog' id='photo".$id."'>
          <div class='modal-dialog'>
                  <img src='../../client/".$res['applicationPhoto']."' height='500' width='700'/>
              </div>
          </div>
      </div>";

          echo "<div class='modal fade' role='dialog' id='img'>
          <div class='modal-dialog'>
                  <img src='../client/".$res['swIDCard']."' height='500' width='700'/>
              </div>
          </div>
      </div>";

          echo " <div id='accept".$id."' class='modal fade' role='dialog'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Accept Application</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                <p>You are accepting social worker application from ".$res['firstName'].' '.$res['lastName'].".</p>

                <label for='email'>An email (along with the inputted account details below) will be sent to this address for notification:</label>

                <form method='post' action='db/acceptsw.php'>
                <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-envelope'></i></span>
                  </div>
                  <input type='email' class='form-control' value='".$res['email']."' name='email' readonly>
                 </div>
              
              <hr>
            <h6>For social worker's account:</h6>
            <div class='row'>
              <div class='col-6'>
                <label>Email</label>
                <input type='text' class='form-control' name='usern' style='margin-left: 0px;' value='".$res['email']."' readonly/>
              </div>
              <div class='col-6'>
                <label>Password</label>
                <input type='text' class='form-control' id='password".$id."' name='pword' style='margin-left: 0px;' required/>
              </div>
            </div>
              </div>

              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                  <input type='hidden' value='".$id."' name='swid'/>
                  <input type='hidden' value='".$pid."' name='pid'/>
                  <input type='submit' name='submit' class='btn btn-success' value='Confirm' onclick='validatePassword(".$id.")'/>
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
              <th>Application Date</th>
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

</div>
<!-- ./wrapper -->

<script src="../toastr/build/toastr.min.js"></script>
<script>
  function validatePassword(str)   
  {
    var name = "password"+str;
    var password = document.getElementById(name).value;
    var count = 0;
    var msg = "";

    toastr.options = {
        "positionClass": "toast-bottom-right"
      };

    if(password.length<8){
      count++;
      msg = msg + " Must not be less than 8 characters.";
    }
    
    if(!password.match(/[A-z]/)){
      count++;
      msg = msg + " Must have at least 1 letter.";
    }

    if(!password.match(/[A-Z]/)){
      count++;
      msg = msg + " Must have at least 1 capital letter.";
    }

    if(!password.match(/\d/)){
      count++;
      msg = msg + " Must have at least 1 number.";
    }
    
    if(count>0){
      event.preventDefault();
      
      //alert('Password should fulfill the following criterias:'+msg);
      toastr.error('Password should fulfill the following criterias: '+msg+'');
    }

  }

</script>

</body>
</html>
