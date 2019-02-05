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
     <!-- BEGIN MAIN CONTENT -->
     <div id="main-content" class="account">
      <!-- BEGIN HEADER -->
      <header class="section-header header-sm t-dark">
        <div class="container top-element">
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
        </div>
      </header>
      <!-- END HEADER -->

      <section class="section">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4">
              <div class="account-menu m-b-30">
                <ul>
                  <li>
                    <a href="profile.php"><i class="nc-icon-glyph ui-1_home-51"></i> Profile</a>
                  </li>
                  <li>
                    <a href="myreferrals.php"><i class="nc-icon-glyph shopping_cash-register"></i> Referrals</a>
                  </li>
                  <li>
                    <a href="password-recover-2.html"><i class="nc-icon-glyph objects_key-26"></i> Password</a>
                  </li>
                </ul>
              </div>
            </div>

             <div class="col-lg-8  col-md-7 offset-lg-1 offset-md-1">
              <a href="referral.php" class="pull-right btn btn-bordered btn-sm btn-dark">REFER A CHILD</a><br/><br/>
              <div class="account-section">
                <h3>My Referrals</h3>
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
                                $status = "Pending";
                              }
                              elseif($rec["applicationStatus"]=="Accepted")
                              {
                                $status = "Accepted";
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

                              echo "<tr>";
                              echo "<td>".$rec["firstName"]." ".$rec["lastName"]."</td>";
                              echo "<td>".$rec["referralDate"]."</td>";
                              echo "<td>".$status."</td>";

                              if($count<5)
                              {
                                echo "<td><a href='adddocs.php?orphanid=".$rec["orphanID"]."' class='btn btn-dark'>Add Documents</a></td>";
                              }

                              else
                              {
                                echo "<td></td>";
                              }
                                
                              echo "</tr>";
                            }
                        }
                    ?>
                </table>
              </div>
              <div class="account-section">
                <h3>My Orders</h3>
                <ul>
                  <li>
                    <a href="#">Orders History</a>
                  </li>
                  <li>
                    <a href="#">Coupon Codes</a>
                  </li>
                  <li>
                    <a href="#">Payment Settings</a>
                  </li>
                  <li>
                    <a href="#">Returns Requests</a>
                  </li>
                  <li>
                    <a href="#">Download Invoices</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- END MAIN CONTENT -->

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
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
