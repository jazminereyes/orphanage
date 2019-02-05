<?php

require('dbconnect.php');

$file = $_FILES['fileToUpload'];
$name = $file['name'];

$sid = $_POST['sid'];
$title = $_POST['title'];
$today = date('Y-m-d');

$path = "referrals/" . basename($name);

if (move_uploaded_file($file['tmp_name'], $path)){
    $fpath = $path;
    $new = "../../../client/referrals/" . basename($_FILES['fileToUpload']['name']);

    if(copy($path, $new)){

    	$sel = "SELECT personID from scholar where scholarID = '$sid'";
		$qwe = mysqli_query($con, $sel);
		$rec = mysqli_fetch_array($qwe);
		$pid = $rec['personID'];

		echo $pid;

		$in = "INSERT INTO is_casestudy (personID, title, dateUploaded, filePath, fileName) VALUES ('$pid', ?, '$today', ?, ?)";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt, $in)){
			echo "error eto yun";
		}
		else{
			mysqli_stmt_bind_param($stmt, "sss", $title, $fpath, $name);
			mysqli_stmt_execute($stmt);
			echo "<script>
			     alert('Case study added.');
			     window.location = '../cstudy.php?scholarid=".$sid."';
			     </script>";
		}

    }
    unlink($path);
} 
else{
	$file = "";
	echo "Error.";
}

?>