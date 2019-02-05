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
        $code = $_GET["code"];

        require('../connection.php');
       
        $query = "SELECT * FROM person JOIN sponsor ON person.personID = sponsor.personID JOIN user on user.personID = person.personID WHERE applicationCode = '".$code."'";
        $res = mysqli_query($con, $query);
        $rec = mysqli_fetch_array($res);

        if($rec['applicationStatus'] == "P"){
          $stat =  "<label>Application Status:</label>
                 <span>Pending</span><br/>";
        }
        elseif($rec['applicationStatus'] == "A"){
          $stat = "<label>Application Status:</label>
                 <span>Accepted</span><br/>
                 <button type='button' class='btn btn-block btn-flat btn-success' data-toggle='modal' data-target='#modalAccount'>View Account Information</button> ";
        }

        $uname = $rec['email'];
        $pword = $rec['password'];
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
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">My Application</h2>
          </div>
        </div>
          <div class="row text-center" >
            <div class="col-md-3">
                <div class="card box" style="background-color: rgba(200, 236, 236, 0.55)">
                  <div class="card-body">
                     <img src="img/no-image.jpg" style="width: 120px; height: 120px; margin-bottom: 20px;">
                     <h5><?php echo $rec['firstName']." ".$rec['lastName']; ?></h5>
                     <span class="section-subheading text-muted">Sponsor</span>
                     <hr>
                     <label>Application Date:</label>
                     <span><?php echo $rec['submissionDate'] ?></span><br/>
                     <?php echo $stat ?>
                  </div>
                </div>
            </div>
            <div class="col-md-9">
               <div class="card" style="background-color: rgba(200, 236, 236, 0.55)">
                 <div class="card-header">
                    <h4>Application Form Details</h4>
                 </div>
                 <div class="card-body">
                    <div class='row'>
            <div class='col-md-4'>
              <label for='cname'>Sponsor Name</label>
              <input type='text' class='form-control' name='cname' value='<?php echo $rec["firstName"]." ".$rec['lastName']; ?>' disabled/><br/>
            </div>
            <div class='col-md-4'>
              <label for='refdate'>Birthdate</label>
              <input type='text' class='form-control' name='bdate' value='<?php echo $rec["birthdate"] ?>'disabled /><br/>
            </div>
            <div class='col-md-4'>
              <label for='swemail' id='semail'>Contact Number</label>
              <input type='text' class='form-control' name='swemail' value='<?php echo $rec["telNo"] ?>' disabled/><br/>
            </div>

          </div>
            <div class='row'>
            <div class='col-md-6'>
              <label for='place'>Address</label>
              <input type='text' class='form-control' name='place' value='<?php echo $rec["street"]." ".$rec["city"]." ".$rec["country"]." ".$rec["zip"]; ?>' disabled /><br/>
            </div>
            <div class='col-md-6'>
              <label for='swname'>Email</label>
              <input type='text' class='form-control' name='swname' value='<?php echo $rec["email"] ?>' disabled/><br/>
            </div>
            </div>
            <div class='row'>
            <div class='col-md-4'>
              <label for='swemail'>Donation Type</label>
              <input type='text' class='form-control' name='swemail' value='<?php echo $rec["donationType"] ?>' disabled/><br/>
            </div>
            <div class='col-md-4'>
              <label for='swemail'>Scholar Count</label>
              <input type='text' class='form-control' name='swemail' value='<?php echo $rec["scholarCount"] ?>' disabled/>
            </div>
            <div class='col-md-4'>
              <label for='swemail'>Amount</label>
              <div class='input-group'>
                <div class='input-group-prepend'>
                  <span class='input-group-text'>Php</span>
                </div>
                <input type='text' class='form-control' name='swemail' value='<?php echo $rec["amount"] ?>' disabled/><br/>
                <div class='input-group-append'>
                  <span class='input-group-text'>.00</span>
                </div>
              </div> 
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
