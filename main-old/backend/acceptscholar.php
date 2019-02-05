<?php
	
	require('../../connection.php');

	$flag = 0;
	$scholarID = $_POST['scholarid'];
	$appID = $_POST['appid'];
	$admissionDate = $_POST['admission'];
	$interviewDate = $_POST['intdate'];
	$interviewedBy = $_POST['intby'];

	echo $appID;
	echo $admissionDate;
	echo $interviewDate;
	echo $interviewedBy;

	$query = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted'";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_row($res);

	$year = (int)$admissionDate;
	$case = $row[0]+1;
	$caseno = $year."-".$case;

	$c = "UPDATE `scholar` SET `admissionDate` = '$admissionDate', `caseNo` = '$caseno' WHERE `scholar`.`scholarID` = '$scholarID'";
	if($cc = mysqli_query($con, $c)){
		$flag = 1;
		echo 'admission update';
	}
	else 'admiss not';

	$a = "UPDATE `s_appform` SET `interviewDate` = '$interviewDate' WHERE `s_appform`.`scholarAppID` = '$appID'";
	if($aa = mysqli_query($con, $a)){
		$flag = 1;
		echo 'intdate update';
	}
	else echo 'intdate not';

	$b = "UPDATE `s_appform` SET `interviewedBy` = '$interviewedBy' WHERE `s_appform`.`scholarAppID` = '$appID'";
	if($bb = mysqli_query($con, $b)){
		$flag = 1;
		echo 'intby update';
	}
	else echo 'intby not';

	$sql = "UPDATE `scholar` SET `applicationStatus` = 'Accepted' WHERE `scholar`.`scholarID` = '$scholarID'";

	if($qry = mysqli_query($con, $sql)){

		$find = "SELECT name FROM person join scholar on scholar.personID = person.personID WHERE scholar.scholarID = '$scholarID'";
		$get = mysqli_query($con, $find);
		$save = mysqli_fetch_array($get);
		$name = $save['name'];

		if($flag == 1){
					echo "<script>
							alert('You have accepted ".$name."!');
							window.location='../application.php';
						</script>
					";
		}
	}

?>