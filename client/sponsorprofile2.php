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

    <!-- Dropdown Nav -->
    <script src="moment.js/moment.js"></script>
    <script src="js/sweetalert.min.js"></script>

 <!-- Steps -->
    <link rel="stylesheet" href="jquery-steps-master/dist/jquery-steps.css">
    <link rel="stylesheet" href="jquery-steps-master/examples/css/style.css">

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

    <!-- Password Modal -->
    <div class="modal fade" id="modalPassword">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Change Password?</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body">
              <center><label>Old Password</label>
              <input class="form-control in" type="text" name="oldpw" value="<?php echo $oldpw ?>" readonly>
              </center>
              <hr>
              <form method="post" action="changepass.php">
              <div class="row">
                <div class="col-md-6">
                  <label>New Password:</label>
                  <input class="form-control in" type="password" id="newpw" name="newpw" onchange="match()">
                </div>
                <div class="col-md-6">
                  <label>Confirm Password:</label>
                  <input class="form-control in" type="password" id="conpw" name="conpw" onchange="match()">
                </div>
              </div>
          </div>
        
          <!-- Modal footer -->
          <div class="modal-footer">
              <input type="hidden" name="uid" value="<?php echo $userid ?>" />
              <input type="submit" name="submit" value="Confirm" class="btn btn-dark btn-primary" />
              <button class="btn btn-dark btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
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


            <?php

        $userid = $_SESSION["user"];
        $query = "SELECT * FROM user JOIN person JOIN sponsor ON user.personID = person.personID AND person.personID = sponsor.personID WHERE userID = '$userid'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);

        $spid = $row['sponsorID'];
        $_SESSION['sponsorID'] = $spid;

        if($row['donationType'] == 'EY'){
          $type = 'Elementary - Yearly';
        }
        elseif($row['donationType'] == 'EM'){
          $type = 'Elementary - Monthly';
        }
        elseif($row['donationType'] == 'HSY'){
          $type = 'Highschool - Yearly';
        }
        elseif($row['donationType'] == 'HSM'){
          $type = 'Highschool - Monthly';
        }

      ?>

    <!-- Services -->
  <section id="services" style="padding: 40px;">
    <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4">
            <div class="card box">
              <div class="card-header">
                <div class="row">
                  <div class="col-3">
                    <i class="nc-icon-outline users_single-01 header-icon float-left"></i>
                  </div>
                  <div class="col-8">
                    <label style="font-size: 1.4em"><?php echo $row['firstName']." ".$row['lastName']; ?></label><br/>
                  <span><?php echo $row['programType']; ?></span>
                  </div>
                </div>
              </div>
              <div class="account-menu">
                <ul>
                  <li>
                    <a href="#" class="link"><i class="nc-icon-glyph ui-1_home-51" style="color: black"></i> Profile</a>
                  </li>
                  <li>
                    <a href="#scholars"><i class="nc-icon-glyph shopping_cash-register" style="color: black"></i> Scholars</a>
                  </li>
                  <li>
                    <a href="#" data-toggle="modal" data-target="#modalPassword"><i class="nc-icon-glyph objects_key-26" style="color: black"></i>Password</a></li>
                </ul>
              </div>
            </div>
            </div>

             <div class="col-md-9">
              <div class="card box">
                <div class="card-header">
                  <h3>Profile</h3>
                </div>
                <div class="card-body">
                  <table class="table table-stripped tbl">
                  <tbody style="text-align: left;">
                    <tr>
                      <td width="5%"></td>
                      <td width="30%"><span class='lbl'>Name</span></td>
                      <td width="40%"><span class='info'><?php echo $row["firstName"]." ".$row["lastName"]; ?></span></td>
                      <td width="20%"></td>
                    </tr>
                    <tr>
                      <td width="5%"></td>
                      <td><span class='lbl'>E-mail</span></td>
                      <td><span class='info'><?php echo $row["email"]; ?></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td width="5%"></td>
                      <td><span class='lbl'>Address</span></td>
                      <td><span class='info'><?php echo $row["zip"]." ".$row["street"]." ".$row["city"]." ".$row["country"]; ; ?></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td width="5%"></td>
                      <td><span class='lbl'>Contact Number</span></td>
                      <td><span class='info'><?php echo $row["telNo"]; ?></span></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td width="5%"></td>
                      <td><span class='lbl'>Sponsor Type</span></td>
                      <td><span class='info'><?php echo $type; ?></span></td>
                      <td></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
            </div>
            <div id="scholars" class="row">
              <div class="col-md-12">
                <div class="card box">
                  <div class="card-header">
                    <span style="font-size: 1.8em">Scholars</span>
                    
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Current Year Level</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        require ('../connection.php');

                        $userid = $_SESSION["user"];
                        $query = "SELECT * FROM person JOIN scholar JOIN sponsor ON person.personID = scholar.personID AND sponsor.sponsorID = scholar.sponsorID WHERE sponsor.sponsorID = '$spid'";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result)==0)
                        {
                            echo "<span>No scholars yet.</span>";
                        }
                        else
                        {
                            while($rec=mysqli_fetch_array($result))
                            {

                              $yrlvl = $rec['currentYrLevel'];

                if($yrlvl == "Elem_G1"){
                    $yrlvl = "Elementary - Grade 1";
                }
                elseif($yrlvl == "Elem_G2"){
                    $yrlvl = "Elementary - Grade 2";
                }
                elseif($yrlvl == "Elem_G3"){
                    $yrlvl = "Elementary - Grade 3";
                }
                elseif($yrlvl == "Elem_G4"){
                    $yrlvl = "Elementary - Grade 4";
                }
                elseif($yrlvl == "Elem_G5"){
                    $yrlvl = "Elementary - Grade 5";
                }
                elseif($yrlvl == "Elem_G6"){
                    $yrlvl = "Elementary - Grade 6";
                }
                elseif($yrlvl == "HS_G7"){
                    $yrlvl = "High School - Grade 7";
                }
                elseif($yrlvl == "HS_G8"){
                    $yrlvl = "High School - Grade 8";
                }
                elseif($yrlvl == "HS_G9"){
                    $yrlvl = "High School - Grade 9";
                }
                elseif($yrlvl == "HS_G10"){
                    $yrlvl = "High School - Grade 10";
                }
                elseif($yrlvl == "SHS_G11"){
                    $yrlvl = "Senior High School - Grade 11";
                }
                elseif($yrlvl == "SHS_G12"){
                    $yrlvl = "Senior High School - Grade 12";
                }

                              $sid = $rec["scholarID"];

                              echo "<tr>";
                              echo "<td>".$rec["firstName"]." ".$rec["lastName"]."</a></td>";
                              echo "<td>".$yrlvl."</td>";
                              echo '<td><a href="viewscholar.php?scholarid='.$sid.'" class="btn btn-bordered btn-sm btn-dark"><i class="fa fa-eye"></i>View</a></td>';
                              echo "</tr>";
                            }
                              
                        }
                    ?>
                  </tbody>
                </table>
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
