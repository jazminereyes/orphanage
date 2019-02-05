<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Sponsors</title>

  <link href="toastr/build/toastr.css" rel="stylesheet"/>

  <script src="moment.js/moment.js"></script>
  <script src="../client/jquery/jquery-3.3.1.min.js"></script>
  <script src="toastr/build/toastr.min.js"></script>

<!-- CSS -->

<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables/ajax-bootstrap.css">
<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
<link rel="stylesheet" href="css/custom.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
<!-- CSS -->

<!-- SCRIPTS -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/jquery/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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

<script>
  function displayValue(str)
  {
    if (str=="EM"){
      document.getElementById('amt').value = 1250;
    } else if (str=="EY"){
      document.getElementById('amt').value = 12500;
    } else if (str=="HSM"){
      document.getElementById('amt').value = 1500;
    } else if (str=="HSY"){
      document.getElementById('amt').value = 15000;
    }
  }

  function validateDate()
    {
      submission = document.getElementById('submission').value;
      birthdate = document.getElementById('bday').value;

      var count = 0;

      toastr.options = {
        "positionClass": "toast-bottom-right"
      };

      if (moment(submission).isAfter(moment())==true)
      {
        count = 1;
        toastr.error('Submission date cannot be after today.');
      }

      if (moment(birthdate).isAfter(moment())==true)
      {
        count = 1;
        toastr.error('Birthdate date cannot be after admission date.');
      }
      
      if (count==1)
      {
        event.preventDefault();
      }
    } 

  function displayPref(str){
    if(str=="yes"){
      document.getElementById('preference').style.display = "block";
    } else{
      document.getElementById('preference').style.display = "none";
    }
  }

  function displayGen(checkbox){
    if (checkbox.checked){
      document.getElementById('gender').style.display = "block";
    } else{
      document.getElementById('gender').style.display = "none";
    }
  }

  function displayRel(checkbox){
    if (checkbox.checked){
      document.getElementById('religion').style.display = "block";
    } else{
      document.getElementById('religion').style.display = "none";
    }
  }

  function displayGwa(checkbox){
    if (checkbox.checked){
      document.getElementById('gwa').style.display = "block";
    } else{
      document.getElementById('gwa').style.display = "none";
    }
  }
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
            <a href="#" class="nav-link active">
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
              <li class="breadcrumb-item active">Sponsors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12" style="margin-left: 930px">
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addSponsor">
          <span>Add Sponsor&nbsp;&nbsp;</span>
          <i class="fa fa-plus"></i>
          </button>
        </div>
      </div><br/>

      <div id="addSponsor" class="modal fade" role="dialog" >
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Add Sponsor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      </div>

                      <?php
                        $date = date("Y-d-m");
                      ?>
                      
                      <div class="modal-body">
                            <form method="post" action="backend/addsponsor.php">
                            <div class="form-inline pull-right" align="right">
                              <label for="dtoday" id="rdate">Date:</label>
                              <input type="text" class="form-control dt" name="dtoday" value="<?php echo $date?>" disabled/ ><br/>
                            </div><br/><br/><br/>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Information</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Other Information</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Preference</a>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br/><div class="row">
                                  <div class="col-lg-4">
                                    <label><i class="text-danger fa fa-asterisk"></i>First Name</label>  
                                    <input type="text" class="form-control" name="fn"required/>
                                  </div>
                                  <div class="col-lg-4">
                                    <label>Middle Name</label>  
                                    <input type="text" class="form-control" name="mn"/>
                                  </div>
                                  <div class="col-lg-4">
                                    <label><i class="text-danger fa fa-asterisk"></i>Last Name</label>  
                                    <input type="text" class="form-control" name="ln" required/>
                                  </div>
                                </div><br/>

                                <div class="row">
                                  <div class="col-lg-4">
                                    <label for="iname" id="name"><i class="text-danger fa fa-asterisk"></i>Street</label>
                                    <input type="text" class="form-control" name="street" required/><br/>
                                  </div>
                                  <div class="col-lg-4">
                                    <label for="iname" id="name"><i class="text-danger fa fa-asterisk"></i>City</label>
                                    <input type="text" class="form-control" name="city" required/><br/>
                                  </div>
                                  <div class="col-lg-4">
                                    <label for="iname" id="name">ZIP</label>
                                    <input type="text" class="form-control" name="zip"/><br/>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-4">
                                    <label for="iname" id="name"><i class="text-danger fa fa-asterisk"></i>Country</label>  
                                    <input type="text" class="form-control" name="country" required/><br/>
                                  </div>
                                  <div class="col-lg-4">
                                    <label for="iname" id="name"><i class="text-danger fa fa-asterisk"></i>Birthdate</label>
                                    <input type="date" class="form-control" name="bday" id="bday"/><br/>
                                  </div>
                              </div>

                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <br/><div class="row">
                                  <div class="col-lg-4">
                                    <label><i class="text-danger fa fa-asterisk"></i>Telephone Number</label>
                                    <input type="text" class="form-control" name="telno" required/>
                                  </div>
                                  <div class="col-lg-4">
                                    <label><i class="text-danger fa fa-asterisk"></i>E-mail</label>
                                    <input type="email" class="form-control" name="email" required/>
                                  </div>
                                  <div class="col-lg-4">
                                    <label><i class="text-danger fa fa-asterisk"></i>Submission Date</label>
                                    <input type="date" class="form-control" name="submission" id="submission" required/>
                                  </div>
                                </div><br/>
                              
                                <div class="row">
                                  <div class="col-lg-4">
                                    <label><i class="text-danger fa fa-asterisk"></i>Scholar Count</label>
                                    <input type="number" class="form-control" min="0" name="scholar" required/>
                                  </div>
                                  <div class="col-lg-4">
                                    <label for="iname" id="name"><i class="text-danger fa fa-asterisk"></i>Donation Type</label>
                                    <select class="form-control" name="dtype" onchange="displayValue(this.value)" required>
                                      <option disabled selected>--Select Donation Type--</option>
                                      <option value="EM">Elementary - Monthly</option>
                                      <option value="EY">Elementary - Yearly</option>
                                      <option value="HSM">High School - Monthly</option>
                                      <option value="HSY">High School - Yearly</option>
                                    </select>
                                  </div>
                                  <div class="col-lg-4">
                                    <label for="iname" id="name">Amount</label>
                                    <input type="number" class="form-control" min="0" id="amt" name="amount" readonly/>
                                  </div>
                                </div><br/>

                                <div class="row">
                                  <div class="col-lg-4">
                                    <label><i class="text-danger fa fa-asterisk"></i>Password</label>
                                    <input type="text" name="password" class="form-control" maxlength="11" required/>
                                  </div>
                                </div><br/>

                              </div>
                              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <br/><label>Preference?</label>
                                <label style="margin-left: 40px"><input type="radio" value="yes" class="form-check-input" name="pref" onchange="displayPref(this.value)"/>&nbsp;</label>Yes
                                <label style="margin-left: 40px"><input type="radio" value="no" class="form-check-input" name="pref" onchange="displayPref(this.value)"/>&nbsp;</label>No

                                <br/><br/><div id="preference" style="display: none">
                                  <div class="form-inline">
                                    <input type="checkbox" class="form-check-input" value="1" name="first" onchange="displayGen(this)"/><label>&nbsp;&nbsp;Gender</label>
                                    <select class="form-control" id="gender" name="gender" style="display: none; margin-left: 10px;">
                                      <option value="M">Male</option>
                                      <option value="F">Female</option>
                                    </select>
                                  </div><br/>

                                  <div class="form-inline">
                                    <input type="checkbox" class="form-check-input" value="1" name="second" onchange="displayRel(this)"/><label>&nbsp;&nbsp;Religion</label><input type="text" class="form-control" id="religion" style="display: none; margin-left: 10px;" name="religion"/>
                                  </div><br/>

                                  <div class="form-inline">
                                    <input type="checkbox" class="form-check-input" value="1" name="third" onchange="displayGwa(this)"/><label>&nbsp;&nbsp;General Weighted Average</label><input type="number" class="form-control" id="gwa" style="display: none; margin-left: 10px;" name="gwa"/>
                                  </div>
                                </div>

                              </div>
                            </div><br/><br/>
                      </div>
              
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-success" onclick="validateDate()" value="Add Sponsor"/>
                        </form>
                      </div>
                    </div>
            <!-- /.modal-content -->
                  </div>
          <!-- /.modal-dialog -->
              </div>
        <!-- /.modal -->

      <div class="row">
        <div class="col-md-10" style="margin-left: 100px">
          <div class="card">
            <div class="card-header">
                <center><h2>Sponsors</h2></center>
            </div>
            <div class="card-body" id="rtbl">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>No. of Preferred Scholars</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                        $query = "SELECT firstName, lastName, country, scholarCount, sponsorID, email, activeFlag FROM person JOIN sponsor ON person.personID = sponsor.personID WHERE applicationStatus = 'A' ORDER BY activeFlag";
                        
                            $result = mysqli_query($con, $query);

                            if ($result)
                            {
                              while ($rec = mysqli_fetch_array($result))
                              {
                                if($rec['activeFlag']==0){
                                  $status = "<span class='badge bg-danger'>Inactive</span>";
                                } else{
                                  $status = "<span class='badge bg-primary'>Active</span>";
                                }

                                $date = date('M-d-Y');
                                $id = $rec['sponsorID'];
                                 echo '<tr>
                                      <td>'.$rec['firstName'].' '.$rec['lastName'].'</td>
                                      <td>'.$rec['country'].'</td>
                                      <td>'.$rec['scholarCount'].'</td>
                                      <td>'.$status.'</td>';
                                echo "<td>
                             
                                <a href='viewsponsor.php?sponsorid=".$id."'><button type='button' class='btn btn-warning'><i class='fa fa-eye'></i>&nbsp;&nbsp;&nbsp;View</button></a>

                               <!--<a href='#terminate".$id."' data-toggle='modal'><button type='button' class='btn btn-danger'><i class='fa fa-times'></i>&nbsp;&nbsp;&nbsp;Set as inactive</button></a>-->


    <div id='terminate".$id."' class='modal fade' role='dialog'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Terminating Sponsor</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                <p>You are setting ".$rec['firstName']." ".$rec['lastName']." as inactive. You may send an email to notify them.</p>
                <label for='email'>TO:</label>
            <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-envelope'></i></span>
                  </div>
                  <input type='email' class='form-control' value='".$rec['email']."' disabled>
            </div>
                  <textarea class='form-control txt' rows='3' placeholder='Compose email ...'></textarea>
              </div>

              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                <form method='post' action='backend/terminatesponsor.php'>
                <input type='hidden' value='".$id."' name='oid'/>
                <input type='submit' name='submit' class='btn btn-success' value='Confirm'/>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


                                      </td>";
                                echo "</tr>";
                            }
                        }
        
                    ?>
                                    <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Country</th>
                  <th>No. of Preferred Scholars</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </tbody>
              </table>
            </div>
          </div>
        </div>
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

</body>
</html>
