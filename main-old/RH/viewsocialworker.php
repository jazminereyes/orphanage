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
  </style>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="main.css">

<!-- SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>
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
  $(document).ready(function() {
    $('#example1').DataTable();
} );
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
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Referrals</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="socialworker.php" class="nav-link active">
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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="RHdashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="socialworker.php" class="text-light">Social Worker</a></li>

              <?php
                $swid = $_GET["swid"];

                $a = "SELECT firstName, lastName FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE socialWorkerID = '$swid'";
                $b = mysqli_query($con, $a);
                $c = mysqli_fetch_array($b);

                echo '<li class="breadcrumb-item active">'.$c["firstName"].' '.$c["lastName"].'</li>';
              ?>
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
            <div class="card" id="cbody1">
                <div class="card-body">
                    <div class="form-group" style="margin-top: 10px">
                    <?php

                    $swid = $_GET["swid"];

     
                      $qry2 = "SELECT firstName, lastName, photo, swIDCard FROM socialworker JOIN person ON socialworker.personID = person.personID WHERE socialWorkerID = '$swid'";

                      $sql = mysqli_query($con, $qry2);
                      $g = mysqli_fetch_array($sql);

            if($g['photo'] == ""){
              
                echo '<center><h4><strong>'.$g['firstName'].' '.$g['lastName'].'</strong></h4></center><hr>';
                echo '<br/><center><div><h5>Identification Card</h5><img src="../../client/'.$g['swIDCard'].'" height="150" width="200"/></div></center>';

            }
            else{
                echo '<center><div style="margin-bottom: 10px">
                        <img class="profile-user-img img-fluid" 
                        src="data:image/jpeg;base64,'.base64_encode($g['photo']).'"
                        alt="User profile picture" style="height: 160px; width: 160px">
                      </div>';
                echo '<h4>'.$g['firstName'].' '.$g['lastName'].'</h4></center><br/><hr>';
                echo '<br/><center><div><h5>Identification Card</h5><img src="../../client/'.$g['swIDCard'].'" height="120" width="150"/></div></center>';
                }

            ?></div>
            
            </div>
                    
                    </div>
                    

           
          </div>

          <div class="col-md-9">
            <div class="card" id="cbody2">
                <div class="card-header">
                  <span class="cheader">BASIC INFORMATION</span>
                  <!-- <button class="btn btn-primary float-right" onclick="updateOrphan()" id="updatebtn">UPDATE</button> -->
                </div>
                <div class="card-body">
                       <form method="post" action="backend/updateOrph.php">
                  <?php

                      $sel = "SELECT * FROM socialworker JOIN person ON socialworker.personID = person.personID WHERE socialWorkerID = '$swid'";

                      $sel2 = mysqli_query($con, $sel);
                      $info = mysqli_fetch_array($sel2);

                      echo '<div class="row">';
                      echo '<div class="col-lg-6">';
                      echo '<label>Full Name</label>';
                      echo '<input type="text" class="form-control" id="name" name="name" value="'.$info['firstName'].' '.$info['middleName'].' '.$info['lastName'].'" disabled><br/>'; 
                      echo '</div>';
                      echo '<div class="col-lg-6">';
                      echo '<label>E-mail</label>';
                      echo '<input type="text" class="form-control" id="place" class="or" name="placefound" value="'.$info['email'].'" disabled>';
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<div class="col-lg-6">';
                      echo '<label>Address</label>';
                      echo '<input type="text" class="form-control" id="addr" class="or" name="address" value="'.$info['address'].'" disabled><br/>';
                      echo '</div>';
                      echo ' <div class="col-lg-6">
                      <label>Birthdate</label>';
                      echo '<input type="text" class="form-control input" id="telno" class="or" name="telno" value="'.$info['birthdate'].'" disabled><br/>
                      </div>';
                      echo '</div>';

                      echo '<div class="row">';
                      
                      
                      echo '<div class="col-lg-6">
                      <label>Contact Number</label>';
                      echo '<input type="text" class="form-control input" id="place" class="or" name="placefound" value="'.$info['contactNo'].'" disabled><br/>
                      </div>';
                      echo '<div class="col-lg-6">
                      <label>Endorser Agency</label>';
                      echo '<input type="text" class="form-control input" id="bdate" class="or" name="birthdate" value="'.$info['endorserAgency'].'" disabled>
                      </div>
                      </div>';
                      ?>

                     <!--  <button type="submit" name="submit" class="btn btn-primary float-right" id="savebtn" style="display: none;" onclick="saveOrphan()">SAVE</button> -->

                    </form>
                    <!-- <button id="cancel" class="btn btn-primary float-right" style="display: none;" onclick="cancelUpdate()">CANCEL</button>  --> 
                  
                </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="card" id="cbody3">
                  <div class="card-header">
                  <span class="cheader">REFERRED CHILDREN</span>
                  </div>
                  <div class="card-body">
                      <div class="form-group">

                      <?php 

                        $sql = "SELECT firstName, lastName, caseStatus, placeFound FROM person JOIN orphan JOIN o_referral ON orphan.personID = person.personID AND orphan.orphanID = o_referral.orphanID WHERE socialWorkerID = '$swid' AND applicationStatus <> 'Pending' LIMIT 3";
                        $result = mysqli_query($con, $sql);

                        if(mysqli_num_rows($result) == 0){
                            echo '<center><span> No accepted children yet.</span></center>';
                        }
                        else
                        {
                          echo ' <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Case Status</th>
                              <th>Year Level</th>
                            </tr>
                          </thead>
                          <tbody>';
                          while ($row = mysqli_fetch_array($result))
                          {
                            echo '<tr>
                            <td>'.$row['firstName'].' '.$row['lastName'].'</td>
                            <td>'.$row['caseStatus'].'</td>
                            <td>'.$row['placeFound'].'</td>
                            </tr>';
                          }
                        }

                      ?>

                    </tbody>
                    </table>
                      </div>
                  <!--card-body-->
                  </div>
              <!--card-->
              </div>
            <!--col-md-->
            </div>


            <div class="col-md-6">
                <div class="card" id="cbody3">
                  <div class="card-header">
                    <span class="cheader">PENDING REFERRALS</span>
                    </div>
                  <div class="card-body">
                      <div class="form-group">
                          <?php 

                        $sql2 = "SELECT * FROM person JOIN orphan JOIN o_referral JOIN o_referraldocs ON orphan.personID = person.personID AND orphan.orphanID = o_referral.orphanID AND o_referral.referralID = o_referraldocs.referralID WHERE socialWorkerID = '$swid' AND applicationStatus = 'Pending'";
                        $result2 = mysqli_query($con, $sql2);

                        if(mysqli_num_rows($result2) == 0){
                            echo '<center><span> No records yet.</span></center>';
                        }
                        else
                        {
                          echo ' <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Case Status</th>
                              <th>Place Found</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>';
                          while ($row2 = mysqli_fetch_array($result2))
                          {
                            $id = $row2['orphanID'];

                            if ($row2['photo']=="")
                            {
                                $src = "img/no-image.png";
                            }

                            else
                            {
                                $src = "../client/".$row2['photo'];
                            }

                            if ($row2['gender']=="M")
                            {
                                $gender = "Male";
                            }
                            else
                            {
                                $gender = "Female";
                            }

                            if(!empty($row2['birthCertificate']))
                            {
                              $action = "<a href='../client/".$row2['birthCertificate']."'>View File</a>";
                            }

                            else
                            {
                              $action = "No file submitted.";
                            }

                            if(!empty($row2['brgyBlotter']))
                            {
                              $action2 = "<a href='../client/".$row2['brgyBlotter']."'>View File</a>";
                            }

                            else
                            {
                              $action2 = "No file submitted.";
                            }

                            echo '<tr>
                            <td>'.$row2['firstName'].' '.$row2['lastName'].'</td>
                            <td>'.$row2['caseStatus'].'</td>
                            <td>'.$row2['placeFound'].'</td>
                            <td><a href="#view'.$id.'" data-toggle="modal"><button type="button" class="btn btn-warning"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;View</button></a>
                            
                            <div id="view'.$id.'" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Referral Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                        <center><h4><strong>CHILD DETAILS</strong></h4></center><br/>
                        <div class="row">
                          <div class="col-lg-3">
                            <center><img src="'.$src.'" height="150" width="150"></center>
                          </div>
                          <div class="col-lg-3">
                            <label for="cname" id="name">Child Name</label>
                            <input type="text" class="form-control" name="cname" value="'.$row2['firstName'].' '.$row2['lastName'].'" style="margin: 0" disabled/>
                          </div>
                          <div class="col-lg-3">
                            <label for="place" id="pfound">Place Found</label>
                            <input type="text" class="form-control" name="place" value="'.$row2['placeFound'].'" style="margin: 0" disabled />
                          </div>
                          <div class="col-lg-3">
                            <label for="refdate" id="bday">Birthdate</label>
                            <input type="text" class="form-control" name="bdate" value="'.$row2['birthdate'].'" style="margin: 0" disabled/ >
                          </div>
                        </div><br/>
                        
                        <div class="row">
                          
                          <div class="col-lg-3">
                            <label>Gender</label>
                            <input type="text" class="form-control" value="'.$gender.'" style="margin: 0" disabled/>
                          </div>
                          <div class="col-lg-3">
                            <label>Religion</label>
                            <input type="text" class="form-control" value="'.$row2['religion'].'" style="margin: 0" disabled/>
                          </div>
                          <div class="col-lg-3">
                            <label>Case Status</label>
                            <input type="text" class="form-control" value="'.$row2['caseStatus'].'" style="margin: 0" disabled/>
                          </div>
                          <div class="col-lg-3">
                            <label>Referral Date</label>
                            <input type="text" class="form-control" value="'.$row2['referralDate'].'" style="margin: 0" disabled/>
                          </div>
                        </div><br/>
                        
                        <hr>
                        <center><h4><strong>SOCIAL WORKER DETAILS</strong></h4></center><br/>

                        <div class="row">
                          <div class="col-md-4">
                            <label for="swname" id="sname">Social Worker Name</label>
                            <input type="text" class="form-control" name="swname" value="'.$info['firstName'].' '.$info['lastName'].'" disabled/>
                          </div>
                          <div class="col-md-4">
                            <label for="swemail" id="semail">Social Worker Email</label>
                            <input type="text" class="form-control" name="swemail" value="'.$info['email'].'" disabled/>
                          </div>
                          <div class="col-md-4">
                            <label for="swemail" id="semail">Endorser Agency</label>
                            <input type="text" class="form-control" name="swemail" value="'.$info['endorserAgency'].'" disabled/>
                          </div>
                        </div><br/>

                        <hr>
                        <center><h4><strong>REFERRAL DOCUMENTS</strong></h4></center><br/>
                        <table class="table table-bordered">
                          <th>Document</th>
                          <th>Action</th>

                          <tr>
                            <td>Referral Letter</td>
                            <td><a href="../client/'.$row2['referralLetter'].'">View File</a></td>
                          </tr>
                          <tr>
                            <td>Medical Abstract</td>
                            <td><a href="../client/'.$row2['medicalAbstract'].'">View File</a></td>
                          </tr>
                          <tr>
                            <td>Birth Certificate</td>
                            <td>'.$action.'</td>
                          </tr>
                          <tr>
                            <td>Brgy. Blotter</td>
                            <td>'.$action2.'</td>
                          </tr>
                        </table>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

                            </td>
                            </tr>';
                          }
                        }

                      ?>

                    </tbody>
                    </table>

                      <!--form-group-->
                      </div>
                  <!--card-body-->
                  </div>
              <!--card-->
              </div>
            <!--col-md-->
            </div>
        <!--row-->
        </div>
        <br/>

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
</body>
</html>
