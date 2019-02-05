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
  <style type="text/css">
    .card-header{
  background-color: #499360;
  color: #ffffff;
}
  </style>

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
                $uid = $_SESSION['userID'];
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
                Assets
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory</p>
                </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="list.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Inventory List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="receive.php" class="nav-link">
                        <i class="fa fa-minus nav-icon"></i>
                        <p>Receive Through Purchase</p>
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
                <a href="budget.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Scholar Budget</p>
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
            <a href="../signout.php" class="nav-link">
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
                    }
                    else{
                      $sponsor_id = $_SESSION["spid"];
                      $_SESSION["spid"] = $sponsor_id;
                    }

                      $query = "SELECT firstName, lastName FROM sponsor JOIN user JOIN person ON sponsor.userID = user.userID AND user.personID = person.personID WHERE sponsorID = '$sponsor_id'"; 
                            $result = mysqli_query($con, $query);

                            if ($result)
                            {
                               $rec = mysqli_fetch_array($result);
                                echo '<li class="breadcrumb-item"><a href="viewsponsor.php?sponsorid='.$sponsor_id.'">'.$rec['firstName'].' '.$rec['lastName'].'</a></li>';

                              
                            }
              ?>
              <li class="breadcrumb-item active">Sponsor Inflow</li>
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

                      $qry2 = "SELECT firstName, lastName, person.photo, amount FROM sponsor JOIN user JOIN person ON sponsor.userID = user.userID AND user.personID = person.personID WHERE sponsorID = '$sponsor_id'";

                      $sql = mysqli_query($con, $qry2);
                      $g = mysqli_fetch_array($sql);
                      $amount = $g['amount'];


            if($g['photo'] == ""){
              echo '<center><div style="margin-bottom: 10px;">
                  <img class="profile-user-img img-fluid"
                       src="../icons/no-image.png"
                       alt="User profile picture" style="height: 160px; width: 160px">
                </div>';
                echo '<h4>'.$g['firstName'].' '.$g['lastName'].'</h4></center>';
                echo '<ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>No. of Scholars</b> <a class="float-right">'.$count.'</a>
                  </li>
           </ul>';

            }
            else{
                echo '<center><div style="margin-bottom: 10px">
                        <img class="profile-user-img img-fluid" 
                        src="data:image/jpeg;base64,'.base64_encode($g['photo']).'"
                        alt="User profile picture" style="height: 160px; width: 160px">
                      </div>';
                echo '<h4>'.$g['firstName'].' '.$g['lastName'].'</h4></center>';
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
                          <input type="date" class="form-control mdl" name="rdate" style="width: 40%"/><br/>                    

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

           <!-- About Me Box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php 

                 $sel = "SELECT * FROM sponsor JOIN user JOIN person ON sponsor.userID = user.userID AND user.personID = person.personID WHERE sponsorID = '$sponsor_id'";

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

                ?>

                <strong><i class="fa fa-user mr-1"></i> Email</strong>

                <p class="text-muted"><?php echo $info['email']?></p>

                <hr>

                <strong><i class="fa fa-money mr-1"></i> Contact No.</strong>

                <p class="text-muted"><?php echo $info['telNo']?></p>

                <hr>

                <strong><i class="fa fa-credit-card mr-1"></i> Sponsor Type</strong>

                <p class="text-muted"><?php echo $donation?></p>

                <hr>

                <strong><i class="fa fa-book mr-1"></i>Address</strong>

                <p class="text-muted">
                  <?php echo $info['street'].' '.$info['city'].' '.$info['country']; ?>
                </p>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-9">
            <div class="card" id="cbody2">
                <div class="card-header">
                  <span class="cheader">Sponsor Inflow</span>
                  <!-- <button class="btn btn-primary float-right" onclick="updateOrphan()" id="updatebtn">UPDATE</button> -->
                </div>
                <div class="card-body">
                       <form method="post" action="backend/updateOrph.php">
                  <?php

                       $sql2 = "SELECT firstName, lastName, dateReceived, amount FROM s_sponsorinflow JOIN scholar JOIN person ON s_sponsorinflow.scholarID = scholar.scholarID AND scholar.personID = person.personID WHERE scholar.sponsorID = '$sponsor_id' LIMIT 3";
                        $result2 = mysqli_query($con, $sql2);

                        if(mysqli_num_rows($result2) == 0){
                            echo '<center><span> No records yet.</span></center>';
                        }
                        else
                        {
                          echo ' <table id="example1" class="table table-bordered table-striped">
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
        
                </div>
            </div>
          </div>
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

</body>
</html>
