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

    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">

    <!-- MDB -->
    <link href="css/mdb/css/mdb.css" rel="stylesheet">
    <link href="css/mdb/css/style.css" rel="stylesheet">


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

    .swal-button 
    {
      background-color: #28a745;
    }

    #my_camera{
      width: 400px;
      height: 240px;
      border: 1px solid black;
    }

    @media (min-width: 992px){
      section {
          padding: 150px 0;
          background-image: url("img/bgg.jpg");
          background-repeat: no-repeat;
          background-size: 200%;
      }
    }
  </style>

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

      // window.alert(emailadd);

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
        <div class="row text-center">
          <div class="col-md-12">
            <span class="section-heading text-uppercase text-dark" style="font-size: 2.5em;">Referral Registration</span>
          </div><br/>

          <div class="text-danger" style="margin-left: 120px; margin-bottom: 15px;">
            Fields marked with * are required.
          </div>
        </div>

        <div class="row">
            <div class="col-lg-10" style="float: none; margin: auto;">
                <div class="card" style="background-color: #F5F5F5">  
                    <div class="card-body">
                        <form method="post" action="register.php" id="form1" enctype="multipart/form-data">
                            <div class="row">
              <div class="col-md-4 col-custom">
                <span class="input input--chisato">
                  <input class="input__field input__field--chisato required" type="text" id="input-13" name="fn" style="color: black" required />
                  <label class="input__label input__label--chisato" for="input-13">
                    <span class="input__label-content input__label-content--chisato" data-content="First Name" style="color: black">First Name<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                  </label>
                </span>
                </div>
                <div class="col-md-4 col-custom">
                <span class="input input--chisato">
                  <input class="input__field input__field--chisato " type="text" id="input-13" name="mn" style="color: black" />
                  <label class="input__label input__label--chisato" for="input-13">
                    <span class="input__label-content input__label-content--chisato" data-content="Middle Name" style="color: black">Middle Name</span>
                  </label>
                </span>
                </div>
                <div class="col-md-4 col-custom">
                <span class="input input--chisato">
                  <input class="input__field input__field--chisato required" type="text" id="input-13" name="ln" style="color: black" required />
                  <label class="input__label input__label--chisato" for="input-13">
                    <span class="input__label-content input__label-content--chisato" data-content="Last Name" style="color: black">Last Name<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                  </label>
                </span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 text-center" style="margin-top: 20px">
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
                <div class="col-md-5 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato required" type="email" name="email" id="email" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="Email" style="color: black">Email<i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>
                    </label>
                  </span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato required" type="text" name="address" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="Address" style="color: black">Address<i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>
                    </label>
                  </span>
                </div>
                <div class="col-md-6 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato required" type="number" name="telNo" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="Contact Number" style="color: black">Contact Number<i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>
                    </label>
                  </span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-custom">
                  <span class="input input--chisato" style="margin-top: 0px;">
                    <input class="input__field input__field--chisato required" type="text" name="endorser" style="color: black" required />
                    <label class="input__label input__label--chisato" for="input-13">
                      <span class="input__label-content input__label-content--chisato" data-content="Endorser Agency" style="color: black">Endorser Agency<i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>
                    </label>
                  </span>
                </div>
                <div class="col-md-6 col-custom" style="margin-top: 20px;">
                  <label>Identification Card<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span></label>&nbsp&nbsp
                  <input type="file" name="social" class="form-custom" required/>
                </div>
              </div>                           
              
              <input type="submit" value="Submit" name="submit" id="Submit" class="btn btn-success" style="float: right" onclick="validateDate(); checkEmail();"/>
            </form>
                    </div>
                </div><br/><br/>
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

      </script>

  </body>

</html>
