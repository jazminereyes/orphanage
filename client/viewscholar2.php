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
      
      /*.example-modal .modal {
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
      }*/

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
    <section id="contact">
      <div class="container" style="float: none; margin: auto;">
        <div class="row text-center">
            <div class="col-lg-2 center-block"></div>
            <div class="col-lg-3 center-block">
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

                            echo '<a href="viewscholarexpense.php?scholarid='.$res['scholarID'].'" name="expenses" class="btn btn-success btn-flat" id="btn2">EXPENSES</a><br/><br/>
                            <a href="viewscholarmed.php?scholarid='.$res['scholarID'].'" name="medical" class="btn btn-success" id="btn4">MEDICAL</a><br/><br/>
                            <a href="viewscholaracad.php?scholarid='.$res['scholarID'].'" name="academics" class="btn btn-success" id="btn5">ACADEMICS</a><br/><br/>';
                        ?>      
                    </div>
                </div><br/><br/>
            </div>

            <div class="col-lg-5 center-block">
                <div class="card">  
                    <div class="card-body">
                        <h3>INFORMATION</h3>
                            <?php
                                $sql = "SELECT scholarID, caseNo, nickname, birthdate, currentYrLevel, school FROM person JOIN scholar on scholar.personID = person.personID WHERE scholar.scholarID = '$scholarID'";

                                $qry = mysqli_query($con, $sql);
                                $res = mysqli_fetch_array($qry);
                            ?>
                            <div class="form-inline">
                                <label for="caseNo">Case Number:</label>
                                <input class="form-control" value=<?php echo $res['caseNo']?> readonly />
                            </div><br/>

                            <div class="form-inline">
                                <label for="caseStatus">Nickname:</label>
                                <input class="form-control" <?php echo $res['nickname']?> style="margin-left: 33px" readonly />
                            </div><br/>

                            <?php 
                                $bday = $res['birthdate'];
                                $bday = date("M-d-Y", strtotime($bday));

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
                            ?>
                            
                            <div class="form-inline">
                                <label for="birthdate">Birthdate:</label>
                                <input class="form-control" value=<?php echo $bday ?> style="margin-left: 40px" readonly />
                            </div><br/>

                            <div class="form-inline">
                                <label for="school">School:</label>
                                <input class="form-control" <?php echo 'value="'.$res['school'].'"' ?> style="margin-left: 60px" readonly />
                            </div><br/>

                            <div class="form-inline">
                                <label for="yearlvl">Year Level:</label>
                                <input class="form-control" <?php echo 'value="'.$yrlvl.'"' ?> style="margin-left: 33px" readonly />
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-9">
            <div style='padding: 15px;'>
         <div class='content'>
            <div class='tabbed_content'>
               <div class='tabs'>
                  <div class='moving_bg'>
                     &nbsp;
                  </div>
                  <span class='tab_item'>
                  Expenses
                  </span>
                  <span class='tab_item'>
                  Medical
                  </span>
                  <span class='tab_item'>
                  Academics
                  </span>
               </div>
               <div class='slide_content'>
                  <div class='tabslider'>
                     <ul>
                        <li>
                           <a href='#'>
                           Twitter
                           </a>
                        </li>
                        <li>
                           <a href='#'>
                           Facebook
                           </a>
                        </li>
                        <li><a>Chitranshu</a></li>
                        <li>
                           <a href='#'>
                           Google+
                           </a>
                        </li>
                        <li>
                        </li>
                     </ul>
                     <ul>
                        <li>
                           <a href='#'>
                           Php
                           </a>
                        </li>
                        <li>
                           <a href='#'>
                           Java Script
                           </a>
                        </li>
                        <li>
                           <a href='#'>
                           jQuery
                           </a>
                        </li>
                     </ul>
                     <ul>
                        <li>
                           <a href='#'>
                           Design
                           </a>
                        </li>
                        <li>
                           <a href='#'>
                           Illustration
                           </a>
                        </li>
                        <li>
                           <a href='#'>
                           Optimization
                        </li>
                     </ul>
                     <br style='clear: both' />
                  </div>
               </div>
               <br />
               <br />
               <br style='clear: both' />
            </div>
         </div>
         <br />
         <br />
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
