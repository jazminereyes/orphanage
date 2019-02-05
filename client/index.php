<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Concordia Children's Services Inc. | Home </title>

    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="assets/css/form.css"/>
    <link rel="stylesheet" href="assets/css/pages.css"/>
    <!-- END PAGE STYLE -->
    <link rel="stylesheet" href="assets/css/colors.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">
    <link href="../font/css/all.css" rel="stylesheet"> <!--load all styles -->

    <!-- MDB -->
    <link href="css/mdb/css/mdb.css" rel="stylesheet">
    <link href="css/mdb/css/style.css" rel="stylesheet">

    <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!--  Bootstrap core CSS -->
  <link href="../mdb/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../mdb/css/mdb.min.css" rel="stylesheet">
   <!-- SCRIPTS -->
   
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
    
    <!-- Dropdown Nav -->

    <script src="js/sweetalert.min.js"></script>
    <script>
      $('ul.nav li.dropdown').hover(function() 
      {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });
    </script>

    <style>
      @media (min-width: 992px){
       #mainNav .navbar-brand{
       font-size: 1.50em;
      }
      }

      @media (min-width: 992px){
        #mainNav.navbar-shrink .navbar-brand {
            font-size: 1.50em;
            padding: 12px 0;
        }
      }

      section#services {
        background-color: #212529;
        background-image: url("img/footer.jpg");
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: center;
      }

      .loginmod 
      {
        background-color: transparent;
      }

      .app:hover 
      {
        color: #28a745;
      }

      .ctm{
        background-color: rgba(234, 247, 239, 0.58);
      }

      .modal-dialog.modal-notify .modal-body {
          padding: 0.9em;
          color: #616161;
      }

      .navbar {
           box-shadow: 0 2px 5px 0 rgba(0,0,0,.0), 0 2px 10px 0 rgba(0,0,0,.0); 
           font-weight: 300; 
      }
      .navbar, .pagination .page-item.active .page-link {
           -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.0), 0 2px 10px 0 rgba(0,0,0,.0); 
      }


    </style>

    <script type="text/javascript">
      function forgotPass(){
        document.getElementById('inputemail').style.display = "inline-block";
      }

      function forgotPassSw(){
        document.getElementById('swemail').style.display = "inline-block";
      }
    </script>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
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
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#modalCookie">Contact Us</a>
            </li>
            <?php
              if (isset($_SESSION['user']))
              {
                require ('../connection.php');
                $userid = $_SESSION['user'];
                $q = "SELECT type FROM user JOIN person ON user.personID = person.personID WHERE userID = '$userid'";
                $res = mysqli_query($con, $q);
                $rec = mysqli_fetch_row($res);

                if($rec[0]=="SP")
                {
                  echo '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="sponsorprofile.php">My Account</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="cashinflow.php">Cash Inflow</a>
                  </li>';
                }

                elseif($rec[0]=="SW")
                {
                  echo '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="profile.php">My Account</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="myreferrals.php">Referrals</a>
                  </li>';
                }

                echo '<li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="../logout.php">Sign Out</a>
              </li>';
              }
              else
              {
                echo '<li class="nav-item dropdown">
                <a class="nav-link js-scroll-trigger dropdown-toggle" data-toggle="dropdown" href="#">View Application</a>
                <ul class="dropdown-menu">
                  <li><a data-toggle="modal" data-target="#modalSponsor">Sponsor</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#modalScholar">Scholar</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#newLog">Sign In</a>
              </li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!--Modal: modalCookie-->
<div class="modal fade top" id="modalCookie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body">
        <div class="row d-flex">
          <div class="col-md-5 text-center">
            <h6><i class="fa fa-home text-dark"></i> 4443 Sta. Mesa, Manila 1016 PHILIPPINES</h6>
          </div>
          <div class="col-md-5">
            <h6 class="text-dark">Contact Us : +632-354-6049 &nbsp|&nbsp +632-713-3462</h6>
          </div>
          <div class="col-md-2">
            <a class="pull-right" data-dismiss="modal">Close</a>
          </div>
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalCookie-->


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
              <input type="submit" value="Submit" name="submit" class="btn btn-success"/>
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

      <!-- Login Modal -->
    <div class="modal fade" id="modalLog">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          
            <!-- Modal body -->
            <div class="modal-body">
              <form method="post" action="login.php">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                </div>
                <div class="input-group mb-3" style="margin-top: 10px">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-unlock"></i></span>
                </div>
                <input type="password" name="password" class="form-control" id="inlineFormInputGroup" placeholder="Password">
                </div>
            </div>
          
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" value="Sign In" name="submit" class="btn btn-success"/>
              </form>
            </div>
          </div>
        </div>
      </div>

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
                    <i class="fa fa-mail"></i>
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
                <br/>
                <span style="margin:auto;">Forgot your password?&nbsp<a href="#" class="text-center" style="text-decoration: underline;" onclick="forgotPass()">Click here.</a></span>
              </form>
              <br/>     
              
              <div class="form-inline" id="inputemail" style="display: none; width: 100%; margin: auto">
                <form method="post" action="forgotpw.php">
                  <hr/>
                  <label>Input your registered email below:</label><br/>
                  <center>
                  <input type="email" name="sendmailto" class="form-control input-lg" style="margin: 0px">
                  <input class="btn btn-primary" type="submit" name="submit" value="Go" style="margin: 0px"></center>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </section>
    </div>
         
          </div>
        </div>
      </div>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome!</div>
          <div class="intro-heading text-uppercase">HELP US FULFILL DREAMS</div>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services" style="padding: 70px 20px 70px 20px; ">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading text-uppercase text-light">Services</h1>
          </div>
        </div><br/><br/>
        <div class="row">
          <div class="col-md-3">
            <div class="card text-center ctm">
              <div class="card-body">
                <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-success"></i>
                  <i class="fa fa-hands-helping fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Sponsor</h4>
                <p class="text-dark">Be a sponsor and be the light to children in need for them to receive quality that will transform their lives.<br/><br/></p>
                <?php
                  if (!isset($_SESSION['user']))
                  {
                    echo '<a href="sponsorapp.php" class="btn btn-lg btn-success text-light btn-outline">APPLY</a>';
                  }
                ?>
                
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center ctm">
              <div class="card-body">
                <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-success"></i>
                  <i class="fa fa-hand-holding-heart fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Donation</h4>
                <p class="text-dark">Donate to contribute to the children of Concordia's fundamental needs specifically in the area of nutrition, education, and medicine.</p>
                <a href="#" data-toggle="modal" data-target="#donateModal" class="btn btn-lg btn-success text-light">GIVE</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center ctm">
              <div class="card-body">
                <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-success"></i>
                  <i class="fa fa-user-graduate fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Scholar</h4>
                <p class="text-dark">Be a scholar and complete your studies with the help of the Educational Assistance thru Scholarship of Concordia.<br/><br/></p>
                <?php
                  if (!isset($_SESSION['user']))
                  {
                    echo '<a href="scholarapp.php" class="btn btn-lg btn-success text-light">APPLY</a>';
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center ctm">
                <div class="card-body">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                    <i class="fa fa-child fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Orphan</h4>
                  <p class="text-dark">Refer a child who might be left on the street hungry and alone without a supportive and guiding hand to provide them a safe, happy, and healthy home.</p>
                  <?php
                    if (isset($_SESSION['user']))
                    {
                      $id = $_SESSION['user'];
                      $a = "SELECT type FROM user JOIN person ON user.personID = person.personID WHERE userID = '$id'";
                      $b = mysqli_query($con, $a);
                      $c = mysqli_fetch_row($b);

                      if ($c[0]=='SW'){
                        echo '<a href="referral.php" class="btn btn-lg btn-success text-light">REFER</a>';
                      }
                    }

                    else
                    {
                      echo '<a href="#" data-toggle="modal" data-target="#logModal" class="btn btn-lg btn-success text-light">REFER</a>';
                    }
                  ?>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Login Modal -->
    <div class="modal fade" id="logModal">
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
                  <label>Email</label>
                  <div class="prepend-icon">
                    <input type="email" class="form-control input-lg" name="email" placeholder="Enter your email">
                    <i class="nc-icon-outline ui-1_email-83"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="prepend-icon">
                    <input type="password" class="form-control input-lg" name="password" placeholder="Enter your password">
                    <i class="nc-icon-outline ui-1_lock-circle"></i>
                  </div>
                </div>
                <button type="submit" name="logsw" class="btn btn-lg m-t-10 btn-important btn-primary btn-block">LOGIN</button><br/>
              </form>
              <span style="margin:auto;">Forgot your password?&nbsp<a href="#" class="text-center" style="text-decoration: none;" onclick="forgotPassSw()">Click here.</a></span><br/>
              <span>Have no social worker account? <a href="register.php" style="text-decoration: none;">Apply for referral.</a></span>
              </form>
              <br/>     
              
<!--               <div class="form-inline" id="swemail" style="display: none">
              <hr>
                <form method="post" action="forgotpw.php">
                  <label style="margin-left: 0px;">Input your registered email below:</label><br/>
                  <input type="email" name="sendmailto" class="form-control input-lg" style="margin: 0px">
                  <input class="btn btn-primary" type="submit" name="submit" value="Go" style="margin: 0px">
                </form>
              </div> -->

              <div class="form-inline" id="swemail" style="display: none; width: 100%; margin: auto">
                <form method="post" action="forgotpw.php">
                  <hr/>
                  <label>Input your registered email below:</label><br/>
                  <center>
                  <input type="email" name="sendmailto" class="form-control input-lg" style="margin: 0px">
                  <input class="btn btn-primary" type="submit" name="submit" value="Go" style="margin: 0px"></center>
                </form>
              </div>
              <br/>
              <div class="m-t-20 p-b-50 clearfix">
                
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
            </div>
        </div>
      </div>

    <!-- Login Modal -->
    <div class="modal fade" id="donateModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Donate</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          
            <!-- Modal body -->
            <div class="modal-body">
  
              <a class="btn btn-success btn-block" data-toggle="collapse" href="#collapseFund" role="button" aria-expanded="false" aria-controls="collapseFund">
              <i class="fa fa-bank"></i>&nbsp;&nbsp;BANK TRANSFER FUNDS</a><br/>

              <div class="collapse" id="collapseFund">
                <div class="card card-body">
                  <label><strong>Account Name:</strong> CONCORDIA CHILDREN’S SERVICES</label>
                  <label><strong>Bank Name:</strong> BANCO de ORO</label>
                  <label><strong>Address:</strong> EDSA corner New York Street, Cubao, Quezon City, Philippines</label>
                  <label><strong>Account Number:</strong> 4010044120</label>
                  <label><strong>Swift Code:</strong> BNORPHMM</label>
                </div>
              </div>

              <a class="btn btn-success btn-block" data-toggle="collapse" href="#collapseCheck" role="button" aria-expanded="false" aria-controls="collapseCheck">
              <i class="fa fa-money-check"></i>&nbsp;&nbsp;MAIL CHECKS</a><br/>

              <div class="collapse" id="collapseCheck">
                <div class="card card-body">
                  <label><strong>Philippine Donors</strong></label>
                  <label><strong>Concordia Children's Services Inc.</strong></label>
                  <label>4443 Old Sta. Mesa Street</label>
                  <label>Santa Mesa, Manila</label>
                  <label>Philippines</label>

                  <label><strong>US Donors (Tax deductible donations by US dollar checks)</strong></label>
                  <label><strong>Timothy Lutheran Church</strong></label>
                  <label>c/o Rev. Ron Rall</label>
                  <label>6704 Fyler Ave.</label>
                  <label>St. Louis, MO 63139</label>
                </div>
              </div>

              <a class="btn btn-success btn-block" data-toggle="collapse" href="#collapseOnline" role="button" aria-expanded="false" aria-controls="collapseOnline">
              <i class="fa fa-money-check"></i>&nbsp;&nbsp;OVERSEAS DONATIONS</a>

              <div class="collapse" id="collapseOnline">
                <div class="card card-body">
                  <label>For US residents you can make your donations thru <strong>Lutheran Church Missouri Synod</strong></label>
                </div>
              </div><br/>

              <a class="btn btn-success btn-block" data-toggle="collapse" href="#collapseDonation" role="button" aria-expanded="false" aria-controls="collapseDonation">
              <i class="fa fa-gift"></i>&nbsp;&nbsp;IN-KIND GIFTS</a>
              
              <div class="collapse" id="collapseDonation">
                <div class="card card-body">
                  <label>You can send your in-kind gifts to the address below:</label>
                  <label><strong>Concordia Children's Services, Inc.</strong></label>
                  <label>4443 Old Sta. Mesa Street</label>
                  <label>Santa Mesa, Manila</label>
                  <label>Philippines</label>
                </div>
              </div>
              
            </div>
          
            <!-- Modal footer -->
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

    <?php
    if (isset($_POST['submit'])){
		login();
	}

	function login(){
		global $code, $type; 
		$errors = [];

        $code = $_POST["code"];
        $type = $_POST["type"];

		if (empty($code)) {
            array_push($errors, "Code is required");
			echo '<script language="javascript">'; 
      echo 'swal("Application code required", "Enter application code!", "error");';
			echo '</script>'; 
		}

		else {
                require('../connection.php');
                
                if ($type=="1")
                {
                    $query = "SELECT * FROM sponsor WHERE applicationCode = '".$code."'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) == 1) {
					    $_SESSION['user'] = $logged_in_user;
					    $_SESSION['success']  = "You are now logged in";
					    echo '<script language="javascript">'; 
					    echo 'window.location.href="sponsormonitoring.php?code='.$code.'";';
					    echo '</script>'; 
				    }

				    else {
					    array_push($errors, "Wrong username/password combination");
					    echo '<script language="javascript">'; 
              echo 'swal("Error", "Invalid application code!", "error");';
					    echo '</script>'; 
				    }
                }

                else if ($type=="2")
                {
                    $query = "SELECT * FROM s_appform WHERE applicationCode = '".$code."'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) == 1) {
					    $_SESSION['user'] = $logged_in_user;
					    $_SESSION['success']  = "You are now logged in";
					    echo '<script language="javascript">'; 
					    echo 'window.location.href="scholarmonitoring.php?code='.$code.'";';
					    echo '</script>'; 
				    }

				    else {
					    array_push($errors, "Wrong username/password combination");
					    echo '<script language="javascript">'; 
					    echo 'swal("Error!", "Invalid application code.", "error");';
					    echo '</script>'; 
				    }
                }

                else if ($type=="orphan")
                {
                    $query = "SELECT * FROM o_referral WHERE referralCode = '".$code."'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) == 1) {
					    $_SESSION['user'] = $logged_in_user;
					    $_SESSION['success']  = "You are now logged in";
                        echo '<script language="javascript">'; 
					    echo 'window.location.href="referralmonitoring.php?code='.$code.'";';
					    echo '</script>'; 
				    }

				    else {
					    array_push($errors, "Wrong username/password combination");
					    echo '<script language="javascript">'; 
					    echo 'swal("Error!", "Invalid application code.", "error");';
					    echo '</script>'; 
				    }
                }
		    
		}
  }
 
	if (isset($_POST['splog'])){
		splogin();
	}

	function splogin(){
		global $username; 
		$errors = [];

		$username = $_POST['username'];
		$password = $_POST['password'];

		if (empty($username)&&empty($password)) {
			array_push($errors, "Username is required");
      echo '<script language="javascript">'; 
      echo 'swal("Missing Fields!", "Enter username and password.", "error")';
			echo '</script>'; 
		}

		elseif (empty($username)||empty($password)){
      echo '<script language="javascript">'; 
      echo 'swal("Missing Fields!", "Enter missing fields.", "error")';
			echo '</script>'; 
		}

		else {
		if (count($errors) == 0) {

			$conn = mysqli_connect("localhost", "root", "", "omisdb");

			if ($conn){
        //$query = "SELECT * FROM user WHERE username = '".$username."'";
        $query = "(SELECT userID, firstName, lastName, email, password, type FROM user JOIN person JOIN socialworker ON user.personID = person.personID AND person.personID = socialworker.personID  WHERE email = '".$username."') UNION (SELECT userID, firstName, lastName, email, password, type FROM user JOIN person JOIN sponsor ON user.personID = person.personID AND person.personID = sponsor.personID  WHERE email = '".$username."')";
				$result = mysqli_query($conn, $query);
				
				if (mysqli_num_rows($result) == 1) {
					$logged_in_user = mysqli_fetch_assoc($result);
					if ($logged_in_user['password'] == $password) {
						// session_start();
						$_SESSION['user'] = $logged_in_user['userID'];
            $_SESSION['success']  = "You are now logged in";
            if($logged_in_user['type']=="SP"){
              echo "<script>
              window.location='sponsorprofile.php'
              </script>";
                // header('location: profile.php');
            }
            else{
              echo "<script>
              window.location='profile.php'
              </script>";
                // header('location: socialworkerhome.php');
            }
					}

					else
					{
						echo '<script language="javascript">'; 
						echo 'swal("Error!", "Invalid password.", "error")';
						echo '</script>'; 
					}
				}

				else {
					array_push($errors, "Wrong username/password combination");
					echo '<script language="javascript">'; 
					echo 'swal("Error!", "Invalid username.", "error");';
					echo '</script>'; 
				}
			}

			else {
				echo 'MySQL Error: ' . mysqli_connect_error();
			}
			}
		}
  }
  
	if (isset($_POST['logsw'])){
		swlogin();
	}

	function swlogin(){
		global $username; 
		$errors = [];

		$username = $_POST['email'];
		$password = $_POST['password'];

		if (empty($username)&&empty($password)) {
			array_push($errors, "Username is required");
			echo '<script language="javascript">'; 
      echo 'swal("Missing Fields!", "Enter username and password.", "error")';
			echo '</script>'; 
		}

		elseif (empty($username)||empty($password)){
			echo '<script language="javascript">'; 
			echo 'swal("Missing Fields!", "Enter missing fields.", "error")';
			echo '</script>'; 
		}

		else {
		if (count($errors) == 0) {

			$conn = mysqli_connect("localhost", "root", "", "omisdb");

			if ($conn){
				$query = "SELECT * FROM user JOIN person JOIN socialworker ON user.personID = person.personID AND person.personID = socialworker.personID WHERE email = '".$username."'";
				$result = mysqli_query($conn, $query);
				
				if (mysqli_num_rows($result) == 1) {
					$logged_in_user = mysqli_fetch_assoc($result);
					if ($logged_in_user['password'] == $password) {
						session_start();
            $_SESSION['user'] = $logged_in_user['userID'];
            $_SESSION['sw'] = $logged_in_user['userID'];
            $_SESSION['type'] = 1;
						$_SESSION['success']  = "You are now logged in";
						header('location: socialworkerhome.php');	
					}

					else
					{
						echo '<script language="javascript">'; 
						echo 'swal("Error!", "Invalid password.", "error");';
						echo '</script>'; 
					}
				}

				else {
					array_push($errors, "Wrong username/password combination");
					echo '<script language="javascript">'; 
					echo 'swal("Error!", "Invalid username.", "error");';
					echo '</script>'; 
				}
			}

			else {
				echo 'MySQL Error: ' . mysqli_connect_error();
			}
			}
    }
  }
?>

    <!-- Footer -->
    <footer>
      <div class="container" style="padding-top: 20px; padding-bottom: 20px">
        <div class="row">
        <br/>
          <div class="col-lg-4">
            
          </div>
          <div class="col-lg-4">
            
          </div>
          <div class="col-lg-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#"><h6>Privacy Policy</h6></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><h6>Terms of Use</h7></a>
              </li>
            </ul>
          </div>
        <br/>
        </div>
      </div>
    </footer>


    <!--OTHER-->
  <script src="assets/js/libs/gsap/src/minified/TweenMax.min.js"></script>
  <script src="assets/js/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
  <script src="assets/js/libs/tether/dist/js/tether.min.js"></script>
  <script src="assets/js/libs/superfish/dist/js/superfish.min.js"></script>
  <script src="assets/js/libs/appear/jquery.appear.js"></script>
  <script src="assets/js/libs/skrollr/dist/skrollr.min.js"></script>  
  <script src="assets/js/libs/easyticker-jquery/jquery.easy-ticker.min.js"></script>

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
