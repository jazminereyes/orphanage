<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Referrals</title>

  <!-- CSS -->
    <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/referral.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <style>
      li
      {
        list-style-type: none;
      }

      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }

      .example-modal .modal {
        background: transparent !important;
      }

      .in{
        margin-left: 0px;
      }
    </style>

  <!-- CSS -->


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
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
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
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
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
                <a href="#" class="nav-link active">
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="RHdashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="RHorphans.php" class="text-light">Orphans</a></li>
              <li class="breadcrumb-item active">Referrals</li>
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
                <center><h2>Pending Referrals</h2></center>
            </div>
            <div class="card-body" id="rtbl">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr>
                <th>Referral Date</th>
                <th>Child Name</th>
                <th>Social Worker</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                        require ('dbconnect.php');

                        $date = date('M-d-Y');
                        $query = "SELECT * FROM person JOIN orphan JOIN o_referral JOIN o_referraldocs ON person.personID = orphan.personID AND orphan.orphanID = o_referral.orphanID AND o_referral.referralID = o_referraldocs.referralID WHERE type = 'O' AND applicationStatus = 'Pending'";
    
                        $rec = mysqli_query($con, $query);
        
                        if ($rec) 
                        {
                            while ($res = mysqli_fetch_array($rec)) 
                            { 
                                if ($res['middleName'] == "")
                                {
                                  $name = $res['firstName']." ".$res['lastName'];
                                }

                                else 
                                {
                                  $name = $res['firstName']." ".$res['middleName']." ".$res['lastName'];
                                }

                                if ($res['photo']=="")
                                {
                                  $src = "img/no-image.png";
                                }

                                else
                                {
                                  $src = "../client/".$res['photo'];
                                }

                                if ($res['gender']=="F")
                                {
                                  $gender = "Female";
                                }

                                else
                                {
                                  $gender = "Male";
                                }

                                if(!empty($res['birthCertificate']))
                                {
                                  $action = "<a href='../client/".$res['birthCertificate']."' target='_blank'>View File</a>";
                                }

                                else
                                {
                                  $action = "No file submitted.";
                                }

                                if(!empty($res['brgyBlotter']))
                                {
                                  $action2 = "<a href='../client/".$res['brgyBlotter']."' target='_blank'>View File</a>";
                                }

                                else
                                {
                                  $action2 = "No file submitted.";
                                }

                                $id = $res['orphanID'];
                                $swid = $res['socialWorkerID'];

                                $query2 = "SELECT * FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE socialworkerID = '$swid'";
                                $r = mysqli_query($con, $query2);
                                $s = mysqli_fetch_array($r);

                                echo "<tr>";
                                echo "<td>".$res['referralDate']."</td>";
                                echo "<td>".$res['firstName']." ".$res['lastName']."</td>";
                                echo "<td>".$s['firstName']." ".$s['lastName']."</td>";
                                echo "<td>
                             
                                <a href='#view".$id."' data-toggle='modal'><button type='button' class='btn btn-warning'><i class='fa fa-eye'></i>&nbsp;&nbsp;&nbsp;View</button></a>

                               <a href='#accept".$id."' data-toggle='modal'><button type='button' class='btn btn-success'><i class='fa fa-check'></i>&nbsp;&nbsp;&nbsp;Accept</button></a>

                               <a href='#decline".$id."' data-toggle='modal'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i>&nbsp;&nbsp;&nbsp;Decline</button></a>

        <div id='view".$id."' class='modal fade' role='dialog'>
          <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Referral Details</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                        <center><h4><strong>CHILD DETAILS</strong></h4></center><br/>
                        <div class='row'>
                          <div class='col-lg-3'>
                            <center><img src='".$src."' height='150' width='150'></center>
                          </div>
                          <div class='col-lg-3'>
                            <label for='cname' id='name'>Child Name</label>
                            <input type='text' class='form-control' name='cname' value='".$name."' style='margin: 0' disabled/>
                          </div>
                          <div class='col-lg-3'>
                            <label for='place' id='pfound'>Place Found</label>
                            <input type='text' class='form-control' name='place' value='".$res['placeFound']."' style='margin: 0' disabled />
                          </div>
                          <div class='col-lg-3'>
                            <label for='refdate' id='bday'>Birthdate</label>
                            <input type='text' class='form-control' name='bdate' value='".$res['birthdate']."' style='margin: 0' disabled/ >
                          </div>
                        </div><br/>
                        
                        <div class='row'>
                          
                          <div class='col-lg-3'>
                            <label>Gender</label>
                            <input type='text' class='form-control' value='".$gender."' style='margin: 0' disabled/>
                          </div>
                          <div class='col-lg-3'>
                            <label>Religion</label>
                            <input type='text' class='form-control' value='".$res['religion']."' style='margin: 0' disabled/>
                          </div>
                          <div class='col-lg-3'>
                            <label>Case Status</label>
                            <input type='text' class='form-control' value='".$res['caseStatus']."' style='margin: 0' disabled/>
                          </div>
                          <div class='col-lg-3'>
                            <label>Referral Date</label>
                            <input type='text' class='form-control' value='".$res['referralDate']."' style='margin: 0' disabled/>
                          </div>
                        </div><br/>
                        
                        <hr>
                        <center><h4><strong>SOCIAL WORKER DETAILS</strong></h4></center><br/>

                        <div class='row'>
                          <div class='col-md-4'>
                            <label for='swname' id='sname'>Social Worker Name</label>
                            <input type='text' class='form-control' name='swname' value='".$s['firstName']." ".$s['lastName']."' disabled/>
                          </div>
                          <div class='col-md-4'>
                            <label for='swemail' id='semail'>Social Worker Email</label>
                            <input type='text' class='form-control' name='swemail' value='".$s['email']."' disabled/>
                          </div>
                          <div class='col-md-4'>
                            <label for='swemail' id='semail'>Endorser Agency</label>
                            <input type='text' class='form-control' name='swemail' value='".$s['endorserAgency']."' disabled/>
                          </div>
                        </div><br/>

                        <hr>
                        <center><h4><strong>REFERRAL DOCUMENTS</strong></h4></center><br/>
                        <table class='table table-bordered'>
                          <th>Document</th>
                          <th>Action</th>

                          <tr>
                            <td>Referral Letter</td>
                            <td><a href='../client/".$res['referralLetter']."' target='_blank'>View File</a></td>
                          </tr>
                          <tr>
                            <td>Medical Abstract</td>
                            <td><a href='../client/".$res['medicalAbstract']."' target='_blank'>View File</a></td>
                          </tr>
                          <tr>
                            <td>Birth Certificate</td>
                            <td>".$action."</td>
                          </tr>
                          <tr>
                            <td>Brgy. Blotter</td>
                            <td>".$action2."</td>
                          </tr>
                        </table>

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

    <div id='accept".$id."' class='modal fade' role='dialog'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h4 class='modal-title'>Accept Referral</h4>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
          </div>
          <div class='modal-body'>
            <p>You are accepting the referral from ".$s['firstName']." ".$s['lastName'].".</p>
            <label for='email'>This email will be sent to notify them:</label>
            <form method='post' action='db/acceptref.php'>
            <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-envelope'></i></span>
                  </div>
                  <input type='email' name='email' class='in form-control' value='".$s['email']."' readonly>
            </div>
            <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'>Subject:</span>
                  </div>
                  <input type='text' name='subject' class='in form-control' value='Referral Application Notification'>
            </div>
            <textarea class='form-control txt' rows='7' name='message'>Good day.\n\tWe would like to inform you that your referral application for ".$res['firstName']." ".$res['lastName']." has been accepted. You may reply to this message if you have any questions. Thank you for your kindness and cooperation. God bless you.</textarea>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
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

    <div id='decline".$id."' class='modal fade' role='dialog'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Decline Referral</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                <p>You are declining the referral from ".$s['firstName']." ".$s['lastName'].".</p>
                <label for='email'>This email will be sent to notify them:</label>
            <form method='post' action='db/declineref.php'>
            <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-envelope'></i></span>
                  </div>
                  <input type='email' name='email' class='in form-control' value='".$s['email']."' readonly>
            </div>
            <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'>Subject:</span>
                  </div>
                  <input type='text' name='subject' class='in form-control' value='Referral Application Notification'>
            </div>
            <textarea class='form-control txt' rows='8' name='message'>Good day.\n\tWe are sorry to inform you that your referral application for ".$res['firstName']." ".$res['lastName']." has been declined because of the following possible reasons:\n\t1. The age of the child you are referring exceeded the maximum age that the orphanage could cater.\n\t2. The orphanage have already reached its capacity and cannot accept any more orphans.\n\tWe will relay this referral to other orphanages and we hope this would help you find the right orphanage for the child. Thank you for understanding. God bless you.</textarea>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                <form method='post' action='db/declineref.php'>
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
