<?php

require('dbconnect.php');

$sid = $_POST['sid'];

$sel = "UPDATE scholar SET applicationStatus = 'Declined' WHERE scholarID = '$sid'";
$qry = mysqli_query($con, $sel);
if($qry){
	echo "<script>
                alert('Application declined.');
                window.location='../app_scholar.php';
                </script>";
}

?>