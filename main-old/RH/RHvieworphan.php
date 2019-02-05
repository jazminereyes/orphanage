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
  <!--CSS-->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/ajax-bootstrap.css">
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="css/vo.css">

    <style>
      li
      {
        list-style-type: none;
      }

      .photo 
      {
        /*border-radius: 50%;*/
        height: 160px;
        width: 160px;
        margin: 0 auto;
        padding: 3px;
        border: 3px solid #adb5bd;
      }

      .custom-select {
        background: none;
      }

      .card-header-custom{
        padding: 0.4rem;
        margin: 0px;
      }

  </style>

   <!--CSS-->


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
<!-- DataTables -->
<script src="../../plugins/jquery/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
  function updateOrphan()
  {
    document.getElementById("updatebtn").style.display = "none";
    document.getElementById("savebtn").style.display = "block";
    document.getElementById("cancelbtn").style.display = "block";
    document.getElementById("rlgn").disabled = false;
    document.getElementById("bdate").disabled = false;
    document.getElementById("fn").disabled = false;
    document.getElementById("mn").disabled = false;
    document.getElementById("ln").disabled = false;
  }
  function saveOrphan()
  {
    document.getElementById("savebtn").style.display = "none";
    document.getElementById("cancelbtn").style.display = "none";
    document.getElementById("updatebtn").style.display = "inline";
  }

  function disableOrphan()
  {
    document.getElementById("name").disabled = true;
    document.getElementById("adate").disabled = true;
    document.getElementById("bdate").disabled = true;
    document.getElementById("gender").disabled = true;
    document.getElementById("case").disabled = true;
    document.getElementById("place").disabled = true;
    document.getElementById("rlgn").disabled = false;
  }

  function cancelUpdate(){
    document.getElementById("savebtn").style.display = "none";
    document.getElementById("cancelbtn").style.display = "none";
    document.getElementById("updatebtn").style.display = "inline";
    document.getElementById("rlgn").disabled = true;
    document.getElementById("bdate").disabled = true;
    document.getElementById("fn").disabled = true;
    document.getElementById("mn").disabled = true;
    document.getElementById("ln").disabled = true;
  }
</script>
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
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>


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
                <a href="RHorphans.php" class="nav-link active">
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
          </div><!-- /.col -->
          </div>
          <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="RHdashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="RHorphans.php" class="text-light">Orphans</a></li>
              <?php

                if(isset($_GET["orphanid"])){
                  $orphan_id = $_GET["orphanid"];
                }
                else{
                  $orphan_id = $_SESSION["oid"];
                  $_SESSION["oid"] = $orphan_id;
                }

                $query = "SELECT firstName, lastName FROM person JOIN orphan on person.personID = orphan.personID WHERE orphanID = $orphan_id";

                $res = mysqli_query($con, $query);

                $rec = mysqli_fetch_row($res);

                echo '<li class="breadcrumb-item active">'.$rec[0].' '.$rec[1].'</li>';
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
          <div class="col-md-4">
            <center><div class="card" id="cbody1">
                <div class="card-body">
                    <div class="form-group">
                    <?php

                      $query = "SELECT firstName, middleName, lastName, person.photo, person.personID FROM person LEFT JOIN orphan on person.personID = orphan.personID WHERE orphanID = $orphan_id";

                      $res = mysqli_query($con, $query);

                      $rec = mysqli_fetch_row($res);
                      $pid = $rec[4];

                      if ($rec[3]=="")
                      {
                        $src = "../img/no-image.png";
                      }

                      else
                      {
                        $src = "../".$rec[3];
                      }

                      echo '<div class="image">';
                      echo "<img class='photo' src='".$src."' height='100' width='100'>";
                      echo '<br/><br/></div>';
                      echo '<h4>'.$rec[0].' '.$rec[2].'</h4>';
                    ?>
                    </div>

                    <?php
                      $orphan_id = $_GET["orphanid"];
                      $q = "SELECT applicationStatus FROM orphan WHERE orphanID = '$orphan_id'";
                      $r = mysqli_query($con, $q);
                      $s = mysqli_fetch_row($r);

                      

                      if ($s[0]=="Accepted")
                      {
                        //echo '<a href="db/processorphan.php?orphanid='.$orphan_id.'"><button id="btn2" class="btn btn-success btn-flat float-center">Process for Adoption&nbsp&nbsp<i class="fa fa-check"></i></button></a>';

                        $a = "SELECT * FROM orphan JOIN o_referral JOIN o_referraldocs ON orphan.orphanID = o_referral.orphanID AND o_referral.referralID = o_referraldocs.referralID WHERE orphan.orphanID = '$orphan_id'";
                        $b = mysqli_query($con, $a);
                        $c = mysqli_fetch_array($b);

                        $count = 0;

                        if(!empty($c['birthCertificate'])){
                          $action = "<a href='../client/".$c['birthCertificate']."' target='_blank'>View File</a>";
                          $count++;
                        } else{
                          $action = "No file found.";
                        }

                        if(!empty($c['brgyBlotter'])){
                          $action2 = "<a href='../client/".$c['brgyBlotter']."' target='_blank'>View File</a>";
                          $count++;
                        } else{
                          $action2 = "No file found.";
                        }

                        if($count==2){
                          $button = "<input type='submit' name='submit' class='btn btn-success' value='Confirm'/>";
                        } else{
                          $button = "";
                        }

                        echo '<button class="btn btn-success btn-flat float-center" data-toggle="modal" data-target="#process">Process for Adoption&nbsp;&nbsp;<i class="fa fa-check"></i></button>';

                        echo "<div id='process' class='modal fade' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h4 class='modal-title'>Document Checklist</h4>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span></button>
                            </div>
                            <div class='modal-body'>
                              <form method='post' action='db/processorphan.php'>
                              
                                <table class='table table-striped table-bordered'>
                                  <th>Document</th>
                                  <th>Action</th>

                                  <tr>
                                  <td>Referral Letter</td>
                                  <td><a href='../client/".$c['referralLetter']."' target='_blank'>View File</a></td>
                                  </tr>

                                  <tr>
                                  <td>Medical Abstract</td>
                                  <td><a href='../client/".$c['medicalAbstract']."' target='_blank'>View File</a></td>
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
                              <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                              
                              <input type='hidden' value='<?php echo $orphan_id?>' name='oid'/>
                              ".$button."
                          </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->";

                        
                      }
                      else
                      {

                        $find = "SELECT orphanID FROM o_adoptiondetails WHERE orphanID = '$orphan_id'";
                        $get = mysqli_query($con, $find);
                        if(mysqli_num_rows($get) == 0){
                          echo '<button id="btn2" class="btn btn-success btn-flat float-center" data-toggle="modal" data-target="#adopt">Add Adoption Details &nbsp&nbsp<i class="fa fa-plus"></i></button>';
                        }
                        else{
                          echo '';
                        }
                        
                      }
                    ?>
                  
                </div>

        
        


        <div id='adopt' class='modal fade' role='dialog'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Adoption Details</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                <form method='post' action='db/addadoption.php'>
                <div class='form-inline'>
                  <label style='margin-right: 20px'>Adoption Date</label>
                  <input type='date' name='birth' class='form-control' required/>
                  </div><br/>

                  <div class='form-inline'>
                    <label style='margin-right: 20px'>Adoption Type</label>
                    <select name="adoptiontype" class="form-control">
                      <option value="L">Local</option>
                      <option value="I">International</option>
                    </select>
                  </div><br/>

                  <hr>
                  <strong>Adoptive Parent Details</strong><br/><br/>

                  <div class='form-inline'>
                    <label style='margin-right: 20px'>Name</label>
                    <input type='text' name='adoptivename' class='form-control'/>
                  </div><br/>

                  <div class='form-inline'>
                    <label style='margin-right: 20px'>Email</label>
                    <input type='email' name='adoptiveemail' class='form-control'/>
                  </div><br/>

                  <div class='form-inline'>
                    <label style='margin-right: 20px'>Contact Number</label>
                    <input type='text' name='adoptivecontact' class='form-control'/>
                  </div><br/>

                  <div class='form-inline'>
                    <label style='margin-right: 20px'>Address</label>
                    <input type='text' name='adoptiveaddress' class='form-control' style='width: 330px'/>
                  </div>

                  
                </div>

              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                
                <input type='hidden' value='<?php echo $orphan_id?>' name='oid'/>
                <input type='submit' name='submit' class='btn btn-success' value='Confirm'/>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


           </center>
          </div>

          <div class="col-md-8">
            <div class="card" id="cbody2">
                <div class="card-header card-header-custom">
                  <ul class="nav nav-pills ml-auto ">
                  <li class="nav-item"><a class="nav-link active text-uppercase" href="#activity" data-toggle="tab">Basic Information</a></li>
                  <li class="nav-item"><a class="nav-link text-uppercase" href="#timeline" data-toggle="tab">Case Study</a></li>
                </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-success btn-flat float-right" onclick="updateOrphan()" id="updatebtn">UPDATE</button>
                        </div>
                      </div>
                      <div class="form-group">
                  <form method="post" action="db/updateOrph.php">
                  <?php

                      $query = "SELECT orphan.orphanID, firstName, middleName, lastName, admissionDate, birthdate, person.gender, religion, caseStatus, placeFound, person.personID, caseNo, socialWorkerID, referralDate FROM person JOIN orphan JOIN o_referral ON person.personID = orphan.personID AND orphan.orphanID = o_referral.orphanID WHERE orphan.orphanID = $orphan_id";

                      $res = mysqli_query($con, $query);
                      $rec = mysqli_fetch_row($res);

                      $swid = $rec[12];
                      echo '<div class="row">
                              <div class="col-md-4">
                                <label id="name_lbl" for="name">First Name</label>
                                <input type="text" class="form-control " id="fn" name="fn" value="'.$rec[1].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-md-4">
                                <label id="name_lbl" for="name">Middle Name</label>
                                <input type="text" class="form-control " id="mn" name="mn" value="'.$rec[2].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-md-4">
                                <label id="name_lbl" for="name">Last Name</label>
                                <input type="text" class="form-control " id="ln" name="ln" value="'.$rec[3].'" style="margin: 0" disabled>
                              </div>
                            </div><br/>';

                      echo '<div class="row">
                              <div class="col-md-4">
                                <label>Case Number</label>
                                <input type="text" class="form-control" value="'.$rec[11].'" style="margin: 0" disabled/>
                              </div>
                              <div class="col-md-4">
                                <label id="ad">Admission Date</label> 
                                <input type="date" class="form-control" id="adate" class="or" name="admission" value="'.$rec[4].'" style="margin: 0" disabled><br/>
                              </div>
                              <div class="col-md-4">
                                <label id="bd">Birthdate</label>
                                <input type="date" class="form-control" id="bdate" class="or" name="birthdate" value="'.$rec[5].'" style="margin: 0" disabled>
                              </div>
                            </div>';
                      
                      if ($rec[6]=='F'){
                        $option = '<option value="F" selected>Female</option><option value="M">Male</option>';
                      } else {
                             $option = '<option value="M" selected>Male</option><option value="F">Female</option>';
                      }

                      echo '<div class="row">
                              <div class="col-lg-6">
                                <label id="gen">Gender</label>
                                <select class="form-control" disabled style="margin: 0" id="gender" name="gen">
                                '.$option.'</select><br/>
                              </div>
                              <div class="col-lg-6">
                                <label id="rel" for="religion">Religion</label>
                                <input type="text" class="form-control" id="rlgn" class="or" name="religion" value="'.$rec[7].'" style="margin: 0" disabled>
                              </div>
                            </div>';

                      if ($rec[8]=="Neglected"){
                        $cs = '<option selected>Neglected</option><option>Foundling</option><option>Abandoned</option>';
                      } elseif ($rec[8]=="Foundling"){
                        $cs = '<option>Neglected</option><option selected>Foundling</option><option>Abandoned</option>';
                      } else{
                        $cs = '<option>Neglected</option><option>Foundling</option><option selected>Abandoned</option>';
                      }
                      
                      echo '<div class="row">
                              <div class="col-lg-6">
                                <label id="cstat" for="cstatus">Case Status</label>
                                <select class="form-control" disabled style="margin: 0" name="cstatus" id="case">
                                '.$cs.'</select>
                              </div>
                              <div class="col-lg-6">
                                <label id="pf" for="placefound">Place Found</label>
                                <input type="text" class="form-control" id="place" class="or" name="placefound" value="'.$rec[9].'" style="margin: 0" disabled>
                              </div>
                            </div>';

                      echo '<input type="hidden" name="oid" value="'.$rec[0].'"/>';
                      echo '<input type="hidden" name="pid" value="'.$rec[10].'"/>';
                      ?>

                      <br/>

                      <button type="submit" name="submit" class="btn btn-success btn-flat pull-right" id="savebtn" style="display: none;" onclick="saveOrphan()">SAVE</button>
                    </form>  
                    <button class="btn btn-success btn-flat pull-right" id="cancelbtn" style="display: none; margin-right: 10px; " onclick="cancelUpdate()">CANCEL</button>
                  </div>
                    </div><!-- tab-pane -->
                    <div class="tab-pane" id="timeline">
                      <button type='button' class='btn btn-success btn-flat float-right' data-toggle='modal' data-target='#modal-default2'><span>Add Case Study&nbsp&nbsp</span><i class='fa fa-plus'></i></button><br/><br/>

                      <div id="modal-default2" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Case Study</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("M-d-Y");
              ?>

              <form method="post" action="db/addcasestudy.php" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row" align="right">
                  <div class="col-md-12">
                    <label>Date: </label>
                    <span><?php echo $date ?></span>
                  </div>
                  
                </div><br/>
                <div class="row">
                  <div class="col-md-12">
                    <label id="name">Case Study Title</label>
                    <input type="text" class="form-control input" name="title" required/>
                  </div><br/>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label id="name">File</label>
                    <input type="file" class="form-control input" name="fileToUpload" required/>
                  </div>
                </div>
                <!--<div class="row">
                  <div class="col-md-12">
                    <label id="name">Case Study Type</label>
                    <select class="form-control input" name="type" required /> 
                      <option value="Medical">Medical</option>
                      <option value="Academic">Academic</option>
                    </select>
                  </div>
                </div>-->
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input type="hidden" value="<?php echo $orphan_id ?>" name="oid"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Add File" />
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

                      <table id="example1" class="table table-bordered table-striped" width="100%">
                        <thead>
                          <td>Date Uploaded</td>
                          <td>Case Study Title</td>
                          <td>File Name</td>
                          <td>Action</td>
                        </thead>
                        <tbody>
                          <?php

                          $get = "SELECT * FROM is_casestudy WHERE personID = '$pid'";
                          $qry = mysqli_query($con, $get);

                          while($case = mysqli_fetch_array($qry)){

                            $viewcs = "<a href='../../client/".$case['filePath']."' target='_blank'>View File</a>";
                            echo "<td>".$case['dateUploaded']."</td>";
                            echo "<td>".$case['title']."</td>";
                            echo "<td>".$case['fileName']."</td>";
                            echo "<td>".$viewcs."</td>";
                          }

                          ?>
                        </tbody>
                        <tfoot>
                          <td>Date Uploaded</td>
                          <td>Case Study Title</td>
                          <td>File Name</td>
                          <td>Action</td>
                        </tfoot>
                      </table>
                    </div><!-- tab-pane -->
                  </div><!-- tab-content -->
                  
                </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="card" id="cbody3">
                  <div class="card-header card-header-custom">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item"><a class="nav-link active custom" href="#tab_1" data-toggle="tab"><span>REFERRAL DETAILS</span></a></li>
                      <li class="nav-item"><a class="nav-link custom" href="#tab_2" data-toggle="tab"><span>REFERRAL DOCUMENTS</span></a></li>
                    </ul>

                  </div>
                  <div class="card-body">
                  <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                     <?php 

                      $sql = "SELECT * FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE socialWorkerID = '$swid'";
                      $qwe = mysqli_query($con, $sql);
                      $info = mysqli_fetch_array($qwe);

                      $rdate = $rec[13];

                    ?>
                      <!--form-group-->

                      <table class="table table-condensed">
                        <tr>
                          <td style="border-top: none"><label>Social Worker Name</label></td>
                          <td style="border-top: none"><?php echo $info['firstName'].' '.$info['lastName']; ?></td>
                        </tr>
                        <tr>
                          <td><label>Social Worker Email</label></td>
                          <td><?php echo $info['email']; ?></td>
                        </tr>
                        <tr>
                          <td><label>Endorser Agency</label></td>
                          <td><?php echo $info['endorserAgency']; ?></td>
                        </tr>
                        <tr>
                          <td><label>Referral Date</label></td>
                          <td><?php echo $rdate; ?></td>
                        </tr>
                      </table>
                    
                    </div>

                      <div class="tab-pane" id="tab_2">
                        <?php
                          $orphan_id = $_GET["orphanid"];
                          $count = 0;
                          
                          $query = "SELECT birthCertificate, medicalAbstract, referralLetter, brgyBlotter, referraldocsID FROM o_referral JOIN o_referraldocs ON o_referral.referralID = o_referraldocs.referralID WHERE orphanID = $orphan_id";
                          $res = mysqli_query($con, $query);
                          $rec = mysqli_fetch_array($res);

                          if(!empty($rec['birthCertificate'])){
                            $action = "<a href='../client/".$rec['birthCertificate']."' target='_blank'>View File</a>";
                            $count++;
                          } else{
                            $action = "<a href='#' data-toggle='modal' data-target='#uploadBirth'>Upload Document</a>";
                          }

                          if(!empty($rec['brgyBlotter'])){
                            $action2 = "<a href='../client/".$rec['brgyBlotter']."' target='_blank'>View File</a>";
                            $count++;
                          } else{
                            $action2 = "<a href='#' data-toggle='modal' data-target='#uploadBrgy'>Upload Document</a>";
                          }
                        ?>

                        <!-- Sponsor Modal -->
    <div class="modal fade" id="uploadBirth">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Birth Certificate</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body">
            <center><form method="post" action="uploaddoc.php" enctype="multipart/form-data">
                <label>Birth Certificate</label>
                <input type="file" name="birth" class="form-control" required/>
                </center>
          </div>
        
          <!-- Modal footer -->
          <div class="modal-footer">
              <input type="hidden" value="1" name="type"/>
              <input type="hidden" value="<?php echo $rec['referraldocsID'];?>" name="refid"/>
              <input type="hidden" value="<?php echo $orphan_id;?>" name="oid"/>
              <input type="submit" value="Upload" name="submit" class="btn btn-successn"/>
            </form>
          </div>
        </div>
      </div>
    </div>

                           <!-- Sponsor Modal -->
    <div class="modal fade" id="uploadBrgy">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Brgy. Blotter</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body">
            <center><form method="post" action="uploaddoc.php" enctype="multipart/form-data">
                <label>Birth Certificate</label>
                <input type="file" name="brgy" class="form-control" required/>
                </center>
          </div>
        
          <!-- Modal footer -->
          <div class="modal-footer">
              <input type="hidden" value="2" name="type"/>
              <input type="hidden" value="<?php echo $rec['referraldocsID'];?>" name="refid"/>
              <input type="hidden" value="<?php echo $orphan_id;?>" name="oid"/>
              <input type="submit" value="Upload" name="submit" class="btn btn-successn"/>
            </form>
          </div>
        </div>
      </div>
    </div>

                        <table class="table table-bordered table-striped">
                          <th>Document</th>
                          <th>Action</th>

                          <?php
                            

                            echo "<tr>
                              <td>Referral Letter</td>
                              <td><a href='../client/".$rec['referralLetter']."' target='_blank'>View File</a></td>
                              </tr>";

                            echo "<tr>
                              <td>Medical Abstract</td>
                              <td><a href='../client/".$rec['medicalAbstract']."' target='_blank'>View File</a></td>
                              </tr>";

                            echo "<tr>
                              <td>Birth Certificate</td>
                              <td>".$action."</td>
                              </tr>";

                            echo "<tr>
                              <td>Brgy. Blotter</td>
                              <td>".$action2."</td>
                              </tr>";
                          ?>
                          
                        </table>

                      </div>

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
                    <span class="cheader">ADOPTION DETAILS</span>
                    </div>
                  <div class="card-body">
                      <div class="form-group">
                          <?php 

                          require('dbconnect.php');

                          $sql = "SELECT * FROM o_adoptiondetails as oad JOIN orphan as o ON oad.orphanID = o.orphanID WHERE o.orphanID = '$orphan_id'";
                          $qwe = mysqli_query($con, $sql);
                         ;

                          if(mysqli_num_rows($qwe) == 0){
                            echo '<center><span> No adoption details yet.</span></center>';
                          }
                          else{

                              $sql2 = "SELECT * FROM orphan JOIN o_adoptiondetails as ad on orphan.orphanID = ad.orphanID WHERE ad.orphanID = '$orphan_id'";
                              $qwe2 = mysqli_query($con, $sql2);
                              $info2 = mysqli_fetch_array($qwe2);

                              echo '<table class="table table-condensed">
                        <tr>
                          <td style="border-top: none"><label>Adoption Date</label></td>
                          <td style="border-top: none">'.$info2['adoptionDate'].'</td>
                        </tr>
                        <tr>
                          <td><label>Adoptive Parent Name</label></td>
                          <td>'.$info2['adopterName'].'</td>
                        </tr>
                        <tr>
                          <td><label>Address</label></td>
                          <td>'.$info2['adopterAddress'].'</td>
                        </tr>
                        <tr>
                          <td><label>Email</label></td>
                          <td>'.$info2['adopterEmail'].'</td>
                        </tr>
                        <tr>
                          <td><label>Contact Number</label></td>
                          <td>'.$info2['adopterContact'].'</td>
                        </tr>
                      </table>';
                    }

                        ?>



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

</body>
</html>
