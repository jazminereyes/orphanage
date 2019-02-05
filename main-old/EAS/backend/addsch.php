<?php
require('dbconnect.php');

$flag = 0;
$firstN = $_POST['first'];
$midN = $_POST['middle'];
$lastN = $_POST['last'];
$gender = $_POST['gender'];

if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != ""){
			$file = "photos/" . basename($_FILES['photo']['name']);
			
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $file)){

				$new = "../../photos/" . basename($_FILES['photo']['name']);
				$dir = "photos/";
				$name = basename($_FILES['photo']['name']);

				if(copy($file, $new)){

					$photo = $dir.$name;

		           $in = "INSERT INTO person (firstName, middleName, lastName, gender, type, photo) VALUES (?, ?, ?, ?, 'S', '$photo')";
					$s = mysqli_stmt_init($con);
					if(!mysqli_stmt_prepare($s, $in)){
					   echo "person error";
					}
					else{
						mysqli_stmt_bind_param($s, "ssss", $firstN, $midN, $lastN, $gender);
						mysqli_stmt_execute($s);
						$personid = mysqli_insert_id($con);
						$flag += 1;
					}

				}
			}

			unlink($file);
		} else
			$file = "";




$htype = $_POST['htype'];
$hstat = $_POST['hstat'];
$hcost = $_POST['houseMonthlyCost'];
$etype = $_POST['electricityType'];
$ecost = $_POST['electricityMonthlyCost'];
$ftype = $_POST['foodType'];
$icount = $_POST['individualCount'];
$wtype = $_POST['waterType'];
$wcost = $_POST['waterCost'];
$btype = $_POST['bathType'];
$educExpense = $_POST['educExpense'];
$medExpense = $_POST['medExpense'];
$otherExpense = $_POST['otherExpense'];

$ins4 = "INSERT INTO s_expenditure (homeType, homeStatus, houseMonthlyCost, electricityType, electricityMonthlyCost, foodType, individualCount, waterType, waterCost, bathroomType, educExpense, medExpense, otherExpense) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$s4 = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($s4, $ins4)){
   
}
else{
	mysqli_stmt_bind_param($s4, "ssdsdsisdsddd", $htype, $hstat, $hcost, $etype, $ecost, $ftype, $icount, $wtype, $wcost, $btype, $educExpense, $medExpense, $otherExpense);
	mysqli_stmt_execute($s4);
	$expenid = mysqli_insert_id($con); 
}

$homeActivity = $_POST['homeActivity'];
$outsideActivity = $_POST['outsideActivity'];
$faveSubject = $_POST['faveSubject'];
$faveSport = $_POST['faveSport'];
$extracoActivities = $_POST['extracoActivities'];
$ambition = $_POST['ambition'];

$ins5 = "INSERT INTO s_hobbies (homeActivity, outsideActivity, faveSubject, faveSport, extracoActivities, ambition) VALUES (?, ?, ?, ?, ?, ?)";
$s5 = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($s5, $ins5)){
}
else{
	mysqli_stmt_bind_param($s5, "ssssss", $homeActivity, $outsideActivity, $faveSubject, $faveSport, $extracoActivities, $ambition);
	mysqli_stmt_execute($s5);
	$hobbyid = mysqli_insert_id($con);
}

$height = $_POST['height'];
$weight = $_POST['weight'];
$discolorMarks = $_POST['discolorMarks'];
$hairColor = $_POST['hairColor'];
$eyeColor = $_POST['eyeColor'];
$skinTone = $_POST['skinTone'];
$illness = $_POST['illness'];
$lastdhp = $_POST['lastdhp'];
$lastph = $_POST['lastph'];

$bmi = $weight/($height/100*$height/100);
echo $bmi;

if ($bmi<18.5){
    $weightstatus = "Underweight";
} elseif ($bmi>=18.5&&$bmi<=25){
    $weighstatus = "Normal Weight";
} elseif ($bmi>=25&&$bmi<=30){
    $weighstatus = "Obese";
} elseif ($bmi>30){
    $weightstatus = "Overweight";
}

$ins6 = "INSERT INTO s_healthinfo (height, weight, weightStatus, discolorMarks, hairColor, eyeColor, skinTone, illness, lastDateHospitalized, lastPlaceHospitalized) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$s6 = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($s6, $ins6)){
}
else{
	mysqli_stmt_bind_param($s6, "ddssssssss", $height, $weight, $weighstatus, $discolorMarks, $hairColor, $eyeColor, $skinTone, $illness, $lastdhp, $lastph);
	mysqli_stmt_execute($s6);
	$healthid = mysqli_insert_id($con);
}

$subdate = $_POST['subdate'];
$refby = $_POST['refby'];
$rel = $_POST['rel'];
$intdate = $_POST['intdate'];
$intby = $_POST['intby'];

$ins7 = "INSERT INTO s_appform (expenditureID, hobbyID, healthinfoID, submissionDate, referredBy, relationToReferrer, interviewDate, interviewedBy) VALUES ('$expenid', '$hobbyid', '$healthid', ?, ?, ?, ?, ?)";
$s7 = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($s7, $ins7)){
}
else{
	mysqli_stmt_bind_param($s7, "sssss", $subdate, $refby, $rel, $intdate, $intby);
	mysqli_stmt_execute($s7);
	$appid = mysqli_insert_id($con);
}


	$noc = $_POST['noc'];
$mname = $_POST['mname'];
$mbday = $_POST['mbirthdate'];
$mcno = $_POST['mcno'];
$moccu = $_POST['moccu'];
$mincome = $_POST['mincome'];

if(isset($_POST['mname'])){
	$ins8 = "INSERT INTO s_familybground (scholarAppID, name, birthdate, relationType, contactNo, occupation, income) VALUES ('$appid', ?, ?, 'Mother', ?, ?, ?)";
	$s8 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($s8, $ins8)){
	}
	else{
		mysqli_stmt_bind_param($s8, "ssisd", $mname, $mbday, $mcno, $moccu, $mincome);
		mysqli_stmt_execute($s8);
		$m_id = mysqli_insert_id($con);
	}


	$mcity = $_POST['mcity'];
	$mprovince = $_POST['mprovince'];
	$mcstat = $_POST['mcstat'];
	$mplace = $_POST['mplaceOfMarriage'];
	$mdate = $_POST['mdateOfMarriage'];	
	// $mbro = $_POST['mbro'];
	// $msis = $_POST['msis'];
	$medhisto = $_POST['mhisto'];

	$ins9 = "INSERT INTO s_parentinfo (familyBgroundID, city, province, civilStatus, placeOfMarriage, dateOfMarriage, noOfChildren, medicalHistory) VALUES ('$m_id', ?, ?, ?, ?, ?, ?, ?)";
	$s9 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($s9, $ins9)){
	}
	else{
		mysqli_stmt_bind_param($s9, "sssssis", $mcity, $mprovince, $mcstat, $mplace, $mdate, $noc, $medhisto);
		mysqli_stmt_execute($s9);
	}
}

if(isset($_POST['fname'])){
	$fname = $_POST['fname'];
	$fbday = $_POST['fbirthdate'];
	$fcno = $_POST['fcno'];
	$foccu = $_POST['foccu'];
	$fincome = $_POST['fincome'];

	$sql = "INSERT INTO s_familybground (scholarAppID, name, birthdate, relationType, contactNo, occupation, income) VALUES ('$appid', ?, ?, 'Father', ?, ?, ?)";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $sql)){
	}
	else{
		mysqli_stmt_bind_param($stmt, "ssisd", $fname, $fbday, $fcno, $foccu, $fincome);
		mysqli_stmt_execute($stmt);
		$f_id = mysqli_insert_id($con);
	}


	$fcity = $_POST['fcity'];
	$fprovince = $_POST['fprovince'];
	$fcstat = $_POST['fcstat'];
	$fplace = $_POST['fplaceOfMarriage'];
	$fdate = $_POST['fdateOfMarriage'];
	// $fbro = $_POST['fbro'];
	// $fsis = $_POST['fsis'];
	$fhisto = $_POST['fhisto'];

	$sql2 = "INSERT INTO s_parentinfo (familyBgroundID, city, province, civilStatus, placeOfMarriage, dateOfMarriage, noOfChildren, medicalHistory) VALUES ('$f_id', ?, ?, ?, ?, ?, ?, ?)";
	$stmt2 = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt2, $sql2)){
	}
	else{
		mysqli_stmt_bind_param($stmt2, "sssssis", $fcity, $fprovince, $fcstat, $fplace, $fdate, $noc, $fhisto);
		mysqli_stmt_execute($stmt2);
	}
}

$q2 = "SELECT COUNT(scholarID) FROM scholar";
	$result = mysqli_query($con, $q2);

	    if ($result)
	    {
	        $row = mysqli_fetch_row($result);
	    }

$year = date("Y");
$case = $row[0]+1;
$caseNo = $year."-".$case;
$nickname = $_POST['nickname'];
$yrlvl = $_POST['cYrLevel'];
$bdate = $_POST['birthdate'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$classification = $_POST['classification'];
$school = $_POST['school'];
$adate = $_POST['admission'];

$insert = "INSERT INTO scholar (personID, scholarAppID, caseNo, nickname, currentYrLevel, birthdate, street, city, zip, classification, school, admissionDate, applicationStatus) VALUES ('$personid', '$appid', '$caseNo', ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Accepted')";
$statement = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($statement, $insert)){
}
else{
	mysqli_stmt_bind_param($statement, "sssssssss", $nickname, $yrlvl, $bdate, $street, $city, $zip, $classification, $school, $adate);
	mysqli_stmt_execute($statement);
	$sid = mysqli_insert_id($con);
}

$rem = "";
$bmi = 0;
$bmi = $weight/(($height/100)*($height/100));

if ($bmi < 18.5){
    $rem = "Underweight";
}

else if ($bmi >= 18.5 && $bmi <=25){
    $rem = "Normal Weight";
}

else if ($bmi >= 25 && $bmi <= 30){
    $rem = "Obese";
}

else if ($bmi > 30){
    $rem = "Overweight";
}


$db = "INSERT INTO s_medicalreport (scholarID, height, weight, BMI, remarks, dateChecked) VALUES ('$sid', ?, ?, ?, ?, '$adate')";
$st = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($st, $db)){
	// echo "not added";
	echo "<script>
                alert('Scholar not added.');
                window.location='../addscholar.php';
                </script>";
}
else{
	mysqli_stmt_bind_param($st, "ddds", $height, $weight, $bmi, $rem);
	mysqli_stmt_execute($st);
	// echo "added";
	echo "<script>
                alert('Scholar added.');
                window.location='../viewscholar.php?scholarid=".$sid."';
                </script>";
}
?>