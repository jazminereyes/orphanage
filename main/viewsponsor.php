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
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
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
            <a href="sponsors.php" class="nav-link active">
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
          <div class="col-sm-12">
            <center><h1 class="m-0 text-light"><strong>SPONSORS</strong></h1></center>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sponsors.php" class="text-light">Sponsors</a></li>

              <?php
                $sponsor_id = $_GET["sponsorid"];

                $a = "SELECT firstName, lastName FROM person JOIN sponsor ON person.personID = sponsor.personID WHERE sponsorID = '$sponsor_id'";
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

                    $sponsor_id = $_GET["sponsorid"];

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

                      $qry2 = "SELECT firstName, lastName, person.photo FROM sponsor JOIN person ON sponsor.personID = person.personID WHERE sponsorID = '$sponsor_id'";

                      $sql = mysqli_query($con, $qry2);
                      $g = mysqli_fetch_array($sql);


            if($g['photo'] == ""){
              /*echo '<center><div style="margin-bottom: 10px;">
                  <img class="profile-user-img img-fluid"
                       src="img/no-image.png"
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

                        <label class="mdl">Scholars</label>
                        <select class="form-control mdl" name="category">
                        <?php
                          $sel = "SELECT scholarID, firstName, lastName FROM scholar JOIN person on scholar.personID = person.personID WHERE sponsorID is NULL";
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

                
                    <input type="hidden" value="S" name="type"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

                   
<div id="addinf" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Inflow Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">

                          <label class="mdl" id="rdate">Date Received:</label>
                          <input type="date" class="form-control mdl" name="dtoday" style="width: 40%"/><br/>                    

                        <label class="mdl">Scholars</label>
                        <select class="form-control mdl" name="category">
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
                        <input type="number" class="form-control mdl" name="price"/><br/>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                
                    <input type="hidden" value="S" name="type"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
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

                      $sel = "SELECT * FROM sponsor JOIN person ON sponsor.personID = person.personID WHERE sponsorID = '$sponsor_id'";

                      $sel2 = mysqli_query($con, $sel);
                      $info = mysqli_fetch_array($sel2);

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

                      echo '<div class="row">';
                      echo '<div class="col-lg-6">';
                      echo '<label>Full Name</label>';
                      echo '<input type="text" class="form-control" id="name" name="name" value="'.$info['firstName'].' '.$info['middleName'].' '.$info['lastName'].'" disabled><br/>'; 
                      echo '</div>';
                      echo '<div class="col-lg-6">';
                      echo '<label>Sponsor Type</label>';
                      echo '<input type="text" class="form-control" id="place" class="or" name="placefound" value="'.$donation.'" disabled>';
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<div class="col-lg-12">';
                      echo '<label>Address</label>';
                      echo '<input type="text" class="form-control" id="addr" class="or" name="address" value="'.$info['zip'].' '.$info['street'].' '.$info['city'].' '.$info['country'].'" disabled><br/>';
                      echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo ' <div class="col-lg-6">
                      <label>Contact Number</label>';
                      echo '<input type="text" class="form-control input" id="telno" class="or" name="telno" value="'.$info['telNo'].'" disabled><br/>
                      </div>';
                      
                      echo '<div class="col-lg-6">
                      <label>Email Address</label>';
                      echo '<input type="text" class="form-control input" id="place" class="or" name="placefound" value="'.$info['email'].'" disabled><br/>
                      </div>
                      </div>';

                      echo '<div class="row">
                      <div class="col-lg-6">
                      <label>Birthdate</label>';
                      echo '<input type="date" class="form-control input" id="bdate" class="or" name="birthdate" value="'.$info['birthdate'].'" disabled>
                      </div>';

                      if ($info['gender']=='F'){
                        $gen = "Female";
                      }
                      else
                        $gen = "Male";

                      echo '<div class="col-lg-6">
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

                        $sql = "SELECT firstName, lastName, school, currentYrLevel FROM scholar JOIN person ON scholar.personID = person.personID WHERE sponsorID = '$sponsor_id' LIMIT 3";
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
                            <td>'.$row['firstName'].' '.$row['lastName'].'</td>
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
                            <td>'.$row2['amount'].'</td>
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
