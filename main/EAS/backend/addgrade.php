<?php

session_start();
require('dbconnect.php');

$avgf = 0;
$grades = 0;

$sid = $_POST['sid'];
$syr = $_POST['syr'];
$grading = $_POST['grading'];
$math = $_POST['math'];
$eng = $_POST['eng'];
$fil = $_POST['fil'];
$sci = $_POST['sci'];
$histo = $_POST['histo'];
$mapeh = $_POST['mapeh'];
$tle = $_POST['tle'];
$val = $_POST['val'];
$avg = $_POST['avg'];

$sql = "INSERT INTO s_academicsummary (scholarID, schoolYr, semester, average) VALUES (?, ?, ? ,?)";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $sql)){
	$avgf = 0;
}
else{
	mysqli_stmt_bind_param($stmt, "issd", $sid, $syr, $grading, $avg);
	mysqli_stmt_execute($stmt);
	$aid = mysqli_insert_id($con);
	$avgf = 1;

}

if(!empty($_POST['math'])){

	$in = "INSERT INTO s_grades (academicID, subject, grade) VALUES ('$aid', 'Mathematics', ?)";
	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $in)){
		$grades += 0;
	}
	else{
		mysqli_stmt_bind_param($st, "d", $math);
		mysqli_stmt_execute($st);
		$grades += 1;
	}
}

if(!empty($_POST['eng'])){

	$ins = "INSERT INTO s_grades (academicID, subject, grade) VALUES ('$aid', 'English', ?)";
	$st2 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st2, $ins)){
		$grades += 0;
	}
	else{
		mysqli_stmt_bind_param($st2, "d", $eng);
		mysqli_stmt_execute($st2);
		$grades += 1;
	}
}

if(!empty($_POST['fil'])){

	$inse = "INSERT INTO s_grades (academicID, subject, grade) VALUES ('$aid', 'Filipino', ?)";
	$stm2 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stm2, $inse)){
		$grades += 0;
	}
	else{
		mysqli_stmt_bind_param($stm2, "d", $fil);
		mysqli_stmt_execute($stm2);
		$grades += 1;
	}
}

if(!empty($_POST['sci'])){

	$inse2 = "INSERT INTO s_grades (academicID, subject, grade) VALUES ('$aid', 'Science', ?)";
	$stmt2 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt2, $inse2)){
		$grades += 0;
	}
	else{
		mysqli_stmt_bind_param($stmt2, "d", $sci);
		mysqli_stmt_execute($stmt2);
		$grades += 1;
	}
}

if(!empty($_POST['histo'])){

	$inse4 = "INSERT INTO s_grades (academicID, subject, grade) VALUES ('$aid', 'History', ?)";
	$stmt4 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt4, $inse4)){
		$grades += 0;
	}
	else{
		mysqli_stmt_bind_param($stmt4, "d", $histo);
		mysqli_stmt_execute($stmt4);
		$grades += 1;
	}
}

if(!empty($_POST['mapeh'])){

	$inse5 = "INSERT INTO s_grades (academicID, subject, grade) VALUES ('$aid', 'MAPEH', ?)";
	$stmt5 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt5, $inse5)){
		$grades += 0;
	}
	else{
		mysqli_stmt_bind_param($stmt5, "d", $mapeh);
		mysqli_stmt_execute($stmt5);
		$grades += 1;
	}
}

if(!empty($_POST['tle'])){

	$inse6 = "INSERT INTO s_grades (academicID, subject, grade) VALUES ('$aid', 'TLE', ?)";
	$stmt6 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt6, $inse6)){
		$grades += 0;
	}
	else{
		mysqli_stmt_bind_param($stmt6, "d", $tle);
		mysqli_stmt_execute($stmt6);
		$grades += 1;
	}
}

if(!empty($_POST['val'])){

	$inse7 = "INSERT INTO s_grades (academicID, subject, grade) VALUES ('$aid', 'Values Education', ?)";
	$stmt7 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt7, $inse7)){
		$grades += 0;
	}
	else{
		mysqli_stmt_bind_param($stmt7, "d", $val);
		mysqli_stmt_execute($stmt7);
		$grades += 1;
	}
}

if($avgf == 1){
	echo "<script>
                alert('Record Updated Succesfully');
                window.location='../academic.php';
                </script>";
}

?>