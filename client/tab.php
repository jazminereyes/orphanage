<html>
<?php session_start(); ?>
<head>
  <title>Sliding Tab</title>
  <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="description" content="">
       <meta name="author" content="">


  <?php
          require('../connection.php');
          $userID = $_SESSION['user'];
          $scholarid = $_GET['scholarid'];

          $q = "SELECT firstName, lastName FROM person JOIN user ON person.personID = user.personID WHERE userID = '$userID'";
          $r = mysqli_query($con, $q);
          $s = mysqli_fetch_row($r);

          $a = "SELECT firstName, lastName FROM person JOIN scholar ON person.personID = scholar.personID WHERE scholarID = '$scholarid'";
          $b = mysqli_query($con, $a);
          $c = mysqli_fetch_row($b);

          echo "<title>".$s[0]." ".$s[1]." | ".$c[0]." ".$c[1]."</title>";
       ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="wrapper" style="background-color: #EA4567 ">
    <div class="container">
      <ul class="nav nav-tabs nav-justified" style="margin-top: 30px">
        <li class="active"><a href="#tab4" class="text-uppercase">Expense</a></li>
        <li><a href="#tab5" class="text-uppercase">Academic</a></li>
        <li><a href="#tab6" class="text-uppercase">Medical</a></li>
      </ul>

      <div class="tab-content">
        <div id="tab4" class="content-pane is-active">
          <p>
            Tab 4 Content
          </p>
          <!-- /.login-box-body -->
        </div>
        <!-- /#tab1 -->

        <div id="tab5" class="content-pane">
          <p>
            Tab 5 Content
          </p>
          <!-- /.form-box -->
        </div>
        <!-- /#tab2 -->

        <div id="tab6" class="content-pane">
          <p>
            Tab 6 Content
          </p>
          <!-- /.form-box -->
        </div>
        <!-- /#tab2 -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.wrapper -->

  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='http://allurewebsolutions.com/allure.js'></script>

  

    <script  src="js/index.js"></script>
</body>

</html>

