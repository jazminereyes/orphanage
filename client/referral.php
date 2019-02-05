<?php
  session_start();

  if(isset($_SESSION['user'])){

    require ('../connection.php');
    $userid = $_SESSION['user'];
    $q = "SELECT type FROM user JOIN person ON user.personID = person.personID WHERE userID = '$userid'";
    $res = mysqli_query($con, $q);
    $rec = mysqli_fetch_row($res);

    if($rec[0]=="SP"){
    $nav = '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="sponsorprofile.php">My Account</a>
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
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Concordia Children's Services | Orphan</title>

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
    body{
      background: #f9f7f6;
      color: #404d5b;
      font-weight: 500;
      font-size: 1.05em;
      font-family: 'Raleway', Arial, sans-serif;
    }
  </style>

    <!-- Dropdown Nav -->
    <script>
      $('ul.nav li.dropdown').hover(function() 
      {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });
    </script>

    <script src="moment.js/moment.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script>
      function validateDate()
      {
        var month = document.getElementById('month').value;
        var day = document.getElementById('date').value;
        var year = document.getElementById('year').value;

        var date = year+"-"+month+"-"+day;

        var now = moment();
        var years = moment().diff(date, 'years');

        if (years>1)
        {
          swal("Error", "Concordia Children's Services, Inc. only accepts orphans who are less than 2 years old.", "error");
          event.preventDefault();
        }
        
      }

      function display(str)
      {
        swal({
              title: 'Success!',
              text: 'Application is submitted. \nPlease remember this code for viewing. Referral Code: '+str,
              icon: 'success',
              button: 'OK'
            }).then((value)=>{
              if (value==true)
              {
                window.location.href='index.php';
              }
            });
      }

        $(window).load(function(){
    $(".col-3 input").val("");
    
    $(".input-effect input").focusout(function(){
      if($(this).val() != ""){
        $(this).addClass("has-content");
      }else{
        $(this).removeClass("has-content");
      }
    })
  });
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
            <?php echo $nav ?>
            <?php echo $link ?>
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
        <div class="row">
          <div class="col-lg-12 text-center">
            <span class="section-heading text-uppercase text-dark" style="font-size: 2.5em;">Orphan Referral</span>
          </div><br/>
          
          <div class="text-danger" style="margin-left: 120px; margin-bottom: 15px;">
            Fields marked with * are required.
          </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12" style="float: none; margin: auto;">
                <div class="card" style="background-color: #F5F5F5">  
                    <div class="card-body">
                        <form method="post" action="referral.php" enctype="multipart/form-data">
                           
            <span style="font-size: 2.0em;">Child Information</span>

            <div class="row">
              <div class="col-md-4 col-custom">
                <span class="input input--chisato">
                  <input class="input__field input__field--chisato required" type="text" id="input-13" name="fn" style="color: black"/>
                  <label class="input__label input__label--chisato" for="input-13">
                    <span class="input__label-content input__label-content--chisato" data-content="First Name" style="color: black">First Name</span>
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
                  <input class="input__field input__field--chisato required" type="text" id="input-13" name="ln" style="color: black"/>
                  <label class="input__label input__label--chisato" for="input-13">
                    <span class="input__label-content input__label-content--chisato" data-content="Last Name" style="color: black">Last Name</span>
                  </label>
                </span>
              </div>
            </div>

             <div class="row">
                <div class="col-md-5 text-center" style="margin-top: 20px">
                  <label>Birthday</label>
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
                      <input class="form-custom" type="number" name="date" min="1" max="31" id="date" placeholder="Date" style="width: 80px; margin: 0;"/>
                      <input class="form-custom" type="number" name="year" min="1900" id="year" placeholder="Year" style="width: 100px; margin: 0;"/>
                  </div>
                  <div class="col-md-4 col-custom text-center" style="margin-top: 20px;">
                      <label style="margin-left: 30px">Gender:<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;</label>

                      <label style="margin-right: 20px">
                      <input class="flat-red" type="radio" name="gender" value="M" required >Male</label>
                      <label >
                      <input class="flat-red" type="radio" name="gender" value="F">Female</label>
                  </div>
              </div>
                 <div class="row">
                    <div class="col-md-5 col-custom">
                      <label style="margin-left: 15px">Place Found:<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span></label>
                      <input type="text" name="placefound" required/>
                    </div>

                    <div class="col-md-5 col-custom" style="margin-top: 20px">
                    <label style="margin-left: 15px">Religion:</label>
                    <select class="form-custom" name="religion" style="margin-left: 10px; display: inline; width: 70%">
                      <option></option>
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
                    <div class="col-md-5 col-custom" style="margin-top: 20px">
                      <label>Case Status<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;</label>
                      <select class="form-custom" name="casestatus" style="width: 70%" required >
                                <option value="Foundling">Foundling</option>
                                <option value="Neglected">Neglected</option>
                                <option value="Abandoned">Abandoned</option>
                              </select>
                    </div>
                  </div>

                  <hr>

                  <span style="font-size: 2.0em;">Referral Documents</span>
                  <br/><br/>

                  <div class="row">
                    <div class="form-inline" style="width: 100%">
                      <div class="col-md-6">
                        <label>Child Photo<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;</label>
                        <input type="file" name="child" class="form-control" required/>
                      </div>
                      <div class="col-md-6">
                        <label>Referral Letter<span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;</label>
                        <input type="file" name="refer" class="form-control" required/>
                      </div>
                    </div>
                  </div><br/>

                  <div class="row">
                      <div class="col-md-4 col-custom">
                        <label>Medical Abstract<span><i class="fa fa-asterisk text-danger" style="font-size: 9px;"></i></span>&nbsp;</label>
                        <input type="file" name="med" class="form-control" required/>
                      </div>
                      <div class="col-md-4">
                        <label>Birth Certificate</label>
                        <input type="file" name="bc" class="form-control" />
                      </div>
                      <div class="col-md-4">
                        <label>Brgy. Blotter</label>
                        <input type="file" name="brgy" class="form-control"/>
                      </div>
                  </div><br/><br/>

                  <input type="submit" value="Submit" name="submit" class="btn btn-success" style="float: right" onclick="validateDate()"/>
              </form>
                    </div>
                </div><br/><br/>
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
    if (isset($_POST['submit']))
    {
        require ('../connection.php');

        if ($_POST['month']==""||$_POST['date']==""||$_POST['year']=="")
        {
            $birthdate = "";
        }

        else
        {
            $birthdate = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
        }

        /*$age = date_diff(date_create($birthdate), date_create('today'))->y;

        if ($age>1)
        {
            echo '<script>
                alert("Child cannot be older than 1 year old.");
                window.location = "referral.php";    
            </script>';
        }*/

        $password = createRandomPassword();

        $userid = $_SESSION["user"];
        $q = "SELECT socialWorkerID FROM user JOIN person JOIN socialworker ON user.personID = person.personID AND person.personID = socialworker.personID WHERE userID = '$userid'";
        $result = mysqli_query($con, $q);
        $row = mysqli_fetch_row($result);
        $swid = $row[0];

        $query = "INSERT INTO person(firstName, middleName, lastName, type) VALUES ('$_POST[fn]', '$_POST[mn]', '$_POST[ln]', 'O')";
        if (mysqli_query($con, $query))
        {
            $last_id = mysqli_insert_id($con);
        }

        $query2 = "INSERT INTO orphan(personID, birthdate, gender, religion, placeFound, caseStatus, applicationStatus) VALUES ('$last_id', '$birthdate', '$_POST[gender]', '$_POST[religion]', '$_POST[placefound]', '$_POST[casestatus]', 'Pending')";
        if (mysqli_query($con, $query2))
        {
            $orphan_id = mysqli_insert_id($con);
        }

        $today = date('Y-m-d');

        $query3 = "INSERT INTO o_referral(orphanID, socialWorkerID, referralDate, referralCode) VALUES ('$orphan_id', '$swid', '$today', '$password')";
        if (mysqli_query($con, $query3))
        {
            $referral_id = mysqli_insert_id($con);
        }

        $query4 = "INSERT INTO o_referraldocs(referralID) VALUES ('$referral_id')";
        if (mysqli_query($con, $query4))
        {
            $refdocs_id = mysqli_insert_id($con);
        }

       //if (!empty($_POST["swid"]))
        //{

            $file = $_FILES['child'];
            $name = $file['name'];

            $path = "referrals/" . basename($name);
            if (move_uploaded_file($file['tmp_name'], $path)) {
            echo "Succeed.";
            $child = $path;
            $a = "UPDATE person SET photo = '$child' WHERE person = '$last_id'";
            mysqli_query($con, $a);
            } else {
            echo "Error.";
            }

            /*if (empty($_POST['swid']))
            {
                echo "Referral Letter is Empty";
            }*/

            if ($_FILES['swid']['size']==0)
            {
                echo "Walang Laman.";
            }
            
            else
            {
                echo "May Laman";

                $file = $_FILES['swid'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $swid = $path;
                    $a = "UPDATE o_referraldocs SET swIDcard = '$swid' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }

            }

            if ($_FILES['refer']['size']==0)
            {
                echo "Walang Laman.";
            }
            
            else 
            {
                $file = $_FILES['refer'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $refer = $path;
                    $a = "UPDATE o_referraldocs SET referralLetter = '$refer' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }
            }
            
            if ($_FILES['bc']['size']==0)
            {
                echo "Walang Laman.";
            }
            
            else 
            {
                $file = $_FILES['bc'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $bc = $path;
                    $a = "UPDATE o_referraldocs SET birthCertificate = '$bc' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }

            }
            
            if ($_FILES['med']['size']==0)
            {
                echo "Walang Laman.";
            }
            else 
            {
                $file = $_FILES['med'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $med = $path;
                    $a = "UPDATE o_referraldocs SET medicalAbstract = '$med' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }
            }
            
            if ($_FILES['brgy']['size']==0)
            {
                echo "Walang Laman.";
            }

            else 
            {
                $file = $_FILES['brgy'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $brgy = $path;
                    $a = "UPDATE o_referraldocs SET brgyBlotter = '$brgy' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }
            }

            echo '<script>swal({
              title: "Success!",
              text: "Referral is submitted.",
              icon: "success"
            }).then(function() {
              window.location = "profile.php";
            });</script>';

            /*echo "<script>";
            echo "alert('Application is submitted. Please remember this code for viewing. Referral Code:".$password."');";
            echo "window.location.href='index.php'";
            echo "</script>";*/

            /*$target_file = $target_directory.basename($_FILES["swid"]["name"]);

            if (move_uploaded_file($_FILE["swid"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $swid = $target_file;
            }*/
        //}

        /*if (!empty($_POST["refer"]))
        {
            $target_file = $target_directory.basename($_FILES["refer"]["name"]);

            if (move_uploaded_file($_FILE["refer"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $refer = $target_file;
            }
        }

        if (!empty($_POST["bc"]))
        {
            $target_file = $target_directory.basename($_FILES["bc"]["name"]);

            if (move_uploaded_file($_FILE["bc"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $bc = $target_file;
            }
        }

        if (!empty($_POST["med"]))
        {
            $target_file = $target_directory.basename($_FILES["med"]["name"]);

            if (move_uploaded_file($_FILE["med"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $med = $target_file;
            }
        }

        if (!empty($_POST["brgy"]))
        {
            $target_file = $target_directory.basename($_FILES["brgy"]["name"]);

            if (move_uploaded_file($_FILE["brgy"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $brgy = $target_file;
            }
        }
        
        $query4 = "INSERT INTO o_referraldocs(referralID, referralLetter, brgyBlotter, medicalAbstract, birthCertificate) VALUES ('$referral_id', '$refer', '$brgy', '$med', '$bc')";
        if (mysqli_query($con, $query4))
        {
            echo "<script>";
            echo "alert('Application is submitted. Please remember this code for viewing. Referral Code:".$password."');";
            echo "window.location.href='index.php'";
            echo "</script>";
        }*/
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
