<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Scholar Application</title>

  <style>
      li
      {
        list-style-type: none;
      }

      .sc 
      {
        margin-left: 50px;
        margin-right: 50px;
      }
  </style>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

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
    <a href="#" class="brand-link">
      <center>
        <img src="../icons/Concordia.jpg"><br/>
        <span class="brand-text font-weight-light">EAS</span>
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
          <li class="nav-item has-treeview">
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
                <a href="sponsor.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sponsor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Application
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="app_scholar.php" class="nav-link active">
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
       <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="scholar.php" class="text-light">Scholars</a></li>
              <?php

                if(isset($_GET["scholarid"])){
                  $scholar_id = $_GET["scholarid"];
                }
                else{
                  $scholar_id = $_SESSION["sid"];
                  $_SESSION["sid"] = $scholar_id;
                }

                $query = "SELECT firstName, lastName FROM person JOIN scholar on person.personID = scholar.personID WHERE scholarID = $scholar_id";

                $res = mysqli_query($con, $query);

                $rec = mysqli_fetch_row($res);

                echo '<li class="breadcrumb-item"><a href="viewscholar.php?scholarid='.$scholar_id.'" class="text-light">'.$rec[0].' '.$rec[1].'</a></li>';
              ?>
              <li class="breadcrumb-item active">View Application</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row text-center text-dark">
          <div class="col-md-12">
             <span style="font-size: 40px;">SCHOLAR APPLICATION</span>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card sc">
              <div class="card-header p-0">
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active tb" href="#tab_1" data-toggle="tab">Basic Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Medical Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Child Hobbies</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Family Background</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Expenditures</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Application Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <form method="post" action="backend/addsch.php">

                    <?php

                    $sel = "SELECT * FROM person as p JOIN scholar as s on s.personID = p.personID JOIN s_appform as app ON s.scholarAppID = app.scholarAppID WHERE s.scholarID = '$scholar_id'";
                    $qry = mysqli_query($con, $sel);
                    $rec = mysqli_fetch_array($qry);

                    if($rec['nickname'] == ""){
                      $nickname = '<input type="text" class="form-control" name="nickname" value="none" disabled/>';
                    }
                    else{
                      $nickname = '<input type="text" class="form-control" name="nickname" value="'.$rec['nickname'].'" disabled/>';
                    }


                    ?>
                      <div class="row">
                        <div class="col-4">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first" value="<?php echo $rec['firstName'] ?>" disabled />
                        </div>  
                        <div class="col-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle" value="<?php echo $rec['middleName'] ?>"  disabled />
                        </div>  
                        <div class="col-4">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last" value="<?php echo $rec['lastName'] ?>"  disabled />
                        </div>  
                      </div>
                      <br/>                      
                      <div class="row">
                        <div class="col-4">
                        <label for="inputName">Nickname</label>
                        <?php echo $nickname ?>
                        </div>
                        <div class="col-4">
                        <label for="inputName">Birthdate</label>
                        <input type="text" class="form-control" name="birthdate" value="<?php echo $rec['birthdate'] ?>"  disabled />
                        </div>
                        <div class="col-4">
                        <label>Gender</label>
                        <?php

                        if($rec['gender'] == 'F'){
                          $gen = 'Female';
                        }
                        else{
                          $gen = 'Male';
                        }
                        ?>
                        <input class="form-control" type="text" name="gender" value="<?php echo $gen ?>"  disabled />
                        </div>
                      </div>
                      <br/> 

                      <div class="row">
                        <div class="col-4">
                          <label>Street</label>
                          <input type="text" class="form-control" name="street" value="<?php echo $rec['street'] ?>" disabled />
                        </div>
                        <div class="col-4">
                          <label>City</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $rec['city'] ?>" disabled />
                        </div>
                        <div class="col-4">
                          <label>Zip Code</label>
                        <input type="text" class="form-control" name="zip" value="<?php echo $rec['zip'] ?>" disabled />
                        </div>
                      </div><br/> 

                      <div class="row">
                        <div class="col-6">
                          <label>School Last Attended</label>
                          <input type="text" class="form-control" name="school" value="<?php echo $rec['school'] ?>" disabled/>
                        </div>
                        <div class="col-6">
                          <label for="cYrLevel">Highest Educational Attainment</label>
                          <?php

                          $yrlvl = $rec['currentYrLevel'];
            
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
                $yrlvl = "Senior High School - Grade 11";
            }
            elseif($yrlvl == "SHS_G12"){
                $yrlvl = "Senior High School - Grade 12";
            }

            $cl = $rec['classification'];

            if($cl == 'In_School'){
              $cl = "In School";
            }
            else{
              $cl = "Out of School";
            }

            echo '<input type="text" class="form-control" name="yr" value="'.$yrlvl.'" disabled />';
            $clf = '<input type="text" class="form-control" name="classif" value="'.$cl.'"  disabled />';

                          ?>
                        </div>
                      </div><br/>

                        <div class="row">
                          <div class="col-4">
                            <label for="inputPlace">Referred By</label>
                            <input type="text" class="form-control" name="refby" value="<?php echo $rec['referredBy'] ?>" disabled />
                          </div>
                          <div class="col-4">  
                            <label for="inputPlace">Relation</label>
                            <input type="text" class="form-control" name="rel" value="<?php echo $rec['relationToReferrer'] ?>" disabled />
                          </div>
                           <div class="col-4">
                              <label>Classification:</label>
                              <?php echo $clf ?>
                           </div>
                        </div><br/>
                  </div><!-- tab pane-->

                  <?php

                  $appid = $rec['scholarAppID'];

                  $get = "SELECT weight, height, weightStatus, discolorMarks, hairColor, eyeColor, skinTone, illness, lastDateHospitalized, lastPlaceHospitalized FROM s_healthinfo as h JOIN s_appform as a on a.healthInfoID = h.healthInfoID WHERE a.scholarAppID = '$appid'";
                  $db = mysqli_query($con, $get);
                  $med = mysqli_fetch_array($db);

                  if($med['weightStatus'] == "Normal Weight"){
                    $stat =  '<label><input type="radio" class="flat-red" checked >Normal Weight</label>&nbsp&nbsp
                    <label><input type="radio" class="flat-red" >Underweight</label>';
                  }
                  elseif($med['weightStatus'] == "Underweight"){
                    $stat = '<label><input type="radio" class="flat-red" >Normal Weight</label>&nbsp&nbsp
                    <label><input type="radio" class="flat-red" checked >Underweight</label>';
                  }
                  else{
                    $stat = '<label>
                              <input class="flat-red" type="radio" name="illness" readonly >Normal Weight
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" readonly >Underweight
                            </label>';
                  }
                  ?>

                  <div class="tab-pane" id="tab_2">
                        <div class="row">
                          <div class="col-4">
                            <label>Height(cm)</label>
                            <input type="text" class="form-control" name="height" value="<?php echo $med['height'] ?>" disabled />
                          </div>
                          <div class="col-4">
                            <label>Weight(kg)</label>
                            <input type="text" class="form-control" name="weight" value="<?php echo $med['weight'] ?>" disabled/>
                          </div>
                          <div class="col-4">
                            <label>Weight Status</label><br/>
                            <?php echo $stat ?>
                          </div>
                        </div><br/>

                    <?php


                  if($med['discolorMarks'] == ""){
                      $marks = '<input type="text" class="form-control" name="marks" value="none" disabled/>';
                  }
                  else{
                      $marks = '<input type="text" class="form-control" name="nickname" value="'.$rec['discolorMarks'].'" disabled/>';
                  }

                  if($med['illness'] == "none" || $med['illness'] == ""){
                    $illness = '
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="yes" disabled>Yes
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="None" checked />No
                            </label>';
                    $spec = '<input type="text" class="form-control" name="illness" style="width: 70%" value="'.$med['illness'].'" disabled />';
                  }
                  else{
                    $illness =  '
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="yes" checked />Yes
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="None" disabled />No
                            </label>';
                    $spec = '<input type="text" class="form-control" name="illness" style="width: 70%" value="'.$med['illness'].'" disabled />';
                  }

                  ?>
                        <div class="row">
                          <div class="col-3">
                            <label>Distinguishing Marks (if any)</label>
                            <?php echo $marks ?>
                          </div>
                          <div class="col-3">
                            <label>Hair Color</label>
                            <input type="text" class="form-control" name="hairColor" value="<?php echo $med['hairColor'] ?>" disabled />
                          </div>
                          <div class="col-3">
                            <label>Eye Color</label>
                            <input type="text" class="form-control" name="eyeColor" value="<?php echo $med['eyeColor'] ?>" disabled />
                          </div>
                          <div class="col-3">
                            <label>Skin Tone</label>
                            <input type="text" class="form-control" name="skinTone" value="<?php echo $med['skinTone'] ?>" disabled />
                          </div>
                        </div><br/>

                        <div class="row">
                          <div class="col-5">
                            <label>Does the child have an illness?</label>&nbsp&nbsp&nbsp&nbsp
                            <?php echo $illness ?>
                          </div>
                          <div class="col-6 form-inline">
                            <label>Specify Illness</label>&nbsp&nbsp&nbsp&nbsp
                            <?php echo $spec ?>
                          </div>
                        </div>
                        
                        <div class="form-inline">
                        <label>When was the child last hospitalized?</label>
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="form-control" name="lastdhp" style="width: 40%" value="<?php echo $med['lastDateHospitalized'] ?>" disabled/> 
                        <br/><br/><br/>
                        </div>
                        <div class="form-inline">
                        <label>Where was the child last hospitalized?</label>&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="form-control" name="lastph" style="width: 50%" value="<?php echo $med['lastPlaceHospitalized'] ?>" disabled /> 
                        <br/><br/> <br/> 
                        </div>
                        </div><!-- tab pane-->

                        <div class="tab-pane" id="tab_3">

                        <?php 

                        $sel = "SELECT homeActivity, outsideActivity, faveSubject, faveSport, extracoActivities, ambition FROM s_hobbies as h JOIN s_appform as a ON a.hobbyID = h.hobbyID WHERE a.scholarAppID = '$appid'";
                        $s = mysqli_query($con, $sel);
                        $hobby = mysqli_fetch_array($s);

                        ?>

                            <div class="row">
                              <div class="col-6">
                                <label>Child Activities at Home</label>
                                <textarea class="form-control" name="homeActivity" disabled><?php echo $hobby['homeActivity']?></textarea>
                              </div>
                              <div class="col-6">
                                <label>Child activities outside</label>
                                 <textarea class="form-control" name="outsideActivity" disabled><?php echo $hobby['outsideActivity']?></textarea>
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>Favorite subject/s</label>
                                <textarea class="form-control" name="faveSubject" disabled><?php echo $hobby['faveSubject']?></textarea>
                              </div>
                              <div class="col-6">
                                <label>Favorite sport/s</label>
                                <textarea class="form-control" name="faveSport" disabled><?php echo $hobby['faveSport']?></textarea>
                              </div>
                            </div><br/>
                            
                            <div class="row">
                              <div class="col-6">
                                <label>Extra-curricular activities</label>
                                <textarea class="form-control" name="extracoActivities" disabled><?php echo $hobby['extracoActivities']?></textarea>
                              </div>
                              <div class="col-6">
                                <label>Ambition</label>
                                <textarea class="form-control" name="ambition" disabled><?php echo $hobby['ambition']?></textarea>
                              </div>
                            </div><br/>
                        </div><!-- /.tab-pane -->
                  
                        <div class="tab-pane" id="tab_4">

                        <?php

                        $sel4 = "SELECT * FROM s_parentinfo as p JOIN s_familybground as f on p.familyBgroundID = f.familyBgroundID JOIN s_appform as a on f.scholarAppID = a.scholarAppID WHERE a.scholarAppID = '$appid'";
                        $sql2 = mysqli_query($con, $sel4);
                        

                        while($parent = mysqli_fetch_array($sql2)){

                          if($parent['relationType'] == "Mother"){
                            $mname = $parent['name'];
                            $mbday = $parent['birthdate'];
                            $mcno = $parent['contactNo'];
                            $moccu = $parent['occupation'];
                            $mincome = $parent['income'];
                            $mcity = $parent['city'];
                            $mprov = $parent['province'];
                            $mstat = $parent['civilStatus'];
                            $mdom = $parent['dateOfMarriage'];
                            if($mdom == ""){
                              $mdom = '<input type="text" class="form-control" name="mdateOfMarriage" value="" disabled />';
                            }
                            else{
                              $mdom = '<input type="text" class="form-control" name="mdateOfMarriage" value="'.$mdom.'" disabled />';
                            }
                            $mpom = $parent['placeOfMarriage'];
                            if($mpom == ""){
                              $mpom = '<input type="text" class="form-control" name="mdateOfMarriage" value="" disabled />';
                            }
                            else{
                              $mpom = '<input type="text" class="form-control" name="mdateOfMarriage" value="'.$mpom.'" disabled />';
                            }
                            $msis = $parent['noOfChildren'];
                            $mmedhisto = $parent['medicalHistory'];
                          }
                          elseif($parent['relationType'] == "Father"){
                            $fname = $parent['name'];
                            $fbday = $parent['birthdate'];
                            $fcno = $parent['contactNo'];
                            $foccu = $parent['occupation'];
                            $fincome = $parent['income'];
                            $fcity = $parent['city'];
                            $fprov = $parent['province'];
                            $fstat = $parent['civilStatus'];
                            $fdom = $parent['dateOfMarriage'];
                            if($fdom == ""){
                              $fdom = '<input type="text" class="form-control" name="mdateOfMarriage" value="" disabled />';
                            }
                            else{
                              $fdom = '<input type="text" class="form-control" name="mdateOfMarriage" value="'.$fdom.'" disabled />';
                            }
                            
                            $fpom = $parent['placeOfMarriage'];

                            if($fpom == ""){
                              $fpom = '<input type="text" class="form-control" name="mdateOfMarriage" value="" disabled />';
                            }
                            else{
                              $fpom = '<input type="text" class="form-control" name="mdateOfMarriage" value="'.$fpom.'" disabled />';
                            }                            
                            $fsis = $parent['noOfChildren'];
                            $fmedhisto = $parent['medicalHistory'];
                          }

                        }

                        ?>

                          <div class="text-center"> 
                            <h3>BIRTHMOTHER</h3>
                          </div>

                            <div class="row">
                              <div class="col-6">
                                <label>Maiden Name</label>
                                <input type="text" class="form-control" name="mname" value="<?php echo $mname ?>" disabled />
                              </div>
                              <div class="col-3">
                                <label>Birthdate</label>
                                <input type="text" class="form-control" name="mbirthdate" value="<?php echo $mbday ?>" disabled /> 
                              </div>
                              <div class="col-3">
                                <label>Contact No</label>
                                <input type="number" class="form-control" name="mcno" value="<?php echo $mcno ?>" disabled /> 
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>City Address</label>
                                <input type="text" class="form-control" name="mcity" value="<?php echo $mcity ?>" disabled />
                              </div>
                              <div class="col-6">
                                <label>Province Address</label>
                                <input type="text" class="form-control" name="mprovince" value="<?php echo $mprov ?>" disabled />
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-4">
                                <label>Civil Status</label>
                                <input type="text" class="form-control" name="mcstat" value="<?php echo $mstat ?>" disabled />
                              </div>
                              <div class="col-4">
                                <label>Place of Marriage</label>
                                <?php echo $mpom ?>
                              </div>
                              <div class="col-4">
                                <label>Date of Marriage</label>
                                <?php echo $mdom ?>
                              </div>
                            </div><br/>

                            <div class="form-inline">
                            <label style="margin-right: 20px">Occupation</label>
                            <input type="text" class="form-control" id="inputPlace" name="moccu" value="<?php echo $moccu ?>" disabled /> <br/>
                            <label style="margin-left: 30px; margin-right: 20px;">Income</label>
                            <input type="text" class="form-control" id="inputPlace" name="mincome" value="<?php echo $mincome ?>" disabled/> <br/>
                            </div><br/>

                            
                            <div class="form-inline">
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Sister</label>
                            <input type="number" class="form-control" id="inputPlace" name="msis" value="<?php echo $msis ?>" disabled /> <br/>
                            </div><br/>

                            <label for="inputPlace">Medical History</label>
                            <textarea class="form-control" id="inputPlace" name="mhisto" disabled><?php echo $mmedhisto ?></textarea> <br/>

                            <hr>
                            <div class="text-center">
                              <h3>BIRTHFATHER</h3>
                            </div>
                            

                            <div class="row">
                              <div class="col-6">
                                <label>Father Name</label>
                                <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>" disabled />
                              </div>
                              <div class="col-3">
                                <label>Birthdate</label>
                                <input type="text" class="form-control" name="fbirthdate" value="<?php echo $fbday ?>" disabled /> 
                              </div>
                              <div class="col-3">
                                <label>Contact No</label>
                                <input type="number" class="form-control" name="fcno" value="<?php echo $fcno ?>" disabled /> 
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>City Address</label>
                                <input type="text" class="form-control" name="fcity" value="<?php echo $fcity ?>" disabled />
                              </div>
                              <div class="col-6">
                                <label>Province Address</label>
                                <input type="text" class="form-control" name="fprovince" value="<?php echo $fprov ?>" disabled />
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-4">
                                <label>Civil Status</label>
                                <input type="text" class="form-control" name="fcstat" value="<?php echo $fstat ?>" disabled />
                              </div>
                              <div class="col-4">
                                <label>Place of Marriage</label>
                                <?php echo $fpom ?>
                              </div>
                              <div class="col-4">
                                <label>Date of Marriage</label>
                                <?php echo $fdom ?>
                              </div>
                            </div><br/>

                            <div class="form-inline">
                            <label style="margin-right: 20px">Occupation</label>
                            <input type="text" class="form-control" name="foccu" value="<?php echo $foccu ?>" disabled /> <br/>
                            <label style="margin-left: 30px; margin-right: 20px;">Income</label>
                            <input type="text" class="form-control" name="fincome" value="<?php echo $fincome ?>" disabled /> <br/>
                            </div><br/>

                            <label>No. of Siblings</label><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">No. of Children</label>
                            <input type="text" class="form-control" id="inputPlace" name="fsis" value="<?php echo $fsis ?>" disabled /> <br/>
                            </div><br/>

                            <label for="inputPlace">Medical History</label>
                            <textarea class="form-control" id="inputPlace" name="fhisto" disabled /><?php echo $fmedhisto ?></textarea> <br/>
                        </div><!-- tab pane -->

                        <?php 

                        $get2 = "SELECT * FROM s_expenditure as e JOIN s_appform as a on a.expenditureID = e.expenditureID WHERE a.scholarAppID = '$appid'";
                        $g = mysqli_query($con, $get2);
                        $exp = mysqli_fetch_array($g);

                        $htype = $exp['homeType'];
                        if($htype = "concrete"){
                          $htype = "Concrete";
                        }
                        elseif($htype = "semiconcrete"){
                          $htype = "Semi Concrete";
                        }
                        elseif($htype = "scraps"){
                          $htype = "Scraps of Wood/G.I Sheets";
                        }

                        $hstat = $exp['homeType'];
                        if($hstat = "owned"){
                          $hstat = "Owned";
                        }
                        elseif($hstat = "rented"){
                          $hstat = "Rented";
                        }
                        elseif($hstat = "withrelatives"){
                          $hstat = "Living with relatives";
                        }

                        $etype = $exp['electricityType'];
                        if($etype = "illegal"){
                          $etype = "Illegal Connection";
                        }
                        elseif($etype = "shared"){
                          $etype = "Shared Electricity";
                        }
                        elseif($etype = "legal"){
                          $etype = "Legal Connection";
                        }

                        $wtype = $exp['waterType'];
                        if($wtype = "illegal"){
                          $wtype = "Illegal Connection";
                        }
                        elseif($wtype = "shared"){
                          $wtype = "Shared Water";
                        }
                        elseif($wtype = "legal"){
                          $wtype = "Legal Connection";
                        }

                         $ftype = $exp['foodType'];
                        if($ftype = "turoturo"){
                          $ftype = "Turo-turo/Lutong ulam";
                        }
                        elseif($ftype = "cooking"){
                          $ftype = "Marketing/Cooking";
                        }

                        $btype = $exp['bathroomType'];
                        if($btype = "owned"){
                          $btype = "Owned";
                        }
                        elseif($btype = "throwaway"){
                          $btype = "Throw away";
                        }
                        elseif($btype = "shared"){
                          $btype = "Shared";
                        }

                        ?>



                        <div class="tab-pane" id="tab_5">
                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px">Home Type</label>
                            <input name="htype" class="form-control" style="width: 150px" value="<?php echo $htype ?>" disabled/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Home Status </label>
                            <input name="hstat" class="form-control" style="width: 150px" value="<?php echo $hstat ?>" disabled /><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> House Monthly Cost </label>
                            <input name="houseMonthlyCost" type="number" class="form-control" style="width: 130px" value="<?php echo $exp['houseMonthlyCost']?>" disabled/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Electricity Type </label>
                            <input name="electricityType" class="form-control" value="<?php echo $etype ?>" disabled /> 

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Electricity Monthly Cost </label>
                            <input name="electricityMonthlyCost" type="number" class="form-control" value="<?php echo $exp['electricityMonthlyCost']?>" disabled /> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px;">Water Type</label>
                            <input name="waterType" type="text" class="form-control" value="<?php echo $wtype ?>" disabled />

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Water Monthly Cost </label>
                            <input name="waterCost" type="number" class="form-control" value="<?php echo $exp['waterCost']?>" disabled /> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Food Type </label>
                            <input name="foodType" type="text" class="form-control" value="<?php echo $ftype ?>" disabled />

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Individual Count </label>
                            <input name="individualCount" type="number" class="form-control" style="width: 100px" value="<?php echo $exp['individualCount']?>" disabled /><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Bathroom Type </label>
                            <input name="bathType" type="text" class="form-control" value="<?php echo $btype ?>" disabled />
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Educational Expense </label>
                            <input name="educExpense" type="number" class="form-control" style="width: 125px" value="<?php echo $exp['educExpense']?>" disabled /><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Medical Expense </label>
                            <input name="medExpense" type="number" class="form-control" style="width: 125px" value="<?php echo $exp['medExpense']?>" disabled />

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Other Expense </label>
                            <input name="otherExpense" type="number" class="form-control" style="width: 125px" value="<?php echo $exp['otherExpense']?>" disabled />
                            </div>
                        </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_6">

                  <div class="row">
                    <div class="col-6">
                      <label>Interview Date</label>
                      <input type="text" class="form-control" name="intdate" value="<?php echo $rec['interviewDate']?>" disabled />
                    </div>
                    <div class="col-6">
                      <label>Interviewed By</label>
                      <input type="text" class="form-control" name="intby" value="<?php echo $rec['interviewedBy']?>" disabled />
                    </div>
                  </div><br/>

                  <div class="row">
                    <div class="col-6">
                      <label>Submission Date</label>
                      <input type="text" class="form-control" name="subdate" value="<?php echo $rec['submissionDate']?>" disabled />
                    </div>
                    <div class="col-6">
                      <label>Admission Date</label>
                      <input type="text" class="form-control" name="admission" value="<?php echo $rec['admissionDate']?>" disabled />
                    </div>
                  </div><br/>

                </div><!-- /.tab-content -->
                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
            <br/><br/>
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../../dist/js/pages/dashboard2.js"></script>

<script>
  //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
</script>
</body>
</html>
