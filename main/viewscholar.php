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
  
    echo "<title>Concordia | ".$c[0]." ".$c[1]."</title>";
  ?>

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

      .content 
      {
        background-color:#2dcc70;
      }

      .form-control 
      {
        margin-left: 15px;
        margin-right: 25px;
      }
  </style>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script>
  function updateOrphan()
  {
    document.getElementById("fn").disabled = false;
    document.getElementById("mn").disabled = false;
    document.getElementById("ln").disabled = false;
    document.getElementById("nickname").disabled = false;
    document.getElementById("bdate").disabled = false;
    document.getElementById("school").disabled = false;
    document.getElementById("yr").disabled = false;
    document.getElementById("savebtn").style.display = "block";
    document.getElementById("updatebtn").style.display = "none";
    document.getElementById("updateyr").style.display = "block";
  
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
    document.getElementById("nickname").disabled = true;
    document.getElementById("bdate").disabled = true;
    document.getElementById("school").disabled = true;
    document.getElementById("yr").disabled = true;
    document.getElementById("rlgn").disabled = false;
    document.getElementById("updateyr").disabled = true;
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
          </div>
          <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="scholars.php" class="text-light">Scholars</a></li>
              <?php
                $scholar_id = $_GET["scholarid"];

                require ('../connection.php');

                $query = "SELECT firstName, lastName FROM person JOIN scholar on person.personID = scholar.personID WHERE type = 'S' AND scholar.scholarID = '$scholar_id'";

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
                      if(isset($_GET["scholarid"])){
                      $scholar_id = $_GET["scholarid"];
                    }
                    else{
                      $scholar_id = $_SESSION["sid"];
                      $_SESSION["sid"] = $scholar_id;
                    }

                      require ('../connection.php');

                      $query = "SELECT firstName, lastName, person.photo FROM person JOIN scholar on person.personID = scholar.personID WHERE type = 'S' AND scholar.scholarID = '$scholar_id'";

                      $res = mysqli_query($con, $query);

                      $rec = mysqli_fetch_row($res);

                      if ($rec[2]=="")
                      {
                        $src = "img/no-image.png";
                        $class = "profile-img";
                      }

                      else
                      {
                        $src = $rec[2];
                        $class = "photo profile-img";
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
                  <!--<button class="btn btn-dark float-right" onclick="updateOrphan()" id="updatebtn">UPDATE</button>-->
                </div>
                <div class="card-body">
                  <div class="form-group">

                  <form method="post" action="backend/updatescholar.php">
                    <?php
                      if(isset($_GET["scholarid"])){
                        $scholar_id = $_GET["scholarid"];
                        $_SESSION["sid"] = $scholar_id;
                      }
                      else{
                        $scholar_id = $_SESSION["sid"];
                        $_SESSION["sid"] = $scholar_id;
                      }
                      require ('../connection.php');
  		
                      $query = "SELECT scholarID, caseNo, nickname, birthdate, school, currentYrLevel, firstName, middleName, lastName FROM person JOIN scholar on person.personID = scholar.personID WHERE type = 'S' AND scholar.scholarID = '$scholar_id'";

                      $res = mysqli_query($con, $query);
                      $rec = mysqli_fetch_row($res);

                      $yrlvl = $rec[5];
        
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
                    elseif($yrlvl == "HS_G9"){
                        $yrlvl = "High School - Grade 10";
                    }
                    elseif($yrlvl == "SHS_G11"){
                        $yrlvl = "SHS - Grade 11";
                    }
                    elseif($yrlvl == "SHS_G12"){
                        $yrlvl = "SHS - Grade 12";
                    }

                      echo '<div class="row">
                              <div class="col-lg-4">
                                <label id="name_lbl" for="name">First Name</label>
                                <input type="text" class="form-control " id="fn" name="first" value="'.$rec[6].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-lg-4">
                                <label id="name_lbl" for="name">Middle Name</label>
                                <input type="text" class="form-control " id="mn" name="middle" value="'.$rec[7].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-lg-4">
                                <label id="name_lbl" for="name">Last Name</label>
                                <input type="text" class="form-control " id="ln" name="last" value="'.$rec[8].'" style="margin: 0" disabled>
                              </div>
                            </div><br/>';
                    
                      echo '<div class="row">
                              <div class="col-lg-4">
                                <label id="ad">Case Number</label>
                                <input type="text" class="form-control" id="cn" class="or" name="caseno" value="'.$rec[1].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-lg-4">
                                <label id="bd">Nickname</label>
                                <input type="text" class="form-control" id="nickname" class="or" name="nickname" value="'.$rec[2].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-lg-4">
                                <label id="bd">Birthdate</label>
                                <input type="date" class="form-control" id="bdate" class="or" name="birthdate" value="'.$rec[3].'" style="margin: 0" disabled>
                              </div>
                            </div><br/>';

                      /*echo '<div class="row">
                              <div class="col-lg-6">
                                <label id="bd">School</label>
                                <input type="text" class="form-control" id="school" class="or" name="school" value="'.$rec[4].'" style="margin: 0" disabled>
                              </div>
                              <div class="col-lg-6">
                                <label id="bd">Year Level</label>
                                <input type="text" class="form-control" id="yr" class="or" name="yearlvl" value="'.$yrlvl.'" style="margin: 0" disabled>
                              </div>
                            </div>';*/

                      echo '<div class="form-inline">';
                      echo '<label id="bd">School</label>';
                      echo '<input type="text" class="form-control" id="school" class="or" name="school" value="'.$rec[4].'" style="width: 200px;" disabled><br/>';
                      echo '<label id="bd">Year Level</label>';
                      echo '<input type="text" class="form-control" id="yr" class="or" name="yearlvl" value="'.$yrlvl.'" style="width: 250px;" disabled><br/>';
                      echo '</div>';

                      echo '<input type="hidden" name="sid" value="'.$rec[0].'"/>';
                      ?>

                      <select class="form-control" name="updateyr" class="or" id="updateyr" style="position: absolute; top: 259px; left: 379px; width: 250px; display: none;">
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
                    </select><br/>

                      <button type="submit" name="submit" class="btn btn-primary float-right" id="savebtn" style="display: none;" onclick="saveOrphan()">SAVE</button>
                    </form>  
                  </div>
                </div>
            </div>
          </div>
        </div>

        

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
