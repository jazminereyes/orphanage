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

     <!-- Steps -->
    <link rel="stylesheet" href="jquery-steps-master/dist/jquery-steps.css">
    <link rel="stylesheet" href="jquery-steps-master/examples/css/style.css">

    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/set2.css" />
    <link rel="stylesheet" type="text/css" href="css/cs-select.css" />
    <link rel="stylesheet" type="text/css" href="css/sponsorapp.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />


    <!-- Include SmartWizard CSS -->
    <link href="SmartWizard/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />

    <!-- Optional SmartWizard theme -->
    <link href="SmartWizard/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
    <link href="SmartWizard/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
    <link href="SmartWizard/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

     <!-- Script -->
     <script src="js/sweetalert.min.js"></script>

	<!-- Script -->
	<script type="text/javascript" src="webcamjs/webcam.min.js"></script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
  
  // Configure a few settings and attach camera
  function configure(){
    Webcam.set({
      width: 500,
      height: 340,
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

    // Get base64 value from <img id='imageprev'> source
    var base64image =  document.getElementById("imageprev").src;

     Webcam.upload( base64image, 'upload.php', function(code, text) {
       console.log('Save successfully');
       //console.log(text);
       swal({
            title: "Success!",
            text: "Application is submitted. Please wait for the confirmation of your application via e-mail.",
            icon: "success"
            }).then(function() {
                window.location = "index.php";
            });
        });

  }
</script>

    <!-- Dropdown Nav -->
    <script src="moment.js/moment.js"></script>
    

    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>

    <style>
      @import url(http://fonts.googleapis.com/css?family=Raleway:200,500,700,800);
    body {
      background: #f9f7f6;
      color: #404d5b;
      font-weight: 500;
      font-size: 1.05em;
      font-family: 'Raleway', Arial, sans-serif;
    }

    @media (min-width: 992px){
      section {
          padding: 150px 0;
          background-image: url("img/bgg.jpg");
          background-repeat: no-repeat;
          background-size: 200%;
      }
    }

      .swal-button 
      {
        background-color: #28a745;
      }

      #my_camera, #results{
        width: 500px;
        height: 340px;
        border: 1px solid black;
      }

      .buttons 
      {
          margin-left: 265px;
      }

      .smart 
      {
        display: none;
      }

      .sw-btn-prev, .sw-btn-next 
      {
        margin-bottom: 20px;
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
                <li><a href="#" data-toggle="modal" data-target="#modalOrphan">Orphan</a></li>
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
      <div class="section page-login height-full img-cover" >
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
              </form>
              <br/>
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
      
          <div class="row text-center">
          <div class="col-lg-12">
            <h2 class="section-heading text-uppercase">VERIFICATION</h2>
          </div>

          <div class="text-danger" style="margin-left: 120px; margin-bottom: 15px;">
            For verification purposes, the applicant must submit a realtime photo.
          </div>
        </div>

        <div class="container">

  <div class="container">
<br />
<form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">

<!-- SmartWizard html -->
<div id="smartwizard">
    <ul>
        <li><a href="#step-1">Step 1<br /><small>Configure</small></a></li>
        <li><a href="#step-2">Step 2<br /><small>Take Photo</small></a></li>
        <li><a href="#step-3">Step 3<br /><small>Save Photo</small></a></li>
    </ul>

    <div>
        <div id="step-1">
            <center><h2>Configure your webcam.</h2></center>
            <center><input type=button class="btn btn-warning btn-flat" value="Configure" onClick="configure()"/></center>
            <div><p id="msg"></p></div>
        </div>
        <div id="step-2">
            <center><h2>Take your photo.</h2></center>
            <center><div id="my_camera"></div></center><br/>
            <center><input type=button class="btn btn-danger" value="Take Snapshot" onClick="take_snapshot()"></center>
            <div><p id="message"></p></div><br/>
        </div>
        <div id="step-3">
            <center><h2>Save your photo.</h2></center>
            <center><div id="results"></div></center><br/>
            <center><input type=button class="btn btn-success" value="Save Snapshot" onClick="saveSnap()"></center><br/>
        </div>
    </div>
</div>

</form>

</div>

       <!-- <div class="row">
            <div class="col-lg-10" style="float: none; margin: auto;">
                <div class="card" style="background-color: #F5F5F5">  
                    <div class="card-body">
                            <div>
                                <div id="my_camera"></div><br/>
                                <div class="buttons">
                                    <input type=button class="btn btn-warning" value="Configure" onClick="configure()">
	                                <input type=button class="btn btn-danger" value="Take Snapshot" onClick="take_snapshot()">
                                    <input type=button class="btn btn-success" value="Save Snapshot" onClick="saveSnap()">
                                </div><br/><br/>

                                <h4 class="text-center">RESULT</h4>
                                <div id="results"></div>
                           </div>
                    </div>
                </div><br/><br/>
            </div>
        </div> -->
      
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
        /*$swid = mysqli_insert_id($con);
        echo "<script>";
        //echo "swal('Success!', 'Application is submitted. \nWait for the staff to process your application. Your password will emailed once verification is done.', 'success');";
        echo "saveSnap();";
        echo "</script>";*/
        header ('Location: applicationphoto.php');
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

    <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="SmartWizard/dist/js/jquery.smartWizard.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                                             .addClass('btn btn-info smart')
                                             .on('click', function(){
                                                    if( !$(this).hasClass('disabled')){
                                                        var elmForm = $("#myForm");
                                                        if(elmForm){
                                                            elmForm.validator('validate');
                                                            var elmErr = elmForm.find('.has-error');
                                                            if(elmErr && elmErr.length > 0){
                                                                alert('Oops we still have error in the form');
                                                                return false;
                                                            }else{
                                                                alert('Great! we are ready to submit form');
                                                                elmForm.submit();
                                                                return false;
                                                            }
                                                        }
                                                    }
                                                });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger smart')
                                             .on('click', function(){
                                                    $('#smartwizard').smartWizard("reset");
                                                    $('#myForm').find("input, textarea").val("");
                                                });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'dots',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });

            $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                    var elmErr = elmForm.children('.has-error');
                    if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });

            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 3){
                    $('.btn-finish').removeClass('disabled');
                }else{
                    $('.btn-finish').addClass('disabled');
                }
            });

        });
    </script>

  </body>

</html>
