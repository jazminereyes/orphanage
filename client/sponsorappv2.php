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
    <link href="../font/css/all.css" rel="stylesheet"> <!--load all styles -->

    <!-- MDB -->
    <link href="css/mdb/css/mdb.css" rel="stylesheet">
    <link href="css/mdb/css/style.css" rel="stylesheet">

    <!-- Dropdown Nav -->
    <script src="moment.js/moment.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/fxstyle.css">

    <script>
    var emailadd = <?php echo '["' . implode('", "', $rows) . '"]' ?>;

    window.alert(emailadd);

      $('ul.nav li.dropdown').hover(function() 
      {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });

      function displayValue(str) {
        if (str == "E") {
          var unit = document.getElementById('elem').value;
          var amt = 12500 * unit;
        } else if (str == "HS") {
          var unit = document.getElementById('hs').value;
          var amt = 15000 * unit;
        }

        if (str == "") {
          document.getElementById("display").innerHTML = "";
          return;
        } else { 
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("display").innerHTML = this.responseText;
              }
            };
          xmlhttp.open("GET","displayvalue.php?amt="+amt,true);
          xmlhttp.send();
        }
      }

      function changeTextbox(str)
      {

        if (document.getElementById('customRadio1').checked)
        {
          var qty = document.getElementById('qty').value;
          var amt = 12500 * qty;
        }

        else if (document.getElementById('customRadio2').checked)
        {
          var qty = document.getElementById('qty').value;
          var amt = 15000 * qty;
        }

        document.getElementById('total').value = amt;
      }

      function displayPref(str)
      {
        if(str=="Yes")
        {
          document.getElementById('preference').style.display = "block";
        }

        else
        {
          document.getElementById('preference').style.display = "none";
        }
      }

      function displayGen(checkbox)
      {
        if (checkbox.checked){
          document.getElementById('gender').style.display = "block";
        }

        else
        {
          document.getElementById('gender').style.display = "none";
        }
      }

      function displayRel(checkbox)
      {
        if (checkbox.checked){
          document.getElementById('religion').style.display = "block";
        }

        else
        {
          document.getElementById('religion').style.display = "none";
        }
      }

      function displayGwa(checkbox)
      {
        if (checkbox.checked){
          document.getElementById('gwa').style.display = "block";
        }

        else
        {
          document.getElementById('gwa').style.display = "none";
        }
      }

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

      section#contact {
        background-color: #212529;
        background-image: url("img/footer.jpg");
        background-repeat: no-repeat;
        background-position: center;
      }

      @media (min-width: 768px){
      section {
          padding: 150px 0;
          background-image: url("img/bg.jpg");
          background-repeat: no-repeat;
      }
    }

      .swal-button 
      {
        background-color: #28a745;
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
            <li class="nav-item dropdown">
              <a class="nav-link js-scroll-trigger dropdown-toggle" data-toggle="dropdown" href="#">View Application</a>
              <ul class="dropdown-menu">
                <li><a data-toggle="modal" data-target="#modalSponsor">Sponsor</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalScholar">Scholar</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalOrphan">Orphan</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Sign In</a>
            </li>
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
    <section id="services" style="padding: 40px;">
        <div class="row" style="padding-top: 120px;">
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">Sponsor Application</h2>
          </div>
        </div><br/>
        <div class="row">
          <div class="col-md-4 text-light">
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
            <div class="col-md-8">
            <div class="text-danger text-center">Fields marked with * are required.</div>
                <div class="card" style="background-color: #F5F5F5">  
                    <div class="card-body">
                        <form method="post" action="sponsorapp.php">
                            <div class="form-inline">
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;First Name</label>
                                <input type="text" name="fn" class="form-control" style="width: 165px" required/>
                                <label>Middle Name</label>
                                <input type="text" name="mn" class="form-control" style="width: 165px"/>
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Last Name</label>
                                <input type="text" name="ln" class="form-control" style="width: 165px" required/>
                            </div><br/>
                            <div class="form-inline">
                                <label style="margin-right: 20px">Birthday</label>
                                <select class="form-control" name="month" id="month" placeholder="Month" style="margin: 0">
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
                                <input class="form-control" type="number" name="day" min="1" max="31" id="date" placeholder="Date" style="width: 80px; margin: 0;"/>
                                <input class="form-control" type="number" name="year" min="1900" id="year" placeholder="Year" style="width: 100px; margin: 0;"/>
                                <label style="margin-left: 30px; margin-right: 10px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Email</label>
                                <input type="email" name="email" id="email" class="form-control" required/>
                            </div><br/>
                            <div class="form-inline">
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Street</label>
                                <input type="text" name="street" class="form-control" style="width: 240px" required/>
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;City<label>
                                <input type="text" name="city" class="form-control" style="width: 190px" required/>
                                <label>ZIP</label>
                                <input type="number" name="zip" min="0" class="form-control" style="width: 100px"/>
                            </div><br/>
                            <div class="form-inline">
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Country</label>
                                <input type="text" name="country" class="form-control" required/>
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Contact Number</label>
                                <input type="text" name="telNo" class="form-control" required/>
                            </div><br/><br/>

                            <div class="form-inline">
                              <label>I wish to support</label><input type="number" min="1" name="scholar" class="form-control" id="qty" placeholder="No. of Scholars" onchange="changeTextbox(this.value)" style="width: 80px" required/><input type="radio" id="customRadio1" name="level" class="form-check-input" value="E" required><label>elementary student/s (Grade 1 to 6) for PHP 1,250 / US$30</label> 
                            </div>

                            <div class="form-inline">
                              <input type="radio" id="customRadio2" name="level" class="form-check-input" value="HS"><label>high school student/s (Grade 7 to 12) for PHP 1,500 / US$36</label><label>&nbsp;per month in a school year.</label><br/><br/>
                            </div><br/><br/>

                            <div class="form-inline">
                                <label>The total amount that I pledge to donate for sponsorship the school year</label>
                                <input type="number" class="form-control" name="schlyrtp" min="1900" placeholder="Year" style="width: 100px"/><label><h6>-</h6></label><input type="number" min="1900" lass="form-control" name="schoolyrfro" placeholder="Year" style="width: 100px"/>
                            </div>
                            <div id="display">
                              <div class="form-inline">
                                <label>is</label>  
                                <input readonly type="number" name="amount" class="form-control" id="total"/><label>(PHP 12,500 / US$300 a year per elementary student and PHP 15,000 / US$360</label>
                                <label>a year per high school student).</label>                                
                              </div>
                            </div>
                            <div>
                                
                            </div><br/><br/>
                            <div class="form-inline">
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;I will send my donation&nbsp;&nbsp;&nbsp;</label>
                                <select class="form-control" name="type" required>
                                  <option value="M">Monthly</option>
                                  <option value="Y">Yearly</option>
                                </select>
                            </div><br/>

                            <div class="form-inline">
                            <label>Do you have a preference for scholars?</label><input type="radio" class="form-check-input" name="pref" value="Yes" onchange="displayPref(this.value)"/><label>&nbsp;Yes</label><input type="radio" class="form-check-input" value="No" name="pref" onchange="displayPref(this.value)"/><label>&nbsp;No</label>
                            </div>

                            <div id="preference" style="display: none">
                              <div class="form-inline">
                              <input type="checkbox" class="form-check-input" value="1" name="first" onchange="displayGen(this)"/><label>Gender</label>
                              <select class="form-control" id="gender" name="gender" style="display: none">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                              </select>
                              </div>

                              <div class="form-inline">
                              <input type="checkbox" class="form-check-input" value="1" name="second" onchange="displayRel(this)"/><label>Religion</label><input type="text" class="form-control" id="religion" style="display: none" name="religion"/>
                              </div>

                              <div class="form-inline">
                              <input type="checkbox" class="form-check-input" value="1" name="third" onchange="displayGwa(this)"/><label>General Weighted Average</label><input type="number" class="form-control" id="gwa" style="display: none" name="gwa"/>
                              </div>
                            </div>
                            <input type="submit" value="Submit" name="submit" class="btn btn-success" style="float: right" onclick="validateDate(); checkEmail();"/>
                        </form>
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

    <?php
    if (isset($_POST["submit"])){
    require ('../connection.php');

    $submission = date("Y-m-d");
    $type = $_POST["level"].$_POST["type"];
    $password = createRandomPassword();
    $pref = $_POST["pref"];

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

    if ($_POST["level"] == "E")
    {
        $count = $_POST["scholar"];
    }

    else if ($_POST["level"] == "HS")
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

    $query = "INSERT INTO person (firstName, middleName, lastName, type) VALUES ('$_POST[fn]', '$_POST[mn]', '$_POST[ln]', 'SP')";

    if (mysqli_query($con, $query))
    {
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

      if($_POST["first"]==1)
      {
        $gender = $_POST["gender"];
        $query5 = "UPDATE s_preference SET gender = '$gender' WHERE sponsorID = '$sponsor_id'";
        mysqli_query($con, $query5);
      }

      if($_POST["second"]==1)
      {
        $religion = $_POST["religion"];
        $query5 = "UPDATE s_preference SET religion = '$religion' WHERE sponsorID = '$sponsor_id'";
        mysqli_query($con, $query5);
      }

      if($_POST["third"]==1)
      {
        $gwa = $_POST["gwa"];
        $query5 = "UPDATE s_preference SET averageGender = '$averageGender' WHERE sponsorID = '$sponsor_id'";
        mysqli_query($con, $query5);
      }
    }

    echo '<script>swal({
      title: "Success!",
      text: "<center>Application is submitted. \nPlease remember this code for viewing. \nReferral Code:'.$password.'</center>",
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

  </body>

</html>
