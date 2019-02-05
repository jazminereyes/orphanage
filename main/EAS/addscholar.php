<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Add Child</title>
  <!-- Steps -->
  <link rel="stylesheet" href="../../client/jquery-steps-master/dist/jquery-steps.css">
  <link rel="stylesheet" href="../../client/jquery-steps-master/examples/css/style.css">

  <link href="../toastr/build/toastr.css" rel="stylesheet"/>

  <script src="../moment.js/moment.js"></script>
  <script src="../../client/jquery/jquery-3.3.1.min.js"></script>
  <script src="../toastr/build/toastr.min.js"></script>

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

    function validateForm(){
        $('.required').each(function(){
          if( $(this).val() == "" ){
            toastr.options = {
        "positionClass": "toast-bottom-right"
      };
      toastr.error('Fill in the required fields.');
            return false;
          }
        });
      }
  </script>

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
       <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="scholar.php" class="text-light">Scholars</a></li>
              <li class="breadcrumb-item active">Add Scholar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row text-center text-dark">
          <div class="col-md-12">
             <span style="font-size: 40px;">ADD SCHOLAR</span>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div id="demo">
        <div class="step-app sc">
              <ul class="step-steps">
                <li><a href="#step1"><center>Basic Information</center></a></li>
                <li><a href="#step2"><center>Medical Information</center></a></li>
                <li><a href="#step3"><center>Hobbies</center></a></li>
                <li><a href="#step4"><center>Family Background</center></a></li>
                <li><a href="#step5"><center>Other Information</center></a></li>
                <li><a href="#step6"><center>Application Details</center></a></li>
              </ul>

              <div class="step-content" style="background: white">
                <div class="step-tab-panel" id="step1">
                  <form method="post" action="backend/addsch.php" id="frmInfo" enctype="multipart/form-data">
                  <div class="row">
                        <div class="col-4">
                        <label><i class="text-danger fa fa-asterisk"></i>First Name</label>
                        <input type="text" class="form-control required" name="first" required />
                        </div>  
                        <div class="col-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle"/>
                        </div>  
                        <div class="col-4">
                        <label><i class="text-danger fa fa-asterisk"></i>Last Name</label>
                        <input type="text" class="form-control required" name="last" required/>
                        </div>  
                      </div>
                      <br/>                      
                      <div class="row">
                        <div class="col-4">
                        <label for="inputName">Nickname</label>
                        <input type="text" class="form-control" name="nickname"/>
                        </div>
                        <div class="col-4">
                        <label for="inputName"><i class="text-danger fa fa-asterisk"></i>Birthdate</label>
                        <input type="date" class="form-control required" name="birthdate" required/>
                        </div>
                        <div class="col-4">
                        <label><i class="text-danger fa fa-asterisk"></i>Gender</label><br/>
                        <label>
                          <input class="flat-red" type="radio" name="gender" value="M" required>&nbsp&nbspMale
                        </label>&nbsp&nbsp&nbsp&nbsp
                        <label>
                          <input class="flat-red" type="radio" name="gender" value="F" required>&nbsp&nbspFemale
                        </label>
                        </div>
                      </div>
                      <br/> 

                      <div class="row">
                        <div class="col-4">
                          <label for="inputName"><i class="text-danger fa fa-asterisk"></i>Street</label>
                          <input type="text" class="form-control required" name="street" required/>
                        </div>
                        <div class="col-4">
                          <label for="inputName"><i class="text-danger fa fa-asterisk"></i>City</label>
                        <input type="text" class="form-control required" name="city" required/>
                        </div>
                        <div class="col-4">
                          <label for="inputName">Zip Code</label>
                        <input type="text" class="form-control" name="zip"/>
                        </div>
                      </div><br/> 

                      <div class="row">
                        <label><i class="text-danger fa fa-asterisk"></i>Classification:</label>&nbsp&nbsp&nbsp&nbsp
                        <label>
                          <input class="flat-red" type="radio" name="classification" value="In_School" required>&nbsp&nbspIn School
                        </label>&nbsp&nbsp&nbsp&nbsp
                        <label>
                          <input class="flat-red" type="radio" name="classification" value="Out_School" required>&nbsp&nbspOut of School
                        </label>
                      </div><br/>

                      <div class="row">
                        <div class="col-lg-6">
                          <label><i class="text-danger fa fa-asterisk"></i>&nbsp;Religion</label>
                          <select class="form-control required" required>
                            <option value="Roman Catholic">Roman Catholic</option>
                            <option value="Christian">Christian</option>
                            <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                            <option value="Islam">Islam</option>
                          </select>
                        </div>
                        <div class="col-lg-6">
                          <label><i class="text-danger fa fa-asterisk"></i>&nbsp;Last General Weighted Average</label>
                          <input type="text" class="form-control required" name="lgwa" required/>
                        </div>
                      </div><br/>

                      <div class="row">
                        <div class="col-6">
                          <label for="inputName"><i class="text-danger fa fa-asterisk"></i>School Last Attended</label>
                          <input type="text" class="form-control required" id="inputName" name="school" required/>
                        </div>
                        <div class="col-6">
                          <label for="cYrLevel"><i class="text-danger fa fa-asterisk"></i>Highest Educational Attainment</label>
                          <select class="form-control required" name="cYrLevel" required>
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
                          </select>
                        </div>
                      </div><br/>

                        <div class="row">
                          <div class="col-6">
                            <label for="inputPlace"><i class="text-danger fa fa-asterisk"></i>Referred By</label>
                            <input type="text" class="form-control required" id="inputPlace" name="refby" required/>
                          </div>
                          <div class="col-6">  
                            <label for="inputPlace">Relation</label>
                            <input type="text" class="form-control" id="inputPlace" name="rel" />
                          </div>
                        </div><br/>
                </div>
                <div class="step-tab-panel" id="step2">
                <div class="row">
                          <div class="col-2">
                            <label><i class="text-danger fa fa-asterisk"></i>Height(cm)</label>
                            <input type="number" class="form-control required" name="height" required/>
                          </div>
                          <div class="col-2">
                            <label><i class="text-danger fa fa-asterisk"></i>Weight(kg)</label>
                            <input type="number" class="form-control required" name="weight" required/>
                          </div>
                          <div class="col-4">
                            <label>Distinguishing Marks (if any)</label>
                            <input type="text" class="form-control" name="discolorMarks"/>
                          </div>
                          <div class="col-4">
                            <label><i class="text-danger fa fa-asterisk"></i>Hair Color</label>
                            <input type="text" class="form-control required" name="hairColor" required/>
                          </div>
                        </div><br/>
                            

                        <div class="row">
                          <div class="col-4">
                            <label><i class="text-danger fa fa-asterisk"></i>Eye Color</label>
                            <input type="text" class="form-control required" name="eyeColor" required/>
                          </div>
                          <div class="col-4">
                            <label><i class="text-danger fa fa-asterisk"></i>Skin Tone</label>
                            <input type="text" class="form-control required" name="skinTone" required/>
                          </div>
                        </div><br/>

                        <div class="row">
                          <div class="col-5">
                            <label>Does the child have an illness?</label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="yes">Yes
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="None">No
                            </label>
                          </div>
                          <div class="col-6 form-inline">
                            <label>Specify Illness</label>&nbsp&nbsp&nbsp&nbsp
                            <input type="text" class="form-control" name="illness" style="width: 70%" />
                          </div>
                        </div>
                        
                        <div class="form-inline">
                        <label for="inputPlace">When was the child last hospitalized?</label>
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="date" class="form-control required" name="lastdhp" style="width: 40%" required/> 
                        <br/><br/><br/>
                        </div>
                        <div class="form-inline">
                        <label for="inputPlace">Where was the child last hospitalized?</label>&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="form-control required" name="lastph" style="width: 50%" required/> 
                        <br/><br/> <br/> 
                        </div>
                </div>
                <div class="step-tab-panel" id="step3">
                <div class="row">
                              <div class="col-6">
                                <label>Child Activities at Home</label>
                                <textarea class="form-control" name="homeActivity"></textarea>
                              </div>
                              <div class="col-6">
                                <label>Child activities outside</label>
                                 <textarea class="form-control" name="outsideActivity"></textarea>
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>Favorite subject/s</label>
                                <textarea class="form-control" name="faveSubject"></textarea>
                              </div>
                              <div class="col-6">
                                <label>Favorite sport/s</label>
                                <textarea class="form-control" name="faveSport"></textarea>
                              </div>
                            </div><br/>
                            
                            <div class="row">
                              <div class="col-6">
                                <label>Extra-curricular activities</label>
                                <textarea class="form-control" name="extracoActivities"></textarea>
                              </div>
                              <div class="col-6">
                                <label>Ambition</label>
                                <textarea class="form-control" name="ambition"></textarea>
                              </div>
                            </div><br/>
                </div>
                <div class="step-tab-panel" id="step4">
                <div class="text-center"> 
                            <h3>BIRTHMOTHER</h3>
                          </div>

                            <div class="row">
                              <div class="col-6">
                                <label><i class="text-danger fa fa-asterisk"></i>Maiden Name</label>
                                <input type="text" class="form-control required" name="mname" required/>
                              </div>
                              <div class="col-3">
                                <label><i class="text-danger fa fa-asterisk"></i>Birthdate</label>
                                <input type="date" class="form-control required" id="date" name="mbirthdate" required/> 
                              </div>
                              <div class="col-3">
                                <label><i class="text-danger fa fa-asterisk"></i>Contact No</label>
                                <input type="number" class="form-control required" name="mcno" maxlength="99999999999" required/> 
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>City Address</label>
                                <input type="text" class="form-control" name="mcity"/>
                              </div>
                              <div class="col-6">
                                <label>Province Address</label>
                                <input type="text" class="form-control" name="mprovince"/>
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Civil Status</label>
                                <select class="form-control required" name="mcstat" required >
                                  <option value="Married">Married</option>
                                  <option value="Single Parent">Single Parent</option>
                                  <option value="Widowed">Widowed</option>
                                  <option value="Separated">Separated</option>
                                  <option value="Annulled">Annulled</option>
                                  <option value="Divored">Divorced</option>
                                  <option value="Deceased">Deceased</option>
                                </select>
                              </div>
                              <div class="col-4">
                                <label>Place of Marriage</label>
                                <input type="text" class="form-control" name="mplaceOfMarriage"/>
                              </div>
                              <div class="col-4">
                                <label>Date of Marriage</label>
                                <input type="date" class="form-control" name="mdateOfMarriage"/>
                              </div>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px"><i class="text-danger fa fa-asterisk"></i>Occupation</label>
                            <input type="text" class="form-control required" id="inputPlace" name="moccu" required/> <br/>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;"><i class="text-danger fa fa-asterisk"></i>Income</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Php</span>
                                </div>
                                <input type="number" class="form-control required" name="mincome" required/>
                                <div class="input-group-append">
                                  <span class="input-group-text">.00</span>
                                </div>
                              </div>
                            </div><br/>

                            <div class="form-inline">
                            <label style="margin-right: 20px"><i class="text-danger fa fa-asterisk"></i>No. of Children</label>
                            <input type="number" class="form-control required" name="noc" required /> <br/>
                            </div><br/>

                            <label for="inputPlace">Medical History</label>
                            <textarea class="form-control" id="inputPlace" name="mhisto"/></textarea> <br/>

                            <hr>
                            <div class="text-center">
                              <h3>BIRTHFATHER</h3>
                            </div>
                            

                            <div class="row">
                              <div class="col-6">
                                <label><i class="text-danger fa fa-asterisk"></i>Father Name</label>
                                <input type="text" class="form-control required" name="fname" required/>
                              </div>
                              <div class="col-3">
                                <label><i class="text-danger fa fa-asterisk"></i>Birthdate</label>
                                <input type="date" class="form-control required" name="fbirthdate" required/> 
                              </div>
                              <div class="col-3">
                                <label><i class="text-danger fa fa-asterisk"></i>Contact No</label>
                                <input type="number" class="form-control required" name="fcno" required/> 
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>City Address</label>
                                <input type="text" class="form-control" name="fcity"/>
                              </div>
                              <div class="col-6">
                                <label>Province Address</label>
                                <input type="text" class="form-control" name="fprovince"/>
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Civil Status</label>
                                <select class="form-control required" name="fcstat" required >
                                  <option value="Married">Married</option>
                                  <option value="Single Parent">Single Parent</option>
                                  <option value="Widowed">Widowed</option>
                                  <option value="Separated">Separated</option>
                                  <option value="Annulled">Annulled</option>
                                  <option value="Divored">Divorced</option>
                                  <option value="Deceased">Deceased</option>
                                </select>
                              </div>
                              <div class="col-4">
                                <label>Place of Marriage</label>
                                <input type="text" class="form-control" name="fplaceOfMarriage"/>
                              </div>
                              <div class="col-4">
                                <label>Date of Marriage</label>
                                <input type="date" class="form-control" name="fdateOfMarriage"/>
                              </div>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px"><i class="text-danger fa fa-asterisk"></i>Occupation</label>
                            <input type="text" class="form-control required" name="foccu" required/> <br/>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;"><i class="text-danger fa fa-asterisk"></i>Income</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Php</span>
                                </div>
                                <input type="number" class="form-control required" name="fincome" required/>
                                <div class="input-group-append">
                                  <span class="input-group-text">.00</span>
                                </div>
                              </div>
                            </div><br/>

                            <div class="form-inline">
                            <label style="margin-right: 20px"><i class="text-danger fa fa-asterisk"></i>No. of Children</label>
                            <input type="number" class="form-control required" name="noc" required /> <br/>
                            </div><br/>

                            <label>Medical History</label>
                            <textarea class="form-control" id="inputPlace" name="fhisto"/></textarea> <br/>
                </div>
                <div class="step-tab-panel" id="step5">
                <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"><i class="text-danger fa fa-asterisk"></i> Home Type </label>
                            <select name="htype" class="form-control required" style="width: 150px" required>
                                <option value="concrete">Concrete</option>
                                <option value="semiconcrete">Semi Concrete</option>
                                <option value="scraps">Scraps of Wood/G.I Sheets</option>
                            </select>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><i class="text-danger fa fa-asterisk"></i> Home Status </label>
                            <select name="hstat" class="form-control required" style="width: 150px" required>
                                <option value="owned">Owned</option>
                                <option value="rented">Rented</option>
                                <option value="withrelatives">Living with relatives</option>
                            </select><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><i class="text-danger fa fa-asterisk"></i> House Monthly Cost </label>
                            <input name="houseMonthlyCost" type="number" class="form-control required" style="width: 130px" required/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"><i class="text-danger fa fa-asterisk"></i> Electricity Type </label>
                            <select name="electricityType" class="form-control" required>
                                <option value="illegal">Illegal Connection</option>
                                <option value="shared">Shared Electricity</option>
                                <option value="legal">Legal Connection</option>
                            </select>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><i class="text-danger fa fa-asterisk"></i> Electricity Monthly Cost </label>
                            <input name="electricityMonthlyCost" type="number" class="form-control" required/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px;"><i class="text-danger fa fa-asterisk"></i>Water Type</label>
                            <select name="waterType" type="text" class="form-control required" required>
                                <option value="illegal">Illegal Connection</option>
                                <option value="shared">Shared water</option>
                                <option value="legal">Legal Connection</option>
                            </select>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><i class="text-danger fa fa-asterisk"></i> Water Monthly Cost </label>
                            <input name="waterCost" type="number" class="form-control required" required/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"><i class="text-danger fa fa-asterisk"></i> Food Type </label>
                            <select name="foodType" type="text" class="form-control required" required>
                                <option value="turoturo">Turo-turo/Lutong ulam</option>
                                <option value="cooking">Marketing/Cooking</option>
                            </select>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><i class="text-danger fa fa-asterisk"></i> Individual Count </label>
                            <input name="individualCount" type="number" class="form-control required" style="width: 100px" required/><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><i class="text-danger fa fa-asterisk"></i> Bathroom Type </label>
                            <select name="bathType" type="text" class="form-control required" required>
                                <option value="owned">Owned</option>
                                <option value="throwaway">Throw away</option>
                                <option value="shared">Shared</option>
                            </select>
                            </div><br/>


                            <div class="row">
                              <div class="col-4">
                                <label>Total Annual Educational Expense </label>
                                <input name="educExpense" type="number" class="form-control"/>
                              </div>
                              <div class="col-4">
                                <label>Total Annual Medical Expense </label>
                                <input name="medExpense" type="number" class="form-control"/>
                              </div>
                              <div class="col-4">
                                <label>Other Expense </label>
                                <input name="otherExpense" type="number" class="form-control"/>
                              </div>
                            </div>
                </div>

                    <div class="step-tab-panel" id="step6">
                <div class="form-group">
                <div class="row">
                    <div class="col-4">
                      <label><i class="text-danger fa fa-asterisk"></i>Submission Date</label>
                      <input type="date" class="form-control required" name="subdate" id="sub" required/>
                    </div>
                    <div class="col-4">
                      <label><i class="text-danger fa fa-asterisk"></i>Interview Date</label>
                      <input type="date" class="form-control required" name="intdate" id="intdate" required/>
                    </div>
                    <div class="col-4">
                      <label><i class="text-danger fa fa-asterisk"></i>Interviewed By</label>
                      <input type="text" class="form-control required" name="intby" required/>
                    </div>
                  </div><br/>

                  <div class="row">
                    <div class="col-6">
                      <label>Child Photo: </label>
                      <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-6">
                      <label><i class="text-danger fa fa-asterisk"></i>Admission Date</label>
                      <input type="date" class="form-control required" name="admission" id="admission" required/>
                    </div>
                  </div><br/>

                  <div class="row">
                    <div class="col-6">
                      <label>Case Study Title:</label>
                      <input type="text" class="form-control" name="title"/>
                    </div>
                    <div class="col-6">
                      <label>Case Study: </label> 
                      <input type="file" name="caseStudy" class="form-control"/>
                    </div>
                  </div><br/>

                    <div class="pull-right">
                      <input type="submit" name="submit" class="btn btn-success btn-flat" value="Submit" onclick="validateDate()"/>
                    </div>

                  </form><br/><br/>
                </div>
                </div>
                
              </div><br/>
              
              <div class="step-footer">
                <button data-direction="prev" class="step-btn btn">Previous</button>
                <button data-direction="next" class="step-btn btn">Next</button>
                <!--<button data-direction="finish" class="step-btn btn">Finish</button>-->
              </div>
            </div>  
        </div><br/><br/>

      
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

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="../../client/jquery-steps-master/dist/jquery-steps.js"></script>
<script>
      $('#demo').steps({
        onFinish: function () {
          alert('Wizard Completed');
        }
      });
</script>

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
