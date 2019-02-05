<?php

require('dbconnect.php');

$sid = $_POST['sid'];
$aid = $_POST['appid'];
$pid = $_POST['pid'];

if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != ""){
	$file = "photos/" . basename($_FILES['photo']['name']);
	
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $file)){

		$new = "../../photos/" . basename($_FILES['photo']['name']);
		$dir = "photos/";
		$name = basename($_FILES['photo']['name']);

		if(copy($file, $new)){

			$photo = $dir.$name;

            $up = "UPDATE person SET photo = '$photo' WHERE personID = '$pid'";
		    $qry = mysqli_query($con, $up);

		}
	}

	
} else
	$file = "";

	unlink($file);

$adate = $_POST['admission'];
$intdate = $_POST['intdate'];
$intby = $_POST['intby'];
$flag = 0;

$det = "UPDATE scholar SET admissionDate = '$adate' WHERE scholarID='$sid'";
$d = mysqli_query($con, $det);

$sel = "SELECT firstName, lastName from person join scholar on person.personID = scholar.personID where scholarID = '$sid'";
$get = mysqli_query($con, $sel);
$res = mysqli_fetch_array($get);
$fname = $res['firstName'];
$lname = $res['lastName'];


$upd = "UPDATE s_appform set interviewDate = ?, interviewedBy = ? WHERE scholarAppID = '$aid'";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $upd)){
	echo "app form error";
}
else{
	mysqli_stmt_bind_param($stmt, "ss", $intdate, $intby);
	mysqli_stmt_execute($stmt);

	$up = "UPDATE scholar SET applicationStatus = 'Accepted' WHERE scholarID = '$sid'";
	$d = mysqli_query($con, $up);
	if($d){
		echo "<script>
	                alert('You have accepted ".$fname." ".$lname.".');
	                window.location='../viewscholar.php?scholarid=".$sid."';
	                </script>";
	}
	else{
		echo "<script>
	               alert('You have declined ".$fname." ".$lname.".');
	                window.location='../app_scholar.php';
	                </script>";
	}
}





?>