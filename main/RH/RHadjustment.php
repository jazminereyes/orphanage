<?php
  session_start();
?>
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
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
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

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
    <a href="#" class="brand-link">
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

                $userid = $_SESSION['userid'];
                
                $query = "SELECT firstName, lastName from PERSON JOIN USER ON person.personID = user.personID WHERE programType = 'RH' AND userID = '$userid'";
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
          <li class="nav-item">
            <a href="socialworker.php" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Social Workers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="swapp.php" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Applications
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-archive"></i>
              <p>
                Inventory
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="RHlist.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHreceive2.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Receive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHrelease.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RHadjustment.php" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Adjustment</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="RHreports.php" class="nav-link">
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
              <li class="breadcrumb-item"><a href="orphans.php" class="text-light">Orphans</a></li>
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
       <div class="card-header">
           <span class="head">Adjustment</span>

           <div class="btn-group float-right">
               <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalReceive">
                 <span>Adjust Item&nbsp;&nbsp;</span>
                 <i class="fa fa-plus"></i>
               </button>
           </div>
       </div>

       <div id="modalReceive" class="modal fade" role="dialog" >
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h4 class="modal-title">Adjustment</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
                 </div>

                 <?php
                   $date = date("Y-d-mm");
                 ?>
                 
                 <div class="modal-body">
                 <div class="nav-tabs-custom">
                   <ul class="nav nav-pills ml-auto p-2">
                     <li class="nav-item"><a class="nav-link active custom" href="#tab_2" data-toggle="tab"><span><i class="fa fa-plus"></i></span>&nbsp;&nbsp;Add to Stock</a></li>
                     <li class="nav-item"><a class="nav-link custom" href="#tab_1" data-toggle="tab"><span><i class="fa fa-minus"></i></span>&nbsp;&nbsp;Deduct from Stock</a></li>
                   </ul>
                 
                   <div class="tab-content">
                     
                     <div class="tab-pane" id="tab_1">
                       <form method="post" action="../backend/issueitem.php">
                       <div align="right">
                         <label for="dtoday" id="rdate">Date:</label>
                         <input type="text" class="form-control dt" name="dtoday" value="<?php echo $date?>" disabled/ ><br/>
                       </div>
                   
                       <div class="form-inline">
                         <label>Item Name</label>  
                         <select class="form-control" name="item" required>
                           <?php
                             $b = "SELECT * FROM a_stocks WHERE stockType = 'F'";
                             $c = mysqli_query($con, $b);

                             while ($s = mysqli_fetch_array($c))
                             {
                               echo "<option value='".$s['stockNo']."'>".$s['itemName']."</option>";
                             }
                           ?>
                         </select>
                       </div>

                       <div class="form-inline">
                         <label>Remarks</label>
                         <select class="form-control" name="remarks" required>
                             <option value="Lost">Lost</option>
                             <option value="Disposed">Disposed</option>
                         </select>
                       </div>

                     <div class="form-inline">
                       <label for="iname" id="name">Quantity</label>
                       <input type="number" class="form-control" min="1" name="qty" required/><br/>
                     </div>

                     <div class="form-inline">
                       <label for="iname" id="name">Date Adjusted</label>
                       <input type="date" class="form-control" name="dateadjust" required/><br/>
                     </div>

                     <div class="pull-right">
                       <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                       <input type="submit" name="submit" class="btn btn-success" value="Issue Item"/>
                       </form>
                     </div>

                     </div>
                   
                     <div class="tab-pane active" id="tab_2">
                       <form method="post" action="../backend/receiveitem.php">

                       <div align="right">
                         <label for="dtoday" id="rdate">Date:</label>
                         <input type="text" class="form-control dt" name="dtoday" value="<?php echo $date?>" disabled/ ><br/>
                       </div>

                       <div class="form-inline">
                         <label>Item Name</label>  
                         <select class="form-control" name="itemname" required>
                           <?php
                             $b = "SELECT * FROM a_stocks WHERE stockType = 'F'";
                             $c = mysqli_query($con, $b);

                             while ($s = mysqli_fetch_array($c))
                             {
                               echo "<option value='".$s['stockNo']."'>".$s['itemName']."</option>";
                             }
                           ?>
                         </select>
                       </div>

                       <div class="form-inline">
                         <label>Remarks</label>
                         <select class="form-control" name="remark" required>
                             <option value="Unaccounted">Unaccounted</option>
                         </select>
                       </div>

                     <div class="form-inline">
                       <label for="iname" id="name">Quantity</label>
                       <input type="number" class="form-control" min="1" name="qtyadjust" required/><br/>
                     </div>

                     <div class="form-inline">
                       <label for="iname" id="name">Date Adjusted</label>
                       <input type="date" class="form-control" name="dateadjust" required/><br/>
                     </div>

                     <div class="pull-right">
                   <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                   <input type="submit" name="submit" class="btn btn-success" value="Issue Item"/>
                   </form>
                 </div>
                     </div>
                   </div>
                 </div>

                 </div>
         
               </div>
       <!-- /.modal-content -->
             </div>
     <!-- /.modal-dialog -->
         </div>
   <!-- /.modal -->


       <div class="card-body" id="rtbl">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>Item Name</th>
                     <th>Unit</th>
                     <th>Remarks</th>
                     <th>Adjusted Quantity</th>
                     <th>Date Adjusted</th>
                 </tr>
             </thead>
             
             <tbody>
                 <?php

                 $sql = "SELECT * FROM a_stocks JOIN a_adjustment JOIN a_unit ON a_stocks.stockNo = a_adjustment.stockNo AND a_stocks.unitID = a_unit.unitID WHERE stockType = 'F'";
                 $qry = mysqli_query($con, $sql);

                 while($stock = mysqli_fetch_array($qry)){

                   echo "<tr>";
                   echo "<td>".$stock['itemName']."</td>";
                   echo "<td>".$stock['unitName']."</td>";
                   echo "<td>".$stock['remarks']."</td>";
                   echo "<td>".$stock['qtyAdjusted']."</td>";
                   echo "<td>".$stock['dateAdjusted']."</td>";
                   echo "</tr>";
                 }

                 ?>
             </tbody>

             <tfoot>
               <tr>
                   <th>Item Name</th>
                   <th>Unit</th>
                   <th>Remarks</th>
                   <th>Adjusted Quantity</th>
                   <th>Date Adjusted</th>
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
