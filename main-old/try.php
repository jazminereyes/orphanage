!DOCTYPE html>
<html lang="en">
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
  

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
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

                $query = "SELECT name from PERSON JOIN USER ON person.personID = user.personID WHERE programType = 'Admin'";
                $result = mysqli_query($con, $query);

                if ($result)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<a href='#' class='d-block'>".$row[0]."</a>";
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
                Orphans
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="orphans.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Maintenance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="referrals.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Referrals</p>
                </a>
              </li>
            </ul>
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
                <a href="application.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sponsorapplications.php" class="nav-link">
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
                Assets
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
                            <p>Unit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="stocks.php" class="nav-link">
                            <i class="fa fa-minus nav-icon"></i>
                            <p>Stocks</p>
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory</p>
                </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="list.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="receive.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Receive</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="donation.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Donation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="release.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Release</p>
                        </a>
                    </li>
                  </ul>
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
            <a href="pages/widgets.html" class="nav-link">
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
            <center><h1 class="m-0 text-light"><strong>APPLICATIONS</strong></h1></center>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item active">Applications</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="row">
          <div class="col-8">
            <!-- Custom Tabs -->
            <div class="card sc">
              <div class="card-header d-flex p-0">
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active tb" href="#tab_1" data-toggle="tab">Basic Information</a></li>
                  <li class="nav-item"><a class="nav-link tb" href="#tab_2" data-toggle="tab">Family Background</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <form method="post" action="backend/insertsch.php">
                        <?php
                            $scholarid = $_GET["scholarid"];

                            require('../connection.php');

                            $query = "SELECT * FROM person JOIN scholar on person.personID = scholar.personID JOIN s_appform as app on scholar.scholarAppID = app.scholarAppID WHERE scholarID = '$scholarid'";

                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_array($result);

                            $appid = $row['scholarAppID'];
                            $gender = $row['gender'];

                            if ($gender=="M")
                            {
                                $gender = "Male";
                            }

                            else 
                            {
                                $gender = "Female";
                            }

                            echo '<div class="form-inline">
                            <label for="inputName">First Name</label>
                            <input type="text" class="form-control" id="inputName" name="first" value="'.$row['firstName'].'" style="width: 200px; margin-left: 20px;"/>
                            <label for="inputName" style="margin-left: 30px">Middle Name</label>
                            <input type="text" class="form-control" id="inputName" name="mniddle" value="'.$row['middleName'].'" style="width: 200px; margin-left: 20px;"/> 
                          </div><br/>
                          <div class="form-inline">
                        
                          <label for="inputName">Last Name</label>
                        <input type="text" class="form-control" id="inputName" name="last" value="'.$row['lastName'].'" style="width: 200px; margin-left: 20px;"/>
                        <label for="inputName" style="margin-left: 30px">Nickname</label>
                        <input type="text" class="form-control" id="inputName" name="nickname" value="'.$row['nickname'].'" style="width: 130px; margin-left: 20px;"/> <br/>
                        <label for="inputName" style="margin-left: 30px">Birthdate</label>
                        <input type="date" class="form-control" id="inputBday" name="birthdate" value="'.$row['birthdate'].'" style="width: 180px; margin-left: 20px; display: inline;"/> <br/><br/>
                      </div><br/>
                      
                      <label>Gender</label>
                      <input type="text" class="form-control" id="inputName" name="last" value="'.$gender.'" style="width: 200px; margin-left: 20px;"/>
                        <br/><br/>
                        
                        <div class="form-inline">
                        <label for="inputName">Street</label>
                        <input type="text" class="form-control" id="inputName" name="street" value="'.$row['street'].'" style="width: 200px; margin-left: 20px;"/> <br/>
                        <label for="inputName" style="margin-left: 30px">City</label>
                        <input type="text" class="form-control" id="inputName" name="city" value="'.$row['city'].'" style="width: 200px; margin-left: 20px;"/> <br/>
                        <label for="inputName" style="margin-left: 30px">Zip Code</label>
                        <input type="text" class="form-control" id="inputName" name="zip" value="'.$row['zip'].'" style="width: 150px; margin-left: 20px; display: inline;"/> <br/><br/>
                      </div> <br/>
                      
                      <div class="form-inline">
                        <label for="inputName">School Last Attended</label>
                        <input type="text" class="form-control" id="inputName" name="school" value="'.$row['school'].'" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>';
                        
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

                        echo '<label for="currentYrLevel" style="margin-left: 30px">Highest Educational Attainment:</label>
                        <input type="text" class="form-control" id="inputName" name="currentYrLevel" value="'.$yrlvl.'" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>
                        </div><br/>';
                        
                        $cl = $row['classification'];

                        if($cl == "In_School"){
                            $cl = "In school";
                        }
                        
                        elseif($cl == "Out_School"){
                            $cl = "Out of school";
                        }

                        echo '<label>Classification:</label>
                        <input type="text" class="form-control" id="inputName" name="classification" value="'.$cl.'" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>';
                        
                        echo '<div class="form-inline">
                        <label for="inputPlace">Referred By</label>
                        <input type="text" class="form-control" id="inputPlace" name="referredBy" value="'.$row['referredBy'].'" style="width: 200px; margin-left: 20px;"/> <br/>
                        <label for="inputPlace" style="margin-left: 30px;">Relation</label>
                        <input type="text" class="form-control" id="inputPlace" name="relationToReferrer" value="'.$row['relationToReferrer'].'" style="width: 200px; margin-left: 20px;"/> <br/>
                      </div><br/><br/>
                      
                      <h3>Medical Information</h3>';

                      $query2 = "SELECT * FROM s_appform as app JOIN scholar on scholar.scholarAppID = app.scholarAppID  JOIN s_healthinfo as health on app.healthInfoID =  health.healthInfoID WHERE scholar.scholarID = '$scholarid'";
                        $res = mysqli_query($con, $query2);
                        $rec = mysqli_fetch_array($res);

                        echo '<div class="form-inline">
                        <label for="inputPlace">Height</label>
                        <input type="text" class="form-control" id="inputPlace" name="height" value="'.$rec['height'].'" style="width: 110px; margin-left: 20px"/> <br/>
                        <label for="inputPlace" style="margin-left: 30px;">Weight</label>
                        <input type="text" class="form-control" id="inputPlace" name="weight" value="'.$rec['weight'].'" style="width: 110px; margin-left: 20px"/> <br/>
                        <label for="inputPlace" style="margin-left: 30px;">Weight Status</label>
                        <input type="text" class="form-control" id="inputPlace" name="weight" value="'.$rec['weightStatus'].'" style="width: 110px; margin-left: 20px"/> <br/>
                        </div><br/>';

                        echo ' <div class="form-inline"> 
                        <label for="inputPlace">Distinguishing Marks (if any)</label>
                        <input type="text" class="form-control" id="inputPlace" name="discolorMarks" value="'.$rec['discolorMarks'].'" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>
                        <label for="inputPlace" style="margin-left: 30px;">Hair Color</label>
                        <input type="text" class="form-control" id="inputPlace" name="hairColor" value="'.$rec['hairColor'].'" style="margin-left: 20px"/> <br/>
                        </div><br/>';

                        echo '<div class="form-inline">
                        <label for="inputPlace">Eye Color</label>
                        <input type="text" class="form-control" id="inputPlace" name="eyeColor" value="'.$rec['eyeColor'].'" style="margin-left: 20px"/> <br/>
                        <label for="inputPlace" style="margin-left: 30px">Skin Tone</label>
                        <input type="text" class="form-control" id="inputPlace" name="skinTone" value="'.$rec['skinTone'].'" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>
                        </div><br/>';
                        
                        $ill = $rec['illness'];

                        if($ill == ""){
                            $ill = "None";
                        }

                        echo '<label for="inputPlace" style="margin-left: 30px">Illness</label>
                        <input type="text" class="form-control" id="inputPlace" name="illness" value="'.$ill.'" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>
                        </div><br/>';

                        echo '<label for="inputPlace">When was the child last hospitalized?</label>
                        <input type="date" class="form-control" id="inputPlace" name="lastdhp" value="'.$rec['lastDateHospitalized'].'" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>

                        <label for="inputPlace">Where was the child last hospitalized?</label>
                        <input type="text" class="form-control" id="inputPlace" name="lastph" value="'.$rec['lastPlaceHospitalized'].'" style="width: 300px; margin-left: 20px; display: inline;"/> <br/>

                        <br/><br/>
                        
                        <div>
                            <h3>Child Hobbies</h3>';

                            $query3 = "SELECT * FROM s_hobbies as hb JOIN s_appform as app on app.hobbyID = hb.hobbyID JOIN scholar on scholar.scholarAppID = app.scholarAppID WHERE scholar.scholarID = '$scholarid' ";
                            $resu = mysqli_query($con, $query3);
                            $recs = mysqli_fetch_array($resu);
    
                            echo '<div class="form-inline">
                            <label for="inputPlace" style="margin-right: 10px">Child activities at home</label>
                            <textarea class="form-control" name="homeActivity" style="width: 230px; height: 80px;">'.$recs['homeActivity'].'</textarea>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 10px;">Child activities outside</label>
                            <textarea class="form-control" name="outsideActivity" style="width: 230px; height: 80px;">'.$recs['outsideActivity'].'</textarea>
                            </div> <br/>';
    
                            echo '<div class="form-inline">
                            <label for="inputPlace" style="margin-right: 10px">Favorite subject/s</label>
                            <textarea class="form-control" name="faveSubject" style="width: 230px; height: 80px;">'.$recs['faveSubject'].'</textarea>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 10px;">Favorite sport/s</label>
                            <textarea class="form-control" name="faveSport" style="width: 230px; height: 80px;">'.$recs['faveSport'].'</textarea>
                            </div> <br/>';
    
                            echo '<div class="form-inline">
                            <label for="inputPlace" style="margin-right: 10px">Extra-curricular activities</label>
                            <textarea class="form-control" name="extracoActivities" style="width: 230px; height: 80px;">'.$recs['extracoActivities'].'</textarea>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 10px;">Ambition</label>
                            <textarea class="form-control" name="ambition" style="width: 230px; height: 80px;">'.$recs['ambition'].'</textarea>
                            </div>
                        </div>
                        </div>';
                        ?>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  <div>
                            <h3>BIRTHMOTHER</h3>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">Maiden Name</label>
                            <input type="text" class="form-control" id="inputPlace" name="mname"/> <br/>
                            <label for="inputName" style="margin-left: 30px; margin-right: 20px;">Birthdate</label>
                            <input type="date" class="form-control" id="inputBday" name="mbirthdate"/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">City Address</label>
                            <input type="text" class="form-control" id="inputPlace" name="mcity"/> <br/>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Province Address</label>
                            <input type="text" class="form-control" id="inputPlace" name="mprovince"/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 10px">Civil Status</label>
                            <input type="text" class="form-control" id="inputPlace" style="width: 110px" name="mcivilStatus"/> <br/>
                            <label for="inputPlace"  style="margin-left: 20px; margin-right: 10px;">Place of Marriage</label>
                            <input type="text" class="form-control" id="inputPlace" style="width: 180px" name="mplaceOfMarriage"/> <br/>
                            <label for="inputName"  style="margin-left: 20px; margin-right: 10px;">Date of Marriage</label>
                            <input type="date" class="form-control" id="inputBday" style="width: 170px" name="mdateOfMarriage"/> <br/>
                            </div> <br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">Occupation</label>
                            <input type="text" class="form-control" id="inputPlace" name="moccupation"/> <br/>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Income</label>
                            <input type="text" class="form-control" id="inputPlace" name="mincome"/> <br/>
                            </div><br/>

                            <label>No. of Siblings</label><br/>
                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">Brother</label>
                            <input type="number" class="form-control" id="inputPlace" name="mnoOfBrothers"/> <br/>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Sister</label>
                            <input type="number" class="form-control" id="inputPlace" name="mnoOfSisters"/> <br/>
                            </div><br/>

                            <label for="inputPlace">Medical History</label>
                            <textarea class="form-control" id="inputPlace" name="mmedicalHistory"/></textarea> <br/>
                        </div><br/><br/>

                        <div>
                            <h3>BIRTHFATHER</h3>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">Name</label>
                            <input type="text" class="form-control" id="inputPlace" name="fname"/> <br/>
                            <label for="inputName" style="margin-left: 30px; margin-right: 20px;">Birthdate</label>
                            <input type="date" class="form-control" id="inputBday" name="fbirthdate"/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">City Address</label>
                            <input type="text" class="form-control" id="inputPlace" name="fcity"/> <br/>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Province Address</label>
                            <input type="text" class="form-control" id="inputPlace" name="fprovince"/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 10px">Civil Status</label>
                            <input type="text" class="form-control" id="inputPlace" style="width: 110px" name="fcivilStatus"/> <br/>
                            <label for="inputPlace" style="margin-left: 20px; margin-right: 10px;">Place of Marriage</label>
                            <input type="text" class="form-control" id="inputPlace" style="width: 180px" name="fplaceOfMarriage"/> <br/>
                            <label for="inputName" style="margin-left: 20px; margin-right: 10px;">Date of Marriage</label>
                            <input type="date" class="form-control" id="inputBday" style="width: 170px" name="fdateOfMarriage"/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">Occupation</label>
                            <input type="text" class="form-control" id="inputPlace" name="foccupation"/> <br/>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Income</label>
                            <input type="text" class="form-control" id="inputPlace" name="fincome"/> <br/>
                            </div><br/>

                            <label>No. of Siblings</label><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">Brother</label>
                            <input type="text" class="form-control" id="inputPlace" name="fnoOfBrothers"/> <br/>
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Sister</label>
                            <input type="text" class="form-control" id="inputPlace" name="fnoOfSisters"/> <br/>
                            </div><br/>

                            <label for="inputPlace">Medical History</label>
                            <textarea class="form-control" id="inputPlace" name="fmedicalHistory"/></textarea> <br/>
                        </div><br/><br/>

                        <div>
                            <h3>Other Information</h3>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Home Type </label>
                            <select name="homeType" class="form-control" style="width: 150px">
                                <option value="concrete">Concrete</option>
                                <option value="semiconcrete">Semi Concrete</option>
                                <option value="scraps">Scraps of Wood/G.I Sheets</option>
                            </select>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Home Status </label>
                            <select name="homeStatus" class="form-control" style="width: 150px">
                                <option value="owned">Owned</option>
                                <option value="rented">Rented</option>
                                <option value="withrelatives">Living with relatives</option>
                            </select><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> House Monthly Cost </label>
                            <input name="houseMonthlyCost" type="number" class="form-control" style="width: 130px"/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Electricity Type </label>
                            <select name="electricityType" class="form-control">
                                <option value="illegal">Illegal Connection</option>
                                <option value="shared">Shared Electricity</option>
                                <option value="legal">Legal Connection</option>
                            </select>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Electricity Monthly Cost </label>
                            <input name="electricityMonthlyCost" type="number" class="form-control"/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px;">Water Type</label>
                            <select name="waterType" type="text" class="form-control">
                                <option value="illegal">Illegal Connection</option>
                                <option value="shared">Shared water</option>
                                <option value="legal">Legal Connection</option>
                            </select>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Water Monthly Cost </label>
                            <input name="waterCost" type="number" class="form-control"/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Food Type </label>
                            <select name="foodType" type="text" class="form-control">
                                <option value="turoturo">Turo-turo/Lutong ulam</option>
                                <option value="cooking">Marketing/Cooking</option>
                            </select>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Individual Count </label>
                            <input name="individualCount" type="number" class="form-control" style="width: 100px"/><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Bathroom Type </label>
                            <select name="bathType" type="text" class="form-control">
                                <option value="owned">Owned</option>
                                <option value="throwaway">Throw away</option>
                                <option value="shared">Shared</option>
                            </select>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Educational Expense </label>
                            <input name="educExpense" type="number" class="form-control" style="width: 125px"/><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Medical Expense </label>
                            <input name="medExpense" type="number" class="form-control" style="width: 125px"/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Other Expense </label>
                            <input name="otherExpense" type="number" class="form-control" style="width: 125px"/>
                            </div>
                        </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->