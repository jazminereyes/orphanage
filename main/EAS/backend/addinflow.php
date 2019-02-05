<?php

session_start();
require('dbconnect.php');

$dateReceived = $_POST['rdate'];
$sid = $_POST['scholar'];
$spid = $_POST['spid'];
$amount = $_POST['amount'];

$in = "INSERT INTO s_sponsorinflow (sponsorID, scholarID, dateReceived, amount) VALUES ('$spid', '$sid', '$dateReceived', '$amount')";
$qry = mysqli_query($con, $in);
if($qry){
	echo "<script>
			alert('Inflow added.');
			window.location='../viewsponsor.php';
			</script>";
}
else{
    echo "<script>
			alert('Inflow not added.');
			window.location='../viewsponsor.php';
			</script>";
}

?>