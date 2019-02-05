<?php

require('dbconnect.php');

$sid = $_POST['sid'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$bmi = $_POST['bmi'];
$rem = $_POST['remarks'];
$date = date('Y-m-d');

$get = "SELECT h.healthInfoID FROM scholar as s JOIN s_appform as app on s.scholarAppID = app.scholarAppID join s_healthinfo as h on app.healthInfoID = h.healthInfoID WHERE scholarID = '$sid'";
$gt = mysqli_query($con, $get);
$g = mysqli_fetch_array($gt);
$hid = $g[0];

$db = "INSERT INTO s_medicalreport (scholarID, height, weight, BMI, remarks, dateChecked) VALUES ('$sid', ?, ?, ?, ?, '$date')";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $db)){
	echo "<script>
                alert('BMI update error');
                window.location='../medical.php';
                </script>";
}
else{
	mysqli_stmt_bind_param($stmt, "ddds", $height, $weight, $bmi, $rem);
	mysqli_stmt_execute($stmt);
	echo "<script>
                alert('BMI successfully updated.');
                window.location='../medical.php';
                </script>";
}



?>