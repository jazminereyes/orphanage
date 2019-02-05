<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();

        if(isset($_SESSION['user'])){

    require ('../connection.php');
    $userid = $_SESSION['user'];
    $q = "SELECT type FROM user JOIN person ON user.personID = person.personID WHERE userID = '$userid'";
    $res = mysqli_query($con, $q);
    $rec = mysqli_fetch_row($res);

    if($rec[0]=="SP"){
    $nav = '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="sponsorprofile.php">My Account</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="cashinflow.php">Cash Inflow</a>
                  </li>';
    $link = '<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../logout.php">Sign Out</a>
            </li>';
    }
    elseif($rec[0]=="SW"){
    $nav = '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="profile.php">My Account</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="profile.php#referrals">Referrals</a>
                  </li>';
    $link = '<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../logout.php">Sign Out</a>
            </li>';
    }

  }
  else{

    $nav = '<li class="nav-item dropdown">
                <a class="nav-link js-scroll-trigger dropdown-toggle" data-toggle="dropdown" href="#">View Application</a>
                <ul class="dropdown-menu">
                  <li><a data-toggle="modal" data-target="#modalSponsor">Sponsor</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#modalScholar">Scholar</a></li>
                </ul>
              </li>';

    $link = '<li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#newLog">Sign In</a>
              </li>';
  }
    ?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
       require('../connection.php');
       $userID = $_SESSION['user'];

       $q = "SELECT firstName, lastName FROM person JOIN user ON person.personID = user.personID WHERE userID = '$userID'";
       $r = mysqli_query($con, $q);
       $s = mysqli_fetch_row($r);

       echo "<title>".$s[0]." ".$s[1]." | Home </title>";
    ?>
    
     <!--OTHERS-->
     <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:300,400,700,800' rel='stylesheet' />
     <link rel="stylesheet" href="assets/css/icons/nucleo.css"/>
  <link rel="stylesheet" href="assets/js/libs/animate.css/animate.min.css"/>
  <!-- BEGIN PAGE STYLE -->
  <link rel="stylesheet" href="assets/css/pages.css"/>
  <!-- END PAGE STYLE -->
  <link rel="stylesheet" href="assets/css/buttons.css"/>
  <link rel="stylesheet" href="assets/css/builder.css"/>
  <link rel="stylesheet" href="assets/css/colors.css"/>
  <link rel="stylesheet" href="assets/css/footers.css"/>    
  <link rel="stylesheet" href="assets/css/main.css"/>
  <link rel="stylesheet" href="assets/css/nav.css"/>
  <link rel="stylesheet" href="assets/css/preloader.css"/>
  <link rel="stylesheet" href="assets/css/themes.css"/>
  <link rel="stylesheet" href="assets/css/ui.css"/>
  <link rel="stylesheet" href="assets/css/widgets.css"/>
  <script src="assets/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>

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

      a 
      {
          font-family: 'Open Sans';
          color: gray;
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
            <?php echo $nav ?>
            <?php echo $link ?>
          </ul>
        </div>
      </div>
    </nav>

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
     <!-- BEGIN MAIN CONTENT -->
     <div id="main-content" class="account">
      <!-- BEGIN HEADER -->
      <header class="section-header header-sm t-dark">
        <!-- <div class="container top-element">
          <div class="row top-text">
            <div class="col-lg-12 text-center">
                <i class="nc-icon-outline users_single-01 header-icon"></i>
            </div>
          </div>
          <div class="row top-text">
              <div class="col-lg-12 text-center">
              <h1 class="header-title t-important m-b-0">My Account</h1>
                </div>
        </div>
        </div> -->
      </header>
      <!-- END HEADER -->

      <?php

        $userid = $_SESSION["user"];
        $query = "SELECT * FROM user JOIN person JOIN socialworker ON user.personID = person.personID AND person.personID = socialworker.personID WHERE userID = '$userid'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
      ?>
      
      <section class="section" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4">
            <div class="card box">
              <div class="card-header">
                <div class="row">
                  <div class="col-3">
                    <i class="nc-icon-outline users_single-01 header-icon float-left"></i>
                  </div>
                  <div class="col-8">
                    <label style="font-size: 1.4em"><?php echo $row['firstName']." ".$row['lastName']; ?></label><br/>
                  <span><?php echo $row['programType']; ?></span>
                  </div>
                </div>
              </div>
              <div class="account-menu">
                <ul>
                  <li>
                    <a href="profile.php" ><i class="nc-icon-glyph ui-1_home-51" style="color: black"></i> Profile</a>
                  </li>
                  <li>
                    <a href="#" class="link"><i class="nc-icon-glyph shopping_cash-register" style="color: black"></i> Referrals</a>
                  </li>
                  <li>
                    <a href="password-recover-2.html"><i class="nc-icon-glyph objects_key-26" style="color: black"></i> Password</a>
                  </li>
                </ul>
              </div>
            </div>
              
            </div>

             <div class="col-md-9">
              <div class="card box">
                <div class="card-header">
                  <span style="font-size: 1.8em">Referrals</span>
                    <a href="referral.php" class="pull-right btn btn-bordered btn-sm btn-dark">REFER A CHILD</a>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                  <th>Child Name</th>
                    <th>Referral Date</th>
                    <th>Status</th>
                    <th>Action</th>

                    <?php
                        require ('../connection.php');

                        $userid = $_SESSION["user"];
                        $query = "SELECT * FROM user JOIN person JOIN socialworker JOIN o_referral ON user.personID = person.personID AND person.personID = socialworker.personID AND socialworker.socialWorkerID = o_referral.socialWorkerID WHERE userID = '$userid'";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result)==0)
                        {
                            echo "<tr><td colspan='4'>No referrals yet.</td></tr>";
                        }
                        else
                        {
                            $row = mysqli_fetch_array($result);
                            $swid = $row['socialWorkerID'];


                            $query2 = "SELECT * FROM person JOIN orphan JOIN o_referral JOIN o_referraldocs ON person.personID = orphan.personID AND orphan.orphanID = o_referral.orphanID AND o_referral.referralID = o_referraldocs.referralID WHERE socialWorkerID = '$swid'";
                            $res = mysqli_query($con, $query2);
                            
                            while($rec=mysqli_fetch_array($res))
                            {
                              $count = 0;

                              if($rec["applicationStatus"]=="Pending")
                              {
                                $status = "<span class='badge badge-warning'>Pending</span>";
                              }
                              elseif($rec["applicationStatus"]=="Accepted")
                              {
                                $status = "<span class='badge badge-success'>Accepted</span>";
                              }

                              if(!empty($rec["photo"]))
                              {
                                $count++;
                              }

                              if(!empty($rec["referralLetter"]))
                              {
                                $count++;
                              }

                              if(!empty($rec["brgyBlotter"]))
                              {
                                $count++;
                              }

                              if(!empty($rec["medicalAbstract"]))
                              {
                                $count++;
                              }

                              if(!empty($rec["birthCertificate"]))
                              {
                                $count++;
                              }

                              $id = $rec["orphanID"];

                              echo "<tr>";
                              echo "<td>".$rec["firstName"]." ".$rec["lastName"]."</td>";
                              echo "<td>".$rec["referralDate"]."</td>";
                              echo "<td>".$status."</td>";

                              if($count<5)
                              {
                                echo "<td><a href='adddocs.php?orphanid=".$id."' class='btn btn-dark btn-sm'><i class='fa fa-plus text-light'></i>Add Documents</a></td>";
                              }

                              else
                              {
                                echo "<td><span class='badge badge-success'>Documents completed.</span></td>";
                              }
                                
                              echo "</tr>";
                            }
                        }
                    ?>
                </table>
                </div>
              </div>
          </div>
            </div>
            <div id="referrals" class="row">
            <div class="col-md-6">
              <div class="card box">
                <div class="card-header">
                  <h3>Referral Details</h3>
                </div>

                <?php
                        require ('../connection.php');

                        $userid = $_SESSION["user"];
                        $orphanid = $_GET["orphanid"];
                        $query = "SELECT * FROM person JOIN orphan JOIN o_referral JOIN o_referraldocs ON person.personID = orphan.personID AND orphan.orphanID = o_referral.orphanID AND o_referral.referralID = o_referraldocs.referralID WHERE orphan.orphanID = '$orphanid'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);

                        if($row["gender"]=="F")
                        {
                            $gender = "Female";
                        }

                        else
                        {
                            $gender = "Male";
                        }
                ?>
                <div class="card-body">
                  <table class="table table-stripped tbl">
                  <tbody style="text-align: left;">
                    <tr>
                      <td width="5%"></td>
                      <td width="30%"><span class='lbl'>Child Name</span></td>
                      <td width="30%"><span class='info'><?php echo $row["firstName"]." ".$row["lastName"]; ?></span></td>
                      <td width="30%"></td>
                    </tr>
                    <tr>
                      <td width="5%"></td>
                      <td><span class='lbl'>Gender</span></td>
                      <td><span class='info'><?php echo $gender; ?></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td width="5%"></td>
                      <td><span class='lbl'>Place Found</span></td>
                      <td><span class='info'><?php echo $row["placeFound"]; ?></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td width="5%"></td>
                      <td><span class='lbl'>Case Status</span></td>
                      <td><span class='info'><?php echo $row["caseStatus"]; ?></span></td>
                      <td></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
              <div class="col-md-6">
                <div class="card box">
                  <div class="card-header">
                    <span style="font-size: 1.8em">Referral Documents</span>
                  </div>
                  <div class="card-body">
                    <label>Child Photo:&nbsp;&nbsp;Submitted</label><br/>
            <label>Referral Letter:&nbsp;&nbsp;Submitted</label><br/>
            <label>Medical Abstract:&nbsp;&nbsp;Submitted</label>
            <form method="post" action="updatedocs.php" enctype="multipart/form-data">
              <?php
                echo "<input type='hidden' name='referraldocsid' value='".$row["referraldocsID"]."'/>";

                if(!empty($row["birthCertificate"]))
                {
                    echo "<label>Birth Certificate: &nbsp;&nbsp;Submitted</label><br/>";
                }

                else
                {
                  echo "<label>Birth Certificate: &nbsp;&nbsp;<input type='file' name='birth'/></label><br/>";
                }

                if(!empty($row["brgyBlotter"]))
                {
                  echo "<label>Brgy. Blotter: &nbsp;&nbsp;Submitted</label>";
                }

                else
                {
                  echo "<label>Brgy. Blotter: &nbsp;&nbsp;<input type='file' name='blotter'/></label>";
                }
              ?>
              <input type="hidden" value="<?php echo $orphanid?>" name="oid" />
              <input type="submit" value="Update Documents" name="submit" class="btn btn-danger pull-right"/>
            </form>
                    
                  </div>
                </div>
              </div>              
            </div>
        </div>
      </section>
    </div>
    <!-- END MAIN CONTENT -->
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

        <script src="assets/js/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/libs/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/js/libs/gsap/src/minified/TweenMax.min.js"></script>
  <script src="assets/js/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
  <script src="assets/js/libs/tether/dist/js/tether.min.js"></script>
  <script src="assets/js/libs/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/js/libs/superfish/dist/js/superfish.min.js"></script>
  <script src="assets/js/libs/appear/jquery.appear.js"></script>
  <script src="assets/js/libs/skrollr/dist/skrollr.min.js"></script>  
  <script src="assets/js/libs/easyticker-jquery/jquery.easy-ticker.min.js"></script>
  <script src="assets/js/navigation.js"></script>
  <script src="assets/js/search.js"></script>
  <script src="assets/js/builder.js"></script>
  <script src="assets/js/widgets.js"></script>
  <script src="assets/js/main.js"></script>

  </body>

</html>
