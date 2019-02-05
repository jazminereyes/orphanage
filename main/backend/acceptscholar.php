<?php
	
	require('../../connection.php');

	$flag = 0;
	$scholarID = $_POST['scholarid'];
	$appID = $_POST['appid'];
	$adate = $_POST['admission'];
	$idate = $_POST['intdate'];
	$intby = $_POST['intby'];


	$a = "UPDATE s_appform SET interviewDate = ?, interviewedBy = ? WHERE `s_appform`.`scholarAppID` = '$appID'";
	$st2 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $a)){
        echo "error";
    }
    else{
    	mysqli_stmt_bind_param($st2, "ss", $idate, $intby);
    	mysqli_stmt_execute($st2);
    	$flag = 1;
    }


	$query = "SELECT COUNT(scholarID) FROM scholar WHERE applicationStatus = 'Accepted'";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_row($res);

	$year = (int)$adate;
	$case = $row[0]+1;
	$caseno = $year."-".$case;

	$c = "UPDATE scholar SET admissionDate = ?, caseNo = '$caseno', applicationStatus = 'Accepted' WHERE scholarID = '$scholarID'";
	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $c)){
        echo "error";
    }
    else{
    	mysqli_stmt_bind_param($st, "s", $adate);
    	mysqli_stmt_execute($st);
    	$find = "SELECT firstName, lastName FROM person join scholar on scholar.personID = person.personID WHERE scholar.scholarID = '$scholarID'";
		$get = mysqli_query($con, $find);
		$save = mysqli_fetch_array($get);
		$name = $save['firstName'].$save['lastName'];

		if($flag == 1){
					echo "<script>
							alert('You have accepted ".$name."!');
							window.location='../application.php';
						</script>
					";
		}
    	
    }

?>