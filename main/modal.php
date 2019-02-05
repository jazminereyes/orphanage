<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Theme style -->
  <link rel="stylesheet" href="../mdb/css/bootstrap.min.css">
  <link rel="stylesheet" href="../mdb/css/bootstrap.css">
  <link rel="stylesheet" href="../mdb/css/mdb.min.css">
  <link rel="stylesheet" href="../mdb/css/mdb.css">
  <link rel="stylesheet" href="../mdb/css/style.css">
  <link rel="stylesheet" href="../mdb/css/style.min.css">
  <script src="../mdb/js/jquery-3.3.1.js"></script>
  <script src="../mdb/js/mdb.js"></script>
  <script src="../mdb/js/mdb.min.js"></script>
  <script src="../mdb/js/bootstrap.min.js"></script>
  <script src="../mdb/js/bootstrap.js"></script>
  <script src="../mdb/js/popper.js"></script>
  <script src="../mdb/js/modules/enhanced-modals.js"></script>



</head>
<body>
<!-- Button trigger modal-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmDelete">Launch modal</button>

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Are you sure?</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fa fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="https://mdbootstrap.com/product/material-design-for-bootstrap-pro/" class="btn  btn-outline-danger">Yes</a>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->
</body>
</html>