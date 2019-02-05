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

require ('../connection.php');

//$query = "SELECT COUNT(socialWorkerID) FROM socialworker";
$query = "SELECT MAX(socialWorkerID) FROM socialworker";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_row($result);

$count = $row[0];

$file = 'socialworker_'.$id.date('YmdHis') . '.jpeg';
// new filename
$filename = 'pic_'.date('YmdHis') . '.jpeg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/'.$filename) ){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
}

$path = "upload/".$filename;

$query2 = "UPDATE socialworker SET applicationPhoto = '$path' WHERE socialWorkerID = '$count'";
if (mysqli_query($con, $query2))
{
	echo '<script>swal({
		title: "Success!",
		text: "Your application has been submitted. You may check your application status via e-mail.",
		icon: "success"
	  }).then(function() {
		window.location = "index.php";
	  });</script>';
}

// Return image url
echo $url;

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
