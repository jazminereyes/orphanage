<?php

session_start();

require('dbconnect.php');

$pid = $_POST['pid'];
$sid = $_POST['sid'];
$firstN = $_POST['first'];
$midN = $_POST['middle'];
$lastN = $_POST['last'];
$ok = 0;

$in = "UPDATE person SET firstName = ?, middleName = ?, lastName = ? WHERE person.personID = '$pid'";
$s = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($s, $in)){
	$ok = 0;
}
else{
	mysqli_stmt_bind_param($s, "sss", $firstN, $midN, $lastN);
	mysqli_stmt_execute($s);
	$ok = 2;
}   

		if (isset($_FILES['pic']['name']) && $_FILES['pic']['name'] != ""){
			$file = "photos/" . basename($_FILES['pic']['name']);
			
			if(move_uploaded_file($_FILES['pic']['tmp_name'], $file)){

				$new = "../../photos/" . basename($_FILES['pic']['name']);
				$dir = "photos/";
				$name = basename($_FILES['pic']['name']);

				if(copy($file, $new)){

					$photo = $dir.$name;

		            $in = "UPDATE person SET firstName = ?, middleName = ?, lastName = ?, photo = ? WHERE person.personID = '$pid'";
					$s = mysqli_stmt_init($con);
					if(!mysqli_stmt_prepare($s, $in)){
						$ok = 0;
					}
					else{
						mysqli_stmt_bind_param($s, "ssss", $firstN, $midN, $lastN, $photo);
						mysqli_stmt_execute($s);
						$ok = 2;
					}   

				}
			}

			unlink($file);
		} else
			$file = "";


	

$yrlvl = $_POST['YrLevel'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$school = $_POST['sch'];

$ins = "UPDATE scholar SET currentYrLevel = ?, street = ?, city = ?, zip = ?, school = ? WHERE scholarID = '$sid'";
$s2 = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($s2, $ins)){
   echo "<script>
                alert('Record Update Error');
                window.location='../viewscholar.php';
                </script>";

}
else{
	mysqli_stmt_bind_param($s2, "sssss", $yrlvl, $street, $city, $zip, $school);
	mysqli_stmt_execute($s2);
	echo "<script>
                alert('Record Updated Succesfully');
                window.location='../viewscholar.php';
                </script>";
}

?>