<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
    ?>
  <head>

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

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/agency.css" rel="stylesheet">
    <link href="../font/css/all.css" rel="stylesheet"> <!--load all styles -->

    <!-- MDB -->
    <link href="css/mdb/css/mdb.css" rel="stylesheet">
    <link href="css/mdb/css/style.css" rel="stylesheet">

    <!-- Dropdown Nav -->
    <script>
      $('ul.nav li.dropdown').hover(function() 
      {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });
    </script>

    <style>
      *
      {
        font-family: 'Open Sans';
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

      .form-control
      {
          margin-left: 10px;
          margin-right: 20px;
      }

      .photo 
      {
          border-radius: 50%;
      }

      li 
      {
          list-style-type: none;
      }

      a, a:hover 
      {
        color: #27ae60;
        text-decoration: none;
      }

      section#contact {
        background-color: #212529;
        background-image: url("img/footer.jpg");
        background-repeat: no-repeat;
        background-position: center;
      }
    </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: black">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">CONCORDIA CHILDREN'S SERVICES, INC.
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="sponsorhome.php">Scholars</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="cashinflow.php">Cash Inflow</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../logout.php">Sign Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header 
    <header class="masthead">
      <div class="container">
       <div class="intro-text">
          <div class="intro-lead-in">Welcome!</div>
          <div class="intro-heading text-uppercase">HELP US FULFILL DREAMS</div>
        </div> 
      </div>
    </header> -->

    <!-- Services -->
    <section id="services">
      <div class="container" style="float: none; margin: auto;">
        <div class="row">
            
        <div class="col-lg-12">
            <?php
              $scholarid = $_GET["scholarid"];
              echo '<a href="viewscholar.php?scholarid='.$scholarid.'"><span class="fa-stack fa-1x">
              <i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-arrow-left fa-stack-1x fa-inverse text-light"></i></span></a>';
            ?>
          </div> <br/><br/>

            <div class="col-lg-3 center-block text-center">
                <div class="card" style="background-color: #F5F5F5">  
                    <div class="card-body">
                        <?php

                            $scholarID = $_GET['scholarid'];

                            require('../connection.php');
                            $sql = "SELECT scholarID, person.photo, firstName, lastName FROM person JOIN scholar on scholar.personID = person.personID WHERE scholar.scholarID = '$scholarID'";

                            $qry = mysqli_query($con, $sql);
                            $res = mysqli_fetch_array($qry);

                            if ($res['photo']=="")
                            {
                              $src = "../main/img/no-image.png";
                            }

                            else
                            {
                              $src = $res['photo'];
                            }

                            echo '<img src="'.$src.'" class="photo" height="100" width="100"/> ';
                            echo '<p><strong>'.$res['firstName']." ".$res['lastName'].'</strong></p><br/>';
                        ?>      
                    </div>
                </div><br/><br/>
            </div>

            <div class="col-lg-9 center-block text-center">
                <div class="card">  
                    <div class="card-body">
                        <h3>Academic Report</h3>
                            <table class="table table-striped table-bordered">
                                <th>School Year</th>
                                <th>Grading Period</th>
                                <th>Subject</th>
                                <th>Grade</th>

                                <?php 

                                    $sql = "SELECT * FROM scholar JOIN s_academicsummary as acads on scholar.scholarID = acads.scholarID JOIN s_grades as grade on acads.academicID = grade.academicID WHERE scholar.scholarID = '$scholarID'";
                                    $sv = mysqli_query($con, $sql);

                                    while($res = mysqli_fetch_array($sv)){
                                        echo '<tr>
                                            <td>'.$res['schoolYr'].'</td>
                                            <td>'.$res['semester'].'</td>
                                            <td>'.$res['subject'].'</td>
                                            <td>'.$res['grade'].'</td>
                                            </tr>';
                                    }
                                ?>
                            </table>
                </div>
            </div>
        </div>            
    </section>

  

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>
