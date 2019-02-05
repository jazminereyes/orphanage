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
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="css/list.css">

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
                <a href="#" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="A_assmt.php" class="nav-link">
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
    <section class="content">

     
                <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" id="head">
                <span class="head">Inventory</span>
                <div class="btn-group float-right">
                    <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                      <span class="caret">Add Item</span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" data-toggle='modal' data-target='#modal-default2'>Add New Item</a>
                      <a class="dropdown-item" data-toggle='modal' data-target='#modal-default3'>Add Existing Item</a>
                      <a class="dropdown-item" data-toggle='modal' data-target='#modal-default6'>Add Donation</a>
                    </div>
                  </div>
                <!-- <a class="cbtn float-right" >Add Item
                      &nbsp&nbsp<i class="fa fa-plus"></i>
                </a> -->

        <div id="modal-default2" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Item Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("Y-d-m");
              ?>
              <div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control dt" name="dtoday" value="<?php echo $date?>" disabled/ ><br/>
                        </div>
                  <form method="post" action="db/asset_addnew.php">

                        <label for="iname" id="name">Item Name</label>
                        <input type="text" class="form-control swd" name="iname"/><br/>
                        <label for="count" id="icount">Quantity</label>
                        <input type="number" class="form-control num" name="count" /><br/>
                        <label for="refdate" id="unit">Unit</label>
                        <input type="text" class="form-control swd" name="unit" / ><br/>
                        <label for="crit" id="cmt">Critical Amount</label>
                        <input type="number" class="form-control num" name="crit"/><br/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input type="hidden" value="I" name="type"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Add Item"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="modal-default3" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Item Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("Y-d-m");

                  require ('dbconnect.php');

                  $asd = "SELECT * FROM a_asset as a JOIN a_inventory  as i ON i.assetID = a.assetID WHERE assetType='I'";
                  $qwe = mysqli_query($con, $asd);

                  

                    echo '<div class="modal-body">

                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control dt" name="dtoday" value="'.$date.'" disabled/ ><br/>
                        </div>
                  <form method="post" action="db/asset_addexist.php">

                        <label for="iname" id="name">Item Name</label>
                        <select class="form-control swd" name="iname"/>';

                    while($res = mysqli_fetch_array($qwe)){
                      echo '<option value="'.$res['assetID'].'">'.$res['itemName'].'</option>';
                    }
                      echo '
                        </select><br/>
                        <label for="count" id="icount">Quantity</label>
                        <input type="number" class="form-control num" name="count" /><br/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                    
                    <input type="hidden" value="I" name="type"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Add Item"/>
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

       <div id="modal-default6" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Donation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <?php

                  $date = date("Y-d-mm");
              ?>
              <div class="modal-body">
                        <div align="right">
                          <label for="dtoday" id="rdate">Date:</label>
                          <input type="text" class="form-control dt" name="dtoday" value="<?php echo $date?>" disabled/ ><br/>
                        </div>
                        <div class="nav-tabs-custom">
            <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active custom" href="#tab_3" data-toggle="tab">New Item</a></li>
                  <li class="nav-item"><a class="nav-link custom" href="#tab_4" data-toggle="tab">Existing Item</a></li>
            </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_3">
      
      <div class="row">
        <div class="col-md-12">
                <form method="post" action="db/addnewdonation.php">
                    <div class="form-inline">
                        <label>Donor</label>
                        <input type="text" name="donor" class="form-control"/><br/>
                        <input type="checkbox" name="anon" value="Anonymous" class="form-check-input" style="margin-left: 20px"/>
                        <label>Anonymous</label><br/>
                    </div>
                        <label for="iname" id="name">Item Name</label>
                        <input type="text" class="form-control swd" name="iname"/><br/>
                        <label for="count" id="icount">Quantity</label>
                        <input type="number" class="form-control num" name="count" /><br/>
                        <label for="refdate" id="unit">Unit</label>
                        <input type="text" class="form-control swd" name="unit" / ><br/>
                        <label for="crit" id="cmt">Critical Amount</label>
                        <input type="number" class="form-control num" name="crit"/><br/><br/>

                        <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input type="hidden" value="I" name="type"/>
                    <input type="submit" name="submit" class="btn btn-success" value="Add Item"/>
                </form>
              </div></div></div></div></div></div></div></div></div></div>

      

            <div class="card-body" id="rtbl">
              <table id="example2" class="table table-bordered table-striped" width="100%">
                  <thead>
                      <tr>
                          <th rowspan="2" colspan="1">Item Name</th>
                          <th colspan="4">Item Count</th>
                      </tr>
                      <tr>
                          <td>In Stock</td>
                          <td>In Use</td>
                          <td>Lost</td>
                          <td>Damaged</td>
                      </tr>
                  </thead>
                  
                  <tbody>
                      <?php

                      require('dbconnect.php');

                      $sql = "SELECT * FROM a_asset as ass JOIN a_inventory  as i ON i.assetID = ass.assetID WHERE assetType='I'";
                      $qry = mysqli_query($con, $sql);

                      while($item = mysqli_fetch_array($qry)){
                        echo "<tr>";
                        echo "<td>".$item['itemName']."</td>";
                        echo "<td>".$item['inStockCount']."</td>";
                        echo "<td>".$item['inUseCount']."</td>";
                        echo "<td>".$item['lostCount']."</td>";
                        echo "<td>".$item['damagedCount']."</td>";

                        echo "</tr>";
                      }

                      ?>
                  </tbody>

                  <tfoot>
                    <tr>
                          <th rowspan="2" colspan="1">Item Name</th>
                          
                          <td>In Stock</td>
                          <td>In Use</td>
                          <td>Lost</td>
                          <td>Damaged</td>
                    </tr>
                    <tr>  
                          <th colspan="4">Item Count</th>
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
