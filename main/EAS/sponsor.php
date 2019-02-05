<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Sponsors</title>

  <?php
session_start();
  ?>

  <!-- CSS -->
    <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/sponsor.css">
  <link href="../toastr/build/toastr.css" rel="stylesheet"/>
  <style type="text/css">

    .input{
      margin-left: 0px;
    }

    @media (min-width: 576px){
    
        .modal-dialog-c {
        max-width: 700px;
        margin: 1.75rem auto;
        }
    }

    .input{
      margin-left: 0px;
    }
  </style>
  <!-- CSS -->


<!-- SCRIPTS -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/jquery/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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

</script>
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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="text-light">Dashboard</a></li>
              <li class="breadcrumb-item active">Maintenance</li>
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
                  <div class="modal-dialog modal-dialog-c">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Sponsor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      </div>
                      
                      <div class="modal-body">
                            <form method="post" action="backend/addsponsor.php">
                    
                            <div class="row">
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>First Name</label>  
                                <input type="text" class="form-control input" name="fn"required/>
                              </div>
                              <div class="col-md-4">
                                <label>Middle Name</label>  
                                <input type="text" class="form-control input" name="mn"/>
                              </div>
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Last Name</label>  
                                <input type="text" class="form-control input" name="ln" required/>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Street</label>
                                <input type="text" class="form-control input" name="street" required/><br/>
                              </div>
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>City</label>
                                <input type="text" class="form-control input" name="city" required/><br/>
                              </div>
                              <div class="col-md-4">
                                <label>ZIP</label>
                                <input type="text" class="form-control input" name="zip"/><br/>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Country</label>  
                                <input type="text" class="form-control input" name="country" required/>
                              </div>
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Birthdate</label>
                                <input type="date" class="form-control input" name="bday"/>
                              </div>
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Submission Date<label>
                                <input type="date" class="form-control input" name="submission" required/>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Telephone Number</label>
                                <input type="text" class="form-control input" name="telno" required/>
                              </div>
                              <div class="col-md-5">
                                <label for="iname" id="name"><i class="text-danger fa fa-asterisk"></i>Email</label>
                                <input type="email" class="form-control input" name="email" required/>
                              </div>
                              <div class="col-md-3">
                                <label for="iname" id="name"><i class="text-danger fa fa-asterisk"></i>Scholar Count</label>
                                <input type="number" class="form-control input" min="1" name="count"/>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <label><i class="text-danger fa fa-asterisk"></i>Donation Type</label>
                                <select class="form-control input" name="dtype" onchange="displayValue(this.value)" required>
                                  <option disabled selected>--Select Donation Type--</option>
                                  <option value="EM">Elementary - Monthly</option>
                                  <option value="EY">Elementary - Yearly</option>
                                  <option value="HSM">High School - Monthly</option>
                                  <option value="HSY">High School - Yearly</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                                <label>Amount</label>
                                <input type="number" class="form-control input" min="0" id="amt" name="amount" readonly/>
                              </div>
                              <div class="col-md-4">
                                <label><i class="text-danger fa fa-asterisk"></i>Password</label>
                                <input type="text" name="pword" class="form-control input" id="pword" maxlength="11" required/>
                              </div>
                            </div>
                      </div>
              
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-success" value="Add Sponsor" onclick="validatePassword()"/>
                        </form>
                      </div>
                    </div>
            <!-- /.modal-content -->
                  </div>
          <!-- /.modal-dialog -->
              </div>
        <!-- /.modal -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <center><h2>SPONSORS</h2></center>
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
                        $query = "SELECT firstName, lastName, country, scholarCount, sponsor.sponsorID, email, activeFlag FROM person JOIN sponsor on person.personID = sponsor.personID WHERE applicationStatus = 'A'"; 
                            $result = mysqli_query($con, $query);

                            if ($result)
                            {
                              while ($rec = mysqli_fetch_array($result))
                              {
                                $date = date('M-d-Y');
                                $id = $rec['sponsorID'];
                                
                                if($rec['activeFlag']==0){
                                  $status = "<span class='badge bg-danger'>Inactive</span>";
                                  $action = "";
                                } else{
                                  $status = "<span class='badge bg-primary'>Active</span>";
                                  $action = "<a href='#terminate".$id."' data-toggle='modal'><button type='button' class='btn btn-danger'><span><i class='fa fa-times'></i></span>&nbsp;&nbsp;Set as Inactive</button></a>


                                  <div id='terminate".$id."' class='modal fade' role='dialog'>
                                        <div class='modal-dialog'>
                                          <div class='modal-content'>
                                            <div class='modal-header'>
                                              <h4 class='modal-title'>Terminate Sponsor</h4>
                                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span></button>
                                            </div>
                                            <div class='modal-body'>
                                              <p>Are you sure you want to terminate ".$rec['firstName']." ".$rec['lastName']."?</p>
                                              <label for='email'>An email will be sent to this email to notify them:</label>
                                              <form method='post' action='backend/terminatesp.php'>
                                          <div class='input-group mb-3'>
                              
                                                <div class='input-group-prepend'>
                                                  <span class='input-group-text'><i class='fa fa-envelope'></i></span>
                                                </div>
                                                <input type='email' name='email' class='form-control' value='".$rec['email']."' readonly>
                                          </div>
                                          <div class='input-group mb-3'>
                                                <div class='input-group-prepend'>
                                                  <span class='input-group-text'>Subject:</span>
                                                </div>
                                                <input type='text' name='subject' class='form-control input' value='Sponsorship Inactivity Notification'>
                                          </div>
                                              
                                                <textarea class='form-control txt' rows='7' name='message'>Good day.
                                                We regret to inform you that you have been removed as the sponsor of ".$row['firstName']." ".$row['lastName']." due to your 2-3 months of inactivity. You may reply to this message if you have any questions. Thank you for your kindness and cooperation. It has been a delight to have had you as our sponsor.</textarea>
                                            </div>
                                            <div class='modal-footer'>
                                              <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                                              
                                              <input type='hidden' value='".$id."' name='spid'/>
                                              <input type='submit' name='submit' class='btn btn-success' value='Confirm'/>
                                          </form>
                                            </div>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>
                                      <!-- /.modal -->";
                                }

                                $query2 = "SELECT firstName, lastName FROM person JOIN scholar ON person.personID = scholar.personID WHERE sponsorID = '$id'";
                                $res = mysqli_query($con, $query2);
                                $row = mysqli_fetch_array($res);

                                 echo '<tr>
                                      <td>'.$rec['firstName'].' '.$rec['lastName'].'</td>
                                      <td>'.$rec['country'].'</td>
                                      <td>'.$rec['scholarCount'].'</td>
                                      <td>'.$status.'</td>';
                                echo "<td>
                             
                                <a href='viewsponsor.php?sponsorid=".$id."'><button type='button' class='btn btn-warning'><span><i class='fa fa-eye'></i></span>&nbsp;&nbsp;View</button></a>
                                ".$action."
                              
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

<script src="toastr/build/toastr.min.js"></script>
<script>
  function validatePassword()   
  {
    var password = document.getElementById('pword').value;
    var count = 0;
    var msg = "";
    
    toastr.options = {
        "positionClass": "toast-bottom-right"
      };

    if(password.length<8){
      count++;
      msg = msg + " Must not be less than 8 characters.";
    }
    
    if(!password.match(/[A-z]/)){
      count++;
      msg = msg + " Must have at least 1 letter.";
    }

    if(!password.match(/[A-Z]/)){
      count++;
      msg = msg + " Must have at least 1 capital letter.";
    }

    if(!password.match(/\d/)){
      count++;
      msg = msg + " Must have at least 1 number.";
    }
    
    if(count>0){
      event.preventDefault();
      
      //alert('Password should fulfill the following criterias:'+msg);
      toastr.error('Password should fulfill the following criterias: '+msg+'');
    }

  }

</script>
</html>
