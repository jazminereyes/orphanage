<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Sliding Tab</title>
      <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
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
      <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'> -->

      <!-- Custom styles for this template -->
      <link href="css/agency.min.css" rel="stylesheet">
      <link href="css/agency.css" rel="stylesheet">
      <link href="../font/css/all.css" rel="stylesheet"> <!--load all styles -->

      <!-- MDB -->
      <link href="css/mdb/css/mdb.css" rel="stylesheet">
      <link href="css/mdb/css/style.css" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="css/style.css">


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

      .footer{
         padding: 0px;
      }
    </style> 

   </head>
   <body>

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

<section id="contact">
   <div class="container" style="float: none; margin: auto;">

      <?php
              $uid = $_SESSION["user"];
              echo '<a href="sponsorprofile.php?scholarid='.$uid.'"><span class="fa-stack fa-1x">
              <i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-arrow-left fa-stack-1x fa-inverse text-light"></i></span></a>';
            ?>

     <br/>
     <br/>
      <div class="row text-center">
         <div class="col-md-3 center-block">
            <div class="card" style="background-color: #F5F5F5">
               <div class="card-body">
                  <?php
                     $scholarID = $_GET['scholarid'];
                     
                     require('../connection.php');
                     $sql = "SELECT * FROM person JOIN scholar on scholar.personID = person.personID WHERE scholar.scholarID = '$scholarID'";
                     
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

                     $yrlvl = $res['currentYrLevel'];

                                if($yrlvl == "Elem_G1"){
                                    $yrlvl = "Elementary - Grade 1";
                                }
                                elseif($yrlvl == "Elem_G2"){
                                    $yrlvl = "Elementary - Grade 2";
                                }
                                elseif($yrlvl == "Elem_G3"){
                                    $yrlvl = "Elementary - Grade 3";
                                }
                                elseif($yrlvl == "Elem_G4"){
                                    $yrlvl = "Elementary - Grade 4";
                                }
                                elseif($yrlvl == "Elem_G5"){
                                    $yrlvl = "Elementary - Grade 5";
                                }
                                elseif($yrlvl == "Elem_G6"){
                                    $yrlvl = "Elementary - Grade 6";
                                }
                                elseif($yrlvl == "HS_G7"){
                                    $yrlvl = "High School - Grade 7";
                                }
                                elseif($yrlvl == "HS_G8"){
                                    $yrlvl = "High School - Grade 8";
                                }
                                elseif($yrlvl == "HS_G9"){
                                    $yrlvl = "High School - Grade 9";
                                }
                                elseif($yrlvl == "HS_G10"){
                                    $yrlvl = "High School - Grade 10";
                                }
                                elseif($yrlvl == "SHS_G11"){
                                    $yrlvl = "SHS - Grade 11";
                                }
                                elseif($yrlvl == "SHS_G12"){
                                    $yrlvl = "SHS - Grade 12";
                                }

                     $bday = $res['birthdate'];
                     $bday = date("M-d-Y", strtotime($bday));
                     

                     echo '<img src="'.$src.'" class="photo" height="100" width="100"/> ';
                     echo '<p><strong>'.$res['firstName']." ".$res['lastName'].'</strong></p>';
                     echo '<hr>';
                     echo '<div align="left">
                           <span>'.$res['birthdate'].' yrs. old</span><br/>
                           <span>'.$bday.'</span><br/>
                           <span>'.$yrlvl.'</span><br/>
                           <span>'.$res['school'].'</span><br/>
                           </div>';
                     echo '<hr>';
                     
                     ?>      
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <ul class="nav nav-tabs nav-justified" style="margin-top: 30px;">
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
   </div>
</section>

      <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='http://allurewebsolutions.com/allure.js'></script>
    <script  src="js/index.js"></script>
   </body>
</html>