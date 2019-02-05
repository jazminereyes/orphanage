<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <?php
    if(isset($_GET["orphanid"])){
      $orphan_id = $_GET["orphanid"];
    }
    else{
      $orphan_id = $_SESSION["oid"];
      $_SESSION["oid"] = $orphan_id;
    }

    require ('../connection.php');

    $q = "SELECT firstName, lastName FROM person LEFT JOIN orphan on person.personID = orphan.personID WHERE orphanID = $orphan_id";
    $r = mysqli_query($con, $q);
    $s = mysqli_fetch_row($r);
  
    echo "<title>Concordia | ".$s[0]." ".$s[1]."</title>";
  ?>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
      li
      {
        list-style-type: none;
      }

      .photo 
      {
        border-radius: 50%;
      }

      .content 
      {
        background-color:#2dcc70;
      }
      
      .form-control 
      {
        margin-left: 15px;
        margin-right: 25px;
      }

      .p-2 {
          padding: 0; 
      }
  </style>

  <script>
  function updateOrphan()
  {
    document.getElementById("fn").disabled = false;
    document.getElementById("mn").disabled = false;
    document.getElementById("ln").disabled = false;
    document.getElementById("rlgn").disabled = false;
    document.getElementById("savebtn").style.display = "block";
    document.getElementById("updatebtn").style.display = "none";
  
  }
  function saveOrphan()
  {
    document.getElementById("savebtn").style.display = "none";
    document.getElementById("updatebtn").style.display = "inline";
  }

  function disableOrphan()
  {
    document.getElementById("fn").disabled = true;
    document.getElementById("mn").disabled = true;
    document.getElementById("ln").disabled = true;
    document.getElementById("gender").disabled = true;
    document.getElementById("case").disabled = true;
    document.getElementById("place").disabled = true;
    document.getElementById("rlgn").disabled = false;
  }
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
          </div>
          <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="orphans.php" class="text-light">Orphans</a></li>
              <?php
                $orphan_id = $_GET["orphanid"];

                require ('../connection.php');

                $query = "SELECT firstName, lastName FROM person LEFT JOIN orphan on person.personID = orphan.personID WHERE orphanID = $orphan_id";

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
                      if(isset($_GET["orphanid"])){
                      $orphan_id = $_GET["orphanid"];
                    }
                    else{
                      $orphan_id = $_SESSION["oid"];
                      $_SESSION["oid"] = $orphan_id;
                    }

                      require ('../connection.php');

                      $query = "SELECT firstName, lastName, person.photo FROM person LEFT JOIN orphan on person.personID = orphan.personID WHERE orphanID = $orphan_id";

                      $res = mysqli_query($con, $query);

                      $rec = mysqli_fetch_row($res);

                      if ($rec[2]=="")
                      {
                        $src = "img/no-image.png";
                      }

                      else
                      {
                        $src = $rec[2];
                      }

                      echo '<div class="image">';
                      //echo "<img class='photo' src='data:image/jpeg;base64,".base64_encode($rec[1])."' height='100' width='100'>";
                      echo "<img class='photo' src='".$src."' height='100' width='100'>";
                      echo '<br/><br/></div>';
                      echo '<h4>'.$rec[0]." ".$rec[1].'</h4>';
                    ?>
                    </div>
                </div>
           </center>
          </div>

          <div class="col-md-8">
            <div class="card" id="cbody2">
                <div class="card-header">
                  <span class="cheader">BASIC INFORMATION</span>
                  <button class="btn btn-dark float-right" onclick="updateOrphan()" id="updatebtn">UPDATE</button>
                </div>
                <div class="card-body">
                  <div class="form-group">
                  <form method="post" action="backend/updateorphan.php">
                    <?php
                      if(isset($_GET["orphanid"])){
                        $orphan_id = $_GET["orphanid"];
                        $_SESSION["oid"] = $orphan_id;
                      }
                      else{
                        $orphan_id = $_SESSION["oid"];
                        $_SESSION["oid"] = $orphan_id;
                      }
                      require ('../connection.php');
  		
                      $query = "SELECT orphan.orphanID, firstName, middleName, lastName, admissionDate, birthdate, person.gender, religion, caseStatus, placeFound, person.personID, caseNo, socialWorkerID, referralDate FROM person JOIN orphan JOIN o_referral ON person.personID = orphan.personID AND orphan.orphanID = o_referral.orphanID WHERE orphan.orphanID = $orphan_id";

                      $res = mysqli_query($con, $query);
                      $rec = mysqli_fetch_row($res);

                      $swid = $rec[12];
                      echo '<div class="row">
                              <div class="col-lg-4">
                                <label id="name_lbl" for="name">First Name</label>
                                <input type="text" class="form-control " id="fn" name="fn" value="'.$rec[1].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-lg-4">
                                <label id="name_lbl" for="name">Middle Name</label>
                                <input type="text" class="form-control " id="mn" name="mn" value="'.$rec[2].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-lg-4">
                                <label id="name_lbl" for="name">Last Name</label>
                                <input type="text" class="form-control " id="ln" name="ln" value="'.$rec[3].'" style="margin: 0" disabled>
                              </div>
                            </div><br/>';

                      echo '<div class="row">
                              <div class="col-lg-4">
                                <label>Case Number</label>
                                <input type="text" class="form-control" value="'.$rec[11].'" style="margin: 0" disabled/>
                              </div>
                              <div class="col-lg-4">
                                <label id="ad">Admission Date</label> 
                                <input type="date" class="form-control" id="adate" class="or" name="admission" value="'.$rec[4].'" style="margin: 0" disabled><br/>
                              </div>
                              <div class="col-lg-4">
                                <label id="bd">Birthdate</label>
                                <input type="date" class="form-control" id="bdate" class="or" name="birthdate" value="'.$rec[5].'" style="margin: 0" disabled>
                              </div>
                            </div>';
                      
                      if ($rec[6]=='F'){
                        $option = '<option value="F" selected>Female</option><option value="M">Male</option>';
                      } else {
                             $option = '<option value="M" selected>Male</option><option value="F">Female</option>';
                      }

                      if ($rec[7]==''){
                        $select = '<select name="religion" class="form-control" id="rlgn" disabled>
                        <option selected></option>
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Islam">Islam</option>
                        <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                      </select>';
                      } elseif ($rec[7]=='Roman Catholic'){
                        $select = '<select name="religion" class="form-control" id="rlgn" disabled>
                        <option value="Roman Catholic" selected>Roman Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Islam">Islam</option>
                        <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                      </select>';
                      } elseif ($rec[7]=='Christian'){
                        $select = '<select name="religion" class="form-control" id="rlgn" disabled>
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Christian" selected>Christian</option>
                        <option value="Islam">Islam</option>
                        <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                      </select>';
                      } elseif ($rec[7]=='Islam'){
                        $select = '<select name="religion" class="form-control" id="rlgn" disabled>
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Islam" selected>Islam</option>
                        <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                      </select>';
                      } elseif ($rec[7]=='Iglesia Ni Cristo'){
                        $select = '<select name="religion" class="form-control" id="rlgn" disabled>
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Islam">Islam</option>
                        <option value="Iglesia Ni Cristo" selected>Iglesia Ni Cristo</option>
                      </select>';
                      } else {
                        $select = '<select name="religion" class="form-control" id="rlgn" disabled> 
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Islam">Islam</option>
                      </select>';
                    }

                      echo '<div class="row">
                              <div class="col-lg-6">
                                <label id="gen">Gender</label>
                                <select class="form-control" disabled style="margin: 0" id="gender" name="gen">
                                '.$option.'</select><br/>
                              </div>
                              <div class="col-lg-6">
                                <label id="rel" for="religion">Religion</label>
                                <!--<input type="text" class="form-control" id="rlgn" class="or" name="religion" value="'.$rec[7].'" style="margin: 0" disabled>-->
                                '.$select.'
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
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary" id="savebtn" onclick="saveOrphan()" style="display: none" >SAVE</button>
                    </form>  
                  
                </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="card" id="cbody3">
                  <div class="card-header">
                    <ul class="nav nav-pills ml-auto p-2">
                      <li class="nav-item"><a class="nav-link active custom" href="#tab_1" data-toggle="tab"><span>REFERRAL DETAILS</span></a></li>
                      <li class="nav-item"><a class="nav-link custom" href="#tab_2" data-toggle="tab"><span>REFERRAL DOCUMENTS</span></a></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                      <div class="form-group">

                        <?php 

                          require('../connection.php');

                          $sql = "SELECT * FROM person JOIN socialworker ON person.personID = socialworker.personID WHERE socialWorkerID = '$swid'";
                          $qwe = mysqli_query($con, $sql);
                          $info = mysqli_fetch_array($qwe);

                          echo'<div class="form-inline">
                            <label for="inputSWName">Social Worker Name</label>
                            <input type="text" class="form-control swd" id="inputSWName" value="'.$info['firstName'].' '.$info['lastName'].'" disabled/></div><br/>
                            <div class="form-inline"><label for="inputSWEmail">Social Worker Email</label>
                            <input type="text" class="form-control swd" id="inputSWEmail" value="'.$info['email'].'"disabled/></div><br/>
                            <div class="form-inline"><label for="inputEndorser">Endorser Agency</label>
                            <input type="text" class="form-control swd" id="inputEndorser" disabled value="'.$info['endorserAgency'].'"/></div><br/>
                            <div class="form-inline"><label for="inputReferral">Referral Date</label>
                            <input type="date" class="form-control swd" id="inputReferral" disabled value="'.$rec[13].'"/></div>
                          ';
                        ?>
                    <!--form-group-->
                    </div>
                    </div>

                      <div class="tab-pane" id="tab_2">
                      <table class="table table-bordered">
                          <th>Document</th>
                          <th>Action</th>

                          <?php
                            $orphan_id = $_GET["orphanid"];
                            
                            $query = "SELECT birthCertificate, medicalAbstract, referralLetter, brgyBlotter FROM o_referral JOIN o_referraldocs ON o_referral.referralID = o_referraldocs.referralID WHERE orphanID = $orphan_id";
                            $res = mysqli_query($con, $query);
                            $rec = mysqli_fetch_array($res);

                            if(!empty($rec['birthCertificate'])){
                              $action = "<a href='../client/".$rec['birthCertificate']."' target='_blank'>View File</a>";
                            } else{
                              $action = "No file submitted.";
                            }

                            if(!empty($rec['brgyBlotter'])){
                              $action2 = "<a href='../client/".$rec['brgyBlotter']."' target='_blank'>View File</a>";
                            } else{
                              $action2 = "No file submitted.";
                            }

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
                    <!-- <button class="btn btn-primary float-right" onclick="updateOrphan()" id="updatebtn">UPDATE</button> -->
                    </div>
                  <div class="card-body">
                      <div class="form-group">
                          <?php 

                          require('../connection.php');

                          $sql = "SELECT * FROM o_adoptiondetails as oad JOIN orphan as o ON oad.orphanID = o.orphanID WHERE o.orphanID = '$orphan_id'";
                          $qwe = mysqli_query($con, $sql);
            
                          if(mysqli_num_rows($qwe) == 0){
                            echo '<center><span> No adoption details yet.</span></center>';
                          }
                          else{

                              //$sql2 = "SELECT * FROM o_adoptiondetails as oad JOIN orphan as o ON oad.orphanID = o.orphanID WHERE o.orphanID = '$orphan_id'";
                              //$qwe2 = mysqli_query($con, $sql2);
                              $info2 = mysqli_fetch_array($qwe);
                              echo'
                              <div class="form-inline">
                              <label for="adate">Adoption Date</label>
                              <input type="text" class="form-control swd" id="adate" value="'.$info2['adoptionDate'].'" disabled/>
                              </div><br/>
                              <div class="form-inline">
                              <label for="aname">Adopter Name</label>
                              <input type="text" class="form-control swd" id="aname" value="'.$info2['adopterName'].'"disabled/>
                              </div><br/>
                              <div class="form-inline">
                              <label for="aadd">Adopter Address</label>
                              <input type="text" class="form-control swd" id="aadd" disabled value="'.$info2['adopterAddress'].'"/>
                              </div><br/>
                              <div class="form-inline">
                              <label for="aemail">Adopter Email</label>
                              <input type="text" class="form-control swd" id="aemail" disabled value="'.$info2['adopterEmail'].'"/>
                              </div><br/>
                              <div class="form-inline">
                              <label for="acont">Adopter Contact No</label>
                              <input type="date" class="form-control swd" id="acont" disabled value="'.$info2['adopterContact'].'"/>
                              </div>
                              ';
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
