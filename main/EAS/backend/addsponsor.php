<?php

require('dbconnect.php');

$fname = $_POST['fn'];
$mname = $_POST['mn'];
$lname = $_POST['ln'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$bdate = $_POST['bday'];
$sdate = $_POST['submission'];
$telno = $_POST['telno'];
$email = $_POST['email'];
$count = $_POST['count'];
$dtype = $_POST['dtype'];
$amount = $_POST['amount'];
// $uname = $_POST['uname'];
$pword = $_POST['pword'];

$sel = "INSERT INTO person (firstName, middleName, lastName) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $sel)){
	echo "erorr";
}
else{
	mysqli_stmt_bind_param($stmt, "sss", $fname, $mname, $lname);
	mysqli_stmt_execute($stmt);
	$pid = mysqli_insert_id($con);
}

$in = "INSERT INTO user (personID, password, programType) VALUES ('$pid', ?, 'Sponsor')";
$st = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($st, $in)){
	echo "erorr";
}
else{
	mysqli_stmt_bind_param($st, "s", $pword);
	mysqli_stmt_execute($st);
	$uid = mysqli_insert_id($con);
}

$date = date('Y-m-d');

$in2 = "INSERT INTO sponsor (personID, street, city, zip, country, birthdate, telNo, email, scholarCount, donationType, amount, submissionDate, activeDate, applicationStatus, activeFlag) VALUES ('$pid', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '$date', 'A', '1')";
$st2 = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($st2, $in2)){
	echo "erorr";
}
else{
	mysqli_stmt_bind_param($st2, "sssssssisds", $street, $city, $zip, $country, $bdate, $telno, $email, $count, $dtype, $amount, $sdate);
	mysqli_stmt_execute($st2);
	$spid = mysqli_insert_id($con);
	// echo "added";
	echo "<script>
                alert('Sponsor added.');
                window.location='../viewsponsor.php?sponsorid=".$spid."';
                </script>";
}

?>