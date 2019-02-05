<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="js/sweetalert.min.js"></script>
</head>
<body>
    <?php
       /* echo "<script>";
        echo "swal('Error!', 'Error.', 'error')";
        echo "</script>"; */

        $password = '12345';
        
        /*echo "<script>";
    echo "swal({
      title: 'Success!',
      text: 'Application is submitted. \nPlease remember this code for viewing. Referral Code:".$password."',
      icon: 'success',
      button: 'OK'
    }).then((value)=>{
      if (value==true)
      {
        window.location.href='index.php';
      }
    });";
    echo "</script>";*/

    /*echo '<script>
    setTimeout(function() {
        swal({
            title: "Wow!",
            text: "Message!",
            type: "success"
        }, function() {
            window.location.href = "index.php";
        });
    }, 1000);
</script>';*/

    echo '<script>swal({
        title: "Wow!",
        text: "Application is submitted. \nPlease remember this code for viewing. Referral Code:'.$password.'",
        icon: "success"
    }).then(function() {
        window.location = "index.php";
    });</script>';

    ?>
</body>
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
</html>