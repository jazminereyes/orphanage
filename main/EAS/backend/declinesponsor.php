<?php

require('dbconnect.php');

$spid = $_POST['spid'];

$get = "SELECT firstName, lastName from person as p join user as u on p.personID = u.personID join sponsor as sp on u.userID = sp.userID WHERE sponsorID = '$spid'";
$g = mysqli_query($con, $get);
$d = mysqli_fetch_array($g);

$fname = $d['firstName'];
$lname = $d['lastName'];

$check = "SELECT scholarID FROM scholar WHERE sponsorID = '$spid'";
$qwe = mysqli_query($con, $check);
if(mysqli_num_rows($qwe) == 0){

	$sel = "UPDATE sponsor SET activeFlag = '1' WHERE sponsorID = '$spid'";
	$qry = mysqli_query($con, $qry);
	if($qry){
		echo "<script>
	                alert('Sponsor set inactive.');
	                window.location='../viewsponsor.php?sponsorid=".$spid."';
	                </script>";
	}
}
else{
	echo "<script>
	                alert('Termination error. ".$fname." ".$lname." still has scholars.');
	                window.location='../viewsponsor.php?sponsorid=".$spid."';
	                </script>";
}

?>