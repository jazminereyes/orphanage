<?php

require('dbconnect.php');

if(isset($_POST['submit'])){

	$pid = $_POST['pid'];
	$intdate = $_POST['intdate'];
	$intby = $_POST['intby'];

	// $date = date('Y-m-d', strtotime(time))

	if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != "") {

			$file = "photos/" . basename($_FILES['photo']['name']);
			$dir = "photos/";
			$name  = basename($_FILES['photo']['name']);
			
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $file)){

				$new = "../../photos/" . basename($_FILES['photo']['name']);
				if(copy($file, $new)){

					$photo = $dir.$name;

					$up = "UPDATE person SET photo = '$photo' WHERE personID = '$pid'";
		            $qry = mysqli_query($con, $up);

					echo "suceed";
				}
			}
		} else
			$file = "";

	unlink($file);

	$update = "UPDATE s_appform SET interviewDate = ?, interviewedBy = ? WHERE scholarAppID = '28'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $update)){
		echo "error";
	}
	else{
		mysqli_stmt_bind_param($stmt, "ss", $intdate, $intby);
		mysqli_stmt_execute($stmt);
		echo "updated";
	}
}


?>