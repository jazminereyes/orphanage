<!DOCTYPE html>
<html lang="en">
<?php
    require ('../connection.php');

    $query = "SELECT email FROM sponsor";
    $result = mysqli_query($con, $query);
    $rows = array();

    while ($r = mysqli_fetch_assoc($result)){
        $rows[] = $r['email'];
    }
?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Concordia Children's Services | Sponsor </title>

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
    <link href="../font/css/all.css" rel="stylesheet"> 
    <!--load all styles -->

    <!-- MDB -->
    <link href="css/mdb/css/mdb.css" rel="stylesheet">
    <link href="css/mdb/css/style.css" rel="stylesheet">

    <!-- Dropdown Nav -->
    <script src="moment.js/moment.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <!-- Steps -->
    <link rel="stylesheet" href="jquery-steps-master/dist/jquery-steps.css">
    <link rel="stylesheet" href="jquery-steps-master/examples/css/style.css">

    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/set2.css" />
    <link rel="stylesheet" type="text/css" href="css/cs-select.css" />
    <link rel="stylesheet" type="text/css" href="css/sponsorapp.css" />
    <link rel="stylesheet" type="text/css" href="css/scholarapp.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />

    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">

  <style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Raleway:200,500,700,800);
    body {
  background: #f9f7f6;
  color: #404d5b;
  font-weight: 500;
  font-size: 1.05em;
  font-family: 'Raleway', Arial, sans-serif;


}
  </style>

    <script>
    var emailadd = <?php echo '["' . implode('", "', $rows) . '"]' ?>;

    // window.alert(emailadd);

      $('ul.nav li.dropdown').hover(function() 
      {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });
    
    </script>
    <script type="text/javascript">
      function forgotPass(){
        document.getElementById('inputemail').style.display = "inline-block";
      }

      // function forgotPassSw(){
      //   document.getElementById('swemail').style.display = "inline-block";
      // }
    </script>

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
      <div class="section page-login height-full img-cover" style="padding: 20px">
        <div class="section-overlay" style="opacity: 0.4;"></div>
        <div class="login-inner">
          <div>
            <div class="infobox infobox-square">
              <h3>Login to my account</h3>
              <form method="post" action="index.php">
                <div class="form-group">
                  <label>E-mail</label>
                  <div class="prepend-icon">
                    <input type="text" class="form-control input-lg" name="username" placeholder="Enter your e-mail" style="margin-left: 0px">
                    <i class="nc-icon-outline users_single-02"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="prepend-icon">
                    <input type="password" class="form-control input-lg" name="password" placeholder="Enter your password" style="margin-left: 0px">
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
      </div>
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

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
           <span class="section-heading text-uppercase text-dark" style="font-size: 2.5em;">Scholar Application</span>
          </div>

          <div class="text-danger" style="margin-left: 20px; margin-bottom: 15px;">
            Fields marked with * are required.
          </div>
        </div>

          <div id="demo">
            <div class="step-app" style="background-color: rgba(218, 220, 224, 0.82);">
              <ul class="step-steps">
                <li><a href="#step1"><strong>Basic Information</strong>&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a></li>
                <li><a href="#step2"><strong>Medical Information</strong>&nbsp;&nbsp;<i class="fa fa-file-medical"></i></a></li>
                <li><a href="#step3"><strong>Hobbies</strong>&nbsp;&nbsp;<i class="fa fa-school"></i></a></li>
                <li><a href="#step4"><strong>Family Background</strong>&nbsp;&nbsp;<i class="fa fa-user-circle"></i></a></li>
                <li><a href="#step5"><strong>Other Information</strong>&nbsp;&nbsp;<i class="fa fa-home"></i></a></li>
              </ul>

              <div class="step-content">
                <div class="step-tab-panel" id="step1">
                  <form method="post" action="scholarapp.php" id="frmInfo">
                  <div class="row">
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato">
                        <input class="input__field input__field--chisato required" type="text" id="input-13" name="first" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="First Name" style="color: black;">First Name<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato">
                        <input class="input__field input__field--chisato" type="text" id="input-13" name="middle" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Middle Name" style="color: black">Middle Name</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato">
                        <input class="input__field input__field--chisato required" type="text" id="input-13" name="last" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Last Name" style="color: black">Last Name<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" id="input-13" name="nickname" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Nickname" style="color: black">Nickname</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-5 text-center" style="margin-top: 20px">
                      <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Birthdate</label>
                      <select class="form-custom required" name="bmonth" style="margin:0" required>
                        <option disabled selected>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <input type="number" class="form-custom required" name="bdate" min = "1" max="31" placeholder="Day" style="width: 80px; margin:0;" required/>
                      <input type="number" class="form-custom required" name="byear" min="1900" placeholder="Year" style="width: 100px; margin:0;" required/>
                    </div>
                    <div class="col-md-3 col-custom text-center" style="margin-top: 20px;">
                      <label style="margin-left: 30px">Gender:<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;</label>

                      <label style="margin-right: 20px">
                      <input class="flat-red" type="radio" name="gender" value="M" required >Male</label>
                      <label >
                      <input class="flat-red" type="radio" name="gender" value="F">Female</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="street" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Street Address" style="color: black">Street Address<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="city" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="City" style="color: black">City<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-2 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="zip" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Zip Code" style="color: black">Zip Code</span>
                        </label>
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="school" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="School Last Attended" style="color: black">School Last Attended<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="lgwa" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Last General Weighted Average" style="color: black">Last General Weighted Average<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                  </div>

                  <div class="row" style="margin-top: 15px;">
                    <div class="col-md-7" >
                      <label>Highest Educational Attainment:<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span></label>
                      <select class="form-custom required" name="currentYrLevel" name="currentYrLevel" style="margin-left: 10px; display: inline;" required>
                        <option value="Elem_G1">Elementary - Grade 1</option>
                        <option value="Elem_G2">Elementary - Grade 2</option>
                        <option value="Elem_G3">Elementary - Grade 3</option>
                        <option value="Elem_G4">Elementary - Grade 4</option>
                        <option value="Elem_G5">Elementary - Grade 5</option>
                        <option value="Elem_G6">Elementary - Grade 6</option>
                        <option value="HS_G7">High School - First Year</option>
                        <option value="HS_G8">High School - Second Year</option>
                        <option value="HS_G9">High School - Third Year</option>
                        <option value="HS_G10">High School - Fourth Year</option>
                        <option value="SHS_G11">Senior High School - Grade 11</option>
                        <option value="SHS_G12">Senior High School - Grade 12</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                      <label style="margin-left: 20px">Classification:<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></label>
                      <label class="form-check-label radio-inline" style="margin-left: 20px"><input class="flat-red" type="radio" name="classification" value="In_School">In School</label>
                      <label class="form-check-label radio-inline" style="margin-left: 20px"><input class="flat-red" type="radio" name="classification" value="Out_School">Out of School</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-custom" style="margin-top: 20px">
                    <label style="margin-left: 15px">Religion:<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span></label>
                    <select class="form-custom" name="religion" style="margin-left: 10px; display: inline;" required>
                      <option value="Roman Catholic">Roman Catholic</option>
                      <option value="Christian">Christian</option>
                      <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                      <option value="Islam">Islam</option>
                      <option value="Dating Daan">Dating Daan</option>
                      <option value="Born Again">Born Again</option>
                    </select>

                      <!--<span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="religion" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Religion" style="color: black">Religion<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>-->
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="referredBy" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Referred By" style="color: black">Referred By<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato " type="text" name="relationToReferrer" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Relation" style="color: black">Relation</span>
                        </label>
                      </span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-custom">
                      <label>Scholar Photo</label>
                      <input type="file" name="photo" class="required" required/>
                    </div>
                  </div>
                </div>
                <div class="step-tab-panel" id="step2">
                  <div class="row">
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="height" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Height (cm)" style="color: black">Height (cm)<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="weight" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Weight (kg)" style="color: black">Weight (kg)<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="discolorMarks" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Distinguishing Marks (if any)" style="color: black">Distinguishing Marks (if any)<i style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="hairColor" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Hair Color" style="color: black">Hair Color<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="eyeColor" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Eye Color" style="color: black">Eye Color<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="skinTone" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Skin Tone" style="color: black">Skin Tone<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"  style="margin: auto">
                      <div class="form-inline">
                        <label>Does the child have an illness?</label>&nbsp&nbsp
                        <input type="radio" class="flat-red" id="prefyes" name="pref" value="Yes"/>
                        <label>&nbsp;Yes</label>&nbsp&nbsp
                        <input type="radio" class="flat-red" id="prefno" value="No" name="pref" />
                        <label>&nbsp;No</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div id="preference" style="display: none;">
                        <div class="form-inline">
                         <label for="inputPlace">Specify Illness</label>&nbsp&nbsp
                         <input type="text" class="form-custom" id="inputPlace" name="illness" />
                         </div>
                      </div>
                    </div>
                  </div><br/>

                  <input type="hidden" id="prefer" name="prefer" >

                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-inline">
                      <label for="inputPlace" style="margin-right: 20px">When was the child last hospitalized?</label>
                      <select class="form-custom" name="hmonth" style="margin: 0">
                        <option disabled selected>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <input type="number" class="form-custom" name="hdate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0;"/>
                      <input type="number" class="form-custom" name="hyear" min="1900" placeholder="Year" style="width: 100px; margin: 0;"/>
                    </div>
                    </div>
                  </div><br/>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-inline">
                        <label for="inputPlace">Where was the child last hospitalized?</label>
                        <input type="text" class="form-custom" id="inputPlace" name="lastph" style="width: 300px; margin-left: 20px; display: inline;"/>
                      </div>
                    </div>
                  </div><br/>
                        
                </div>
                <div class="step-tab-panel" id="step3">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Child activities at home:</label>
                      <textarea class="form-custom" name="homeActivity" style="width: 80%; height: 100px"></textarea>
                    </div>
                    <div class="col-md-6">
                      <label>Child activities outside:</label>
                      <textarea class="form-custom" name="outsideActivity" style="width: 80%; height: 100px"></textarea>
                    </div>
                  </div><br/>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Favorite subject/s</label>
                      <textarea class="form-custom" name="faveSubject" style="width: 80%; height: 100px"></textarea>
                    </div>
                    <div class="col-md-6">
                      <label>Favorite sport/s</label>
                      <textarea class="form-custom" name="faveSport" style="width: 80%; height: 100px"></textarea>
                    </div>
                  </div><br/>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Extra-curricular activities</label>
                      <textarea class="form-custom" name="extracoActivities" style="width: 80%; height: 100px"></textarea>
                    </div>
                    <div class="col-md-6">
                      <label>Ambition</label><br/>
                      <textarea class="form-custom" name="ambition" style="width: 80%; height: 100px"></textarea>
                    </div>
                  </div>
                </div>

                <div class="step-tab-panel" id="step4">
                  <h3 class="text-center">BIRTHMOTHER</h3>

                  <div class="row">
                    <div class="col-md-6 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="mname" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Maiden Name" style="color: black">Maiden Name<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-6" style="margin-top: 20px;">
                      <div class="form-inline">
                      <label for="inputName" style="margin-left: 30px; margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Birthdate</label>
                      <select class="form-custom required" name="mbdmonth" style="margin:0" required>
                        <option disabled selected>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <input type="number" class="form-custom required" name="mbddate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0" required/>
                      <input type="number" class="form-custom required" name="mbdyear" min="1900" placeholder="Year" style="width: 100px; margin: 0" required/>
                    </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="mcity" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="City Address" style="color: black">City Address</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-6 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="mprovince" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Province Address" style="color: black">Province Address</span>
                        </label>
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3" style="margin-top: 20px;">
                      <label>Civil Status<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span></label>&nbsp;&nbsp;
                      <select class="form-custom required" name="mcivilStatus" onchange="m_disable(this.value)" required>
                        <option value="Married">Married</option>
                        <option value="Single Parent">Single Parent</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                        <option value="Annulled">Annulled</option>
                        <option value="Divored">Divorced</option>
                        <option value="Deceased">Deceased</option>
                      </select>
                    </div>
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="mplaceOfMarriage" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Place of Marriage" style="color: black">Place of Marriage</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-6" style="margin-top: 20px;">
                      <label for="inputName" >Date of Marriage</label>&nbsp&nbsp
                      <select class="form-custom" name="mmonth" style="margin:0">
                        <option disabled selected>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <input type="number" class="form-custom" name="mdate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0"/>
                      <input type="number" class="form-custom" name="myear" min="1900" placeholder="Year" style="width: 100px; margin: 0"/>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="mnoOfChildren" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="No. of Children" style="color: black"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>No. of Children</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="moccupation" style="color: black" id="moccu" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Occupation" style="color: black"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Occupation</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="mincome" style="color: black" id="mincome" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Income" style="color: black"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Income</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="mcno" style="color: black" id="mcno" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Contact Number" style="color: black"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Contact Number</span>
                        </label>
                      </span>
                    </div>
                  </div><br/>

                  <div class="row text-center">
                    <div class="col-md-12">
                      <div class="form-inline">
                        <label>Medical History</label>&nbsp&nbsp
                        <textarea class="form-custom" name="mmedicalHistory"/ style="width: 50%; height: 100px"></textarea>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <h3 class="text-center">BIRTHFATHER</h3>

                  <div class="row">
                    <div class="col-md-6 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="fname" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Name" style="color: black">Name<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-6" style="margin-top: 20px;">
                      <div class="form-inline">
                      <label for="inputName" style="margin-left: 30px; margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Birthdate</label>
                      <select class="form-custom required" name="fbdmonth" style="margin:0" required>
                        <option disabled selected>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <input type="number" class="form-custom required" name="fbddate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0" required/>
                      <input type="number" class="form-custom required" name="fbdyear" min="1900" placeholder="Year" style="width: 100px; margin: 0" required/>
                    </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="fcity" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="City Address" style="color: black">City Address</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-6 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="fprovince" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Province Address" style="color: black">Province Address</span>
                        </label>
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3" style="margin-top: 20px;">
                      <label>Civil Status<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span></label>&nbsp;&nbsp;
                      <select class="form-custom required" name="fcivilStatus" onchange="f_disable(this.value)" required>
                        <option value="Married">Married</option>
                        <option value="Single Parent">Single Parent</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                        <option value="Annulled">Annulled</option>
                        <option value="Divored">Divorced</option>
                        <option value="Deceased">Deceased</option>
                      </select>
                    </div>
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato" type="text" name="fplaceOfMarriage" style="color: black" />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Place of Marriage" style="color: black">Place of Marriage</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-6" style="margin-top: 20px;">
                      <label for="inputName" >Date of Marriage</label>&nbsp&nbsp
                      <select class="form-custom" name="fmonth" style="margin:0">
                        <option disabled selected>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <input type="number" class="form-custom" name="fdate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0"/>
                      <input type="number" class="form-custom" name="fyear" min="1900" placeholder="Year" style="width: 100px; margin: 0"/>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="fnoOfChildren" style="color: black" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="No. of Children" style="color: black"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>No. of Children</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="text" name="foccupation" style="color: black" id="foccu" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Occupation" style="color: black"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Occupation</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="fincome" style="color: black" id="fincome" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Income" style="color: black"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Income</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3 col-custom">
                      <span class="input input--chisato" style="margin-top: 0px;">
                        <input class="input__field input__field--chisato required" type="number" name="fcno" style="color: black" id="fcno" required />
                        <label class="input__label input__label--chisato" for="input-13">
                          <span class="input__label-content input__label-content--chisato" data-content="Contact Number" style="color: black"><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Contact Number</span>
                        </label>
                      </span>
                    </div>
                  </div><br/>

                  <div class="row text-center">
                    <div class="col-md-12">
                      <div class="form-inline">
                        <label>Medical History</label>&nbsp&nbsp
                        <textarea class="form-custom" name="fmedicalHistory"/ style="width: 50%; height: 100px"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="step-tab-panel" id="step5">
                  <div class="form-inline">
                    <label class="lbl"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Home Type </label>
                    <select name="homeType" class="form-control required" style="width: 150px" required>
                      <option value="concrete">Concrete</option>
                      <option value="semiconcrete">Semi Concrete</option>
                      <option value="scraps">Scraps of Wood/G.I Sheets</option>
                    </select>
                    <label class="lbl" style="margin-right: 10px; margin-left: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Home Status </label>
                    <select name="homeStatus" class="form-control required" style="width: 150px" required>
                      <option value="owned">Owned</option>
                      <option value="rented">Rented</option>
                      <option value="withrelatives">Living with relatives</option>
                      </select>

                      <label class="lbl" style="margin-right: 25px;"> House Monthly Cost </label>
                      <div class="input-group mb-3" style="margin-top: 10px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="houseMonthlyCost" type="number" class="form-control" min="0" style="width: 140px; margin: 0;"/> <br/>
                      </div>
                    </div>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Electricity Type </label>
                      <select name="electricityType" class="form-control required" required>
                        <option value="illegal">Illegal Connection</option>
                        <option value="shared">Shared Electricity</option>
                        <option value="legal">Legal Connection</option>
                      </select>
                      <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Electricity Monthly Cost </label>
                      <div class="input-group mb-3" style="margin-top: 10px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="electricityMonthlyCost" type="number" class="form-control required" min="0" style="margin: 0; width: 125px;" required/> <br/>
                      </div>
                    </div><br/>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Water Type</label>
                      <select name="waterType" type="text" class="form-control required" required>
                        <option value="illegal">Illegal Connection</option>
                        <option value="shared">Shared water</option>
                        <option value="legal">Legal Connection</option>
                      </select>
                      <label class="lbl" style="margin-right: 20px; margin-left: 30px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Water Monthly Cost </label>
                      <div class="input-group mb-3" style="margin-top: 10px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="waterCost" type="number" class="form-control required" min="0" style="margin: 0; width: 125px;" required/> <br/>
                      </div>
                    </div><br/>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Food Type </label>
                      <select name="foodType" type="text" class="form-control required" required>
                        <option value="turoturo">Turo-turo/Lutong ulam</option>
                        <option value="cooking">Marketing/Cooking</option>
                      </select>
                      <label class="lbl" style="margin-right: 10px; margin-left: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Individual Count </label>
                      <input name="individualCount" type="number" class="form-control required" min="0" style="width: 70px" required/><br/>
                      <label class="lbl" style="margin-right: 10px; margin-left: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp; Bathroom Type </label>
                      <select name="bathType" type="text" class="form-control required" required>
                        <option value="owned">Owned</option>
                        <option value="throwaway">Throw away</option>
                        <option value="shared">Shared</option>
                      </select>
                    </div><br/>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px">Annual educational expense (inclusive of tuition fee and expense on school supplies)</label>
                      <div class="input-group mb-3" style="margin-top: 10px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="educExpense" type="number" min="0" class="form-control" style="width: 125px; margin: 0;"/>
                      </div><br/>
                    </div>                          
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px;">Annual medical expense of the whole family</label>
                      <div class="input-group mb-3" style="margin-top: 10px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="medExpense" type="number" class="form-control" style="width: 125px; margin: 0;"/>
                      </div>
                    </div>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px;">Other expenses (inclusive of hygiene and emergency expenses)</label>
                      <div class="input-group mb-3" style="margin-top: 10px;">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input name="otherExpense" type="number" min="0" class="form-control" style="width: 125px; margin: 0;"/>
                        </div>
                      </div>
                      <input type="submit" value="Submit" name="submit" class="btn btn-success" style="float: right" onclick="validateForm()"/>
                      </form><br/><br/>
                    </div>
                </div>
              </div><br/>
              
              <div class="step-footer">
                <button data-direction="prev" class="step-btn btn">Previous</button>
                <button data-direction="next" class="step-btn btn">Next</button>
                <!--<button data-direction="finish" class="step-btn btn">Finish</button>-->
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

    <?php
    if (isset($_POST["submit"])){
        require ('../connection.php');

        createRandomPassword();

        $height = $_POST['height'];
        $weight = $_POST['weight'];

        $bmi = $weight/($height/100*$height/100);

        if ($bmi<18.5){
            $weightstatus = "Underweight";
        } elseif ($bmi>=18.5&&$bmi<=25){
            $weighstatus = "Normal Weight";
        } elseif ($bmi>=25&&$bmi<=30){
            $weighstatus = "Obese";
        } elseif ($bmi>30){
            $weightstatus = "Overweight";
        }

        if ($_POST["byear"]==""){
            $byear = "0000";
        } else{
            $byear = $_POST["byear"];
        }
    
        if ($_POST["bmonth"]=""){
            $bmonth = "00";
        } else{
            $bmonth = $_POST["bmonth"];
        }
    
        if ($_POST["bdate"]){
            $bday = "00";
        } else{
            $bday = $_POST["bdate"];
        }

        $birthday = $byear."-".$bmonth."-".$bday;

        if ($_POST["hyear"]==" "){
            $hyear = "0000";
        } else{
            $hyear = $_POST["hyear"];
        }
    
        if ($_POST["hmonth"]=""){
            $hmonth = "00";
        } else{
            $hmonth = $_POST["hmonth"];
        }
    
        if ($_POST["hdate"]){
            $hday = "00";
        } else{
            $hday = $_POST["hdate"];
        }

        $lastdhp = $hyear."-".$hmonth."-".$hday;

        if ($_POST["myear"]==" "){
            $myear = "0000";
        } else{
            $myear = $_POST["myear"];
        }
    
        if ($_POST["mmonth"]=""){
            $mmonth = "00";
        } else{
            $mmonth = $_POST["mmonth"];
        }
    
        if ($_POST["mdate"]){
            $mday = "00";
        } else{
            $mday = $_POST["mdate"];
        }

        $mbirthdate = $_POST["mbdyear"]."-".$_POST["mbdmonth"]."-".$_POST["mbddate"];

        $mother = $myear."-".$mmonth."-".$mday;

        if ($_POST["fyear"]==" "){
            $fyear = "0000";
        } else{
            $fyear = $_POST["fyear"];
        }
    
        if ($_POST["fmonth"]=""){
            $fmonth = "00";
        } else{
            $fmonth = $_POST["fmonth"];
        }
    
        if ($_POST["fdate"]){
            $fday = "00";
        } else{
            $fday = $_POST["fdate"];
        }

        $father = $fyear."-".$fmonth."-".$fday;

        $fbirthdate = $_POST["fbdyear"]."-".$_POST["fbdmonth"]."-".$_POST["fbddate"];

        $query = "INSERT INTO person(firstName, middleName, lastName, gender, type) VALUES ('$_POST[first]', '$_POST[middle]', '$_POST[last]', '$_POST[gender]', 'S')";

        if (mysqli_query($con, $query))
        {
            $person_id = mysqli_insert_id($con);
        }

        $query2 = "INSERT INTO s_healthinfo(height, weight, weightStatus, discolorMarks, hairColor, eyeColor, skinTone, illness, lastDateHospitalized, lastPlaceHospitalized) VALUES ('$_POST[height]', '$_POST[weight]', '$weighstatus', '$_POST[discolorMarks]', '$_POST[hairColor]', '$_POST[eyeColor]', '$_POST[skinTone]', '$_POST[illness]', '$lastdhp', '$_POST[lastph]')";

        if (mysqli_query($con, $query2))
        {
            $health_id = mysqli_insert_id($con);
        }

        $query3 = "INSERT INTO s_hobbies(homeActivity, outsideActivity, faveSubject, extracoActivities, faveSport, ambition) VALUES ('$_POST[homeActivity]', '$_POST[outsideActivity]', '$_POST[faveSubject]', '$_POST[extracoActivities]', '$_POST[faveSport]', '$_POST[ambition]')";

        if (mysqli_query($con, $query3))
        {
            $hobby_id = mysqli_insert_id($con);
        }
        
        $queryy = "INSERT INTO s_expenditure(homeType, homeStatus, houseMonthlyCost, electricityType, electricityMonthlyCost, foodType, individualCount, waterType, waterCost, bathroomType, educExpense, medExpense, otherExpense) VALUES ('$_POST[homeType]', '$_POST[homeStatus]', '$_POST[houseMonthlyCost]', '$_POST[electricityType]', '$_POST[electricityMonthlyCost]', '$_POST[foodType]', '$_POST[individualCount]', '$_POST[waterType]', '$_POST[waterCost]', '$_POST[bathType]', '$_POST[educExpense]', '$_POST[medExpense]', '$_POST[otherExpense]')";

        if (mysqli_query($con, $queryy))
        {
            $expenditure_id = mysqli_insert_id($con);
        }

        $today = date("Y-m-d");

        $queries = "INSERT INTO s_appform(expenditureID, hobbyID, healthInfoID, lastSemAverage, submissionDate, referredBy, relationToReferrer, applicationCode) VALUES ('$expenditure_id', '$hobby_id', '$health_id', '$_POST[lgwa]', '$today', '$_POST[referredBy]', '$_POST[relationToReferrer]', '$password')";

        if (mysqli_query($con, $queries))
        {
            $app_id = mysqli_insert_id($con);
        }

        $query4 = "INSERT INTO s_familybground(scholarAppID, name, birthdate, relationType, contactNo, occupation, income) VALUES ('$app_id', '$_POST[mname]', '$mbirthdate', 'Mother', '$_POST[mcno]', '$_POST[moccupation]', '$_POST[mincome]')";

        if (mysqli_query($con, $query4))
        {
            $fbg_id = mysqli_insert_id($con);
        }

        $query5 = "INSERT INTO s_parentinfo(familyBgroundID, city, province, civilStatus, placeOfMarriage, dateOfMarriage, noOfChildren, medicalHistory) VALUES ('$fbg_id', '$_POST[mcity]', '$_POST[mprovince]', '$_POST[mcivilStatus]', '$_POST[mplaceOfMarriage]', '$mother', '$_POST[mnoOfChildren]', '$_POST[mmedicalHistory]')";

        if (mysqli_query($con, $query5))
        {
            $parent_id = mysqli_insert_id($con);
        }

        $query6 = "INSERT INTO s_familybground(scholarAppID, name, birthdate, relationType, contactNo, occupation, income) VALUES ('$app_id', '$_POST[fname]', '$fbirthdate', 'Father', '$_POST[fcno]', '$_POST[foccupation]', '$_POST[fincome]')";

        if (mysqli_query($con, $query6))
        {
            $fbg_id = mysqli_insert_id($con);
        }

        $query7 = "INSERT INTO s_parentinfo(familyBgroundID, city, province, civilStatus, placeOfMarriage, dateOfMarriage, noOfChildren, medicalHistory) VALUES ('$fbg_id', '$_POST[fcity]', '$_POST[fprovince]', '$_POST[fcivilStatus]', '$_POST[fplaceOfMarriage]', '$father', '$_POST[fnoOfChildren]', '$_POST[fmedicalHistory]')";

        if (mysqli_query($con, $query7))
        {
            $parent_id = mysqli_insert_id($con);
        }

        $query9 = "INSERT INTO scholar(personID, scholarAppID, currentYrLevel, birthdate, street, city, zip, classification, school, religion, applicationStatus) VALUES ('$person_id', '$app_id', '$_POST[currentYrLevel]', '$birthday', '$_POST[street]', '$_POST[city]', '$_POST[zip]', '$_POST[classification]', '$_POST[school]', '$_POST[religion]', 'Pending')";

        if(mysqli_query($con, $query9)){
        
            $file = $_FILES['photo'];
            $name = $file['name'];

            $path = "referrals/" . basename($name);
            if (move_uploaded_file($file['tmp_name'], $path)) {
            echo "Succeed.";
            $child = $path;
            $a = "UPDATE person SET photo = '$child' WHERE person = '$person_id'";
            mysqli_query($con, $a);
            } else {
            echo "Error.";
            }

            echo '<script>swal({
              title: "Success!",
              text: "Application is submitted. \nPlease remember this code for viewing. \nReferral Code:'.$password.'",
              icon: "success"
            }).then(function() {
              window.location = "index.php";
            });</script>';
        }

  }

    function createRandomPassword() { 

        $chars = "abcdefghijkmnopqrstuvwxyz0123456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
    
        while ($i <= 5) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
    
        return $pass; 
    
    }
?>


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

    <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js"></script>

    <script src="js/sweetalert.min.js"></script>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="jquery-steps-master/dist/jquery-steps.js"></script>
    <script src="js/cstat.js"></script>

     <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js"></script>

    <script src="js/classie.js"></script>
    <script src="js/selectFx.js"></script>

    <script>
      $('#demo').steps({
        onFinish: function () {
          alert('Wizard Completed');
        }
      });

      function validateForm(){
        $('.required').each(function(){
          if( $(this).val() == "" ){
            //alert('Please fill all the fields');
            swal('Cannot submit application!', 'Please fill out the required fields.', 'error');
            return false;
          }
        });
      }
    </script>

    <script>
      (function() {
        [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {  
          new SelectFx(el);
        } );
      })();
    </script>
    <script>
      (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
          (function() {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
              return this.replace(rtrim, '');
            };
          })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
          // in case the input is already filled..
          if( inputEl.value.trim() !== '' ) {
            classie.add( inputEl.parentNode, 'input--filled' );
          }

          // events:
          inputEl.addEventListener( 'focus', onInputFocus );
          inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
          classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
          if( ev.target.value.trim() === '' ) {
            classie.remove( ev.target.parentNode, 'input--filled' );
          }
        }
      })();

      $(function () {
          //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })
      });

      
      $(document).ready(function() {
          $("body" ).on( "ifChanged","#prefyes" , function() {
             document.getElementById('preference').style.display = "block";
             document.getElementById('prefer').value = 'Yes';
          });
      });

      $(document).ready(function() {
          $("body" ).on( "ifChanged","#prefno" , function() {
             document.getElementById('preference').style.display = "none";
             document.getElementById('prefer').value = 'No';
          });
      });

      </script>



  </body>

</html>
