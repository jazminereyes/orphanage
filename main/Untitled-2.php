<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Sponsor Application</title>

  <style>
      li
      {
        list-style-type: none;
      }

      .content 
      {
        background-color:#2dcc70;
      }

      input[type="text"]
      {
        margin-left: 20px;
      }
  </style>

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
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
            <a href="pages/widgets.html" class="nav-link">
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
      <div class="row">
          <div class="col-md-12">
          <div class="card">
                    <div class="card-header">
                    <span class="head"><strong>Sponsor</strong></span>
                    <!-- /.card-header -->
                    </div>
                    <div class="card-body p-0">
            <table class="table table-bordered table-striped">
              <th>Name</th>
              <th>Date Submitted</th>
              <th><center>Action</center></th>
              
              <?php
                require ('../connection.php');

                $query = "SELECT * FROM person JOIN user on person.personID = user.personID JOIN sponsor on user.userID = sponsor.userID WHERE sponsor.applicationStatus='P'";
    
                $rec = mysqli_query($con, $query);
        
                if ($rec) 
                {
                  while ($res = mysqli_fetch_array($rec)) 
                  {
                    $date = $res['submissionDate'];
                    $date = date("M-d-Y", strtotime($date));
                    $id = $res['sponsorID'];
                    $dt = $res['donationType'];

                    if ($dt=='HSM')
                    {
                      $dt = 'High School - Monthly';
                    }

                    else if ($dt=='HSY')
                    {
                      $dt = 'High School - Yearly';
                    }

                    else if ($dt=='EM')
                    {
                      $dt = 'Elementary - Monthly';
                    }

                    else if ($dt=='EY')
                    {
                      $dt = 'Elementary - Yearly';
                    }

                    echo  "<tr>
                      <td>".$res['name']."</td>
                      <td>".$date."</td>
                      <td>
                      <center>
                      <a href='#view".$id."' data-toggle='modal'><button type='button' class='btn btn-warning'><i class='fa fa-eye'></i>&nbsp;&nbsp;&nbsp;View</button></a>
                      <a href='#accept".$id."' data-toggle='modal'><button type='button' class='btn btn-success'><i class='fa fa-check'></i>&nbsp;&nbsp;&nbsp;Accept</button></a>
                      </center><td>
                      <tr>

                      <div id='view".$id."' class='modal fade' role='dialog'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h4 class='modal-title'>Sponsor Details</h4>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span></button>
                          </div>
                          <div class='modal-body'>
            
                                    <div class='form-inline pull-right' align='right'>
                                      <label for='dtoday' id='rdate'>Date</label>
                                      <input type='text' class='form-control dt' name='dtoday' value='".$date."' disabled/ ><br/>
                                    </div><br/><br/><br/>
            
                                    <div class='form-inline'>
                                    <label for='cname' id='name'>First Name</label>
                                    <input type='text' class='form-control swd' name='cname' value='".$res['firstName']."' disabled/><br/>
                                    </div><br/>
                                    
                                    <div class='form-inline'>
                                    <label for='cname' id='name'>Middle Name</label>
                                    <input type='text' class='form-control swd' name='cname' value='".$res['middleName']."' disabled/><br/>
                                    </div><br/>

                                    <div class='form-inline'>
                                    <label for='cname' id='name'>Last Name</label>
                                    <input type='text' class='form-control swd' name='cname' value='".$res['lastName']."' disabled/><br/>
                                    </div><br/>
                                    
                                    <div class='form-inline'>
                                    <label for='place' id='pfound'>Street</label>
                                    <input type='text' class='form-control swd' name='place' value='".$res['street']."' disabled /><br/>
                                    </div><br/>

                                    <div class='form-inline'>
                                    <label for='place' id='pfound'>City</label>
                                    <input type='text' class='form-control swd' name='place' value='".$res['city']."' disabled /><br/>
                                    </div><br/>
                                    
                                    <div class='form-inline'>
                                    <label for='place' id='pfound'>ZIP</label>
                                    <input type='text' class='form-control swd' name='place' value='".$res['zip']."' disabled /><br/>
                                    </div><br/>
                                    
                                    <div class='form-inline'>
                                    <label for='place' id='pfound'>Country</label>
                                    <input type='text' class='form-control swd' name='place' value='".$res['country']."' disabled /><br/>
                                    </div><br/>
                                    
                                    <div class='form-inline'>
                                    <label for='refdate' id='bday'>Birthdate</label>
                                    <input type='text' class='form-control dt' name='bdate' value='".$res['birthdate']."' disabled/ ><br/>
                                    </div><br/>

                                    <div class='form-inline'>
                                    <label for='swname' id='sname'>Email</label>
                                    <input type='text' class='form-control swd' name='swname' value='".$res['email']."' disabled/><br/>
                                    </div><br/>

                                    <div class='form-inline'>
                                    <label for='swemail' id='semail'>Telephone Number</label>
                                    <input type='text' class='form-control swd' name='swemail' value='".$res['telNo']."' disabled/><br/>
                                    </div><br/>

                                    <div class='form-inline'>
                                    <label for='swemail' id='semail'>Scholar Count</label>
                                    <input type='text' class='form-control swd' name='swemail' value='".$res['scholarCount']."' disabled/><br/>
                                    </div><br/>

                                    <div class='form-inline'>
                                    <label for='swemail' id='semail'>Donation Type</label>
                                    <input type='text' class='form-control swd' name='swemail' value='".$dt."' disabled/><br/>
                                    </div><br/>

                                    <div class='form-inline'>
                                    <label for='swemail' id='semail'>Amount</label>
                                    <input type='text' class='form-control swd' name='swemail' value='".$res['amount']."' disabled/><br/>
                                    </div>
                                </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Close</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
            
                <div id='accept".$id."' class='modal fade' role='dialog'>
                  <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h4 class='modal-title'>Accept Referral</h4>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span></button>
                      </div>
                      <div class='modal-body'>
                        <p>You are accepting the referral from ".$res['firstName'].' '.$res['lastName'].". You may send an email to notify them.</p>
                        <label for='email'>TO:</label>
                        <div class='input-group mb-3'>
                              <div class='input-group-prepend'>
                                <span class='input-group-text'><i class='fa fa-envelope'></i></span>
                              </div>
                              <input type='email' class='form-control' value='".$res['email']."' disabled>
                        </div>
                        <textarea class='form-control txt' rows='3' placeholder='Compose email ...'></textarea>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
            
                        <form method='post' action='db/acceptref.php'>
                            <input type='hidden' value='".$id."' name='oid'/>
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
                }
              ?>
          </table>
          </div><!-- /. col-md-12 -->
        </div><!-- /. row -->

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
