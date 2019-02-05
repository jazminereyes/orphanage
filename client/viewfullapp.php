<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Concordia Children's Services | View Sponsor Application</title>

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

    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/profile.css">

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

      .hb {
        background-color: black;
      }

      section#services {
        background-color: #212529;
        background-image: url("img/bg4.jpg");
        background-repeat: no-repeat;
        background-size: 200%;
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
              <a class="nav-link js-scroll-trigger" href="index.php#services">Services</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link js-scroll-trigger dropdown-toggle" data-toggle="dropdown" href="#">View Application</a>
              <ul class="dropdown-menu">
                <li><a data-toggle="modal" data-target="#modalSponsor">Sponsor</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalScholar">Scholar</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#newLog">Sign In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Login Modal -->
        <div class="modal fade" id="newLog">
        <div class="modal-dialog">
          <div class="modal-content loginmod">
          <div id="main-content">
      <section class="section page-login height-full img-cover">
        <div class="section-overlay" style="opacity: 0.4;"></div>
        <div class="login-inner">
          <div>
            <div class="infobox infobox-square">
              <h3>Login to my account</h3>
              <form method="post" action="index.php">
                <div class="form-group">
                  <label>E-mail</label>
                  <div class="prepend-icon">
                    <input type="text" class="form-control input-lg" name="username" placeholder="Enter your e-mail">
                    <i class="nc-icon-outline users_single-02"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="prepend-icon">
                    <input type="password" class="form-control input-lg" name="password" placeholder="Enter your password">
                    <i class="nc-icon-outline ui-1_lock-circle"></i>
                  </div>
                </div>
                <button type="submit" name="splog" value="submit" class="btn btn-lg m-t-10 btn-important btn-primary btn-block">LOGIN</button>
              </form>
              <br/>
            </div>
          </div>
        </div>
      </section>
    </div>
         
          </div>
        </div>
      </div>

    <!-- Sponsor Modal -->
    <div class="modal fade" id="modalSponsor">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Sponsor Application</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body">
              <center><label>Enter your application code</label>
            <form method="post" action="index.php">
                <input type="text" class="form-control" name="code" style="width: 200px"/>
                <input type="hidden" name="type" value="1"/>
                </center>
          </div>
        
          <!-- Modal footer -->
          <div class="modal-footer">
              <input type="submit" value="Submit" name="submit" class="btn"/>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php

   require('../connection.php');
        
                if(isset($_GET["scholarid"])){
                  $scholar_id = $_GET["scholarid"];
                }
                else{
                  $scholar_id = $_SESSION["sid"];
                  $_SESSION["sid"] = $scholar_id;
                }
    ?>

    <!-- Account Information Modal -->
    <div class="modal fade" id="modalAccount">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Account Information</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body">
              <center><label>Enter your application code</label>
                <label>Username</label>
                <input type="text" class="form-control" value="<?php echo $uname?>" />
                <label>Password</label>
                <input type="text" class="form-control" value="<?php echo $pword ?>"/>
              </center>
          </div>
        
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Scholar Modal -->
    <div class="modal fade" id="modalScholar">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Scholar Application</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          
            <!-- Modal body -->
            <div class="modal-body">
                <center><label>Enter your application code</label>
              <form method="post" action="index.php">
                  <input type="text" class="form-control" name="code" style="width: 200px"/>
                  <input type="hidden" name="type" value="2"/>
                  </center>
            </div>
          
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" value="Submit" name="submit" class="btn"/>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Orphan Modal -->
    <div class="modal fade" id="modalOrphan">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Orphan Application</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          
            <!-- Modal body -->
            <div class="modal-body">
                <center><label>Enter your application code</label>
              <form method="post" action="index.php">
                  <input type="text" class="form-control" name="code" style="width: 200px"/>
                  <input type="hidden" name="type" value="orphan"/>
                  </center>
            </div>
          
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" value="Submit" name="submit" class="btn"/>
              </form>
            </div>
          </div>
        </div>
      </div>

    <?php 

            $sel = "SELECT firstName, lastName, applicationCode from person join scholar on person.personID = scholar.personID JOIN s_appform as app on scholar.scholarAppID = app.scholarAppID where scholarID = 'scholar_id'";
            $asd = mysqli_query($con, $sel);
            $get = mysqli_fetch_array($asd);
            $code = $get['applicationCode'];
            $name = "<center><h3>".$get['firstName']." ".$get['lastName']."</h3></center>";

            ?>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">My Application</h2>
            <?php echo $name ?>
          </div>
        </div>
          <div class="row text-center" >
            <div class="col-md-12">
                <div class="card box" style="background-color: rgba(200, 236, 236, 0.55)">
                  <div class="card-header">
                    <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active tb" href="#tab_1" data-toggle="tab">Basic Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Medical Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Child Hobbies</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Family Background</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Expenditures</a></li>
                  </div>
                  <div class="card-body">
                     <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">

                    <?php

                    $sel = "SELECT * FROM person as p JOIN scholar as s on s.personID = p.personID JOIN s_appform as app ON s.scholarAppID = app.scholarAppID WHERE s.scholarID = '$scholar_id'";
                    $qry = mysqli_query($con, $sel);
                    $rec = mysqli_fetch_array($qry);

                    if($rec['nickname'] == ""){
                      $nickname = '<input type="text" class="form-control" name="nickname" value="none" disabled/>';
                    }
                    else{
                      $nickname = '<input type="text" class="form-control" name="nickname" value="'.$rec['nickname'].'" disabled/>';
                    }


                    ?>
                      <div class="row">
                        <div class="col-4">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first" value="<?php echo $rec['firstName'] ?>" disabled />
                        </div>  
                        <div class="col-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle" value="<?php echo $rec['middleName'] ?>"  disabled />
                        </div>  
                        <div class="col-4">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last" value="<?php echo $rec['lastName'] ?>"  disabled />
                        </div>  
                      </div>
                      <br/>                      
                      <div class="row">
                        <div class="col-4">
                        <label for="inputName">Nickname</label>
                        <?php echo $nickname ?>
                        </div>
                        <div class="col-4">
                        <label for="inputName">Birthdate</label>
                        <input type="text" class="form-control" name="birthdate" value="<?php echo $rec['birthdate'] ?>"  disabled />
                        </div>
                        <div class="col-4">
                        <label>Gender</label>
                        <?php

                        if($rec['gender'] == 'F'){
                          $gen = 'Female';
                        }
                        else{
                          $gen = 'Male';
                        }
                        ?>
                        <input class="form-control" type="text" name="gender" value="<?php echo $gen ?>"  disabled />
                        </div>
                      </div>
                      <br/> 

                      <div class="row">
                        <div class="col-4">
                          <label>Street</label>
                          <input type="text" class="form-control" name="street" value="<?php echo $rec['street'] ?>" disabled />
                        </div>
                        <div class="col-4">
                          <label>City</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $rec['city'] ?>" disabled />
                        </div>
                        <div class="col-4">
                          <label>Zip Code</label>
                        <input type="text" class="form-control" name="zip" value="<?php echo $rec['zip'] ?>" disabled />
                        </div>
                      </div><br/> 

                      <div class="row">
                        <div class="col-6">
                          <label>Religion</label>
                          <input type="text" class="form-control" name="street" value="<?php echo $rec['religion'] ?>" disabled />
                        </div>
                        <div class="col-6">
                          <label>Last General Weighted Average</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $rec['lastSemAverage'] ?>" disabled />
                        </div>
                      </div><br/> 

                      <div class="row">
                        <div class="col-6">
                          <label>School Last Attended</label>
                          <input type="text" class="form-control" name="school" value="<?php echo $rec['school'] ?>" disabled/>
                        </div>
                        <div class="col-6">
                          <label for="cYrLevel">Highest Educational Attainment</label>
                          <?php

                          $yrlvl = $rec['currentYrLevel'];
            
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
                $yrlvl = "Senior High School - Grade 11";
            }
            elseif($yrlvl == "SHS_G12"){
                $yrlvl = "Senior High School - Grade 12";
            }

            $cl = $rec['classification'];

            if($cl == 'In_School'){
              $cl = "In School";
            }
            else{
              $cl = "Out of School";
            }

            echo '<input type="text" class="form-control" name="yr" value="'.$yrlvl.'" disabled />';
            $clf = '<input type="text" class="form-control" name="classif" value="'.$cl.'"  disabled />';

                          ?>
                        </div>
                      </div><br/>

                        <div class="row">
                          <div class="col-4">
                            <label for="inputPlace">Referred By</label>
                            <input type="text" class="form-control" name="refby" value="<?php echo $rec['referredBy'] ?>" disabled />
                          </div>
                          <div class="col-4">  
                            <label for="inputPlace">Relation</label>
                            <input type="text" class="form-control" name="rel" value="<?php echo $rec['relationToReferrer'] ?>" disabled />
                          </div>
                           <div class="col-4">
                              <label>Classification:</label>
                              <?php echo $clf ?>
                           </div>
                        </div><br/>
                  </div><!-- tab pane-->

                  <?php

                  $med = "SELECT * FROM `s_medicalreport` WHERE scholarID = '$scholar_id' ORDER BY medicalID ASC LIMIT 1";
                  $qwe = mysqli_query($con, $med);
                  $sql = mysqli_fetch_array($qwe);

                  if($sql['weight'] == "Normal Weight"){
                    $stat =  '<label>
                              <input class="flat-red" type="radio" name="illness" checked />Normarl Weight
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" disabled />Underweight
                            </label>';
                  }
                  elseif($sql['weight'] == "Underweight"){
                    $stat = '<label>
                              <input class="flat-red" type="radio" name="illness" disabled />Normarl Weight
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" checked />Underweight
                            </label>';
                  }
                  else{
                    $stat = '<label>
                              <input class="flat-red" type="radio" name="illness" disabled />Normarl Weight
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" disabled />Underweight
                            </label>';
                  }
                  ?>

                  <div class="tab-pane" id="tab_2">
                        <div class="row">
                          <div class="col-4">
                            <label>Height(cm)</label>
                            <input type="text" class="form-control" name="height" value="<?php echo $sql['height'] ?>" disabled />
                          </div>
                          <div class="col-4">
                            <label>Weight(kg)</label>
                            <input type="text" class="form-control" name="weight" value="<?php echo $sql['weight'] ?>" disabled/>
                          </div>
                          <div class="col-4">
                            <label>Weight Status</label><br/>
                            <?php echo $stat ?>
                          </div>
                        </div><br/>

                    <?php

                  $appid = $rec['scholarAppID'];

                  $get = "SELECT discolorMarks, hairColor, eyeColor, skinTone, illness, lastDateHospitalized, lastPlaceHospitalized FROM s_healthinfo as h JOIN s_appform as a on a.healthInfoID = h.healthInfoID WHERE a.scholarAppID = '$appid'";
                  $db = mysqli_query($con, $get);
                  $med = mysqli_fetch_array($db);


                  if($med['discolorMarks'] == ""){
                      $marks = '<input type="text" class="form-control" name="marks" value="none" disabled/>';
                  }
                  else{
                      $marks = '<input type="text" class="form-control" name="nickname" value="'.$rec['discolorMarks'].'" disabled/>';
                  }

                  if($med['illness'] == "none" || $med['illness'] == ""){
                    $illness = '
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="yes" disabled>Yes
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="None" checked />No
                            </label>';
                    $spec = '<input type="text" class="form-control" name="illness" style="width: 70%" value="'.$med['illness'].'" disabled />';
                  }
                  else{
                    $illness =  '
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="yes" checked />Yes
                            </label>&nbsp&nbsp&nbsp&nbsp
                            <label>
                              <input class="flat-red" type="radio" name="illness" value="None" disabled />No
                            </label>';
                    $spec = '<input type="text" class="form-control" name="illness" style="width: 70%" value="'.$med['illness'].'" disabled />';
                  }

                  ?>
                        <div class="row">
                          <div class="col-3">
                            <label>Distinguishing Marks (if any)</label>
                            <?php echo $marks ?>
                          </div>
                          <div class="col-3">
                            <label>Hair Color</label>
                            <input type="text" class="form-control" name="hairColor" value="<?php echo $med['hairColor'] ?>" disabled />
                          </div>
                          <div class="col-3">
                            <label>Eye Color</label>
                            <input type="text" class="form-control" name="eyeColor" value="<?php echo $med['eyeColor'] ?>" disabled />
                          </div>
                          <div class="col-3">
                            <label>Skin Tone</label>
                            <input type="text" class="form-control" name="skinTone" value="<?php echo $med['skinTone'] ?>" disabled />
                          </div>
                        </div><br/>

                        <div class="row">
                          <div class="col-5">
                            <label>Does the child have an illness?</label>&nbsp&nbsp&nbsp&nbsp
                            <?php echo $illness ?>
                          </div>
                          <div class="col-6 form-inline">
                            <label>Specify Illness</label>&nbsp&nbsp&nbsp&nbsp
                            <?php echo $spec ?>
                          </div>
                        </div>
                        
                        <div class="form-inline">
                        <label>When was the child last hospitalized?</label>
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="form-control" name="lastdhp" style="width: 40%" value="<?php echo $med['lastDateHospitalized'] ?>" disabled/> 
                        <br/><br/><br/>
                        </div>
                        <div class="form-inline">
                        <label>Where was the child last hospitalized?</label>&nbsp&nbsp&nbsp&nbsp
                        <input type="text" class="form-control" name="lastph" style="width: 50%" value="<?php echo $med['lastPlaceHospitalized'] ?>" disabled /> 
                        <br/><br/> <br/> 
                        </div>
                        </div><!-- tab pane-->

                        <div class="tab-pane" id="tab_3">

                        <?php 

                        $sel = "SELECT homeActivity, outsideActivity, faveSubject, faveSport, extracoActivities, ambition FROM s_hobbies as h JOIN s_appform as a ON a.hobbyID = h.hobbyID WHERE a.scholarAppID = '$appid'";
                        $s = mysqli_query($con, $sel);
                        $hobby = mysqli_fetch_array($s);

                        ?>

                            <div class="row">
                              <div class="col-6">
                                <label>Child Activities at Home</label>
                                <textarea class="form-control" name="homeActivity" disabled><?php echo $hobby['homeActivity']?></textarea>
                              </div>
                              <div class="col-6">
                                <label>Child activities outside</label>
                                 <textarea class="form-control" name="outsideActivity" disabled><?php echo $hobby['outsideActivity']?></textarea>
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>Favorite subject/s</label>
                                <textarea class="form-control" name="faveSubject" disabled><?php echo $hobby['faveSubject']?></textarea>
                              </div>
                              <div class="col-6">
                                <label>Favorite sport/s</label>
                                <textarea class="form-control" name="faveSport" disabled><?php echo $hobby['faveSport']?></textarea>
                              </div>
                            </div><br/>
                            
                            <div class="row">
                              <div class="col-6">
                                <label>Extra-curricular activities</label>
                                <textarea class="form-control" name="extracoActivities" disabled><?php echo $hobby['extracoActivities']?></textarea>
                              </div>
                              <div class="col-6">
                                <label>Ambition</label>
                                <textarea class="form-control" name="ambition" disabled><?php echo $hobby['ambition']?></textarea>
                              </div>
                            </div><br/>
                        </div><!-- /.tab-pane -->
                  
                        <div class="tab-pane" id="tab_4">

                        <?php

                        $sel4 = "SELECT * FROM s_parentinfo as p JOIN s_familybground as f on p.familyBgroundID = f.familyBgroundID JOIN s_appform as a on f.scholarAppID = a.scholarAppID WHERE a.scholarAppID = '$appid'";
                        $sql2 = mysqli_query($con, $sel4);
                        

                        while($parent = mysqli_fetch_array($sql2)){

                          if($parent['relationType'] == "Mother"){
                            $mname = $parent['name'];
                            $mbday = $parent['birthdate'];
                            $mcno = $parent['contactNo'];
                            $moccu = $parent['occupation'];
                            $mincome = $parent['income'];
                            $mcity = $parent['city'];
                            $mprov = $parent['province'];
                            $mstat = $parent['civilStatus'];
                            $mdom = $parent['dateOfMarriage'];
                            if($mdom == ""){
                              $mdom = '<input type="text" class="form-control" name="mdateOfMarriage" value="" disabled />';
                            }
                            else{
                              $mdom = '<input type="text" class="form-control" name="mdateOfMarriage" value="'.$mdom.'" disabled />';
                            }
                            $mpom = $parent['placeOfMarriage'];
                            if($mpom == ""){
                              $mpom = '<input type="text" class="form-control" name="mdateOfMarriage" value="" disabled />';
                            }
                            else{
                              $mpom = '<input type="text" class="form-control" name="mdateOfMarriage" value="'.$mpom.'" disabled />';
                            }
                            $msis = $parent['noOfChildren'];
                            $mmedhisto = $parent['medicalHistory'];
                          }
                          elseif($parent['relationType'] == "Father"){
                            $fname = $parent['name'];
                            $fbday = $parent['birthdate'];
                            $fcno = $parent['contactNo'];
                            $foccu = $parent['occupation'];
                            $fincome = $parent['income'];
                            $fcity = $parent['city'];
                            $fprov = $parent['province'];
                            $fstat = $parent['civilStatus'];
                            $fdom = $parent['dateOfMarriage'];
                            if($fdom == ""){
                              $fdom = '<input type="text" class="form-control" name="mdateOfMarriage" value="" disabled />';
                            }
                            else{
                              $fdom = '<input type="text" class="form-control" name="mdateOfMarriage" value="'.$fdom.'" disabled />';
                            }
                            
                            $fpom = $parent['placeOfMarriage'];

                            if($fpom == ""){
                              $fpom = '<input type="text" class="form-control" name="mdateOfMarriage" value="" disabled />';
                            }
                            else{
                              $fpom = '<input type="text" class="form-control" name="mdateOfMarriage" value="'.$fpom.'" disabled />';
                            }                            
                            $fsis = $parent['noOfChildren'];
                            $fmedhisto = $parent['medicalHistory'];
                          }

                        }

                        ?>

                          <div class="text-center"> 
                            <h3>BIRTHMOTHER</h3>
                          </div>

                            <div class="row">
                              <div class="col-6">
                                <label>Maiden Name</label>
                                <input type="text" class="form-control" name="mname" value="<?php echo $mname ?>" disabled />
                              </div>
                              <div class="col-3">
                                <label>Birthdate</label>
                                <input type="text" class="form-control" name="mbirthdate" value="<?php echo $mbday ?>" disabled /> 
                              </div>
                              <div class="col-3">
                                <label>Contact No</label>
                                <input type="number" class="form-control" name="mcno" value="<?php echo $mcno ?>" disabled /> 
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>City Address</label>
                                <input type="text" class="form-control" name="mcity" value="<?php echo $mcity ?>" disabled />
                              </div>
                              <div class="col-6">
                                <label>Province Address</label>
                                <input type="text" class="form-control" name="mprovince" value="<?php echo $mprov ?>" disabled />
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-4">
                                <label>Civil Status</label>
                                <input type="text" class="form-control" name="mcstat" value="<?php echo $mstat ?>" disabled />
                              </div>
                              <div class="col-4">
                                <label>Place of Marriage</label>
                                <?php echo $mpom ?>
                              </div>
                              <div class="col-4">
                                <label>Date of Marriage</label>
                                <?php echo $mdom ?>
                              </div>
                            </div><br/>

                            <div class="form-inline">
                            <label style="margin-right: 20px">Occupation</label>
                            <input type="text" class="form-control" id="inputPlace" name="moccu" value="<?php echo $moccu ?>" disabled /> <br/>
                            <label style="margin-left: 30px; margin-right: 20px;">Income</label>
                            <input type="text" class="form-control" id="inputPlace" name="mincome" value="<?php echo $mincome ?>" disabled/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">No. of Children</label>
                            <input type="number" class="form-control" id="inputPlace" name="msis" value="<?php echo $msis ?>" disabled /> <br/>
                            </div><br/>

                            <label for="inputPlace">Medical History</label>
                            <textarea class="form-control" id="inputPlace" name="mhisto" disabled><?php echo $mmedhisto ?></textarea> <br/>

                            <hr>
                            <div class="text-center">
                              <h3>BIRTHFATHER</h3>
                            </div>
                            

                            <div class="row">
                              <div class="col-6">
                                <label>Father Name</label>
                                <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>" disabled />
                              </div>
                              <div class="col-3">
                                <label>Birthdate</label>
                                <input type="text" class="form-control" name="fbirthdate" value="<?php echo $fbday ?>" disabled /> 
                              </div>
                              <div class="col-3">
                                <label>Contact No</label>
                                <input type="number" class="form-control" name="fcno" value="<?php echo $fcno ?>" disabled /> 
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-6">
                                <label>City Address</label>
                                <input type="text" class="form-control" name="fcity" value="<?php echo $fcity ?>" disabled />
                              </div>
                              <div class="col-6">
                                <label>Province Address</label>
                                <input type="text" class="form-control" name="fprovince" value="<?php echo $fprov ?>" disabled />
                              </div>
                            </div><br/>

                            <div class="row">
                              <div class="col-4">
                                <label>Civil Status</label>
                                <input type="text" class="form-control" name="fcstat" value="<?php echo $fstat ?>" disabled />
                              </div>
                              <div class="col-4">
                                <label>Place of Marriage</label>
                                <?php echo $fpom ?>
                              </div>
                              <div class="col-4">
                                <label>Date of Marriage</label>
                                <?php echo $fdom ?>
                              </div>
                            </div><br/>

                            <div class="form-inline">
                            <label style="margin-right: 20px">Occupation</label>
                            <input type="text" class="form-control" name="foccu" value="<?php echo $foccu ?>" disabled /> <br/>
                            <label style="margin-left: 30px; margin-right: 20px;">Income</label>
                            <input type="text" class="form-control" name="fincome" value="<?php echo $fincome ?>" disabled /> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label for="inputPlace" style="margin-right: 20px">No. of Children</label>
                            <input type="text" class="form-control" id="inputPlace" name="fbro" value="<?php echo $fsis ?>" disabled /> <br/>
                            </div><br/>

                            <label for="inputPlace">Medical History</label>
                            <textarea class="form-control" id="inputPlace" name="fhisto" disabled /><?php echo $fmedhisto ?></textarea> <br/>
                        </div><!-- tab pane -->

                        <?php 

                        $get2 = "SELECT * FROM s_expenditure as e JOIN s_appform as a on a.expenditureID = e.expenditureID WHERE a.scholarAppID = '$appid'";
                        $g = mysqli_query($con, $get2);
                        $exp = mysqli_fetch_array($g);

                        $htype = $exp['homeType'];
                        if($htype = "concrete"){
                          $htype = "Concrete";
                        }
                        elseif($htype = "semiconcrete"){
                          $htype = "Semi Concrete";
                        }
                        elseif($htype = "scraps"){
                          $htype = "Scraps of Wood/G.I Sheets";
                        }

                        $hstat = $exp['homeType'];
                        if($hstat = "owned"){
                          $hstat = "Owned";
                        }
                        elseif($hstat = "rented"){
                          $hstat = "Rented";
                        }
                        elseif($hstat = "withrelatives"){
                          $hstat = "Living with relatives";
                        }

                        $etype = $exp['electricityType'];
                        if($etype = "illegal"){
                          $etype = "Illegal Connection";
                        }
                        elseif($etype = "shared"){
                          $etype = "Shared Electricity";
                        }
                        elseif($etype = "legal"){
                          $etype = "Legal Connection";
                        }

                        $wtype = $exp['waterType'];
                        if($wtype = "illegal"){
                          $wtype = "Illegal Connection";
                        }
                        elseif($wtype = "shared"){
                          $wtype = "Shared Water";
                        }
                        elseif($wtype = "legal"){
                          $wtype = "Legal Connection";
                        }

                         $ftype = $exp['foodType'];
                        if($ftype = "turoturo"){
                          $ftype = "Turo-turo/Lutong ulam";
                        }
                        elseif($ftype = "cooking"){
                          $ftype = "Marketing/Cooking";
                        }

                        $btype = $exp['bathroomType'];
                        if($btype = "owned"){
                          $btype = "Owned";
                        }
                        elseif($btype = "throwaway"){
                          $btype = "Throw away";
                        }
                        elseif($btype = "shared"){
                          $btype = "Shared";
                        }

                        ?>



                        <div class="tab-pane" id="tab_5">
                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px">Home Type</label>
                            <input name="htype" class="form-control" style="width: 150px" value="<?php echo $htype ?>" disabled/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Home Status </label>
                            <input name="hstat" class="form-control" style="width: 150px" value="<?php echo $hstat ?>" disabled /><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> House Monthly Cost </label>
                            <input name="houseMonthlyCost" type="number" class="form-control" style="width: 130px" value="<?php echo $exp['houseMonthlyCost']?>" disabled/> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Electricity Type </label>
                            <input name="electricityType" class="form-control" value="<?php echo $etype ?>" disabled /> 

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Electricity Monthly Cost </label>
                            <input name="electricityMonthlyCost" type="number" class="form-control" value="<?php echo $exp['electricityMonthlyCost']?>" disabled /> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px;">Water Type</label>
                            <input name="waterType" type="text" class="form-control" value="<?php echo $wtype ?>" disabled />

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Water Monthly Cost </label>
                            <input name="waterCost" type="number" class="form-control" value="<?php echo $exp['waterCost']?>" disabled /> <br/>
                            </div><br/>

                            <div class="form-inline">
                            <label class="lbl" style="margin-right: 20px"> Food Type </label>
                            <input name="foodType" type="text" class="form-control" value="<?php echo $ftype ?>" disabled />

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Individual Count </label>
                            <input name="individualCount" type="number" class="form-control" style="width: 100px" value="<?php echo $exp['individualCount']?>" disabled /><br/>

                            <label class="lbl" style="margin-right: 20px; margin-left: 30px;"> Bathroom Type </label>
                            <input name="bathType" type="text" class="form-control" value="<?php echo $btype ?>" style="width: 150px" disabled />
                            </div><br/>

                            <div class="row">
                              <div class="col-4">
                                <label>Total Annual Educational Expense </label>
                                <input name="educExpense" type="number" class="form-control" value="<?php echo $exp['educExpense']?>" readonly />
                              </div>
                              <div class="col-4">
                                <label>Total Annual Medical Expense </label>
                                <input name="medExpense" type="number" class="form-control" value="<?php echo $exp['medExpense']?>" readonly />
                              </div>
                              <div class="col-4">
                                <label>Other Expense </label>
                                <input name="otherExpense" type="number" class="form-control" value="<?php echo $exp['otherExpense']?>" readonly/>
                              </div>
                            </div>
                        </div>
                  <!-- /.tab-pane -->
                 

                </div><!-- /.tab-content -->
                  </div>
                </div>
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
