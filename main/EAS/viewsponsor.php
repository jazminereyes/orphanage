<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Concordia | Scholar Profile</title>
  <?php 
  session_start();
  ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- css -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/ajax-bootstrap.css">
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/viewsponsor.css">

  <!-- SCRIPTS -->
  <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../plugins/jquery/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/updatesch.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "order": [[ 0, "desc" ]],
      "info": false,
      "autoWidth": true
    });
  });
</script>

<link href="../toastr/build/toastr.css" rel="stylesheet"/>

<script src="../moment.js/moment.js"></script>
<script src="../../client/jquery/jquery-3.3.1.min.js"></script>
<script src="../toastr/build/toastr.min.js"></script>

<script>
  function validateDate()
  {
    var received = document.getElementById('received').value;

    toastr.options = {
      "positionClass": "toast-bottom-right"
    };

    if (moment(received).isAfter(moment())==true)
    {
      toastr.error('Date received cannot be after today.');
      event.preventDefault();
    }
  }
</script>
<!-- /SCRIPTS -->
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand sidebar-dark-primary navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="color: white"></i></a>
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
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <center>
        <img src="../icons/Concordia.jpg"><br/>
        <span class="brand-text font-weight-light">EAS</span><br/>
        <span class="brand-text font-weight-light" style="font-size: 65%">(Educational Assistance Through Scholarship)</span>
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
                require ('backend/dbconnect.php');

                $query = "SELECT firstName, lastName from PERSON JOIN USER ON person.personID = user.personID WHERE userID = '$uid' AND programType = 'EAS'";
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
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Maintenance
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="scholar.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sponsor.php" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sponsor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Application
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="app_scholar.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="app_sponsor.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sponsor</p>
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
              <li class="nav-item">
                <a href="list.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="receive.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive through Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="release.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="budget.php" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Scholar Budget
              </p>
            </a>
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
          </div><!-- /.col -->
          </div>
          <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sponsor.php" class="text-light">Sponsor</a></li>
              <?php

                    if(isset($_GET["sponsorid"])){
                      $sponsor_id = $_GET["sponsorid"];
                      $_SESSION["spid"] = $sponsor_id;
                    }
                    else{
                      $sponsor_id = $_SESSION["spid"];
                    }

                      $query = "SELECT firstName, lastName, country, scholarCount, sponsor.sponsorID, email FROM person JOIN sponsor on person.personID = sponsor.personID WHERE sponsor.sponsorID = '$sponsor_id'"; 
                            $result = mysqli_query($con, $query);

                            if ($result)
                            {
                               $rec = mysqli_fetch_array($result);
                                echo '<li class="breadcrumb-item active">'.$rec['firstName'].' '.$rec['lastName'].'</li>';

                              
                            }
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

        $sel = "SELECT COUNT(scholarID) FROM scholar WHERE sponsorID is NULL";
        $qe = mysqli_query($con, $sel);
        $ct = mysqli_fetch_row($qe);

        $x = "SELECT COUNT(scholarID) FROM scholar WHERE sponsorID = '$sponsor_id'";
        $y = mysqli_query($con, $x);
        $z = mysqli_fetch_row($y);


        $j = "SELECT COUNT(sponsorID) FROM s_sponsorinflow WHERE sponsorID = '$sponsor_id'";
        $k = mysqli_query($con, $j);
        $inf = mysqli_fetch_row($k);


        $a = "SELECT scholarCount FROM sponsor WHERE sponsorID = '$sponsor_id'";
        $b = mysqli_query($con, $a);
        $c = mysqli_fetch_row($b);
        $count = $z[0];

        if ($z[0] < $c[0])
        {
          $addsch = '<button id="btn1" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#addsch">Assign Scholar</button>';
        }
        else
        {
          $addsch = '<button id="btn1" class="btn btn-success btn-flat btn-block disabled" >Assign Scholar</button>';          
        }

        if($z[0] == 0){
          $inflow = '<button id="btn2" class="btn btn-success btn-flat btn-block disabled">Add Sponsor Inflow</button>';
          $v_sch = '';
          $v_inf = '';
        }
        else{
          $inflow = '<button id="btn2" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#addinf">Add Sponsor Inflow</button>';
          if($c[0] <= 3){
            $v_sch = '';
          }
          else{
            $v_sch = '<div class="btn-group float-right">
                      <a href="v_sch.php?sponsorid='.$sponsor_id.'"><button type="button" class="btn btn-success btn-flat">
                        <span>View More&nbsp&nbsp</span>
                        <i class="fa fa-eye"></i>
                      </button></a>
                    </div>';
          }

          if($inf[0] <= 3){
            $v_inf = '';
          }
          else{
            $v_inf = '<div class="btn-group float-right">
                    <a href="v_inf.php?sponsorid='.$sponsor_id.'"><button type="button" class="btn btn-success btn-flat">
                      <span>View More&nbsp&nbsp</span>
                      <i class="fa fa-eye"></i>
                    </button></a>
                  </div>';
          }
         
        }

                      $qry2 = "SELECT firstName, lastName, photo, amount FROM person JOIN sponsor on person.personID = sponsor.personID WHERE sponsor.sponsorID = '$sponsor_id'";

                      $sql = mysqli_query($con, $qry2);
                      $g = mysqli_fetch_array($sql);
                      $amount = $g['amount'];


            if($g['photo'] == ""){
              /*echo '<center><div style="margin-bottom: 10px;">
                  <img class="profile-user-img img-fluid"
                       src="../icons/no-image.png"
                       alt="User profile picture" style="height: 160px; width: 160px">
                </div>';*/
                echo '<center><h4>'.$g['firstName'].' '.$g['lastName'].'</h4></center>';
                echo '<ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>No. of Scholars</b> <a class="float-right">'.$count.'</a>
                  </li>
           </ul>';

            }
            else{
                /*echo '<center><div style="margin-bottom: 10px">
                        <img class="profile-user-img img-fluid" 
                        src="data:image/jpeg;base64,'.base64_encode($g['photo']).'"
                        alt="User profile picture" style="height: 160px; width: 160px">
                      </div>';*/
                echo '<center><h4>'.$g['firstName'].' '.$g['lastName'].'</h4></center>';
                echo '<ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>No. of Scholars</b> <a class="float-right">'.$count.'</a>
                          </li>
                      </ul>';
                }

            ?></div>

                    <?php echo $addsch ?>

                    <div id="addsch" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Expense Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("M-d-Y");
              ?>
              <div class="modal-body">

                        <div align="right">
                          <label class="mdl" id="rdate">Date:</label>
                          <input type="text" class="form-control mdl" name="dtoday" value="<?php echo $date?>" disabled style="width: 40%"/><br/>
                        </div>                       

                  <br/>

                  <?php  
                    $q = "SELECT * FROM s_preference JOIN sponsor ON sponsor.sponsorID = s_preference.sponsorID WHERE sponsor.sponsorID = '$sponsor_id'";
                    $r = mysqli_query($con, $q);
                    $s = mysqli_fetch_array($r);

                    if($s['donationType'] == "EY" || $s['donationType'] == "EM"){
                      $yr = "Elem";
                    }
                    else{
                      $yr = "HS";
                    }

                    $gender = "";

                    //QUERY1
                    $count = 0;
                    $find = "";

                    if (!empty($s['averageGrade'])){
                      $count++;
                      $find = $find."lastSemAverage = '".$s['averageGrade']."'";
                    }

                    if (!empty($s['gender'])){
                      $count++;

                      if ($count>1){
                        $find = $find." AND gender = '".$s['gender']."'";
                      } else{
                        $find = $find."gender = '".$s['gender']."'";
                      }

                      $gender = $s['gender'];
                    }
                    
                    if (!empty($s['religion'])){
                      $count++;

                      if ($count>1){
                        $find = $find." AND religion = '".$s['religion']."'";
                      } else{
                        $find = $find."religion = '".$s['religion']."'";
                      }
                    }
                     
                      //QUERY2
                      $count2 = 0;
                      $find2 = "";

                    if (!empty($s['averageGrade'])){
                      $count2++;
                      $find2 = $find2."lastSemAverage = '".$s['averageGrade']."'";
                    }

                    if (!empty($s['gender'])){
                      $count2++;
                      $gender = $s['gender'];

                      if ($count2>1){
                        $find2 = $find2." OR gender = '".$s['gender']."'";
                      } else{
                        $find2 = $find2."gender = '".$s['gender']."'";
                      }
                    }
                    
                    if (!empty($s['religion'])){
                      $count2++;

                      if ($count2>1){
                        $find2 = $find2." OR religion = '".$s['religion']."'";
                      } else{
                        $find2 = $find2."religion = '".$s['religion']."'";
                      }
                    }

                    echo '<p><strong>Sponsor Preference</strong></p>';
                    
                    if($count==0){
                      echo '<p>No specified preference.</p>';
                    } else{
                      echo '<table class="table table-striped table-bordered">
                      <th>Attribute</th>
                      <th>Preference</th>

                      <tr><td>Gender</td><td>'.$gender.'</td></tr>
                      <tr><td>Average Grade</td><td>'.$s['averageGrade'].'</td></tr>
                      <tr><td>Religion</td><td>'.$s['religion'].'</td></tr>

                      </table><br/><hr>';

                      echo '<h5><strong>Recommended Scholars</strong></h5><br/>';

                      $wq = "(SELECT scholarID, currentYrLevel, firstName, lastName, gender, religion, lastSemAverage FROM person JOIN scholar JOIN s_appform ON person.personID = scholar.personID AND scholar.scholarAppID = s_appform.scholarAppID WHERE sponsorID is NULL AND (".$find.") AND applicationStatus = 'Accepted' AND currentYrLevel LIKE '%$yr%') UNION (SELECT scholarID, currentYrLevel, firstName, lastName, gender, religion, lastSemAverage FROM person JOIN scholar JOIN s_appform ON person.personID = scholar.personID AND scholar.scholarAppID = s_appform.scholarAppID WHERE sponsorID is NULL AND (".$find2.") AND applicationStatus = 'Accepted' AND currentYrLevel LIKE '%$yr%')";
                      //$wq = "SELECT scholarID, firstName, lastName, currentYrLevel, gender, religion, lastSemAverage FROM person JOIN scholar JOIN s_appform ON person.personID = scholar.personID AND scholar.scholarAppID = s_appform.scholarAppID WHERE sponsorID is NULL";
                    
                      $gwq = mysqli_query($con, $wq);
                      $ct = mysqli_num_rows($gwq);

                      if ($ct==0){
                        echo '<p>No recommended scholars.</p>';
                      } else{
                        echo '<table class="table table-bordered">';
                        echo '<th>Name</th>';
                        echo '<th>Gender</th>';
                        echo '<th>Religion</th>';
                        echo '<th>Average</th>';
                        echo '<th></th>';

                        while($wqr = mysqli_fetch_array($gwq)){
                          echo '<tr>';
                          echo '<td>'.$wqr['firstName'].' '.$wqr['lastName'].'</td>';
                          echo '<td>'.$wqr['gender'].'</td>';
                          echo '<td>'.$wqr['religion'].'</td>';
                          echo '<td>'.$wqr['lastSemAverage'].'</td>';
                          echo '<td>
                            <form action="backend/assignscholar.php" method="post"> 
                              <input type="hidden" name="scholar" value="'.$wqr['scholarID'].'"/>
                              <input type="hidden" name="spid" value="'.$sponsor_id.'"/>
                              <input type="submit" value="Assign" name="assign" class="btn btn-primary"/>
                            </form>
                          </td>';
                          echo '</tr>';
                        }
                        echo '</table>';
                      }
                    
                    }
                    
                  ?>
                        <hr><br/>

                  <form method="post" action="backend/assignscholar.php">
                        <label class="mdl">Scholars</label>
                        <select class="form-control mdl" name="scholar">
                        <?php

                          $get = "SELECT donationType from sponsor WHERE sponsorID = '$sponsor_id'";
                          $g = mysqli_query($con, $get);
                          $i = mysqli_fetch_array($g);
                          $dtype = $i['donationType'];

                          if($dtype == "EY" || $dtype == "EM"){
                            $yr = "Elem";
                          }
                          else{
                            $yr = "HS";
                          }

                          $sel = "SELECT scholarID, firstName, lastName FROM scholar JOIN person on scholar.personID = person.personID WHERE sponsorID is NULL AND applicationStatus = 'Accepted' AND currentYrLevel LIKE '%$yr%'";
                          $qe = mysqli_query($con, $sel);
                          if(mysqli_num_rows($qe) == 0){
                            echo "<option selected disabled>No scholars available</option>";
                          }
                          else{
                            echo "<option selected disabled>--Select scholar--</option>";
                            while ($res = mysqli_fetch_array($qe)) {
                              echo "<option value=".$res['scholarID'].">".$res['firstName']." ".$res['lastName']."</option>";
                            }
                          }

                        ?>
                        </select>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                
                    <input type="hidden" value="<?php echo $sponsor_id?>" name="spid"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

                    <?php echo $inflow ?>
<div id="addinf" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Inflow Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">
              <form method="post" action="backend/addinflow.php">

                          <label class="mdl" id="rdate">Date Received:</label>
                          <input type="date" class="form-control mdl" name="rdate" id="received" style="width: 40%"/><br/>                    

                        <label class="mdl">Scholars</label>
                        <select class="form-control mdl" name="scholar">
                        <?php
                          $sel = "SELECT scholarID, firstName, lastName FROM scholar JOIN person on scholar.personID = person.personID WHERE sponsorID = '$sponsor_id'";
                          $qe = mysqli_query($con, $sel);
                          if(mysqli_num_rows($qe) == 0){
                            echo "<option selected disabled>No scholars available</option>";
                          }
                          else{
                            echo "<option selected disabled>--Select scholar--</option>";
                            while ($res = mysqli_fetch_array($qe)) {
                              echo "<option value=".$res['scholarID'].">".$res['firstName']." ".$res['lastName']."</option>";
                            }
                          }

                        ?>
                        </select>

                <label class="mdl" id="cmt">Amount</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Php</span>
                  </div>
                  <input type="number" class="form-control mdl" name="amount" value="<?php echo $amount ?>" readonly/>
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                  <br/>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                
                    <input type="hidden" value="<?php echo $sponsor_id?>" name="spid"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm" onclick="validateDate()"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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

                      $sel = "SELECT * FROM person JOIN sponsor on person.personID = sponsor.personID WHERE sponsorID = '$sponsor_id'";

                      $sel2 = mysqli_query($con, $sel);
                      $info = mysqli_fetch_array($sel2);

                      echo '<label>Full Name</label>';
                      echo '<input type="text" class="form-control" id="name" name="name" value="'.$info['firstName'].' '.$info['middleName'].' '.$info['lastName'].'" style="width: 68%;" disabled><br/>'; 

                      echo '<label>Address</label>';
                      echo '<input type="text" class="form-control" id="addr" class="or" name="address" value="'.$info['zip'].' '.$info['street'].' '.$info['city'].' '.$info['country'].'" style="width: 70%;" disabled><br/>';

                      if ($info['donationType']=="EM")
                      {
                        $donation = "Elementary - Monthly";
                      }

                      else if ($info['donationType']=="EY")
                      {
                        $donation = "Elementary - Yearly";
                      }

                      else if ($info['donationType']=="HSM")
                      {
                        $donation = "High School - Monthly";
                      }

                      else if ($info['donationType']=="HSY")
                      {
                        $donation = "High School - Yearly";
                      }

                      echo '<label>Sponsor Type</label>';
                       echo '<input type="text" class="form-control" id="place" class="or" name="placefound" value="'.$donation.'" style="width: 64.5%;" disabled>';

                      echo '<div class="row">
                      <div class="col-5">
                      <label>Contact Number</label>';
                      echo '<input type="text" class="form-control input" id="telno" class="or" name="telno" value="'.$info['telNo'].'" disabled><br/>
                      </div>';
                      
                      echo '<div class="col-5">
                      <label>Email Address</label>';
                      echo '<input type="text" class="form-control input" id="place" class="or" name="placefound" value="'.$info['email'].'" disabled><br/>
                      </div>
                      </div>';

                      echo '<div class="row">
                      <div class="col-5">
                      <label>Birthdate</label>';
                      echo '<input type="text" class="form-control input" id="bdate" class="or" name="birthdate" value="'.$info['birthdate'].'" disabled>
                      </div>';

                      if ($info['gender']=='F'){
                        $gen = "Female";
                      }
                      else
                        $gen = "Male";

                      echo '<div class="col-5">
                      <label>Gender</label>';
                      echo '<input type="text" class="form-control input" id="bdate" class="or" name="birthdate" value="'.$gen.'" disabled>
                      </div>
                      </div>';

                      // echo '<select class="form-control" disabled style="width: 200px; display:none" name="gen">';
                      // if ($info['gender']=='F')
                      // {
                      //   echo '<option value="F" selected>Female</option>';
                      //   echo '<option value="M">Male</option>';
                      // }
                      
                      // else
                      // {
                      //   echo '<option value="M" selected>Male</option>';
                      //   echo '<option value="F">Female</option>';
                      // }

                      // echo '</select>';
                      

                      // echo '<select class="form-control" style="width: 200px; display: none;" name="type" id="type">';

                      // if ($info['donationType']=="EY")
                      // {
                      //   echo '<option selected></option>';
                      //   echo '<option>Foundling</option>';
                      //   echo '<option>Abandoned</option>';
                      // }

                      // elseif($info['donationType']=="EM")
                      // {
                      //   echo '<option>Neglected</option>';
                      //   echo '<option selected>Foundling</option>';
                      //   echo '<option>Abandoned</option>';
                      // }

                      // elseif($info['donationType']=="HSM")
                      // {
                      //   echo '<option>Neglected</option>';
                      //   echo '<option>Foundling</option>';
                      //   echo '<option selected>Abandoned</option>';
                      // }
                      // elseif($info['donationType']=="HSY")
                      // {
                      //   echo '<option>Neglected</option>';
                      //   echo '<option>Foundling</option>';
                      //   echo '<option selected>Abandoned</option>';
                      // }

                      // echo '</select>';
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
                  <span class="cheader">SPONSORED CHILDREN</span>
                    <?php echo $v_sch ?>
                  </div>
                  <div class="card-body">
                      <div class="form-group">

                      <?php 

                        $sql = "SELECT scholarID, firstName, lastName, school, currentYrLevel FROM scholar JOIN person ON scholar.personID = person.personID WHERE sponsorID = '$sponsor_id' LIMIT 3";
                        $result = mysqli_query($con, $sql);

                        if(mysqli_num_rows($result) == 0){
                            echo '<center><span> No sponsored children yet.</span></center>';
                        }
                        else
                        {
                          echo ' <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>School</th>
                              <th>Year Level</th>
                            </tr>
                          </thead>
                          <tbody>';
                          while ($row = mysqli_fetch_array($result))
                          {
                            $yrlvl = $row['currentYrLevel'];
            
            if($yrlvl == "Elem_G1"){
                $yrlvl = "Elementary - Grade 1";
            }
            elseif($yrlvl == "Elem_G2"){
                $yrlvl = "Elementary - Grade 2";
            }
            elseif($yrlvl == "Elem_G3"){
                $yrlvl = "Elementary - Grade 3";
            }
            elseif($yrlvl == "Elem_G4"){
                $yrlvl = "Elementary - Grade 4";
            }
            elseif($yrlvl == "Elem_G5"){
                $yrlvl = "Elementary - Grade 5";
            }
            elseif($yrlvl == "Elem_G6"){
                $yrlvl = "Elementary - Grade 6";
            }
            elseif($yrlvl == "HS_G7"){
                $yrlvl = "High School - Grade 7";
            }
            elseif($yrlvl == "HS_G8"){
                $yrlvl = "High School - Grade 8";
            }
            elseif($yrlvl == "HS_G9"){
                $yrlvl = "High School - Grade 9";
            }
            elseif($yrlvl == "HS_G10"){
                $yrlvl = "High School - Grade 10";
            }
            elseif($yrlvl == "SHS_G11"){
                $yrlvl = "SHS - Grade 11";
            }
            elseif($yrlvl == "SHS_G12"){
                $yrlvl = "SHS - Grade 12";
            } 

                            echo '<tr>
                            <td><a href="viewscholar.php?scholarid='.$row['scholarID'].'">'.$row['firstName'].' '.$row['lastName'].'</a></td>
                            <td>'.$row['school'].'</td>
                            <td>'.$yrlvl.'</td>
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
                    <span class="cheader">SPONSOR INFLOW</span>
                    <?php echo $v_inf ?>
                    </div>
                  <div class="card-body">
                      <div class="form-group">
                          <?php 

                        $sql2 = "SELECT firstName, lastName, dateReceived, amount FROM s_sponsorinflow JOIN scholar JOIN person ON s_sponsorinflow.scholarID = scholar.scholarID AND scholar.personID = person.personID WHERE scholar.sponsorID = '$sponsor_id' LIMIT 3";
                        $result2 = mysqli_query($con, $sql2);

                        if(mysqli_num_rows($result2) == 0){
                            echo '<center><span> No records yet.</span></center>';
                        }
                        else
                        {
                          echo ' <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Date Received</th>
                              <th>Name</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>';
                          while ($row2 = mysqli_fetch_array($result2))
                          {

                            echo '<tr>
                            <td>'.$row2['dateReceived'].'</td>
                            <td>'.$row2['firstName'].' '.$row2['firstName'].'</td>
                            <td>Php '.$row2['amount'].'.00</td>
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
