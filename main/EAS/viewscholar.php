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
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/profile.css">

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
<script src="backend/updatesch.js"></script>
<script type="text/javascript">
  // function updatebtn(){

  //   document.getElementById('update_btn').style = ""
  // }
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
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Maintenance
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="scholar.php" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sponsor.php" class="nav-link">
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
              <li class="breadcrumb-item"><a href="scholar.php" class="text-light">Scholars</a></li>
              <?php

                if(isset($_GET["scholarid"])){
                  $scholar_id = $_GET["scholarid"];
                  $_SESSION["sid"] = $scholar_id;
                }
                else{
                  $scholar_id = $_SESSION["sid"];
                }

                $query = "SELECT firstName, lastName FROM person JOIN scholar on person.personID = scholar.personID WHERE scholarID = '$scholar_id'";

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
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <?php
                      if(isset($_GET["scholarid"])){
                      $scholar_id = $_GET["scholarid"];
                    }
                    else{
                      $scholar_id = $_SESSION["sid"];
                      $_SESSION["sid"] = $scholar_id;
                    }

                      $query = "SELECT firstName, middleName, lastName, person.photo, currentYrLevel FROM person LEFT JOIN scholar on person.personID = scholar.personID WHERE scholarID = '$scholar_id'";

                      $res = mysqli_query($con, $query);
                      $rec = mysqli_fetch_array($res);

                      $yrlvl = $rec['currentYrLevel'];
                      $val = $rec['currentYrLevel'];
            
            if($yrlvl == "Elem_G1"){
                $yrlvl = "Elementary - Grade 1";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "Elem_G2"){
                $yrlvl = "Elementary - Grade 2";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "Elem_G3"){
                $yrlvl = "Elementary - Grade 3";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "Elem_G4"){
                $yrlvl = "Elementary - Grade 4";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "Elem_G5"){
                $yrlvl = "Elementary - Grade 5";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "Elem_G6"){
                $yrlvl = "Elementary - Grade 6";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "HS_G7"){
                $yrlvl = "High School - Grade 7";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "HS_G8"){
                $yrlvl = "High School - Grade 8";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "HS_G9"){
                $yrlvl = "High School - Grade 9";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "HS_G10"){
                $yrlvl = "High School - Grade 10";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "SHS_G11"){
                $yrlvl = "Senior High School - Grade 11";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }
            elseif($yrlvl == "SHS_G12"){
                $yrlvl = "Senior High School - Grade 12";
                $opt = '<option value="'.$val.'" selected>'.$yrlvl.'</option>';
            }


            if($rec[3] == ""){
              echo '<div class="text-center">
                  <img class="profile-user-img img-fluid"
                       src="../img/no-image.png"
                       alt="User profile picture">
                </div>';

            }else{
                        echo "<center><img class='photo' src='../".$rec['photo']."' height='100' width='100' ></center>";
            }

                echo'<h3 class="profile-username text-center">'.$rec[0].' '.$rec[2].'</h3>



                <p class="text-muted text-center">'.$yrlvl.'</p>';

                ?>

                    <button type="button" class="btn btn-primary btn-block btn-flat dropdown-toggle" data-toggle="dropdown">
                      <span class="caret">Actions</span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="width: 85%">
                      <a class="dropdown-item" href="cstudy.php?scholarid=<?php echo $scholar_id?>">Case Study</a>
                      <a class="dropdown-item" href="s_application.php?scholarid=<?php echo $scholar_id?>">View Application</a>
                      <a class="dropdown-item" href="expense.php?scholarid=<?php echo $scholar_id?>">Expenses</a>
                      <a class="dropdown-item" href="medical.php?scholarid=<?php echo $scholar_id?>"'>Medical</a>
                      <a class="dropdown-item" href="academic.php?scholarid=<?php echo $scholar_id?>">Academics</a>
                      <a class="dropdown-item" href="sponsordet.php?scholarid=<?php echo $scholar_id?>">Sponsor</a>
                    </div>
                  </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        <div id="modal-default" class="modal fade" role="dialog" >
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
              <div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <span><?php echo $date?></span><br/>
                        </div>
                <form method="post" action="">
                        <label for="iname" id="name">Title:</label>
                        <input type="text" class="form-control swd" name="title" style="width: 80%;"/><br/>
                        <label for="file" id="cs">File:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <input type="file" name="file"/><br/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                    <input type="hidden" value=<?php echo $scholar_id?> name="schid"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

            <?php

               $qry = "SELECT school FROM person JOIN scholar ON person.personID = scholar.personID WHERE scholarID = '$scholar_id'";
               $qwe = mysqli_query($con, $qry);
               $info = mysqli_fetch_row($qwe);

            ?>

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Scholarship Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i>School</strong>

                <p class="text-muted">
                  <?php echo $info[0]; ?>
                </p>

                <hr>

                <?php 

                $qru = "SELECT firstName, lastName, donationType, amount FROM person JOIN sponsor JOIN scholar ON person.personID = sponsor.personID AND sponsor.sponsorID = scholar.sponsorID WHERE scholar.scholarID = '$scholar_id'";
                $result = mysqli_query($con, $qru);
                $row = mysqli_fetch_array($result);

                if(mysqli_num_rows($result) == 0){
                  echo "<span>No sponsor yet. 
                  Click <a href='sponsordet.php?scholarid=".$scholar_id."'>here</a> to assign.
                  </span>";
                }
                else{

                  $type = $row['donationType'];

                if($type == "HSM" || $type == "EM"){
                  $type = "Monthly";
                }
                elseif($type == "HSY" || $type == "EY"){
                  $type = "Yearly";
                }

                ?>

                <strong><i class="fa fa-user mr-1"></i> Sponsor</strong>

                <p class="text-muted"><?php echo $row['firstName'].' '.$row['lastName']; ?></p>

                <hr>

                <strong><i class="fa fa-credit-card mr-1"></i> Sponsor Type</strong>

                <p class="text-muted"><?php echo $type?></p>

                <hr>

                <strong><i class="fa fa-money mr-1"></i> Sponsor Amount</strong>

                <p class="text-muted">Php <?php echo $row['amount']?>.00</p>

                <?php 

                }

                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab" onclick="updatebtn()">Medical Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab" onclick="updatebtn()">Family Background</a></li>&nbsp

                  <li class="nav-item" id="update_btn" ><button type='button' class='btn btn-success btn-flat' data-toggle='modal' data-target='#modal-default2' style="margin-left: 280px;">
                      <span>Update&nbsp&nbsp</span>
                      <i class='fa fa-edit'></i>

                    </button></li>
                </ul>


              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <form method="post" action="backend/updatesch.php" enctype="multipart/form-data">
                       <?php

                       $query = "SELECT * FROM person LEFT JOIN scholar on person.personID = scholar.personID JOIN s_appform as app on scholar.scholarAppID = app.scholarAppID WHERE scholarID = '$scholar_id'";

                      $res = mysqli_query($con, $query);
                      $rec = mysqli_fetch_array($res);

                      echo '<div class="row">
                      <div class="col-4">
                      <label id="first" for="fname" style="display: none">First Name</label>';
                      echo '<input type="text" class="form-control input" id="fn" name="first" style="display: none" value="'.$rec['firstName'].'" required/>
                      </div>';
                      echo '<div class="col-4">
                      <label id="mid" for="mname" style="display: none">Middle Name</label>';
                      echo '<input type="text" class="form-control input" id="mn" name="middle" style="display: none" value="'.$rec['middleName'].'"/>
                      </div>';
                      echo '<div class="col-4">
                      <label id="lst" for="lname" style="display: none">Last Name</label>';
                      echo '<input type="text" class="form-control input" id="ln" name="last" style="display: none" value="'.$rec['lastName'].'" required/>
                      </div>
                      </div>';

                      echo '<label id="name_lbl" class="lbl" for="name">Full Name</label>';
                      if($rec['middleName'] == ""){
                        echo '<input type="text" class="form-control" id="fullname" name="name" value="'.$rec['firstName'].' '.$rec['lastName'].'" style="width: 75%;" disabled /><br/>'; 
                      }
                      else{
                      echo '<input type="text" class="form-control" id="fullname" name="name" value="'.$rec['firstName'].' '.$rec['middleName'].' '.$rec['lastName'].'" style="width: 75%;" disabled /><br/>'; 
                    }

                      echo '<div class="row">
                      <div class="col-4">
                      <label id="lbl_s" for="street" style="display: none">Street Address</label>';
                      echo '<input type="text" class="form-control input" id="st" name="street" style="display: none" value="'.$rec['street'].'" required/>
                      </div>';
                      echo '<div class="col-4">
                      <label id="lbl_c" for="city" style="display: none">City/Province</label>';
                      echo '<input type="text" class="form-control input" id="ct" name="city" style="display: none" value="'.$rec['city'].'" required/>
                      </div>';
                      echo '<div class="col-4">
                      <label id="lbl_z" for="zip" style="display: none">Zip</label>';
                      echo '<input type="text" class="form-control input" id="zp" name="zip" style="display: none" value="'.$rec['zip'].'" required/>
                      </div>
                      </div>';

                      echo '<label id="addr_lbl" class="lbl" for="addr">Address</label>';
                      echo '<input type="text" class="form-control" id="place" name="addr" value="'.$rec['zip'].' '.$rec['street'].' '.$rec['city'].'" style="width: 75%;" disabled />'; 

                      echo '<label id="pic_lbl" style="display: none">Child Photo:</label>';
                      echo '<input type="file" class="form-control" id="pic" name="pic" style="display: none; width: 50%;" value="'.$rec['photo'].'" /><br/>'; 

                      echo '<label id="ad" class="lbl">Admission Date</label>';
                      echo '<input type="text" class="form-control" id="adate" class="or" name="admission" value="'.$rec['admissionDate'].'" style="width: 30%;" disabled /><br/>';
                      echo '<label id="bd" class="lbl">Birthdate</label>';
                      echo '<input type="text" class="form-control" id="bday" class="or" name="birthdate" value="'.$rec['birthdate'].'" style="width: 30%;" disabled><br/>';
                      echo '<label id="gen" class="lbl">Gender</label>';
                      echo '<select class="form-control" disabled style="width: 200px;" id="gender" name="gen">';
                      if ($rec['gender']=='F')
                      {
                        echo '<option value="F" selected>Female</option>';
                        echo '<option value="M">Male</option>';
                      }
                      
                      else
                      {
                        echo '<option value="M" selected>Male</option>';
                        echo '<option value="F">Female</option>';
                      }
                      echo '</select><br/>';

                      echo '<label id="sch_lbl" class="lbl" for="sch">School</label>';
                      echo '<input type="text" class="form-control" id="school" name="sch" value="'.$rec['school'].'" style="width: 75%;" disabled required><br/>'; 

                      echo '<label id="sch_lbl" class="lbl" for="sch">Current Year Level</label>';
                      echo '<select class="form-control" id="selyrlvl" name="YrLevel" style="display:none; width: 50%;">';
                echo $opt;
                echo '
                <option value="Elem_G1">Elementary - Grade 1</option>
                <option value="Elem_G2">Elementary - Grade 2</option>
                <option value="Elem_G3">Elementary - Grade 3</option>
                <option value="Elem_G4">Elementary - Grade 4</option>
                <option value="Elem_G5">Elementary - Grade 5</option>
                <option value="Elem_G6">Elementary - Grade 6</option>
                <option value="HS_G7">High School - Grade 7</option>
                <option value="HS_G8">High School - Grade 8</option>
                <option value="HS_G9">High School - Grade 9</option>
                <option value="HS_G10">High School - Grade 10</option>
                <option value="SHS_G11">Senior High School - Grade 11</option>
                <option value="SHS_G12">Senior High School - Grade 12</option>
            </select>';
                      echo '<input type="text" class="form-control" id="lvl" name="yrlev" value="'.$yrlvl.'" style="width: 50%;" disabled><br/>'; 

                      echo '<label id="refby_lbl" class="lbl">Referred By</label>';
                      echo '<input type="text" class="form-control" id="refby" class="or" name="refby" value="'.$rec['referredBy'].'" style="width: 30%;" disabled><br/>';
                      echo '<label id="rel_lbl" class="lbl">Relation To Referrer</label>';
                      echo '<input type="text" class="form-control" id="rel" class="or" name="rel" value="'.$rec['relationToReferrer'].'" style="width: 20%;" disabled><br/>';

                      echo '<input type="hidden" name="sid" value="'.$scholar_id.'" />';
                      echo '<input type="hidden" name="pid" value="'.$rec['personID'].'" />';

                       ?>

                       <button type="submit" name="submit" class="btn btn-primary float-right" id="savebtn" style="display: none;" onclick="saveOrphan(); validateInput();">SAVE</button>
                    </form>
                    <button id="cancelbtn" class="btn btn-primary float-right" style="display: none; margin-right: 10px" onclick="cancelUpdate()">CANCEL</button> 

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">

                  <?php

                  $sel = "SELECT s.scholarAppID, med.healthInfoID, weight, weightStatus, height, discolorMarks, hairColor, eyeColor, lastDateHospitalized, lastPlaceHospitalized FROM s_appform as app JOIN scholar as s ON app.scholarAppID = s.scholarAppID JOIN s_healthinfo as med ON app.healthInfoID = med.healthInfoID WHERE scholarID = $scholar_id";
                  $get = mysqli_query($con, $sel);
                  $med = mysqli_fetch_array($get);

                      echo '<input type="hidden" name="appid" value="'.$med['scholarAppID'].'" />';
                      echo '<input type="hidden" name="hid" value="'.$med['healthInfoID'].'" />';
                      echo '<input type="hidden" name="sid" value="'.$scholar_id.'" />';

                      echo '<label id="wt" class="lbl">Weight</label>';
                      echo '<input type="text" class="form-control" id="wgt" class="or" name="weight" value="'.$med['weight'].' kg" style="width: 20%;" disabled>';
                      echo '<label id="st" class="lbl">Weight Status</label>';
                      echo '<input type="text" class="form-control" id="ws" class="or" name="stat" value="'.$med['weightStatus'].'" style="width: 30%;" disabled><br/>';
                      echo '<label id="ht" class="lbl">Height</label>';
                      echo '<input type="text" class="form-control" id="hgt" class="or" name="height" value="'.$med['height'].' cm" style="width: 20%;" disabled>';
                      echo '<label id="dm" class="lbl">Distinguishing Marks</label>';
                      echo '<input type="text" class="form-control" id="mark" class="or" name="marks" value="'.$med['discolorMarks'].'" style="width: 20%;" disabled><br/>';
                      echo '<label id="hc" class="lbl">Hair Color</label>';
                      echo '<input type="text" class="form-control" id="hclr" class="or" name="hair" value="'.$med['hairColor'].'" style="width: 30%;" disabled>';
                      echo '<label id="ec" class="lbl">Eye Color</label>';
                      echo '<input type="text" class="form-control" id="eclr" class="or" name="eye" value="'.$med['eyeColor'].'" style="width: 30%;" disabled><br/>';
                      echo '<label id="ad" class="lbl">Last Date Hospitalized</label>';
                      echo '<input type="date" class="form-control" id="ldh" class="or" name="placehospi" value="'.$med['lastDateHospitalized'].'" style="width: 30%;" disabled><br/>';
                      echo '<label id="bd" class="lbl">Last Place Hospitalized</label>';
                      echo '<input type="text" class="form-control" id="lph" class="or" name="datehospi" value="'.$med['lastPlaceHospitalized'].'" style="width: 50%;" disabled><br/>';

                  ?>
                    
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <div class="row">

                  <?php

                  $sel = "SELECT s.scholarAppID from scholar as s join s_appform as a on s.scholarAppID = a.scholarAppID where scholarID = '$scholar_id'";
                  $g = mysqli_query($con, $sel);
                  $f = mysqli_fetch_row($g);
                  $appid = $f[0];

                  $get = "SELECT DISTINCT name, occupation, contactNo, relationType FROM s_familybground as fam join s_parentinfo as p on p.familyBgroundID = fam.familyBgroundID where scholarAppID = '$appid'";
                  $my = mysqli_query($con, $get);
                  $mflag = 0;
                  $fflag = 0;

                  while($fam = mysqli_fetch_array($my)){

                    if($fam['relationType'] == "Mother"){
                      echo "<div class='col-6'>
                        <label for='mname' class='col-sm-5 control-label lbl'>Mother's Name</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='mom_name' name='mname' value='".$fam['name']."' disabled>
                        </div>
                        <label for='moccu' class='col-sm-5 control-label lbl'>Occupation</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='mom_occu' name='moccu' value='".$fam['occupation']."'  disabled>
                        </div>
                        <label for='mcno' class='col-sm-5 control-label lbl'>Contact No.</label>
                        <div class='col-sm-10'>
                          <input type='number' class='form-control' id='mom_cno' name='mcno' value='".$fam['contactNo']."' disabled>
                        </div>
                        </div>";

                        $mflag = 1;
                    }
                    elseif($fam['relationType'] == "Father"){
                      echo "<div class='col-6'>
                      <label for='fname' class='col-sm-5 control-label lbl'>Father's Name</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='f_name' name='fname' value='".$fam['name']."'  disabled>
                        </div>
                        <label for='foccu' class='col-sm-5 control-label lbl'>Occupation</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='f_occu' name='foccu' value='".$fam['occupation']."' disabled>
                        </div>
                        <label for='fcno' class='col-sm-5 control-label lbl'>Contact No.</label>
                        <div class='col-sm-10'>
                          <input type='number' class='form-control' id='f_cno' name='fcno' value='".$fam['contactNo']."' disabled>
                        </div>
                        </div>";
                        $fflag = 1;
                    }
        
                  }

                  if($mflag == 1 && $fflag == 0){
                      echo "<div class='col-6'>
                      <label for='fname' class='col-sm-5 control-label lbl'>Father's Name</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='f_name' name='fname' disabled>
                        </div>
                        <label for='foccu' class='col-sm-5 control-label lbl'>Occupation</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='f_occu' name='foccu' disabled>
                        </div>
                        <label for='fcno' class='col-sm-5 control-label lbl'>Contact No.</label>
                        <div class='col-sm-10'>
                          <input type='number' class='form-control' id='f_cno' name='fcno' disabled>
                        </div>
                        </div>";
                    }
                    elseif($fflag == 1 && $mflag == 0){
                     echo "<div class='col-6'>
                     <label for='mname' class='col-sm-5 control-label lbl'>Mother's Name</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='mom_name' name='mname' disabled>
                        </div>
                        <label for='moccu' class='col-sm-5 control-label lbl'>Occupation</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='mom_occu' name='moccu' disabled>
                        </div>
                        <label for='mcno' class='col-sm-5 control-label lbl'>Contact No.</label>
                        <div class='col-sm-10'>
                          <input type='number' class='form-control' id='mom_cno' name='mcno' disabled>
                        </div>
                        </div>";
                    }
                  ?> 
                     
                  </div>
                  <!-- /.tab-pane -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.tab-content -->
                                
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
              <br/><br/>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->


</body>
</html>
