<?php 

session_start();
require ('../connection.php');

$uid = $_POST['uid'];
$newpw = $_POST['newpw'];

$sel = "SELECT programType FROM user where userID = '$uid'";
$qry = mysqli_query($con, $sel);
$res = mysqli_fetch_array($qry);
$type = $res['programType'];

$up = "UPDATE user SET password = ? WHERE userID = '$uid'";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $up)){
	echo "error";
}
else{
	mysqli_stmt_bind_param($stmt, "s", $newpw);
	mysqli_stmt_execute($stmt);
	if($type == "Sponsor"){
		echo "<script>
		      alert('Password changed.');
		      window.location='sponsorprofile.php';
		      </script>
		      ";
		}
	elseif($type == "Social Worker"){
		echo "<script>
		      alert('Password changed.');
		      window.location='profile.php';
		      </script>
		      ";
		}
}

?>