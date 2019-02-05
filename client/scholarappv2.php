<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Concordia Children's Services | Scholar</title>

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
    
    <!-- Steps -->
    <link rel="stylesheet" href="jquery-steps-master/dist/jquery-steps.css">
    <link rel="stylesheet" href="jquery-steps-master/examples/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Dropdown Nav -->

    <link rel="stylesheet" type="text/css" href="css/custom.css" />
    <link rel="stylesheet" type="text/css" href="css/scholarapp.css" />
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
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Scholar Application</h2>
          </div>

          <div class="text-danger" style="margin-left: 20px; margin-bottom: 15px;">
            Fields marked with * are required.
          </div>
        </div>

          <div id="demo">
            <div class="step-app">
              <ul class="step-steps">
                <li><a href="#step1"><strong>Basic Information</strong>&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a></li>
                <li><a href="#step2"><strong>Medical Information</strong>&nbsp;&nbsp;<i class="fa fa-file-medical"></i></a></li>
                <li><a href="#step3"><strong>Hobbies</strong>&nbsp;&nbsp;<i class="fa fa-school"></i></a></li>
                <li><a href="#step4"><strong>Family Background</strong>&nbsp;&nbsp;<i class="fa fa-user-circle"></i></a></li>
                <li><a href="#step5"><strong>Other Information</strong>&nbsp;&nbsp;<i class="fa fa-home"></i></a></li>
              </ul>

              <div class="step-content">
                <div class="step-tab-panel" id="step1">
                  <form method="post" action="addscholar.php" id="frmInfo">
                  <div class="form-inline">
                    <label for="inputName"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;First Name</label>
                    <input type="text" class="form-control required" id="inputName" name="first" style="width: 180px; margin-left: 10px;" required/>
                    <label for="inputName" style="margin-left: 20px">Middle Name</label>
                    <input type="text" class="form-control" id="inputName" name="middle" style="width: 180px; margin-left: 10px;"/> 
                    <label for="inputName" style="margin-left: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Last Name</label>
                    <input type="text" class="form-control required" id="inputName" name="last" style="width: 190px; margin-left: 10px;" required/>
                  </div><br/>
                  <div class="form-inline">
                      <label for="inputName">Nickname</label>
                      <input type="text" class="form-control" id="inputName" name="nickname" style="width: 130px; margin-left: 10px;"/> <br/>
                      <label for="inputName" style="margin-left: 20px; margin-right: 10px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Birthdate</label>
                      <select class="form-control required" name="bmonth" style="margin:0" required>
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
                      <input type="number" class="form-control required" name="bdate" min = "1" max="31" placeholder="Day" style="width: 80px; margin:0;" required/>
                      <input type="number" class="form-control required" name="byear" min="1900" placeholder="Year" style="width: 100px; margin:0;" required/>
                      <label style="margin-left: 30px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Gender:</label>
                      <label class="form-check-label radio-inline" style="margin-left: 20px"><input class="form-check-input" type="radio" name="gender" value="M" required>Male</label>
                      <label class="form-check-label radio-inline" style="margin-left: 20px"><input class="form-check-input" type="radio" name="gender" value="F">Female</label>
                      <br/><br/>
                    </div><br/>
                    <div class="form-inline">
                      <label for="inputName"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Street</label>
                      <input type="text" class="form-control required" id="inputName" name="street" style="width: 320px; margin-left: 10px;" required/> <br/>
                      <label for="inputName" style="margin-left: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;City</label>
                      <input type="text" class="form-control required" id="inputName" name="city" style="width: 200px; margin-left: 10px;" required/> <br/>
                      <label for="inputName" style="margin-left: 20px">Zip Code</label>
                      <input type="text" class="form-control" id="inputName" name="zip" style="width: 100px; margin-left: 10px; display: inline;"/> <br/><br/>
                    </div> <br/>
                    <div class="form-inline">
                      <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Religion</label>
                      <input type="text" class="form-control required" name="religion" required/>
                      <label><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Last General Weighted Average</label>
                      <input type="text" class="form-control required" name="lgwa" required/>
                    </div><br/>
                    <div class="form-inline">
                      <label for="inputName"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;School Last Attended</label>
                      <input type="text" class="form-control required" id="inputName" name="school" style="width: 500px; margin-left: 10px; display: inline;" required/> <br/><br/>
                    </div><br/>
                    <div class="form-inline">
                      <label for="currentYrLevel"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Highest Educational Attainment:</label>
                      <select class="form-control required" name="currentYrLevel" name="currentYrLevel" style="width: 250px; margin-left: 10px; display: inline;" required>
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
                      <label style="margin-left: 20px">Classification:</label>
                      <label class="form-check-label radio-inline" style="margin-left: 40px"><input class="form-check-input" type="radio" name="classification" value="In_School">In School</label>
                      <label class="form-check-label radio-inline" style="margin-left: 40px"><input class="form-check-input" type="radio" name="classification" value="Out_School">Out of School</label>
                    </div><br/>
                    <div class="form-inline">
                      <label for="inputPlace"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Referred By</label>
                      <input type="text" class="form-control required" id="inputPlace" name="referredBy" style="width: 200px; margin-left: 10px;" required/> <br/>
                      <label for="inputPlace" style="margin-left: 20px;">Relation to Referrer</label>
                      <input type="text" class="form-control" id="inputPlace" name="relationToReferrer" style="width: 200px; margin-left: 10px;"/> <br/>
                    </div><br/><br/>
                </div>
                <div class="step-tab-panel" id="step2">
                  <div class="form-inline">
                    <label for="inputPlace"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Height (cm)</label>
                    <input type="text" class="form-control required" id="inputPlace" name="height" style="width: 110px; margin-left: 20px" required/> <br/>
                    <label for="inputPlace" style="margin-left: 30px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Weight (kg)</label>
                    <input type="text" class="form-control required" id="inputPlace" name="weight" style="width: 110px; margin-left: 20px" required/> <br/>
                  </div><br/>
                  <div class="form-inline"> 
                    <label for="inputPlace">Distinguishing Marks (if any)</label>
                    <input type="text" class="form-control" id="inputPlace" name="discolorMarks" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>
                    <label for="inputPlace" style="margin-left: 30px;">Hair Color</label>
                    <input type="text" class="form-control required" id="inputPlace" name="hairColor" style="margin-left: 20px" required/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace">Eye Color</label>
                    <input type="text" class="form-control required" id="inputPlace" name="eyeColor" style="margin-left: 20px" required/> <br/>
                    <label for="inputPlace" style="margin-left: 30px">Skin Tone</label>
                    <input type="text" class="form-control required" id="inputPlace" name="skinTone" style="width: 200px; margin-left: 20px; display: inline;" required/> <br/><br/>
                  </div><br/>
                  <div class="form-inline">
                    <label>Does the child have an illness?</label>
                    <label class="form-check-label radio-inline" style="margin-left: 40px"><input class="form-check-input" type="radio" name="classification" value="yes">Yes</label>
                    <label class="form-check-label radio-inline" style="margin-left: 40px"><input class="form-check-input" type="radio" name="classification" value="no">No</label><br/><br/>
                    <label for="inputPlace" style="margin-left: 30px">Specify Illness</label>
                    <input type="text" class="form-control" id="inputPlace" name="illness" style="width: 200px; margin-left: 20px; display: inline;"/> <br/><br/>
                  </div><br/>                          
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px">When was the child last hospitalized?</label>
                    <select class="form-control" name="hmonth" style="margin: 0">
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
                    <input type="number" class="form-control" name="hdate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0;"/>
                    <input type="number" class="form-control" name="hyear" min="1900" placeholder="Year" style="width: 100px; margin: 0;"/>
                  </div><br/>
                  <label for="inputPlace">Where was the child last hospitalized?</label>
                  <input type="text" class="form-control" id="inputPlace" name="lastph" style="width: 300px; margin-left: 20px; display: inline;"/> <br/>
                  <br/><br/>
                </div>
                <div class="step-tab-panel" id="step3">
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 28px">Child activities at home</label>
                    <textarea class="form-control" name="homeActivity" style="width: 230px; height: 80px;"></textarea>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 10px;">Child activities outside</label>
                    <textarea class="form-control" name="outsideActivity" style="width: 230px; height: 80px;"></textarea>
                  </div> <br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 70px">Favorite subject/s</label>
                    <textarea class="form-control" name="faveSubject" style="width: 230px; height: 80px;"></textarea>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 67px;">Favorite sport/s</label>
                    <textarea class="form-control" name="faveSport" style="width: 230px; height: 80px;"></textarea>
                  </div> <br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 10px">Extra-curricular activities</label>
                    <textarea class="form-control" name="extracoActivities" style="width: 230px; height: 80px;"></textarea>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 115px;">Ambition</label>
                    <textarea class="form-control" name="ambition" style="width: 230px; height: 80px;"></textarea>
                  </div><br/><br/>
                </div>
                <div class="step-tab-panel" id="step4">
                  <br/><br/><h3>BIRTHMOTHER</h3>

                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Maiden Name</label>
                    <input type="text" class="form-control required" id="inputPlace" name="mname" required/> <br/>
                    <label for="inputName" style="margin-left: 30px; margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Birthdate</label>
                    <select class="form-control required" name="mbdmonth" style="margin:0" required>
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
                    <input type="number" class="form-control required" name="mbddate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0" required/>
                    <input type="number" class="form-control required" name="mbdyear" min="1900" placeholder="Year" style="width: 100px; margin: 0" required/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px">City Address</label>
                    <input type="text" class="form-control" id="inputPlace" name="mcity" style="width: 320px"/> <br/>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Province Address</label>
                    <input type="text" class="form-control" id="inputPlace" name="mprovince"/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Civil Status</label>
                    <select class="form-control required" name="mcivilStatus" style="width: 160px" required>
                      <option value="Married">Married</option>
                      <option value="Single Parent">Single Parent</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                      <option value="Annulled">Annulled</option>
                      <option value="Divored">Divorced</option>
                      <option value="Deceased">Deceased</option>
                    </select>
                    <label for="inputPlace"  style="margin-left: 20px; margin-right: 10px;">Place of Marriage</label>
                    <input type="text" class="form-control" id="inputPlace" style="width: 160px" name="mplaceOfMarriage"/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputName"  style="margin-right: 10px;">Date of Marriage</label>
                    <select class="form-control" name="mmonth" style="margin:0">
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
                    <input type="number" class="form-control" name="mdate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0"/>
                    <input type="number" class="form-control" name="myear" min="1900" placeholder="Year" style="width: 100px; margin: 0"/>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Occupation</label>
                    <input type="text" class="form-control required" id="inputPlace" name="moccupation" required/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Income</label>
                    <input type="number" class="form-control required" id="inputPlace" name="mincome" min="0" required/> <br/>
                    <label style="margin-left: 30px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;No. of Children</label><br/>
                    <input type="number" class="form-control required" id="inputPlace" name="mnoOfChildren" min="0" style="width: 80px" required/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Contact No:</label>
                    <input type="number" class="form-control" name="mcno" style="margin-left: 30px" />
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace">Medical History</label>
                    <textarea class="form-control" id="inputPlace" name="mmedicalHistory"/></textarea> <br/>
                  </div>
                  <br/><br/>

                  <h3>BIRTHFATHER</h3>

                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Name</label>
                    <input type="text" class="form-control required" id="inputPlace" name="fname" required/> <br/>
                    <label for="inputName" style="margin-left: 30px; margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Birthdate</label>
                    <select class="form-control required" name="fbdmonth" style="margin:0" required>
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
                    <input type="number" class="form-control required" name="fbddate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0" required/>
                    <input type="number" class="form-control required" name="fbdyear" min="1900" placeholder="Year" style="width: 100px; margin: 0" required/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px">City Address</label>
                    <input type="text" class="form-control" id="inputPlace" name="fcity"/> <br/>
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 20px;">Province Address</label>
                    <input type="text" class="form-control" id="inputPlace" name="fprovince"/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 10px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Civil Status</label>
                    <select class="form-control required" name="fcivilStatus" style="width: 120px" required>
                      <option value="Married">Married</option>
                      <option value="Single Parent">Single Parent</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                      <option value="Annulled">Annulled</option>
                      <option value="Divored">Divorced</option>
                      <option value="Deceased">Deceased</option>
                    </select>
                    <label for="inputPlace" style="margin-left: 20px; margin-right: 10px;">Place of Marriage</label>
                    <input type="text" class="form-control" id="inputPlace" style="width: 160px" name="fplaceOfMarriage"/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputName"  style="margin-right: 10px;">Date of Marriage</label>
                    <select class="form-control" name="fmonth" style="margin:0">
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
                    <input type="number" class="form-control" name="fdate" min = "1" max="31" placeholder="Day" style="width: 80px; margin: 0"/>
                    <input type="number" class="form-control" name="fyear" min="1900" placeholder="Year" style="width: 100px; margin: 0"/>                                                  
                    <label for="inputPlace" style="margin-left: 30px; margin-right: 20px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Occupation</label>
                    <input type="text" class="form-control required" id="inputPlace" name="foccupation" required/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace" style="margin-right: 20px;"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;Income</label>
                    <input type="number" class="form-control required" id="inputPlace" min="0" name="fincome" required/> <br/>
                    <label style="margin-left: 30px"><span><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i></span>&nbsp;No. of Children</label><br/>
                    <input type="number" class="form-control required" id="inputPlace" name="fnoOfChildren" min="0" style="width: 80px" required/> <br/>
                  </div><br/>
                  <div class="form-inline">
                    <label><i class="fa fa-asterisk text-danger" style="font-size: 9px; margin-bottom: 18px;"></i>Contact No:</label>
                    <input type="number" class="form-control" name="fcno" style="margin-left: 30px" />
                  </div><br/>
                  <div class="form-inline">
                    <label for="inputPlace">Medical History</label>
                    <textarea class="form-control" id="inputPlace" name="fmedicalHistory"/></textarea> <br/>
                  </div><br/>
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
                    </div>
                    <div class="form-inline">
                      <label class="lbl" style="margin-right: 10px;"> House Monthly Cost </label>
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
      
    <script src="js/sweetalert.min.js"></script>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="jquery-steps-master/dist/jquery-steps.js"></script>
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
  </body>

</html>
