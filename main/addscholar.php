<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Add Scholar</title>
   <!-- Steps -->
   <link rel="stylesheet" href="../client/jquery-steps-master/dist/jquery-steps.css">
  <link rel="stylesheet" href="../client/jquery-steps-master/examples/css/style.css">

  <link href="toastr/build/toastr.css" rel="stylesheet"/>

  <script src="moment.js/moment.js"></script>
  <script src="../client/jquery/jquery-3.3.1.min.js"></script>
  <script src="toastr/build/toastr.min.js"></script>

  <script>
    function validateDate()
    {
      submission = document.getElementById('sub').value;
      interview = document.getElementById('intdate').value;
      admission = document.getElementById('admission').value;

      var count = 0;

      toastr.options = {
        "positionClass": "toast-bottom-right"
      };

      if (moment(submission).isAfter(interview)==true)
      {
        count = 1;
        toastr.error('Submission date cannot be after interview date.');
      }

      if (moment(submission).isAfter(admission)==true)
      {
        count = 1;
        toastr.error('Submission date cannot be after admission date.');
      }

      if (moment(interview).isAfter(admission)==true)
      {
        count = 1;
        toastr.error('Interview date cannot be after admission date.');
      }

      if (count==1)
      {
        event.preventDefault();
      }
    }
  </script>

  <style>
      li
      {
        list-style-type: none;
      }

      .sc
      {
        margin-left: 100px;
        width: 900px;
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
  <div class="content-wrapper" style="background-color: #2dcc70">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0 text-light"><strong>ADD SCHOLAR</strong></h1></center>
          </div><!-- /.col -->
          </div>
          <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="scholars.php" class="text-light">Scholars</a></li>
              <li class="breadcrumb-item active">Add Scholar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <div id="demo">
        <div class="step-app">
              <ul class="step-steps">
                <li><a href="#step1"><center>Basic Information</center></a></li>
                <li><a href="#step2"><center>Medical Information</center></a></li>
                <li><a href="#step3"><center>Hobbies</center></a></li>
                <li><a href="#step4"><center>Family Background</center></a></li>
                <li><a href="#step5"><center>Other Information</center></a></li>
                <li><a href="#step6"><center>Application Details</center></a></li>
              </ul>

              <div class="step-content" style="background: white">
                <div class="step-tab-panel" id="step1" style="margin-left: 50px;">
                  <form method="post" action="backend/insertsch.php" id="frmInfo"> <br/>
                  <div class="form-inline">
                    <label for="inputName"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;First Name</label>
                    <input type="text" class="form-control required" id="inputName" name="first" style="width: 180px; margin-left: 10px;" required/>
                    <label for="inputName" style="margin-left: 20px">Middle Name</label>
                    <input type="text" class="form-control" id="inputName" name="middle" style="width: 180px; margin-left: 10px;"/>
                    <label for="inputName" style="margin-left: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Last Name</label>
                    <input type="text" class="form-control required" id="inputName" name="last" style="width: 190px; margin-left: 10px;" required/>
                  </div><br/>
                  <div class="form-inline">
                      <label for="inputName">Nickname</label>
                      <input type="text" class="form-control" id="inputName" name="nickname" style="width: 130px; margin-left: 28px; width: 180px;"/> <br/>
                      <label for="inputName" style="margin-left: 20px; margin-right: 10px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Birthdate</label>
                      <input type="date" name="birthdate" class="form-control" id="inputBday" style="margin-left: 13px; width: 180px;"/>
                      <label style="margin-left: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Gender:</label>
                      <label class="form-check-label radio-inline" style="margin-left: 20px"><input class="form-check-input" type="radio" name="gender" value="M" required>Male</label>
                      <label class="form-check-label radio-inline" style="margin-left: 20px"><input class="form-check-input" type="radio" name="gender" value="F">Female</label>
                      <br/><br/>
                    </div><br/>
                    <div class="form-inline">
                      <label for="inputName"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Street</label>
                      <input type="text" class="form-control required" id="inputName" name="street" style="width: 320px; margin-left: 10px;" required/> <br/>
                      <label for="inputName" style="margin-left: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;City</label>
                      <input type="text" class="form-control required" id="inputName" name="city" style="width: 225px; margin-left: 10px;" required/> <br/>
                      <label for="inputName" style="margin-left: 20px">Zip Code</label>
                      <input type="text" class="form-control" id="inputName" name="zip" style="width: 115px; margin-left: 10px; display: inline;"/> <br/><br/>
                    </div> <br/>
                    <div class="form-inline">
                      <label for="inputName"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;School Last Attended</label>
                      <input type="text" class="form-control required" id="inputName" name="school" style="width: 410px; margin-left: 10px; display: inline;" required/>

                      <label for="inputName"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px; margin-left: 20px;"></i></span>&nbsp;Last Weighted Average:</label>
                      <input type="text" class="form-control required" id="inputName" name="average" style="width: 100px; margin-left: 10px; display: inline;" required/> <br/><br/>

                    </div> </br>
                    <div class="form-inline">
                      <label for="currentYrLevel"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Highest Educational Attainment:</label>
                      <select class="form-control required" name="currentYrLevel" name="currentYrLevel" style="width: 250px; margin-left: 10px; display: inline;" required>
                        <option value="Elem_G1">Elementary - Grade 1</option>
                        <option value="Elem_G2">Elementary - Grade 2</option>
                        <option value="Elem_G3">Elementary - Grade 3</option>
                        <option value="Elem_G4">Elementary - Grade 4</option>
                        <option value="Elem_G5">Elementary - Grade 5</option>
                        <option value="Elem_G6">Elementary - Grade 6</option>
                        <option value="HS_G7">High School - First Year</option>
                        <option value="HS_G8">High School - Second Year</option>
                        <option value="HS_G9">High School - Third Year</option>
                        <option value="HS_G10">High School - Fourth Year</option>
                        <option value="SHS_G11">Senior High School - Grade 11</option>
                        <option value="SHS_G12">Senior High School - Grade 12</option>
                        </select>
                      <label style="margin-left: 20px"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Classification:</label>
                      <label class="form-check-label radio-inline" style="margin-left: 30px"><input class="form-check-input" type="radio" name="classification" value="In_School">In School</label>
                      <label class="form-check-label radio-inline" style="margin-left: 30px"><input class="form-check-input" type="radio" name="classification" value="Out_School">Out of School</label>
                    </div><br/>
                    <div class="form-inline">
                      <label for="inputPlace"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Religion</label>
                      <select class="form-control required" name="religion" style="margin-left: 15px" required>
                        <option value="Roman Catholic">Roman Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                        <option value="Islam">Islam</option>
                      </select>
                      <label for="inputPlace" style="margin-left: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Referred By</label>
                      <input type="text" class="form-control required" id="inputPlace" name="referredBy" style="width: 200px; margin-left: 20px;" required/> <br/>
                      <label for="inputPlace" style="margin-left: 20px;">Relation to Referrer</label>
                      <input type="text" class="form-control" id="inputPlace" name="relationToReferrer" style="width: 200px; margin-left: 20px;"/> <br/>
                    </div><br/><br/>
                </div><br/>
                <div class="step-tab-panel" id="step2" style="margin-left: 50px;">
                  <div class="form-inline">
                    <label for="inputPlace"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Height (cm)</label>
                    <input type="text" class="form-control required" id="inputPlace" name="height" style="width: 122px; margin-left: 20px" required/> <br/>
                    <label for="inputPlace" style="margin-left: 30px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Weight (kg)</label>
                    <input type="text" class="form-control required" id="inputPlace" name="weight" style="width: 122px; margin-left: 20px" required/> <br/>

                    <label for="inputPlace" style="margin-left: 30px;">Distinguishing Marks (if any)</label>
                    <input type="text" class="form-control" id="inputPlace" name="discolorMarks" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Hair Color</label>
                    <input type="text" class="form-control required" id="inputPlace" name="hairColor" style="margin-left: 20px" required/> <br/>

                    <label for="inputPlace"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px; margin-left: 30px"></i>Eye Color</label>
                    <input type="text" class="form-control required" id="inputPlace" name="eyeColor" style="margin-left: 20px" required/> <br/>
                    <label for="inputPlace" style="margin-left: 30px"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Skin Tone</label>
                    <input type="text" class="form-control required" id="inputPlace" name="skinTone" style="width: 200px; margin-left: 20px; display: inline;" required/> <br/><br/>
                  </div><br/>
                  <div class="form-inline">
                    <label>Does the child have an illness?</label>
                    <label class="form-check-label radio-inline" style="margin-left: 40px"><input class="form-check-input" type="radio" name="classification" value="yes">Yes</label>
                    <label class="form-check-label radio-inline" style="margin-left: 40px"><input class="form-check-input" type="radio" name="classification" value="no">No</label><br/><br/>
                    <label for="inputPlace" style="margin-left: 30px">Specify Illness</label>
                    <input type="text" class="form-control" id="inputPlace" name="illness" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace">When was the child last hospitalized?</label>
                    <input type="date" class="form-control" id="inputPlace" name="lastdhp" style="width: 200px; margin-left: 28px; display: inline;"/> <br/><br/>
                  </div><br/>
                  <label for="inputPlace"><i style="font-size: 9px; margin-bottom: 18px;"></i>Where was the child last hospitalized?</label>
                  <input type="text" class="form-control" id="inputPlace" name="lastph" style="width: 300px; margin-left: 20px; display: inline;"/> <br/>
                  <br/><br/>
                </div>
                <div class="step-tab-panel" id="step3" style="margin-left: 70px;">
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 28px">Child activities at home</label>
                    <textarea class="form-control" name="homeActivity" style="width: 230px; height: 80px;"></textarea>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 10px;">Child activities outside</label>
                    <textarea class="form-control" name="outsideActivity" style="width: 230px; height: 80px;"></textarea>
                  </div> <br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 70px">Favorite subject/s</label>
                    <textarea class="form-control" name="faveSubject" style="width: 230px; height: 80px;"></textarea>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 67px;">Favorite sport/s</label>
                    <textarea class="form-control" name="faveSport" style="width: 230px; height: 80px;"></textarea>
                  </div> <br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 10px">Extra-curricular activities</label>
                    <textarea class="form-control" name="extracoActivities" style="width: 230px; height: 80px;"></textarea>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 115px;">Ambition</label>
                    <textarea class="form-control" name="ambition" style="width: 230px; height: 80px;"></textarea>
                  </div><br/><br/>
                </div>
                <div class="step-tab-panel" id="step4" style="margin-left: 50px;">
                  <br/><h3>BIOLOGICAL MOTHER</h3>

                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Maiden Name</label>
                    <input type="text" class="form-control required" id="inputPlace" name="mname" style="width: 400px;" required/> <br/>
                    <label for="inputName" style="margin-left: 30px; margin-right: 20px;"><i class="text-danger fa fa-asterisk"></i>Birthdate</label>
                    <input type="date" class="form-control" id="inputBday" name="mbirthdate" style="margin-left: 38px;"required/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px">City Address</label>
                    <input type="text" class="form-control" id="inputPlace" name="mcity" style="width: 400px; margin-left: 20px;"/> <br/>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Province Address</label>
                    <input type="text" class="form-control" id="inputPlace" name="mprovince" style="width: 270px;"/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Civil Status</label>
                    <select class="form-control required" name="mcivilStatus" style="width: 160px; margin-left: 28px;" required>
                      <option value="Married">Married</option>
                      <option value="Single Parent">Single Parent</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                      <option value="Annulled">Annulled</option>
                      <option value="Divored">Divorced</option>
                      <option value="Deceased">Deceased</option>
                    </select>
                    <label for="inputPlace"  style="margin-left: 20px; margin-right: 10px;">Place of Marriage</label>
                    <input type="text" class="form-control" id="inputPlace" style="width: 210px" name="mplaceOfMarriage"/>
                    <label for="inputName"  style="margin-left: 20px; margin-right: 10px;">Date of Marriage</label>
                    <input type="date" class="form-control" id="inputBday" style="width: 170px" name="mdateOfMarriage"/> <br/><br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Occupation</label>
                    <input type="text" class="form-control required" id="inputPlace" name="moccupation" style="margin-left: 1px; width: 185px;" required/>

                    <label for="inputPlace" style="margin-right: 10px; margin-left: 10px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Income</label>
                    <input type="number" class="form-control required" id="inputPlace" name="mincome" min="0" style="width: 135px;" required/> <br/>
                    <label style="margin-left: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;No. of Children</label><br/>
                    <input type="number" class="form-control required" id="inputPlace" name="mnoOfChildren" min="0" style="width: 70px; margin-left: 5px;" required/>

                    <label><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px; margin-left: 10px;"></i>Contact No:</label>
                    <input type="number" class="form-control" name="mcno" style="margin-left: 10px; width: 145px;" required/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace">Medical History</label>
                    <textarea class="form-control" id="inputPlace" name="mmedicalHistory" style="margin-left: 20px; width: 380px;"/></textarea> <br/>
                  </div>
                  <br/><br/>

                  <h3>BIOLOGICAL FATHER</h3>

                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 75px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Name</label>
                    <input type="text" class="form-control required" id="inputPlace" name="fname" style="width: 400px;" required/> <br/>
                    <label for="inputName" style="margin-left: 30px; margin-right: 20px;"><i class="text-danger fa fa-asterisk"></i>Birthdate</label>
                    <input type="date" class="form-control" id="inputBday" name="fbirthdate" style="margin-left: 38px;"required/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px">City Address</label>
                    <input type="text" class="form-control" id="inputPlace" name="fcity" style="width: 400px; margin-left: 20px;"/> <br/>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Province Address</label>
                    <input type="text" class="form-control" id="inputPlace" name="fprovince" style="width: 270px;"/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Civil Status</label>
                    <select class="form-control required" name="fcivilStatus" style="width: 160px; margin-left: 28px;" required>
                      <option value="Married">Married</option>
                      <option value="Single Parent">Single Parent</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                      <option value="Annulled">Annulled</option>
                      <option value="Divored">Divorced</option>
                      <option value="Deceased">Deceased</option>
                    </select>
                    <label for="inputPlace"  style="margin-left: 20px; margin-right: 10px;">Place of Marriage</label>
                    <input type="text" class="form-control" id="inputPlace" style="width: 210px" name="fplaceOfMarriage"/>
                    <label for="inputName"  style="margin-left: 20px; margin-right: 10px;">Date of Marriage</label>
                    <input type="date" class="form-control" id="inputBday" style="width: 170px" name="fdateOfMarriage"/> <br/><br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Occupation</label>
                    <input type="text" class="form-control required" id="inputPlace" name="foccupation" style="margin-left: 1px; width: 185px;" required/>

                    <label for="inputPlace" style="margin-right: 10px; margin-left: 10px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Income</label>
                    <input type="number" class="form-control required" id="inputPlace" name="fincome" min="0" style="width: 135px;" required/> <br/>
                    <label style="margin-left: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;No. of Children</label><br/>
                    <input type="number" class="form-control required" id="inputPlace" name="fnoOfChildren" min="0" style="width: 70px; margin-left: 5px;" required/>

                    <label><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px; margin-left: 10px;"></i>Contact No:</label>
                    <input type="number" class="form-control" name="fcno" style="margin-left: 10px; width: 145px;" required/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace">Medical History</label>
                    <textarea class="form-control" id="inputPlace" name="fmedicalHistory" style="margin-left: 20px; width: 380px;"/></textarea> <br/>
                  </div>
                  <br/><br/>
                </div> </br>
                <div class="step-tab-panel" id="step5" style="margin-left: 50px;">
                  <div class="form-inline">
                    <label class="lbl"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Home Type </label>
                    <select name="homeType" class="form-control required" style="width: 150px; margin-left: 10px;" required>
                      <option value="concrete">Concrete</option>
                      <option value="semiconcrete">Semi Concrete</option>
                      <option value="scraps">Scraps of Wood/G.I Sheets</option>
                    </select>
                    <label class="lbl" style="margin-right: 10px; margin-left: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Home Status </label>
                    <select name="homeStatus" class="form-control required" style="width: 150px" required>
                      <option value="owned">Owned</option>
                      <option value="rented">Rented</option>
                      <option value="withrelatives">Living with relatives</option>
                      </select>

                      <label class="lbl" style="margin-left: 30px;"> House Monthly Cost </label>
                      <div class="input-group mb-3" style="margin-top: 10px; margin-left: 20px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="houseMonthlyCost" type="number" class="form-control" min="0" style="width: 140px; margin: 0;"/> <br/>
                      </div>
                    </div>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Electricity Type </label>
                      <select name="electricityType" class="form-control required" required>
                        <option value="illegal">Illegal Connection</option>
                        <option value="shared">Shared Electricity</option>
                        <option value="legal">Legal Connection</option>
                      </select>
                      <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Electricity Monthly Cost </label>
                      <div class="input-group mb-3" style="margin-top: 10px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="electricityMonthlyCost" type="number" class="form-control required" min="0" style="margin: 0; width: 125px;" required/> <br/>
                      </div>
                    </div>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Water Type</label>
                      <select name="waterType" type="text" class="form-control required" style="margin-left: 33px;" required>
                        <option value="illegal">Illegal Connection</option>
                        <option value="shared">Shared water</option>
                        <option value="legal">Legal Connection</option>
                      </select>
                      <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Water Monthly Cost </label>
                      <div class="input-group mb-3" style="margin-top: 10px; margin-left: 33px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="waterCost" type="number" class="form-control required" min="0" style="margin: 0; width: 125px;" required/> <br/>:
                      </div>
                    </div><br/>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Food Type </label>
                      <select name="foodType" type="text" class="form-control required" style="margin-left: 14px;" required>
                        <option value="turoturo">Turo-turo/Lutong ulam</option>
                        <option value="cooking">Marketing/Cooking</option>
                      </select>
                      <label class="lbl" style="margin-right: 10px; margin-left: 30px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Individual Count </label>
                      <input name="individualCount" type="number" class="form-control required" min="0" style="width: 70px" required/><br/>
                      <label class="lbl" style="margin-right: 10px; margin-left: 25px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Bathroom Type </label>
                      <select name="bathType" type="text" class="form-control required" style="margin-left: 10px;"required>
                        <option value="owned">Owned</option>
                        <option value="throwaway">Throw away</option>
                        <option value="shared">Shared</option>
                      </select>
                    </div><br/>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px; margin-left: 50px;">Annual educational expense (inclusive of tuition fee and expense on school supplies)</label>
                      <div class="input-group mb-3" style="margin-top: 10px; margin-left: 22px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="educExpense" type="number" min="0" class="form-control" style="width: 125px; margin: 0;"/>
                      </div><br/>
                    </div>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px; margin-left: 50px;">Annual medical expense of the whole family</label>
                      <div class="input-group mb-3" style="margin-top: 10px; margin-left: 306px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="medExpense" type="number" class="form-control" style="width: 125px; margin: 0;"/>
                      </div>
                    </div>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px;  margin-left: 50px;">Other expenses (inclusive of hygiene and emergency expenses)</label>
                      <div class="input-group mb-3" style="margin-top: 10px; margin-left: 170px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="otherExpense" type="number" min="0" class="form-control" style="width: 125px; margin: 0;"/>
                        </div>
                      </div>
                    </div>

                    <div class="step-tab-panel" id="step6" style="margin-left: 50px;">
                <div class="form-group">
                      <div class="form-inline">
                        <label class="dl" style="margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Submission Date</label>
                        <input type="date" class="form-control" name="submission" id="sub" required/>
                        <label for="photo" id="ph" class="dl" style="margin-left: 30px; margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Child Photo</label>
                        <input type="file" name="photo" class="form-control" style="margin-left: 10px;"required><br/>
                      </div><br/>

                      <div class="form-inline">
                        <label class="dl"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Interview Date</label>
                        <input type="date" class="form-control" name="intdate" id="intdate" style="margin-left: 34px;"required/>
                        <label class="dl" style="margin-left: 28px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Interviewed By</label>
                        <input type="text" class="form-control" name="intby" required style="margin-left:10px; width: 295px;" />
                      </div> <br/>

                      <div class="form-inline">
                        <label class="dl" style="margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Admission Date</label>
                        <input type="date" class="form-control" name="admission" id="admission" required style="margin-left: 8px;"/>
                      </div><br/>

                        <div class="row">
                          <div class="col-lg-6">
                            <label class="dl">Case Study Title</label>
                            <input type="text" class="form-control" name="title" style="width: 340px;"/> <br/>
                          </div>
                          <div class="col-lg-6">
                            <label for="caseStudy" id="cs" class="dl">Case Study</label>
                            <input type="file" name="caseStudy" class="form-control" style="width: 300px;"><br/>
                          </div>
                        </div>
                    </div>

                  <input type="submit" value="Submit" name="submit" class="btn btn-success" style="float: right" onclick="validateForm(); validateDate();"/>

                  </form><br/><br/>
                </div>
                </div>

              </div><br/>

              <center><div class="step-footer">
                <button data-direction="prev" class="step-btn btn">Previous</button>
                <button data-direction="next" class="step-btn btn">Next</button>
                <!--<button data-direction="finish" class="step-btn btn">Finish</button>-->
              </div></center>
            </div>
        </div><br/><br/>

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


  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="../client/jquery-steps-master/dist/jquery-steps.js"></script>
  <script>
      $('#demo').steps({
        onFinish: function () {
          alert('Wizard Completed');
        }
      });
      </script>
</body>
</html>
