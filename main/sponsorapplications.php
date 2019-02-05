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
<link href="toastr/build/toastr.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/custom.css">
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

      /*input[type="text"], input[type="number"], input[type="date"], select*/
      label
      {
        margin-right: 20px;
      }

      .sidebar-dark-primary .nav-sidebar>.nav-item.menu-open>.nav-link{
    color: #fff;
    background-color: #247d38;
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
            <a href="sponsors.php" class="nav-link">
              <i class="nav-icon fa fa-male"></i>
              <p>
                Sponsors
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Applications
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
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
              <li class="breadcrumb-item">Applications</li>
              <li class="breadcrumb-item active">Sponsors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

     <!-- <div class="row">
        <div class="col-md-12" style="margin-left: 930px">
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addSponsor">
          <span>Add Sponsor&nbsp;&nbsp;</span>
          <i class="fa fa-plus"></i>
          </button>
          
        </div>
      </div><br/>-->

      <div id="addSponsor" class="modal fade" role="dialog" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Sponsor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      </div>

                      <?php
                        $date = date("Y-d-mm");
                      ?>
                      
                      <div class="modal-body">
                            <form method="post" action="backend/addsponsor.php">
                            <div class="form-inline pull-right" align="right">
                              <label for="dtoday" id="rdate">Date:</label>
                              <input type="text" class="form-control dt" name="dtoday" value="<?php echo $date?>" disabled/ ><br/>
                            </div><br/><br/><br/>
                    
                            <div class="form-inline">
                              <label>First Name</label>  
                              <input type="text" class="form-control" name="fn"/>
                            </div><br/>

                            <div class="form-inline">
                              <label>Middle Name</label>  
                              <input type="text" class="form-control" name="mn"/>
                            </div><br/>

                            <div class="form-inline">
                              <label>Last Name</label>  
                              <input type="text" class="form-control" name="ln"/>
                            </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Street</label>
                            <input type="text" class="form-control" name="street"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">City</label>
                            <input type="text" class="form-control" name="city"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">ZIP</label>
                            <input type="text" class="form-control" name="zip"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Country</label>
                            <input type="text" class="form-control" name="country"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Birthdate</label>
                            <input type="date" class="form-control" name="bday"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Telephone Number</label>
                            <input type="text" class="form-control" name="telno"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Scholar Count</label>
                            <input type="number" class="form-control" min="1" name="scholar"/><br/>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Donation Type</label>
                            <select class="form-control" name="dtype">
                              <option value="EM">Elementary - Monthly</option>
                              <option value="EY">Elementary - Yearly</option>
                              <option value="HSM">High School - Monthly</option>
                              <option value="HSY">High School - Yearly</option>
                            </select>
                          </div><br/>

                          <div class="form-inline">
                            <label for="iname" id="name">Amount</label>
                            <input type="number" class="form-control" min="0" name="amount"/><br/>
                          </div><br/>
                      </div>
              
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-success" value="Add Sponsor"/>
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
                <center><h2>Pending Applications</h2></center>
            </div>
            <div class="card-body" id="rtbl">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr>
            <th>Name</th>
              <th>Application Date</th>
              <th><center>Action</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
                require ('../connection.php');

                $query = "SELECT * FROM person JOIN sponsor ON person.personID = sponsor.personID WHERE sponsor.applicationStatus='P'";
    
                $rec = mysqli_query($con, $query);
        
                if ($rec) 
                {
                  while ($res = mysqli_fetch_array($rec)) 
                  {
                    $date = $res['submissionDate'];
                    $date = date("M-d-Y", strtotime($date));
                    $id = $res['sponsorID'];
                    $pid = $res['personID'];
                    $dt = $res['donationType'];

                    $query2 = "SELECT averageGrade, gender, religion FROM s_preference WHERE sponsorID = '$id'";
                    $result = mysqli_query($con, $query2);
                    $row = mysqli_fetch_array($result);

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

                    if(!empty($row['averageGrade']))
                    {
                      $grade = $row['averageGrade'];
                    }
                    else
                    {
                      $grade = "None.";
                    }

                    if(!empty($row['gender']))
                    {
                      if($row['gender']=='F')
                      {
                        $gender = "Female";
                      }

                      else
                      {
                        $gender = "Male";
                      }
                    }
                    else
                    {
                      $gender = "None.";
                    }

                    if(!empty($row['religion']))
                    {
                      $rel = $row['religion'];
                    }
                    else
                    {
                      $rel = "None.";
                    }

                    echo  "<tr>
                      <td>".$res['firstName']." ".$res['lastName']."</td>
                      <td>".$date."</td>
                      <td><a href='#view".$id."' data-toggle='modal'><button type='button' class='btn btn-warning'><i class='fa fa-eye'></i>&nbsp;&nbsp;&nbsp;View</button></a>
                      <a href='#accept".$id."' data-toggle='modal'><button type='button' class='btn btn-success'><i class='fa fa-check'></i>&nbsp;&nbsp;&nbsp;Accept</button></a>";

                    echo "<div id='view".$id."' class='modal fade' role='dialog'>
                    <div class='modal-dialog modal-lg'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h4 class='modal-title'>Sponsor Details</h4>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span></button>
                        </div>
                        <div class='modal-body'>
                          <div class='row'>
                            <div class='col-lg-4'>
                              <label for='cname' id='name'>Sponsor Name</label>
                              <input type='text' class='form-control swd' name='cname' value='".$res['firstName']." ".$res['lastName']."' disabled/><br/>
                            </div>
                            <div class='col-lg-4'>
                              <label for='place' id='pfound'>Address</label>
                              <input type='text' class='form-control swd' name='place' value='".$res['street']." ".$res['city']." ".$res['zip']." ".$res['country']."' disabled /><br/>
                            </div>
                            <div class='col-lg-4'>
                              <label for='refdate' id='bday'>Birthdate</label>
                              <input type='text' class='form-control dt' name='bdate' value='".$res['birthdate']."' disabled/ ><br/>
                            </div>
                          </div>
                         
                          <div class='row'>
                            <div class='col-md-6'>
                              <label for='swname' id='sname'>Email</label>
                              <input type='text' class='form-control swd' name='swname' value='".$res['email']."' disabled/><br/>
                            </div>
                            <div class='col-md-6'>
                              <label for='swemail' id='semail'>Contact Number</label>
                              <input type='text' class='form-control swd' name='swemail' value='".$res['telNo']."' disabled/><br/>
                            </div>
                          </div>
                          <div class='row'>
                            <div class='col-md-4'>
                              <label for='swemail' id='semail'>Donation Type</label>
                              <input type='text' class='form-control swd' name='swemail' value='".$dt."' disabled/><br/>
                            </div>
                            <div class='col-md-4'>
                              <label for='swemail' id='semail'>Scholar Count</label>
                              <input type='text' class='form-control swd' name='swemail' value='".$res['scholarCount']."' disabled/>
                            </div>
                            <div class='col-md-4'>
                              <label for='swemail' id='semail'>Amount</label>
                              <div class='input-group'>
                                <div class='input-group-prepend'>
                                  <span class='input-group-text'>Php</span>
                                </div>
                                <input type='text' class='form-control swd' name='swemail' value='".$res['amount']."' disabled/><br/>
                                <div class='input-group-append'>
                                  <span class='input-group-text'>.00</span>
                                </div>
                              </div> 
                            </div> 
                          </div>
                        
                          <hr>
                          <center><h4><strong>PREFERENCE</strong></h4></center><br/>

                          <table class='table table-bordered'>
                            <th>Attribute</th>
                            <th>Preference</th>

                            <tr>
                              <td>Gender</td>
                              <td>".$gender."</td>
                            </tr>
                            <tr>
                              <td>Grade</td>
                              <td>".$grade."</td>
                            </tr>
                            <tr>
                              <td>Religion</td>
                              <td>".$rel."</td>
                            </tr>
                          </table>

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
          ";

          echo " <div id='accept".$id."' class='modal fade' role='dialog'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>Accept Application</h4>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
              </div>
              <div class='modal-body'>
                <p>You are accepting the sponsorship application from ".$res['firstName'].' '.$res['lastName'].".</p>

                <label for='email'>An email will be sent to this address for notification:</label>

            <form method='post' action='backend/acceptsponsor.php'>
            <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fa fa-envelope'></i></span>
                  </div>
                  <input type='email' class='form-control' value='".$res['email']."' name='email' readonly>
            </div>
              
            <hr>
            <h6>For sponsor's account:</h6>
            <div class='row'>
              <div class='col-6'>
                <label>Email</label>
                <input type='text' class='form-control' name='usern' style='margin-left: 0px;' value='".$res['email']."' readonly/>
              </div>
              <div class='col-6'>
                <label>Password</label>
                <input type='text' class='form-control' name='check' style='margin-left: 0px;' id='check".$id."' required/>
              </div>
            </div>

              <div class='modal-footer'>
                <button type='button' class='btn btn-outline pull-left' data-dismiss='modal'>Cancel</button>
                    <input type='hidden' value='".$pid."' name='pid'/>
                    <input type='hidden' value='".$id."' name='spid'/>
                    <input type='submit' name='submit' class='btn btn-success' value='Confirm' onclick='validatePassword(".$id.")'/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal --></td>";
        echo "</tr>";
                  }
                }
        ?>
                   
                                    <tfoot>
                <tr>
                <th>Name</th>
              <th>Date Submitted</th>
              <th><center>Action</center></th>
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
  function validatePassword(str)   
  {
    var name = "check"+str;
    var password = document.getElementById(name).value;
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
