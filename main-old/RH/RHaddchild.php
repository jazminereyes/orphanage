<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Add Child</title>

  <link href="../toastr/build/toastr.css" rel="stylesheet"/>

  <script src="../moment.js/moment.js"></script>
  <script src="../../client/jquery/jquery-3.3.1.min.js"></script>
  <script src="../toastr/build/toastr.min.js"></script>

  <script>
    function validateDate()
    {
      var bday = document.getElementById('inputBday').value;
      var admission = document.getElementById('inputAdmission').value;
      var referral = document.getElementById('inputReferral').value;

      var count = 0;
      
      toastr.options = {
        "positionClass": "toast-bottom-right"
      };

      if (moment(bday).isAfter(admission)==true)
      {
        count = 1;
        toastr.error('Birthdate cannot be after admission date.');
      }

      if (moment(referral).isAfter(admission)==true)
      {
        count = 1;
        toastr.error('Referral date cannot be after admission date.');
      }

      if (count==1)
      {
        event.preventDefault();
      }

    
    }
  </script>

  <style>
      li
      {
        list-style-type: none;
      }
  </style>

  <!-- CSS files -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="css/addchild.css">
  <!-- CSS files -->

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
                require ('dbconnect.php');

                $userid = $_SESSION['userid'];
                
                $query = "SELECT firstName, lastName from PERSON JOIN USER ON person.personID = user.personID WHERE programType = 'RH' AND userID = '$userid'";
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
          <li class="nav-item has-treeview menu-open">
            <a href="RHdashboard.php" class="nav-link active">
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
            <a href="socialworker.php" class="nav-link">
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
            <center><h1 class="m-0 text-light"><strong>ADD CHILD</strong></h1></center>
          </div><!-- /.col -->
          </div>
          <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="RHdashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="RHorphans.php" class="text-light">Orphans</a></li>
              <li class="breadcrumb-item active">Add Child</li>
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
          <div class="col-md-6">
            <div class="card" id="bodyform">
                <div class="card-header">
                  <span class="cheader">BASIC INFORMATION</span>
                </div>
                <div class="card-body">
                      <form method="post" action="db/rhaddchild.php" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control"/>
                          </div>  
                          <div class="col-lg-6">
                            <label>Middle Name</label>
                            <input type="text" name="mname" class="form-control"/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control">
                          </div>
                          <div class="col-lg-6">
                            <label><i class="text-danger fa fa-asterisk"></i>Place Found</label>
                            <input type="text" name="placefound" class="form-control" required/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <label><i class="text-danger fa fa-asterisk"></i>Birthdate</label>
                            <input type="date" name="birthdate" class="form-control" id="inputBday" required/>
                          </div>
                          <div class="col-lg-6">
                            <label style="margin-right: 10px"><i class="text-danger fa fa-asterisk"></i>Case Status</label>
                            <select class="form-control box" name="casestatus" required>
                              <option>Foundling</option>
                              <option>Neglected</option>
                              <option>Abandoned</option>
                            </select><br/>
                          </div>
                        </div>

                        <label style="font: 15px;">Gender</label>                          
                            <input type="radio" id="gen" name="gender" value="M" style="display: inline-block; margin-left: 10px; margin-right: 10px;"/> 
                            <label class="form-check-label" style="margin-right: 20px">Male</label>
                            <input type="radio" id="gen" name="gender"  value="F" style="display: inline-block; margin-left: 10px; margin-right: 10px;"/>
                            <label class="form-check-label">Female</label>
                        <br/>

                        <div class="row">
                          <div class="col-lg-6">
                            <label for="inputReligion" style="margin-right: 10px">Religion</label>
                            <input type="text" class="form-control" name="religion"/>
                          </div>
                          <div class="col-lg-6">
                            <label for="inputAdmission" style="margin-right: 10px">Admission Date</label>
                            <input type="date" name="admission" class="form-control" id="inputAdmission"/>
                          </div>
                        </div>

                        <label style="margin-right: 10px"><i class="text-danger fa fa-asterisk"></i>Child Photo</label>
                        <input type="file" name="photo"/>

                </div>
            </div>
            </div>
          

          <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <span class="cheader">REFERRAL DETAILS</span>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-6">
                          <label for="inputSWName"><i class="text-danger fa fa-asterisk"></i>Social Worker Name</label>
                          <select name="socialworker" class="form-control">
                          <?php
                            $q = "SELECT socialWorkerID, firstName, lastName FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE verifiedFlag = 1";
                            $r = mysqli_query($con, $q);
                              
                            while ($s = mysqli_fetch_array($r))
                            {
                              echo '<option value="'.$s['socialWorkerID'].'">'.$s['firstName'].' '.$s['lastName'].'</option>';
                            }
                          ?>
                          </select>
                        </div>
                        <div class="col-lg-6">
                          <label for="inputReferral"><i class="text-danger fa fa-asterisk"></i>Referral Date</label>
                          <input type="date" class="form-control" id="inputReferral" name="refdate" id="inputReferral" required/>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-6">
                          <label><i class="text-danger fa fa-asterisk"></i>Referral Letter</label>
                          <input type="file" name="referral" class="form-control" required/>
                        </div>
                        <div class="col-lg-6">
                          <label><i class="text-danger fa fa-asterisk"></i>Medical Abstract</label>
                          <input type="file" name="medical" class="form-control" required/>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-6">
                          <label>Birth Certificate</label>
                          <input type="file" name="birth" class="form-control"/>
                        </div>
                        <div class="col-lg-6">
                          <label>Brgy. Blotter</label>
                          <input type="file" name="brgy" class="form-control"/>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
          </div>

        </div><!-- /. row -->

          
      <div class="row">
          <div class="col-md-12">
            <center><button type="submit" value="submit" name="submit" class="btn btn-primary" onclick="validateDate()">SUBMIT</button></center>
          </div>
        </div>
        </form>

      </div><!--/. container-fluid -->
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

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="../../plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../../dist/js/pages/dashboard2.js"></script>
</body>
</html>
