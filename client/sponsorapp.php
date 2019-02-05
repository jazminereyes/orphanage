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

    if(isset($_SESSION['user'])){

    require ('../connection.php');
    $userid = $_SESSION['user'];
    $q = "SELECT type FROM user JOIN person ON user.personID = person.personID WHERE userID = '$userid'";
    $res = mysqli_query($con, $q);
    $rec = mysqli_fetch_row($res);

    if($rec[0]=="SP"){
    $nav = '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#">My Account</a>
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

    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">

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


      function validateDate()
      {
        var month = document.getElementById('month').value;
        var day = document.getElementById('date').value;
        var year = document.getElementById('year').value;

        var date = year+"-"+month+"-"+day;

        if (moment(date).isAfter(moment())==true)
        {
          swal("Error", "Birthdate cannot be greater than current date.", "error");
          event.preventDefault();
        }
      }

      function checkEmail()
      {
        var mail = document.getElementById('email').value;

      if (emailadd.includes(mail)==true)
      {
        swal('Error!', 'Email address already exists.', 'error');
        event.preventDefault();
      }
      }
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
            <?php echo $nav ?>
            <?php echo $link ?>
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
  <section id="services" style="padding: 40px;">
    <div class="row" style="padding-top: 120px;">
      <div class="col-md-12 text-center">
        <span class="section-heading text-uppercase text-dark" style="font-size: 2.5em;">Sponsor Application</span>
      </div>
    </div><br/>
    <div class="col-md-12">
        <div class="card" style="background-color: rgba(229, 236, 239, 0.69);">
          <div class="card-body">
            <form method="post" action="sponsorapp.php" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-4 col-custom">
                <span class="input input--chisato">
                  <input class="input__field input__field--chisato" type="text" id="input-13" name="fn" style="color: black" required />
                  <label class="input__label input__label--chisato" for="input-13">
                    <span class="input__label-content input__label-content--chisato" data-content="First Name" style="color: black">First Name<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                  </label>
                </span>
                </div>
                <div class="col-md-4 col-custom">
                <span class="input input--chisato">
                  <input class="input__field input__field--chisato" type="text" id="input-13" name="mn" style="color: black" />
                  <label class="input__label input__label--chisato" for="input-13">
                    <span class="input__label-content input__label-content--chisato" data-content="Middle Name" style="color: black">Middle Name</span>
                  </label>
                </span>
                </div>
              <div class="col-md-4 col-custom">
                <span class="input input--chisato">
                  <input class="input__field input__field--chisato" type="text" id="input-13" name="ln" style="color: black" required />
                  <label class="input__label input__label--chisato" for="input-13">
                    <span class="input__label-content input__label-content--chisato" data-content="Last Name" style="color: black">Last Name<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                  </label>
                </span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 text-center" style="margin-top: 20px">
                  <label>Birthday<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></label>
                      <select class="form-custom" name="month" id="month" placeholder="Month">
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
                      <input class="form-custom" type="number" name="day" min="1" max="31" id="date" placeholder="Date" style="width: 80px; margin: 0;"/>
                      <input class="form-custom" type="number" name="year" min="1900" id="year" placeholder="Year" style="width: 100px; margin: 0;"/>
                  </div>
                <div class="col-md-4 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato" type="email" name="email" id="email" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="Email" style="color: black">Email<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                    </label>
                  </span>
                </div>
                <div class="col-md-3 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato" type="number" name="telNo" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="Contact Number" style="color: black">Contact Number<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                    </label>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato" type="text" name="street" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="Street Address" style="color: black">Street Address<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                    </label>
                  </span>
                </div>
                <div class="col-md-3 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato" type="text" name="city" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="City" style="color: black">City<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                    </label>
                  </span>
                </div>
                <div class="col-md-2 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato" type="number" name="zip" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="ZIP" style="color: black">ZIP</span>
                    </label>
                  </span>
                </div>
                <div class="col-md-3 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato" type="text" name="country" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="Country" style="color: black">Country<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                    </label>
                  </span>
                </div>
              </div>
        </div>


            <div class="form-inline" style="margin: auto">
              <label>I wish to support</label><input type="number" value="1" min="1" name="scholar" class="form-control" id="qty" placeholder="No. of Scholars" onchange="changeTextbox(this.value)" style="width: 80px" required /><input type="radio" id="customRadio1" name="yrlevel" class="flat-red" value="E" required /><label>elementary student/s (Grade 1 to 6) for PHP 1,250 / US$30</label><label>&nbsp;per month in a school year.</label><br/>
            </div>

            <div class="form-inline" style="margin-left: 390px;">
              <input type="radio" id="customRadio2" name="yrlevel" class="flat-red" value="HS" required/><label>high school student/s (Grade 7 to 12) for PHP 1,500 / US$36</label><label>&nbsp;per month in a school year.</label><br/>
            </div><br/>

            <div class="form-inline" style="margin: auto">
                <label>The total amount that I pledge to donate for sponsorship is</label>&nbsp&nbsp
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input readonly type="number" name="amount" class="form-control" id="total" style="margin-left: 0px; margin-right: 0px; width: 50%" />
                        <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                      </div>
            </div>

            <div class="form-inline" style="margin: auto">
              <label>(PHP 12,500 / US$300 a year per elementary student and PHP 15,000 / US$360</label>
            </div>
            <div class="form-inline" style="margin: auto">
              <label> a year per high school student).</label>             
            </div><br/>

            <input type="hidden" id="yrlev" name="yrlev" >

            <div class="form-inline" style="margin: auto">
                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;I will send my donation&nbsp;&nbsp;&nbsp;</label>
                <select class="form-control" name="type" required />
                  <option value="M">Monthly</option>
                  <option value="Y">Yearly</option>
                </select>
            </div><br/>

            <div class="form-inline" style="margin: auto">
            <label>Do you have a preference for scholars?</label>&nbsp&nbsp<input type="radio" class="flat-red" id="prefyes" name="pref" value="Yes" /><label>&nbsp;Yes</label>&nbsp&nbsp<input type="radio" class="flat-red" id="prefno" value="No" name="pref" /><label>&nbsp;No</label>
            </div>

            <input type="hidden" id="prefer" name="prefer" >

            <div id="preference" style="display: none; margin: auto">
              <div class="form-inline">
              <input type="checkbox" class="flat-red" name="first" value="1" id="gen" />&nbsp&nbsp<label>Gender</label>
              <select class="form-control" id="gender" name="gender" style="display: none">
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
              </div>

              <div class="form-inline" >
              <input type="checkbox" class="flat-red" name="second" value="1" id="rel" />&nbsp&nbsp<label>Religion</label><input type="text" class="form-control" id="religion" style="display: none" name="religion"/>
              </div>

              <div class="form-inline">
              <input type="checkbox" class="flat-red"  name="third" value="1" id="genave" />&nbsp&nbsp<label>General Weighted Average</label><input type="number" class="form-control" id="gwa" style="display: none" name="gwa"/>
              </div>



              <input type="hidden" class="form-control" id="p_gen" name="p_gen" />
              <input type="hidden" class="form-control" id="p_rel" name="p_rel" />
              <input type="hidden" class="form-control" id="p_gwa" name="p_gwa" />


            </div><br/><br/>
            <center>
              <input type="submit" value="Confirm" name="submit" class="btn btn-success btn-block" style="width: 80%" onclick="validateDate(); checkEmail();"/>
            </center>
            
                        </form>
                        <br/>
                        <br/>
                    </div>

                </div>


              </div><br/><br/>




      <div class="container">
        <div class="row" style="margin: auto">
          <div class="col-md-12 text-light">
            <label>Before being assigned a scholar, you must make a deposit for a whole school year. Termination of the sponsorship may only be allowed after completing a yearly deposit.</label>
            <label>We will inform you of the name and age of your sponsored child/children and will update you and will update you on his/her progress. We will also provide you with the following items:</label>
            <label><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Picture and brief profile of the child/children(for new sponsor).</label><br/>
            <label><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Introductory letter of the child/children(for new sponsor).</label><br/>
            <label><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Correspondence from the child.</label><br/>
            <label><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Mid-year progress report(June to October).</label><br/>
            <label><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Annual progress report(November to May).</label><br/>
            <label><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Copy of the Child/children's report card.</label><br/>
            <label><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Thank you Letter of the child/children.</label>
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

    $submission = date("Y-m-d");
    $type = $_POST['yrlev'].$_POST["type"];
    $password = createRandomPassword();
    $pref = $_POST['prefer'];


    if ($_POST["year"]==" "){
        $year = "0000";
    } else{
        $year = $_POST["year"];
    }

    if ($_POST["month"]=""){
        $month = "00";
    } else{
        $month = $_POST["month"];
    }

    if ($_POST["day"]){
        $day = "00";
    } else{
        $day = $_POST["day"];
    }

    $birthday = $year."-".$month."-".$day;

    if ($_POST["yrlev"] == "E")
    {
        $count = $_POST["scholar"];
    }

    else if ($_POST["yrlev"] == "HS")
    {
        $count = $_POST["scholar"];
    }

    if ($type == "EM")
    {
        $amt = 1250;
    }

    else if ($type == "EY")
    {
        $amt = 12500;
    }

    else if ($type == "HSM")
    {
        $amt = 1500;
    }

    else if ($type == "HSY")
    {
        $amt = 15000;
    }

    $fn = $_POST['fn'];
    $mn = $_POST['mn'];
    $ln = $_POST['ln'];
    
    $query = "INSERT INTO person (firstName, middleName, lastName, type) VALUES (?, ?, ?, 'SP')";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $query)){
      echo "error";
    }
    else{
      mysqli_stmt_bind_param($stmt, "sss", $fn, $mn, $ln);
      mysqli_stmt_execute($stmt);
      $person_id = mysqli_insert_id($con);
    }
      
    
        $query2 = "INSERT INTO user(personID, programType) VALUES ('$person_id', 'Sponsor')";
    
        if (mysqli_query($con, $query2))
        {
            $user_id = mysqli_insert_id($con);
        }
    
        $query3 = "INSERT INTO sponsor(personID, street, city, zip, country, birthdate, telNo, email, scholarCount, donationType, amount, submissionDate, applicationCode, applicationStatus) VALUES ('$person_id', '$_POST[street]', '$_POST[city]', '$_POST[zip]', '$_POST[country]', '$birthday', '$_POST[telNo]', '$_POST[email]', '$count', '$type', '$amt', '$submission', '$password', 'P')";
    
        if (mysqli_query($con, $query3))
        {
            $sponsor_id = mysqli_insert_id($con);
        }
    
        if ($pref=="Yes")
        {
          $query4 = "INSERT INTO s_preference(sponsorID) VALUES ('$sponsor_id')";
          mysqli_query($con, $query4);
    
          if($_POST["p_gen"]==1)
          {
            $gender = $_POST["gender"];
            $query5 = "UPDATE s_preference SET gender = '$gender' WHERE sponsorID = '$sponsor_id'";
            mysqli_query($con, $query5);
          }
    
          if($_POST["p_rel"]==1)
          {
            $religion = $_POST["religion"];
            $query5 = "UPDATE s_preference SET religion = '$religion' WHERE sponsorID = '$sponsor_id'";
            mysqli_query($con, $query5);
          }
    
          if($_POST["p_gwa"]==1)
          {
            $gwa = $_POST["gwa"];
            $query5 = "UPDATE s_preference SET averageGrade = '$gwa' WHERE sponsorID = '$sponsor_id'";
            mysqli_query($con, $query5);
          }
        }
    
        echo '<script>swal({
      title: "Success!",
      text: "Application is submitted. \nPlease remember this code for viewing. \nReferral Code:'.$password.'",
      icon: "success"
    }).then(function() {
      window.location = "index.php";
    });</script>';
    
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

    <script src="js/classie.js"></script>
    <script src="js/selectFx.js"></script>
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
          $("body" ).on( "ifChecked","#gen" , function() {
             document.getElementById('gender').style.display = "block";
             document.getElementById('p_gen').value = 1;
          });
      });

      $(document).ready(function() {
          $("body" ).on( "ifUnchecked","#gen" , function() {
             document.getElementById('gender').style.display = "none";
             document.getElementById('p_gen').value = 0;
          });
      });

      $(document).ready(function() {
          $("body" ).on( "ifChecked","#rel" , function() {
             document.getElementById('religion').style.display = "block";
             document.getElementById('p_rel').value = 1;
          });
      });

      $(document).ready(function() {
          $("body" ).on( "ifUnchecked","#rel" , function() {
             document.getElementById('religion').style.display = "none";
             document.getElementById('p_rel').value = 0;
          });
      });

      $(document).ready(function() {
          $("body" ).on( "ifChecked","#genave" , function() {
             document.getElementById('gwa').style.display = "block";
             document.getElementById('p_gwa').value = 1;
          });
      });

      $(document).ready(function() {
          $("body" ).on( "ifUnchecked","#genave" , function() {
             document.getElementById('gwa').style.display = "none";
             document.getElementById('p_gwa').value = 0;
          });
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

      $(document).ready(function() {
          $("body" ).on( "ifChanged","#customRadio1" , function() {
            var qty = document.getElementById('qty').value;
            var amt = 12500 * qty;
            document.getElementById('total').value = amt;
            document.getElementById('yrlev').value = 'E';
          });
      });

      $(document).ready(function() {
          $("body" ).on( "ifChanged","#customRadio2" , function() {
            var qty = document.getElementById('qty').value;
            var amt = 15000 * qty;
            document.getElementById('total').value = amt;
            document.getElementById('yrlev').value = 'HS';
          });
      });

      function changeTextbox(str)
      {

          if (document.getElementById('customRadio1').checked && str != "")
          {
            var qty = document.getElementById('qty').value;
            var amt = 12500 * qty;
          }

          else if (document.getElementById('customRadio2').checked && str != "")
          {
            var qty = document.getElementById('qty').value;
            var amt = 15000 * qty;
          }
          else{
            var amt = "";
          }

        document.getElementById('total').value = amt;
      }

    </script>

  </body>

</html>
