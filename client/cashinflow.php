<!DOCTYPE html>
<html lang="en">
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
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
       require('../connection.php');
       $userID = $_SESSION['user'];

       $q = "SELECT firstName, lastName, sponsorID FROM person JOIN user JOIN sponsor ON sponsor.personID = person.personID AND person.personID = user.personID WHERE userID = '$userID'";
       $r = mysqli_query($con, $q);
       $s = mysqli_fetch_row($r);

       $_SESSION['sponsorid'] = $s[2];

       echo "<title>".$s[0]." ".$s[1]." | Home </title>";
    ?>

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
    <link rel="stylesheet" type="text/css" href="css/sponsorapp.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />

    <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Dropdown Nav -->
    <script>
      $('ul.nav li.dropdown').hover(function() 
      {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });
    </script>

    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>

    <style>
      section #services {
        background-color: #212529;
        background-image: url("../img/bg4.jpg");
        background-repeat: no-repeat;
        background-position: center;

      }
    </style>
  </head>

  <body id="page-top">
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

    <!-- Services -->
    <section id="services">
      <div class="container" style="margin: auto;">
        <div class="row text-center">
            <div class="col-md-12 center-block" style="float: none; margin: auto;">
                <span class="section-heading text-uppercase text-dark" style="font-size: 2.5em;">Cash Inflow</span>
                <br/>
                <div class="card">  
                    <div class="card-header">
                      <?php
                        $sponsorID = $_SESSION['sponsorID'];

                        $query = "SELECT SUM(amount) FROM s_sponsorinflow WHERE sponsorID = '$sponsorID'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_row($result);

                        echo "Total Cash Inflow: P".$row[0];

                      ?>
                    </div>
                    <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered">
                                <th>Scholar Name</th>
                                <th>Date Received</th>
                                <th>Amount</th>

                                <?php 

                                    include('../connection.php');
                                    $sponsorID = $_SESSION['sponsorID'];

                                    $sql = "SELECT * FROM s_sponsorinflow as inflow JOIN sponsor on sponsor.sponsorID = inflow.sponsorID JOIN scholar as schol on sponsor.sponsorID = schol.sponsorID JOIN person on schol.personID = person.personID WHERE sponsor.sponsorID = '$sponsorID'";
                                    $sv = mysqli_query($con, $sql);

                                    while($res = mysqli_fetch_array($sv)){     
                                        echo '<tr>
                                            <td>'.$res['firstName']." ".$res['lastName'].'</td>
                                            <td>'.$res['dateReceived'].'</td>
                                            <td>Php '.$res['amount'].'</td>
                                            </tr>';
                                    }
                                ?>
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
