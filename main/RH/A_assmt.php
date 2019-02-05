<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Concordia | Referrals</title>

  <style>
      li
      {
        list-style-type: none;
      }

      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }

      .example-modal .modal {
        background: transparent !important;
      }

    </style>

  <!-- CSS -->
    <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="css/list.css">
    <link rel="stylesheet" type="text/css" href="css/assmt.css">

  <!-- CSS -->


  <!-- SCRIPTS -->
    <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable();
    $('.select2').select2()

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
      <center>
        <img src="../icons/Concordia.jpg"><br/>
        <span class="brand-text font-weight-light">Receiving Home</span>
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
                require ('dbconnect.php');

                $query = "SELECT name from PERSON JOIN USER ON person.personID = user.personID WHERE programType = 'RH'";
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
            <a href="RHdashboard.php" class="nav-link">
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
                <a href="RHorphans.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Maintenance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHreferral.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Referrals</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-archive"></i>
              <p>
                Assets
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="A_List.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Assessment</p>
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
  <div class="content-wrapper" style="background-color:#2dcc70">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="RHdashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="RHorphans.php">Orphans</a></li>
              <li class="breadcrumb-item active">Referrals</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="background-color:#2dcc70">
    <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active custom" href="#tab_2" data-toggle="tab">Assessment</a></li>
                  <li class="nav-item"><a class="nav-link custom" href="#tab_1" data-toggle="tab">Issuance</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <span class="head">Inventory</span>
                
                <div class="btn-group float-right">
                    <button type="button" class="btn btn-success btn-flat" data-toggle='modal' data-target='#modal-default' style="margin-left: 20px">
                      <span>Release Inventory Item&nbsp&nbsp</span>
                      <i class="fa fa-plus"></i>
                    </button>

                    <div id="modal-default" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Assessment Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("Y-d-mm");

                  $db = "SELECT * FROM a_asset WHERE assetType = 'I'";
                  $qwe = mysqli_query($con, $db);
                  
              echo '<div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control dt" name="dtoday" value="'.$date.'" disabled/ ><br/>
                        </div>
                  <form method="post" action="db/addassmt.php">

                  <label for="iname" id="name">Item Name</label>
                        <select class="form-control swd" name="iname"/>';

                    while($res = mysqli_fetch_array($qwe)){
                      echo '<option value="'.$res['assetID'].'">'.$res['itemName'].'</option>';
                    }
                      echo '
                        </select><br/>
                        <label style="margin-right: 20px"><input type="radio" value="stock" class="form-inline-check" name="asset" style="margin-right: 10px"/>In Stock</label>
                        <label style="margin-right: 20px"><input type="radio" value="use" class="form-inline-check" name="asset" style="margin-right: 10px"/>In Use</label><br/>
                        <label for="qty" id="icount">Quantity</label>
                        <input type="number" class="form-control num" name="qty" /><br/>

                      <div class="form-group">
                        <label for="rto" id="to">Released To</label>
                        <select class="form-control select2 " multiple="multiple" data-placeholder="Select Name" style="width: 100%;" name="rto[]">';

                      $x = "SELECT personID, firstName, lastName FROM person WHERE type='O'";
                      $y = mysqli_query($con, $x);
                      while($info = mysqli_fetch_array($y)){
                        $fname = $info[1];
                        $last = $info[2];
                        echo '<option value="'.$info[0].'"/>'.$fname.' '.$last.' '.$info[0].'</option>';
                      }
                      echo '
                      </select>
                </div>
                        <label for="rby" id="by">Released By</label>
                        <input type="text" class="form-control swd" name="rby"/><br/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->';
                  
              ?>
                  </div>
            </div>
            <div class="card-body" id="rtbl">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Date</th>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>Released To</th>
                          <th>Released By</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                  <?php

                  require ('dbconnect.php');

                  $sql = "SELECT * FROM a_assetrelease as ar JOIN person as p on ar.personID = p.personID JOIN a_asset as a ON ar.assetID = a.assetID";
                  $qry = mysqli_query($con, $sql);
                  while($res = mysqli_fetch_array($qry)){
                  
                      echo "<tr>";
                      echo "<td>".$res['dateReleased']."</td>";
                      echo "<td>".$res['itemName']."</td>";
                      echo "<td>".$res['quantity']."</td>";
                      echo "<td>".$res['name']."</td>";
                      echo "<td>".$res['releasedBy']."</td>";
                  }
                  ?>
                      
                  </tbody>

                  <tfoot>
                    <tr>
                          <th>Date</th>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>Released To</th>
                          <th>Released By</th>
                    </tr>
                  </tfoot>
              
              </table>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>

       <!-- /.tab-pane -->
    <div class="tab-pane active" id="tab_2">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <span class="head">Inventory</span>

                <div class="btn-group float-right">
                    <button type="button" class="btn btn-success btn-flat" data-toggle='modal' data-target='#modal-default2'>
                      <span>Add New Assessment&nbsp&nbsp</span>
                      <i class="fa fa-plus"></i>
                    </button>

        <div id="modal-default2" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Assessment Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("Y-d-mm");

                  $db = "SELECT * FROM a_asset WHERE assetType = 'I'";
                  $qwe = mysqli_query($con, $db);
                  
              echo '<div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control dt" name="dtoday" value="'.$date.'" disabled/ ><br/>
                        </div>
                  <form method="post" action="db/addassmt_i.php">

                  <label for="iname" id="name">Item Name</label>
                        <select class="form-control swd" name="iname"/>';



                    while($res = mysqli_fetch_array($qwe)){
                      echo '<option value="'.$res['assetID'].'">'.$res['itemName'].'</option>';
                    }
                    ?>
                        </select><br/>
                         <label for="qty" id="icount">Quantity</label>
                        <input type="number" class="form-control num" name="qty" /><br/>


                        <script>
function populate(s1,s2){
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
  if(s1.value == "instock"){
    var optionArray = ["inuse|In Use","damaged|Damaged","lost|Lost","excess|Excess"];
  } else if(s1.value == "inuse"){
    var optionArray = ["damaged|Damaged","lost|Lost","excess|Excess"];
  } else if(s1.value == "damaged"){
    var optionArray = ["repair|Repair","dispose|Dispose"];
  } else if(s1.value == "excess" || s1.value == "unused"){
    var optionArray = ["gs|Garage Sale"];
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
}
</script>
<div class="form-group">
<label>Set Item From:</label>
<select id="slct1" name="slct1" onchange="populate(this.id,'slct2')" class="form-control ddown" style="width: 25%;">
  <option value=""></option>
  <option value="instock">In Stock</option>
  <option value="inuse">In Use</option>
  <option value="damaged">Damaged</option>
  <option value="excess">Excess</option>
  <option value="unused">Unused</option>
</select>&nbsp&nbsp
<label>To:</label>
<select id="slct2" name="slct2" class="form-control ddown" style="width: 30%;"></select>
</div>

<div class="form-group">
                    <label>Remarks:</label>
                    <textarea class="form-control" rows="3" placeholder="Input remarks" id="rem" name="rem"></textarea>
                  </div>
                        <label for="rby" id="by">Assess By</label>
                        <input type="text" class="form-control swd" name="aby"/><br/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="modal-default4" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Assessment Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("Y-d-mm");

                  $db = "SELECT * FROM a_asset WHERE assetType = 'S'";
                  $qwe = mysqli_query($con, $db);
                  
              echo '<div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control dt" name="dtoday" value="'.$date.'" disabled/ ><br/>
                        </div>
                  <form method="post" action="db/addassmt.php">

                  <label for="iname" id="name">Item Name</label>
                        <select class="form-control swd" name="iname"/>';



                    while($res = mysqli_fetch_array($qwe)){
                      echo '<option value="'.$res['assetID'].'">'.$res['itemName'].'</option>';
                    }
                      echo '
                        </select><br/>
                         <label for="qty" id="icount">Quantity</label>
                        <input type="number" class="form-control num" name="qty" /><br/>

                      <div class="form-group">
                        <label for="rto" id="to">Released To</label>
                        <select class="form-control select2 " multiple="multiple" data-placeholder="Select Name" style="width: 100%;" name="rto[]">';

                      $x = "SELECT personID, firstName, last FROM person WHERE type='O' OR type='S'";
                      $y = mysqli_query($con, $x);
                      while($info = mysqli_fetch_array($y)){
                        $fname = $info[1];
                        $last = $info[2];
                        echo '<option value="'.$info[0].'"/>'.$fname.' '.$last.' '.$info[0].'</option>';
                      }
                      echo '
                      </select>
                </div>
                        <label for="rby" id="by">Released By</label>
                        <input type="text" class="form-control swd" name="rby"/><br/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-success" value="Confirm"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->';
                  
              ?>
                </div>



            </div>
            <div class="card-body" id="rtbl">
              <table id="example2" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Date</th>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Remarks</th>
                          <th>Assessed By</th>
                      </tr>
                  </thead>
                  
                  <tbody>

                  <?php

                  $sql = "SELECT * FROM a_assessment as inv JOIN a_asset as a ON inv.assetID = a.assetID";
                  $qry = mysqli_query($con, $sql);

                  while($res = mysqli_fetch_array($qry)){

                    echo "<tr>";
                    echo "<td>".$res['dateAssessed']."</td>";
                    echo "<td>".$res['itemName']."</td>";
                    echo "<td>".$res['quantity']."</td>";
                    echo "<td>".$res['previousAssessment']."</td>";
                    echo "<td>".$res['recentAssessment']."</td>";
                    echo "<td>".$res['remarks']."</td>";
                    echo "<td>".$res['assessedBy']."</td>";
                  }

                  ?>
                      
                  </tbody>

                  <tfoot>
                          <th>Date</th>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Remarks</th>
                          <th>Assessed By</th>
                      </tr>
                  </tfoot>
              
              </table>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
    
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
