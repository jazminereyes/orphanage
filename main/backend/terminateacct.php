<?php

require('../../connection.php');

$uid = $_POST['uid'];

$sel = "SELECT programType FROM user WHERE userID = '$uid'";
$qry = mysqli_query($con, $sel);
$res = mysqli_fetch_array($qry);

$type = $res['programType'];
$ptype = $type."-t";

$up = "UPDATE user SET programType = ? WHERE userID = '$uid'";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $up)){
	echo "error";
}
else{
	mysqli_stmt_bind_param($stmt, "s", $ptype);
	mysqli_stmt_execute($stmt);
	echo "<script>
	      alert('Account terminated.');
	      window.location = '../accounts.php';
	      </script>";
}

?>