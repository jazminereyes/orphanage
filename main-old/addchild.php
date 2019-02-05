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

  <link href="toastr/build/toastr.css" rel="stylesheet"/>

  <script src="moment.js/moment.js"></script>
  <script src="../client/jquery/jquery-3.3.1.min.js"></script>
  <script src="toastr/build/toastr.min.js"></script>

  <style>
      li
      {
        list-style-type: none;
      }

      .upper, .lower 
      {
        margin-left: 200px;
        width: 700px;
      }

      .content
      {
        background-color:#2dcc70;
      }
  </style>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
          <li class="nav-item menu-open">
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
  <div class="content-wrapper" style="background-color: #2dcc70">
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
              <li class="breadcrumb-item"><a href="#" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="orphans.php" class="text-light">Orphans</a></li>
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
          <div class="col-md-8">
            <div class="card upper">
                <div class="card-body">
                    <div class="form-group">
                      <form method="post" action="backend/insertchild.php" enctype="multipart/form-data">

                        <div class="row">
                          <div class="co-lg-4" style="margin-left: 10px">
                            <label for="inputName">First Name</label>
                            <input type="text" class="form-control" name="fname" id="inputName" required/> <br/>
                          </div>
                          <div class="col-lg-4" style="margin-left: 10px">
                            <label for="inputName">Middle Name</label>
                            <input type="text" class="form-control" name="mname" id="inputName"/> <br/>
                          </div>
                          <div class="col-lg-4">
                            <label for="inputName">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="inputName"/> <br/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <label for="inputPlace"><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Place Found</label>
                            <input type="text" class="form-control" name="placefound" id="inputPlace" required/> <br/>
                          </div>
                          <div class="col-lg-6">
                            <label for="inputName">Birthdate</label>
                            <input type="date" class="form-control" name="birthdate" id="inputBday"/> <br/>
                          </div>
                        </div>

                        <div class="form-inline">
                          <label><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Case Status</label>
                          <select class="form-control" name="casestatus" style="margin-left: 20px" required>
                            <option>Foundling</option>
                            <option>Neglected</option>
                            <option>Abandoned</option>
                          </select>
                          <label style="margin-left: 30px"><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Gender</label>
                          <div class="form-check">
                            <input type="radio" name="gender" class="form-check-input" value="M" style="margin-left: 20px"/>
                            <label class="form-check-label">Male</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" name="gender" class="form-check-input" value="F" style="margin-left: 20px"/>
                            <label class="form-check-label">Female</label>
                          </div> 
                        </div><br/>

                        <div class="row">
                          <div class="col-lg-6">
                            <label for="inputReligion">Religion</label>
                            <input type="text" class="form-control" name="religion" id="inputReligion"/> 
                          </div>
                          <div class="col-lg-6">
                            <label for="inputAdmission"><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Admission Date</label>
                            <input type="date" class="form-control" name="admission" id="inputAdmission" required/>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
          </div><!-- /. col-md-12 -->
        </div><!-- /. row -->

        <div class="row">
          <div class="col-md-12"><br/>
            <center><h3 class="m-0 text-light">REFERRAL</h3></center>
          </div>
        </div>

         <div class="row">
          <div class="col-md-8">
            <div class="card upper">
                <div class="card-body">
                    <div class="form-group">

                        <div class="row">
                          <div class="col-lg-6">
                            <label for="inputSWName"><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Social Worker Name</label>
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
                          
                        <div class="col-md-6">
                        <label for="inputReferral"><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Referral Date</label>
                        <input type="date" class="form-control" name="referral" id="inputReferral" required/> <br/>
                        </div></div>

                        <div class="row">
                         <div class="col-md-6">
                        <label class="lbl lbl2"><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Child Photo</label>
                        <input type="file" class="form-control" name="photo">
                        </div>

                        <div class="col-md-6">
                    <label><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Referral Letter</label>
                    <input type="file" name="referral" class="form-control" required/>
                  </div>
                        </div><br/>

                        <div class="row">
                  <div class="col-md-6">
                    <label><span><i class="fa fa-asterisk text-danger"></i></span>&nbsp;Medical Abstract</label>
                    <input type="file" name="medical" class="form-control" required/>
                  </div>
                  <div class="col-md-6">
                    <label>Birth Certificate</label>
                    <input type="file" name="birth" class="form-control"/>
                  </div></div><br/>
                
                  <div class="row">
                <div class="col-md-6">
                <label>Brgy. Blotter</label>
                <input type="file" name="brgy" class="form-control"/>
                </div>
              </div>

                    </div>
                </div>
            </div>
          </div></div>

  

        <div class="row" style="margin: auto">
          <div class="col-md-12">
            <center><button type="submit" value="submit" name="submit" class="btn btn-lg btn-dark" onclick="validateDate()">SUBMIT</button></center>
            </form>
          </div>
        </div>

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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="../plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>

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
</body>
</html>
