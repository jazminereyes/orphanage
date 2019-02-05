<!DOCTYPE html>
<html lang="en">
<?php
    require ('../connection.php');

    $query = "SELECT email FROM socialworker";
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

    <!-- BEGIN PAGE STYLE -->
    <link rel="stylesheet" href="assets/css/form.css"/>
    <link rel="stylesheet" href="assets/css/pages.css"/>
    <!-- END PAGE STYLE -->
    <link rel="stylesheet" href="assets/css/colors.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>

     <!-- Script -->
	<script type="text/javascript" src="webcamjs/webcam.min.js"></script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
  
  // Configure a few settings and attach camera
  function configure(){
    Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
  }
  // A button for taking snaps
  

  // preload shutter audio clip
  var shutter = new Audio();
  shutter.autoplay = false;
  shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

  function take_snapshot() {
    // play sound effect
    shutter.play();

    // take snapshot and get image data
    Webcam.snap( function(data_uri) {
      // display results in page
      document.getElementById('results').innerHTML = 
        '<img id="imageprev" src="'+data_uri+'"/>';
    } );

    Webcam.reset();
  }

  function saveSnap(){

    alert(0);

    /*
    // Get base64 value from <img id='imageprev'> source
    var base64image =  document.getElementById("imageprev").src;

     Webcam.upload( base64image, 'upload.php', function(code, text) {
       console.log('Save successfully');
       //console.log(text);
          });
  */
  }
</script>

    <!-- Dropdown Nav -->
    <script src="moment.js/moment.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>

    <script>
      var emailadd = <?php echo '["' . implode('", "', $rows) . '"]' ?>;

      window.alert(emailadd);

      function validateDate()
      {
        var month = document.getElementById('month').value;
        var date = document.getElementById('date').value;
        var year = document.getElementById('year').value;

        date = year+"-"+month+"-"+date;

        if (moment(date).isAfter(moment())==true)
        {
          swal("Error", "Invalid Birthdate!", "error");
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
      @media (min-width: 992px){
      section {
          padding: 150px 0;
          background-image: url("../img/bg4.jpg");
          background-repeat: no-repeat;
          background-size: 200%;
      }
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

      .swal-button 
      {
        background-color: #28a745;
      }

      #my_camera{
        width: 400px;
        height: 240px;
        border: 1px solid black;
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
    <section id="services">
      <div class="container">

        <div class="row text-center">
          <div class="col-lg-12">
            <h2 class="section-heading text-uppercase">REGISTER</h2>
          </div>

          <div class="text-danger" style="margin-left: 120px; margin-bottom: 15px;">
            Fields marked with * are required.
          </div>
        </div>

        <div class="row">
            <div class="col-lg-10" style="float: none; margin: auto;">
                <div class="card" style="background-color: #F5F5F5">  
                    <div class="card-body">
                        <form method="post" action="register.php" id="form1" enctype="multipart/form-data">
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
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Address</label>
                                <input type="text" name="address" class="form-control" style="width: 240px" required/>
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Contact Number</label>
                                <input type="text" name="telNo" class="form-control" required/>
                            </div><br/>
                            <div class="form-inline">
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Endorser Agency</label>
                                <input type="text" name="endorser" class="form-control" required/>
                                <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Identification Card</label>
                                <input type="file" name="social" class="form-control" required/>
                            </div><br/><br/>
                           
                            <input type="submit" value="Submit" name="submit" id="Submit" class="btn btn-success" style="float: right" onclick="validateDate(); checkEmail();"/>
                        </form>
                    </div>
                </div><br/><br/>
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

      $query = "SELECT COUNT(socialWorkerID) FROM socialworker";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_row($result);

      $count = $row[0]+1;
      $filename = 'socialworker_'.$count.date('YmdHis') . '.jpeg';

      $url = '';
      if( move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/'.$filename) ){
	      $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
      }

      $filepath = "upload/".$filename;

      $file = $_FILES['social'];
      $name = $file['name'];

      $path = "referrals/".basename($name);
      if (move_uploaded_file($file['tmp_name'], $path)) {
        echo "Succeed.";
        $swidcard = $path;
      } else {
        echo "Error.";
      }

      $query = "INSERT INTO person (firstName, middleName, lastName, type) VALUES ('$_POST[fn]', '$_POST[mn]', '$_POST[ln]', 'SW')";

      if (mysqli_query($con, $query))
      {
        $person_id = mysqli_insert_id($con);
      }

      $query2 = "INSERT INTO user(personID, programType) VALUES ('$person_id', 'Social Worker')";

      if (mysqli_query($con, $query2))
     {
        $user_id = mysqli_insert_id($con);
      }

      $query3 = "INSERT INTO socialworker(personID, email, birthdate, address, contactNo, endorserAgency, swIDCard, dateApplied, verifiedFlag) VALUES ('$person_id', '$_POST[email]', '$birthday', '$_POST[address]', '$_POST[telNo]', '$_POST[endorser]', '$swidcard', '$submission', '0')";

      if (mysqli_query($con, $query3))
      {
        $swid = mysqli_insert_id($con);
        echo "<script>";
        //echo "swal('Success!', 'Application is submitted. \nWait for the staff to process your application. Your password will emailed once verification is done.', 'success');";
        echo "window.location.href = 'applicationphoto.php';";
        echo "</script>";
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

   
  </body>

</html>
