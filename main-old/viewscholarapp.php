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
    if(isset($_GET["scholarid"])){
      $scholar_id = $_GET["scholarid"];
    }
    else{
      $scholar_id = $_SESSION["sid"];
      $_SESSION["sid"] = $scholar_id;
    }

    require ('../connection.php');

    $a = "SELECT firstName, lastName FROM person JOIN scholar on person.personID = scholar.personID WHERE type = 'S' AND scholar.scholarID = '$scholar_id'";
    $b = mysqli_query($con, $a);
    $c = mysqli_fetch_row($b);
  
    echo "<title>Concordia | Scholar Application | ".$c[0]." ".$c[1]."</title>";
  ?>

  

  <style>
      li
      {
        list-style-type: none;
      }

      /*.tb:focus, .tb:active, .tb:target
      {
        background-color: #303136 !important;
        border: medium none;
        border-radius: 0;
        color:#fff;
      }
/*
      .nav-pills>li.active>a{
 color: #337ab7 !important;
 background-color: #303136 !important;
}*/
/*
      .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus{
        background-color: #303136 !important;
        border: medium none;
        border-radius: 0;
        color:#fff;
      }*/

      .sc 
      {
        margin-left: 100px;
        width: 900px;
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
          <li class="nav-item">
            <a href="orphans.php" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Orphans
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
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
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="application.php" class="text-light">Scholar Application</a></li>

              <?php
                require ('../connection.php');

                $scholarid = $_GET['scholarid'];

                $qry = "SELECT firstName, lastName FROM person JOIN scholar ON person.personID = scholar.personID WHERE scholarID = '$scholarid'";
                $r = mysqli_query($con, $qry);
                $s = mysqli_fetch_row($r);

                echo '<li class="breadcrumb-item active">'.$s[0].' '.$s[1].'</li>';
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
          <div class="col-8">
            <!-- Custom Tabs -->
            <div class="card sc">
              <div class="card-header d-flex p-0">
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active tb" href="#tab_1" data-toggle="tab">Basic Information</a></li>
                  <li class="nav-item"><a class="nav-link tb" href="#tab_3" data-toggle="tab">Medical Information</a></li>
                  <li class="nav-item"><a class="nav-link tb" href="#tab_4" data-toggle="tab">Hobbies</a></li>
                  <li class="nav-item"><a class="nav-link tb" href="#tab_2" data-toggle="tab">Family Background</a></li>
                  <li class="nav-item"><a class="nav-link tb" href="#tab_5" data-toggle="tab">Other Information</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <?php
                        $scholarid = $_GET["scholarid"];

                        require('../connection.php');

                        $query = "SELECT * FROM person JOIN scholar on person.personID = scholar.personID JOIN s_appform as app on scholar.scholarAppID = app.scholarAppID WHERE scholarID = '$scholarid'";

                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);

                        $appid = $row['scholarAppID'];

                        echo '<div class="form-inline">
                        <label for="inputName">First Name</label>
                        <input type="text" class="form-control" id="inputName" name="first" value="'.$row['firstName'].'" style="width: 200px; margin-left: 20px;" readonly/>
                        <label for="inputName" style="margin-left: 30px">Middle Name</label>
                        <input type="text" class="form-control" id="inputName" name="mniddle" value="'.$row['middleName'].'" style="width: 200px; margin-left: 20px;" readonly/> 
                      </div><br/>';
                        echo '<div class="form-inline">
                        <label for="inputName">Last Name</label>
                        <input type="text" class="form-control" id="inputName" name="last" value="'.$row['lastName'].'" style="width: 200px; margin-left: 20px;" readonly/>
                        <label for="inputName" style="margin-left: 30px">Nickname</label>
                        <input type="text" class="form-control" id="inputName" name="nickname" value="'.$row['nickname'].'" style="width: 130px; margin-left: 20px;" readonly/> <br/>
                        <label for="inputName" style="margin-left: 30px">Birthdate</label>
                        <input type="date" class="form-control" id="inputBday" name="birthdate" value="'.$row['birthdate'].'" style="width: 180px; margin-left: 20px; display: inline;" readonly/> <br/><br/>
                      </div><br/>';
                        echo '<div class="form-inline">
                        <label for="inputName">Street</label>
                        <input type="text" class="form-control" id="inputName" name="street" value="'.$row['street'].'" style="width: 280px; margin-left: 20px;" readonly/> <br/>
                        <label for="inputName" style="margin-left: 30px">City</label>
                        <input type="text" class="form-control" id="inputName" name="city" value="'.$row['city'].'" style="width: 200px; margin-left: 20px;" readonly/> <br/>
                        <label for="inputName" style="margin-left: 30px">Zip Code</label>
                        <input type="text" class="form-control" id="inputName" name="zip" value="'.$row['zip'].'" style="width: 100px; margin-left: 20px; display: inline;" readonly/> <br/><br/>
                      </div> <br/>';
                        echo '<div class="form-inline">
                        <label for="inputName">School Last Attended</label>
                        <input type="text" class="form-control" id="inputName" name="school" value="'.$row['school'].'" style="width: 400px; margin-left: 20px; display: inline;" readonly/> </div><br/>';
                        
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

                        echo '<div class="form-inline"><label for="currentYrLevel">Highest Educational Attainment:</label>
                        <input type="text" class="form-control" id="inputName" name="currentYrLevel" value="'.$yrlvl.'" style="width: 300px; margin-left: 20px; display: inline;" readonly/> <br/><br/>
                        </div><br/>';
                        
                        $cl = $row['classification'];

                        if($cl == "In_School"){
                            $cl = "In school";
                        }
                        
                        elseif($cl == "Out_School"){
                            $cl = "Out of school";
                        }

                        echo '<label>Classification:</label>
                        <input type="text" class="form-control" id="inputName" name="classification" value="'.$cl.'" style="width: 200px; margin-left: 20px; display: inline;" readonly/> <br/><br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace">Referred By</label>
                        <input type="text" class="form-control" id="inputPlace" name="referredBy" value="'.$row['referredBy'].'" style="width: 200px; margin-left: 20px;" readonly/> <br/>
                        <label for="inputPlace" style="margin-left: 30px;">Relation</label>
                        <input type="text" class="form-control" id="inputPlace" name="relationToReferrer" value="'.$row['relationToReferrer'].'" style="width: 200px; margin-left: 20px;" readonly/> <br/>
                      </div><br/><br/>';
                    ?>
                     
                  </div>
                  <!-- /.tab-pane -->
                  
                  <div class="tab-pane" id="tab_3">
                  
                    <h3>Medical Information</h3>

                    <?php
                      $query2 = "SELECT * FROM s_appform as app JOIN scholar on scholar.scholarAppID = app.scholarAppID  JOIN s_healthinfo as health on app.healthInfoID =  health.healthInfoID WHERE scholar.scholarID = '$scholarid'";
                      $res = mysqli_query($con, $query2);
                      $rec = mysqli_fetch_array($res);

                      echo '<div class="form-inline">
                      <label for="inputPlace">Height (cm)</label>
                      <input type="text" class="form-control" id="inputPlace" name="height" value="'.$rec['height'].'" style="width: 110px; margin-left: 20px" readonly/> <br/>
                      <label for="inputPlace" style="margin-left: 30px;">Weight (kg)</label>
                      <input type="text" class="form-control" id="inputPlace" name="weight" value="'.$rec['weight'].'" style="width: 110px; margin-left: 20px" readonly/> <br/>
                      <label for="inputPlace" style="margin-left: 30px;">Weight Status</label>
                      <input type="text" class="form-control" id="inputPlace" name="weight" value="'.$rec['weightStatus'].'" style="width: 180px; margin-left: 20px" readonly/> <br/>
                      </div><br/>';

                      echo ' <div class="form-inline"> 
                      <label for="inputPlace">Distinguishing Marks (if any)</label>
                      <input type="text" class="form-control" id="inputPlace" name="discolorMarks" value="'.$rec['discolorMarks'].'" style="width: 200px; margin-left: 20px; display: inline;" readonly/> <br/><br/>
                      <label for="inputPlace" style="margin-left: 30px;">Hair Color</label>
                      <input type="text" class="form-control" id="inputPlace" name="hairColor" value="'.$rec['hairColor'].'" style="margin-left: 20px" readonly/> <br/>
                      </div><br/>';

                      echo '<div class="form-inline">
                      <label for="inputPlace">Eye Color</label>
                      <input type="text" class="form-control" id="inputPlace" name="eyeColor" value="'.$rec['eyeColor'].'" style="margin-left: 20px" readonly/> <br/>
                      <label for="inputPlace" style="margin-left: 30px">Skin Tone</label>
                      <input type="text" class="form-control" id="inputPlace" name="skinTone" value="'.$rec['skinTone'].'" style="width: 200px; margin-left: 20px; display: inline;" readonly/> <br/><br/>
                      </div><br/>';
    
                      $ill = $rec['illness'];

                      if($ill == ""){
                        $ill = "None";
                      }

                      echo '<label for="inputPlace">Illness</label>
                      <input type="text" class="form-control" id="inputPlace" name="illness" value="'.$ill.'" style="width: 200px; margin-left: 20px; display: inline;" readonly/> <br/><br/>
                      <br/>';

                      echo '<label for="inputPlace">When was the child last hospitalized?</label>
                      <input type="date" class="form-control" id="inputPlace" name="lastdhp" value="'.$rec['lastDateHospitalized'].'" style="width: 200px; margin-left: 20px; display: inline;" readonly/> <br/><br/>

                      <label for="inputPlace">Where was the child last hospitalized?</label>
                      <input type="text" class="form-control" id="inputPlace" name="lastph" value="'.$rec['lastPlaceHospitalized'].'" style="width: 300px; margin-left: 20px; display: inline;" readonly/> <br/>

                      <br/><br/>';
                    ?>
                  </div>

                  <div class="tab-pane" id="tab_4">
                    <div>
                      <h3>Child Hobbies</h3>
                    
                      <?php

                        $query3 = "SELECT * FROM s_hobbies as hb JOIN s_appform as app on app.hobbyID = hb.hobbyID JOIN scholar on scholar.scholarAppID = app.scholarAppID WHERE scholar.scholarID = '$scholarid' ";
                        $resu = mysqli_query($con, $query3);
                        $recs = mysqli_fetch_array($resu);

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 10px">Child activities at home</label>
                        <textarea class="form-control" name="homeActivity" style="width: 230px; height: 80px;" readonly>'.$recs['homeActivity'].'</textarea>
                        <label for="inputPlace" style="margin-left: 30px; margin-right: 10px;">Child activities outside</label>
                        <textarea class="form-control" name="outsideActivity" style="width: 230px; height: 80px;" readonly>'.$recs['outsideActivity'].'</textarea>
                        </div> <br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 10px">Favorite subject/s</label>
                        <textarea class="form-control" name="faveSubject" style="width: 230px; height: 80px;" readonly>'.$recs['faveSubject'].'</textarea>
                        <label for="inputPlace" style="margin-left: 30px; margin-right: 10px;">Favorite sport/s</label>
                        <textarea class="form-control" name="faveSport" style="width: 230px; height: 80px;" readonly>'.$recs['faveSport'].'</textarea>
                        </div> <br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 10px">Extra-curricular activities</label>
                        <textarea class="form-control" name="extracoActivities" style="width: 230px; height: 80px;" readonly>'.$recs['extracoActivities'].'</textarea>
                        <label for="inputPlace" style="margin-left: 30px; margin-right: 10px;">Ambition</label>
                        <textarea class="form-control" name="ambition" style="width: 230px; height: 80px;" readonly>'.$recs['ambition'].'</textarea>
                        </div></div>';
                      ?> 
                  </div>

                  <div class="tab-pane" id="tab_2">
                  <div>
                            <h3>BIRTHMOTHER</h3>
                    
                    <?php
                        $sa = "SELECT * FROM s_appform as app JOIN scholar on scholar.scholarAppID = app.scholarAppID WHERE scholar.scholarID = '$scholarid' ";
                        $f = mysqli_query($con, $sa);
                        $g = mysqli_fetch_array($f);
        
                        $scholarAppID = $g['scholarAppID'];
        
        
                        $mombg = "SELECT * FROM s_parentinfo as parent JOIN s_familybground as fam on fam.familyBgroundID = parent.familyBgroundID WHERE fam.scholarAppID = '$scholarAppID' AND fam.relationType = 'Mother' ";
                        $d = mysqli_query($con, $mombg);
                        $bg = mysqli_fetch_array($d);

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 20px">Maiden Name</label>
                        <input type="text" class="form-control" id="inputPlace" name="mname" value="'.$bg['name'].'" style="width: 300px" readonly/> <br/>
                        <label for="inputName" style="margin-left: 30px; margin-right: 20px;">Birthdate</label>
                        <input type="date" class="form-control" id="inputBday" name="mbirthdate" value="'.$bg['birthdate'].'" readonly/> <br/>
                        </div><br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 20px">City Address</label>
                        <input type="text" class="form-control" id="inputPlace" name="mcity" value="'.$bg['city'].'" style="width: 300xpx" readonly/> <br/>
                        <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Province Address</label>
                        <input type="text" class="form-control" id="inputPlace" name="mprovince" value="'.$bg['province'].'" readonly/> <br/>
                        </div><br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 10px">Civil Status</label>
                        <input type="text" class="form-control" id="inputPlace" style="width: 110px" name="mcivilStatus" value="'.$bg['civilStatus'].'" readonly/> <br/>
                        <label for="inputPlace"  style="margin-left: 20px; margin-right: 10px;">Place of Marriage</label>
                        <input type="text" class="form-control" id="inputPlace" style="width: 180px" name="mplaceOfMarriage" value="'.$bg['placeOfMarriage'].'" readonly/> <br/>
                        <label for="inputName"  style="margin-left: 20px; margin-right: 10px;">Date of Marriage</label>
                        <input type="date" class="form-control" id="inputBday" style="width: 170px" name="mdateOfMarriage" value="'.$bg['dateOfMarriage'].'" readonly/> <br/>
                        </div> <br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 20px">Occupation</label>
                        <input type="text" class="form-control" id="inputPlace" name="moccupation" value="'.$bg['occupation'].'" readonly/> <br/>
                        <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Income</label>
                        <input type="text" class="form-control" id="inputPlace" name="mincome" value="'.$bg['income'].'" readonly/> <br/>
                        </div><br/>';

                        echo '<div class="form-inline">
                        <label style="margin-right: 20px">No. of Children</label>
                        <input type="number" class="form-control" id="inputPlace" name="mnoOfBrothers" value="'.$bg['noOfChildren'].'" style="width: 80px" readonly/> <br/>
                        <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Medical History</label>
                        <textarea class="form-control" id="inputPlace" name="mmedicalHistory" value="'.$bg['medicalHistory'].'" readonly/></textarea> <br/>
                        </div><br/>';

                        echo '
                    </div><br/><br/>';
                    ?>
                        
                        <div>
                            <h3>BIRTHFATHER</h3>

                    <?php
                        $dadbg = "SELECT * FROM s_parentinfo as parent JOIN s_familybground as fam on fam.familyBgroundID = parent.familyBgroundID WHERE fam.scholarAppID = '$scholarAppID' AND fam.relationType = 'Father'";
                        $e = mysqli_query($con, $dadbg);
                        $fg = mysqli_fetch_array($e);

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 20px">Name</label>
                        <input type="text" class="form-control" id="inputPlace" name="fname" value="'.$fg['name'].'" style="width: 300px" readonly/> <br/>
                        <label for="inputName" style="margin-left: 30px; margin-right: 20px;">Birthdate</label>
                        <input type="date" class="form-control" id="inputBday" name="fbirthdate" value="'.$fg['birthdate'].'" readonly/> <br/>
                        </div><br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 20px">City Address</label>
                        <input type="text" class="form-control" id="inputPlace" name="fcity" value="'.$fg['city'].'" style="width: 300xpx" readonly/> <br/>
                        <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Province Address</label>
                        <input type="text" class="form-control" id="inputPlace" name="fprovince" value="'.$fg['province'].'" readonly/> <br/>
                        </div><br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 10px">Civil Status</label>
                        <input type="text" class="form-control" id="inputPlace" style="width: 110px" name="fcivilStatus" value="'.$fg['civilStatus'].'" readonly/> <br/>
                        <label for="inputPlace" style="margin-left: 20px; margin-right: 10px;">Place of Marriage</label>
                        <input type="text" class="form-control" id="inputPlace" style="width: 180px" name="fplaceOfMarriage" value="'.$fg['placeOfMarriage'].'" readonly/> <br/>
                        <label for="inputName" style="margin-left: 20px; margin-right: 10px;">Date of Marriage</label>
                        <input type="date" class="form-control" id="inputBday" style="width: 170px" name="fdateOfMarriage" value="'.$fg['dateOfMarriage'].'" readonly/> <br/>
                        </div><br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace" style="margin-right: 20px">Occupation</label>
                        <input type="text" class="form-control" id="inputPlace" name="foccupation" value="'.$fg['occupation'].'" readonly/> <br/>
                        <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Income</label>
                        <input type="text" class="form-control" id="inputPlace" name="fincome" value="'.$fg['income'].'" readonly/> <br/>
                        </div><br/>';

                        echo '<div class="form-inline">
                        <label style="margin-right: 20px">No. of Children</label>
                        <input type="text" class="form-control" id="inputPlace" name="fnoOfBrothers" value="'.$fg['noOfChildren'].'" style="width: 80px" readonly/> <br/>
                        <label for="inputPlace" style="margin-right: 20px; margin-left: 30px;">Medical History</label>
                        <textarea class="form-control" id="inputPlace" name="fmedicalHistory" value="'.$fg['medicalHistory'].'" readonly/></textarea> <br/>
                        </div><br/>';

                        echo '
                    </div><br/><br/>';
                    ?>
                            
                  </div>
                  <!-- /.tab-pane -->
                  
                  <div class="tab-pane" id="tab_5">
                  <div>
                            <h3>Other Information</h3>
                        
                        <?php
                             $expen = "SELECT * FROM s_expenditure as exp JOIN s_appform AS app ON app.expenditureID = exp.expenditureID WHERE app.scholarAppID = '$scholarAppID'";
                             $z = mysqli_query($con, $expen);
                             $ex = mysqli_fetch_array($z);

                            $htype = $ex['homeType'];
                            if($htype == "scraps"){
                                $htype == "Scraps of Wood/G.I Sheets";
                            }
                            else
                                $htype = $ex['homeType'];

                            $hstat = $ex['homeStatus'];
                            if($hstat == "withrelatives"){
                                $hstat == "Living with relatives";
                            }

                            $elecType = $ex['electricityType'];
                            if($elecType == "illegal"){
                                $elecType = "Illegal Connection";
                            }
                            elseif($elecType == "shared"){
                                $elecType = "Shared Electricity";
                            }
                            elseif($elecType == "legal"){
                                $elecType = "Legal Connection";
                            }

                            $wtype = $ex['waterType'];
                            if($wtype == "illegal"){
                                $wtype = "Illegal Connection";
                            }
                            elseif($wtype == "shared"){
                                $wtype = "Shared Water";
                            }
                            elseif($wtype == "legal"){
                                $wtype = "Legal Connection";
                            }

                            $ftype = $ex['foodType'];
                            if($ftype == "turoturo"){
                                $ftype = "Turo-turo/Lutong Ulam";
                            }
                            elseif($ftype == "cooking"){
                                $ftype = "Marketing/Cooking";
                            }

                             $btype = $ex['bathroomType'];
                            if($btype == "throwaway"){
                                $btype = "throw away";
                            }
                            
                            else
                                $btype = $ex['bathroomType'];

                            
                            echo '<div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Home Type </label>
                            <input type="text" class="form-control" id="inputPlace" name="mname" value="'.$htype.'" readonly/> <br/>';

                            echo '<label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Home Status </label>
                            <input type="text" class="form-control" id="inputPlace" name="mname" value="'.$hstat.'" readonly/> <br/>';

                            echo '
                            </div><br/>';

                            echo '<div class="form-inline"><label class="lbl" style="margin-right: 20px;"> House Monthly Cost </label>
                            <input name="houseMonthlyCost" type="number" class="form-control" value="'.$ex['houseMonthlyCost'].'" style="width: 130px" readonly/></div> <br/>';

                            echo '<div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Electricity Type </label>
                            <input type="text" class="form-control" id="inputPlace" name="mname" value="'.$elecType.'" readonly/> <br/>';

                            echo '<label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Electricity Monthly Cost </label>
                            <input name="electricityMonthlyCost" type="number" class="form-control" value="'.$ex['electricityMonthlyCost'].'" readonly/> <br/>
                            </div><br/>';

                            echo '<div class="form-inline">
                            <label class="lbl" style="margin-right: 20px;">Water Type</label>
                            <input name="electricityMonthlyCost" type="text" class="form-control" value="'.$wtype.'" readonly/> <br/>';

                            echo '<label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Water Monthly Cost </label>
                            <input name="waterCost" type="number" class="form-control" value="'.$ex['waterCost'].'" readonly/> <br/>
                            </div><br/>';

                            echo '<div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Food Type </label>
                            <input name="electricityMonthlyCost" type="text" class="form-control" value="'.$ftype.'" readonly/> <br/>';
                            
                            echo '<label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Individual Count </label>
                            <input name="individualCount" type="number" class="form-control" value="'.$ex['individualCount'].'" style="width: 100px" readonly/><br/>';

                            echo '
                            </div><br/>';

                            echo '<div class="form-inline">
                            <label class="lbl" style="margin-right: 20px;"> Bathroom Type </label>
                            <input name="electricityMonthlyCost" type="text" class="form-control" value="'.$btype.'" readonly/> <br/>
                            <label class="lbl" style="margin-right: 30px; margin-left: 20px">Annual Educational Expense </label>
                            <input name="educExpense" type="number" class="form-control" value="'.$ex['educExpense'].'" style="width: 125px" readonly/><br/>
                            </div><br/>';

                            echo '<div class="form-inline">
                            <label class="lbl" style="margin-right: 20px">Annual Medical Expense </label>
                            <input name="medExpense" type="number" class="form-control" value="'.$ex['medExpense'].'" style="width: 125px" readonly/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Other Expense </label>
                            <input name="otherExpense" type="number" class="form-control" value="'.$ex['otherExpense'].'" style="width: 125px" readonly/>
                            </div>'
                        ?>
                        </div>
                  </div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->

            <?php
            echo "<div class='row'>";
            echo "<div class='col-lg-12'>";
              echo "<center><a href='#view".$scholarid."' data-toggle='modal'><button type='button' class='btn btn-warning'><i class='fa fa-check'></i>&nbsp;&nbsp;&nbsp;Accept</button></a></center>";
              echo "</div></div>";

              echo "<div id='view".$scholarid."' class='modal fade' role='dialog'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h4 class='modal-title'>Referral Details</h4>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span></button>
                    </div>
                    <div class='modal-body'>
                      <form method='post' action='backend/acceptscholar.php'>
                        <label>You have accepted the application!</label><br/><br/>
                        <label for='dtoday' id='rdate'>Admission Date</label>
                        <input type='date' class='form-control dt' name='admission'/><br/>

                        <label for='dtoday' id='rdate'>Interview Date</label>
                        <input type='date' class='form-control dt' name='intdate'/><br/>
                          
                        <label for='cname' id='name'>Interviewed By</label>
                        <input type='text' class='form-control swd' name='intby'/><br/>
                        <input type='hidden' name='scholarid' value='".$scholarid."'/>
                        <input type='hidden' name='appid' value='".$appid."'/>
                  </div>
                  <div class='modal-footer'>
                      <input type='submit' name='submit' class='btn btn-success' value='Confirm'/>
                      <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Close</button>
                      </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->";
            ?>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
            
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

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>
</body>
</html>
