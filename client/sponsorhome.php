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

     <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/profile.css">
  <link rel="stylesheet" type="text/css" href="css/s_profile.css">
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

    <?php

        $userid = $_SESSION["user"];
        $query = "SELECT * FROM user JOIN person JOIN sponsor ON user.personID = person.personID AND person.personID = sponsor.personID WHERE userID = '$userid'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
      ?>

    <!-- Services -->
    <section id="contact">
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
                    <a href="#" class="link"><i class="nc-icon-glyph ui-1_home-51" style="color: black"></i> Profile</a>
                  </li>
                  <li>
                    <a href="#referrals"><i class="nc-icon-glyph shopping_cash-register" style="color: black"></i> Scholars</a>
                  </li>
                  <li>
                    <a href="password-recover-2.html"><i class="nc-icon-glyph objects_key-26" style="color: black"></i> Password</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </section>

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
